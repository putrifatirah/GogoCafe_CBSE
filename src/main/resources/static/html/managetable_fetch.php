<?php
$con = mysqli_connect('localhost', 'root', '', 'gogocafe');

if (mysqli_connect_errno()) {
    echo "Database connection error!";
    exit;
}

$sql = "SELECT bookinfo.*, ordermenu.menu_name, ordermenu.quantity
        FROM bookinfo
        JOIN ordermenu ON bookinfo.order_number = ordermenu.order_number";

if (isset($_POST['search']['value'])) {
    $search_value = $_POST['search']['value'];
    $sql .= " WHERE bookinfo.order_number LIKE '%" . $search_value . "%' ";
    $sql .= " OR bookinfo.venue LIKE '%" . $search_value . "%' ";
    $sql .= " OR bookinfo.date LIKE '%" . $search_value . "%' ";
    $sql .= " OR bookinfo.book_time LIKE '%" . $search_value . "%' ";
    $sql .= " OR bookinfo.table_no LIKE '%" . $search_value . "%' ";
    $sql .= " OR bookinfo.total_amount LIKE '%" . $search_value . "%' ";
    $sql .= " OR ordermenu.menu_name LIKE '%" . $search_value . "%' ";
    $sql .= " OR ordermenu.quantity LIKE '%" . $search_value . "%' ";
}

if (isset($_POST['order'])) {
    $column = $_POST['order'][0]['column'];
    $order = $_POST['order'][0]['dir'];
    $columns = array('bookinfo.order_number', 'bookinfo.venue', 'bookinfo.date', 'bookinfo.book_time', 'bookinfo.table_no', 'bookinfo.total_amount', 'ordermenu.menu_name', 'ordermenu.quantity');
    $sql .= " ORDER BY " . $columns[$column] . " " . $order;
} else {
    $sql .= " ORDER BY bookinfo.id ASC";
}

if ($_POST['length'] != -1) {
    $start = $_POST['start'];
    $length = $_POST['length'];
    $sql .= " LIMIT " . $start . ", " . $length;
}

$data = array();

$run_query = mysqli_query($con, $sql);
$count_all_rows = mysqli_num_rows($run_query);
$filtered_rows = $count_all_rows;

while ($row = mysqli_fetch_assoc($run_query)) {
    $subarray = array();
    $subarray[] = $row['id'];
    $subarray[] = $row['order_number'];
    $subarray[] = $row['venue'];
    $subarray[] = $row['date'];
    $subarray[] = $row['book_time'];
    $subarray[] = $row['table_no'];
    $subarray[] = $row['total_amount'];
    $subarray[] = $row['menu_name'];
    $subarray[] = $row['quantity'];

    $subarray[] = '<a href="javascript:void();" data-id="' . $row['id'] . '" class="btn btn-sm btn-info editBtn">Edit</a>
    <a href="javascript:void();" data-id="' . $row['id'] . '" class="btn btn-sm btn-danger btnDelete">Delete</a>';
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