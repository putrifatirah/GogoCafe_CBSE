<?php 
$con = mysqli_connect('localhost', 'root', '', 'gogocafe');

if(mysqli_connect_errno()){
    echo "Database connection error!";
    exit;
}


$sql = "SELECT * FROM menu ";
$query = mysqli_query($con, $sql);
$count_all_rows = mysqli_num_rows($query);

if(isset($_POST['search']['value']))
{
    $search_value = $_POST['search']['value'];
    $sql .= "WHERE menu_type like '%".$search_value."%' ";
    $sql .= "OR menu_name like '%".$search_value."%' ";
    $sql .= "OR menu_image like '%".$search_value."%' ";
    $sql .= "OR menu_ing like '%".$search_value."%' ";
    $sql .= "OR price like '%".$search_value."%' ";
    $sql .= "OR availability like '%".$search_value."%' ";
}

if(isset($_POST['order']))
{
    $column = $_POST['order'][0]['column'];
    $order = $_POST['order'][0]['dir'];
    $sql .= "ORDER BY '".$column."' ".$order;
}
else{
    $sql .= "ORDER BY id ASC";
}

if ($_POST['length'] != -1) {
    $start = $_POST['start'];
    $length = $_POST['length'];
    $sql .= " LIMIT " .$start. ", " .$length;
}

$data = array();

$run_query = mysqli_query($con, $sql);
$filtered_rows = mysqli_num_rows($run_query);

while($row = mysqli_fetch_assoc($run_query))
{
    $subarray = array();
    $subarray[] = $row['id'];
    $subarray[] = $row['menu_type'];
    $subarray[] = $row['menu_name'];
    $subarray[] = $row['menu_image'];
    $subarray[] = $row['menu_ing'];
    $subarray[] = $row['price'];
    $subarray[] = $row['availability'];
    $subarray[] = '<a href="javascript:void();" data-id="'.$row['id'].'" class="btn btn-sm btn-info editBtn">Edit</a>
    <a href="javascript:void();" data-id="'.$row['id'].'" class="btn btn-sm btn-danger btnDelete">Delete</a>';
    $data[] = $subarray;

}

$output = array(
    'data' => $data,
    'draw' => intval($_POST['draw']),
    'recordsTotal' => $count_all_rows,
    'recordsFiltered' => $filtered_rows,
);

echo json_encode($output);
?>