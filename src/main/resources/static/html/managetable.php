<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta http-equiv="X-UA-Compatible" content="ie=edge" /> -->
    <title>GOGO CAFE</title>
    <link rel="icon" type="image/png" href="images/icon.png"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,900&display=swap" rel="stylesheet"/>
    
      <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="styleadmin.css" />
    <link rel="stylesheet" href="managemenu.css" />
    
    <!-- <link rel="stylesheet" href="acc.css" />  -->

  </head>

  <body style="margin-top: 120px;">
		
    <header>
        <div>
            <img src="images/logo.png" class="logo">
            <ul class="nav">
            <div class="nav__list">
                <a href="managemenu.php" class="nav__link">MENU</a>
                <a href="manageacc.php" class="nav__link">ACCOUNT</a>
                <a href="managetable.php" class="nav__link active">TABLE</a>
            </div>	
            </ul>
	    </div>
        
    </header>
        <h1 class="text-center">BOOKING DETAILS</h1>
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="row">			
                        <div class="col-md-8">
                            <!-- Button trigger modal -->
                        </div>            
                        <div class="row" >
                            <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Order Number</th>
                                <th>Venue</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Table Number</th>
                                <th>Total Amount (RM)</th>
                                <th>Menu</th>
                                <th>Quantity</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <td>1</td> 
                                    <td>1</td>
                                    <td>MidValley</td>
                                    <td>2023-6-17</td>
                                    <td>2 p.m.</td>
                                    <td>2</td>
                                    <td>16.00</td>
                                    <td> Spaghetti</td>
                                    <td> 1</td>
                                    <td><a class="btn ">Edit</a><a href="">Delete</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>  
        
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- print the data in this interface -->
    <script type="text/javascript">
        $('#datatable').DataTable({
            'serverSide': true,
            'processing': true,
            'Paging': true,
            'order':[],
            'ajax':{
                'url': 'managetable_fetch.php',
                'type': 'post',
            },
            'fnCreatedRow': function(nRow, aData, iDataIndex)
            {
                $(nRow).attr('id', aData[0]);
            },
                'columnDefs':[{
                'target':[0, 9],
                'orderable':false,
            }]
        });
    </script>

    <!-- Button trigger modal -->
    
    <script type="text/javascript">
    
    // edit data
    $(document).on('click', '.editBtn', function(event){
        var id = $(this).data('id');
        var trid = $(this).closest('tr').attr('id');
        $.ajax({
            url: "managetable_get_single.php",
            data:{id: id},
            type: "post",
            success:function(data)
            {
                var json =JSON.parse(data);
                $('#id').val(json.id);
                $('#trid').val(trid);
                $('#order_number').val(json.order_number);
                $('#_inputVenue').val(json.venue);
                $('#_inputDate').val(json.date);
                $('#_inputBookTime').val(json.book_time);
                $('#_inputTableNo').val(json.table_no);
                $('#_inputTotalAmount').val(json.total_amount);
                $('#_inputMenu').val(json.menu_name);
                $('#_inputQuantity').val(json.quantity);
                $('#editUserModal').modal('show');
            }
        });
    });

    $(document).on('click', '#updateUserForm', function(){
        var id = $('#id').val();
        var trid = $('#trid').val();
        var order_number = $('#order_number').val();
        var venue = $('#_inputVenue').val();
        var date = $('#_inputDate').val();
        var book_time = $('#_inputBookTime').val();
        var table_no = $('#_inputTableNo').val();
        var total_amount = $('#_inputTotalAmount').val();
        var menu_name = $('#_inputMenu').val();
        var quantity = $('#_inputQuantity').val();
        $.ajax({
            url: "managetable_update.php",
            data: {id, order_number, venue, date, book_time, table_no, total_amount, menu_name, quantity},
            type: 'post',
            success: function(data){
            var json = JSON.parse(data); //problem here
            status = json.status;
            if (status == 'success') {
                table = $('#datatable').DataTable();
                // var rowData = [id, order_number, venue, date, book_time, table_no, total_amount, menu_name, quantity, button];
                // var row = table.row("[id='" + trid + "']");
                // row.data(rowData).draw();
                var button = '<a href="javascript:void();" class="btn btn-sm btn-info" data-id="' + id + '" >Edit</a> <a href="javascript:void();" class="btn btn-sm btn-danger" data-id="' + id + '" >Delete</a>';
                var row = table.row("[id='" + trid + "']");
                row.row("[id='" + trid + "']").data([id, order_number, venue, date, book_time, table_no, total_amount, menu_name, quantity, button]);
                $('#editUserModal').modal('hide');
                $('#saveChangesBtn').click(); // Trigger click event on "Save changes" button
            } else {
                alert('failed');
            }
        }

        });

    });

    //delete user
    $(document).on('click', '.btnDelete', function(event){
        var id = $(this).data('id');
        if(confirm('Are you sure you want to delete this user?'))
        {
            $.ajax({
                url: "managetable_delete.php",
                data: { id: id },
                type:"post",
                success:function(data)
                {
                    var json = JSON.parse(data);
                    var status = json.status;
                    if(status=='success')
                    {
                        // Remove the deleted row from the DataTable
                        var table = $('#datatable').DataTable();
                        table.row('#' + id).remove().draw();
                    }
                    else{
                        alert('Failed to delete the row.');
                    }
                }
            });
        }
    });

    </script>
    


    <!-- new way
    <script type="text/javascript">
    
    $(document).ready(function() {
    // edit data
    $(document).on('click', '.editBtn', function(event) {
      // Code for editing a booking
      var id = $(this).data('id');
        var trid = $(this).closest('tr').attr('id');
        $.ajax({
            url: "managetable_get_single.php",
            data:{id: id},
            type: "post",
            success:function(data)
            {
                var json =JSON.parse(data);
                $('#id').val(json.id);
                $('#trid').val(trid);
                $('#order_number').val(json.order_number);
                $('#_inputVenue').val(json.venue);
                $('#_inputDate').val(json.date);
                $('#_inputBookTime').val(json.book_time);
                $('#_inputTableNo').val(json.table_no);
                $('#_inputTotalAmount').val(json.total_amount);
                $('#_inputMenu').val(json.menu_name);
                $('#_inputQuantity').val(json.quantity);
                $('#editUserModal').modal('show');
            }
        });
    });

    $('#updateUserForm').on('submit', function(event) {
      event.preventDefault(); // Prevent the default form submission

      var id = $('#id').val();
      var trid = $('#trid').val();
      var order_number = $('#order_number').val();
      var venue = $('#_inputVenue').val();
      var date = $('#_inputDate').val();
      var book_time = $('#_inputBookTime').val();
      var table_no = $('#_inputTableNo').val();
      var total_amount = $('#_inputTotalAmount').val();
      var menu_name = $('#_inputMenu').val();
      var quantity = $('#_inputQuantity').val();

      $.ajax({
        url: "managetable_update.php",
        data: {
          id: id,
          order_number: order_number,
          venue: venue,
          date: date,
          book_time: book_time,
          table_no: table_no,
          total_amount: total_amount,
          menu_name: menu_name,
          quantity: quantity
        },
        type: 'post',
        success: function(data) {
          var json = JSON.parse(data);
          var status = json.status;
          if (status == 'success') {
            var table = $('#datatable').DataTable();
            var button = '<a href="javascript:void();" class="btn btn-sm btn-info" data-id="' + id + '">Edit</a> <a href="javascript:void();" class="btn btn-sm btn-danger" data-id="' + id + '">Delete</a>';
            var row = table.row("[id='" + trid + "']");
            row.data([id, order_number, venue, date, book_time, table_no, total_amount, menu_name, quantity, button]);
            table.ajax.reload();
            $('#editUserModal').modal('hide');
          } else {
            alert('Failed');
          }
        }
      });
    });

    // delete user
    $(document).on('click', '.btnDelete', function(event) {
      // Code for deleting a booking
      var id = $(this).data('id');
        if(confirm('Are you sure you want to delete this user?'))
        {
            $.ajax({
                url: "managetable_delete.php",
                data: { id: id },
                type:"post",
                success:function(data)
                {
                    var json = JSON.parse(data);
                    var status = json.status;
                    if(status=='success')
                    {
                        // Remove the deleted row from the DataTable
                        var table = $('#datatable').DataTable();
                        table.row('#' + id).remove().draw();
                    }
                    else{
                        alert('Failed to delete the row.');
                    }
                }
            });
        }
    });
  });
</script> -->


    <!-- update user modal -->
    <!-- Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Booking Details</h5>
                    <!-- check this line -->
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>  -->
                </div>
                <form id="updateUserForm" action="javascript:void();" method="post">
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id" required value="">
                        <input type="hidden" id="trid" name="trid" required value="">
                        <div class="mb-3">
                            <label for="_inputVenue" class="form-label">Venue</label>
                            <input type="text" class="form-control" id="_inputVenue" name="_inputVenue">
                        </div>
                        <div class="mb-3">
                            <label for="_inputDate" class="form-label">Date</label>
                            <input type="text" class="form-control" id="_inputDate" name="_inputDate">
                        </div>
                        <div class="mb-3">
                            <label for="_inputBookTime" class="form-label">Book Time</label>
                            <input type="text" class="form-control" id="_inputBookTime" name="_inputBookTime">
                        </div>
                        <div class="mb-3">
                            <label for="_inputTableNo" class="form-label">Table number</label>
                            <input type="text" class="form-control" id="_inputTableNo" name="_inputTableNo">
                        </div>
                        <div class="mb-3">
                            <label for="_inputTotalAmount" class="form-label">Total Amount</label>
                            <input type="text" class="form-control" id="_inputTotalAmount" name="_inputTotalAmount">
                        </div>
                        <div class="mb-3">
                            <label for="_inputMenu" class="form-label">Menu</label>
                            <input type="text" class="form-control" id="_inputMenu" name="_inputMenu">
                        </div>
                        <div class="mb-3">
                            <label for="_inputQuantity" class="form-label">Quantity</label>
                            <input type="text" class="form-control" id="_inputQuantity" name="_inputQuantity">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button  type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

              
</body>
</html>