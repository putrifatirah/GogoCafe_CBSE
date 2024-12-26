<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta http-equiv="X-UA-Compatible" content="ie=edge" /> -->
    <title>GOGO CAFE</title>
    <link rel="icon" type="image/png" href="images/icon.png"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,900&display=swap" rel="stylesheet"/>
    
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:300,900&display=swap" rel="stylesheet"/>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="styleadmin.css" />
    <link rel="stylesheet" href="managemenu.css" />


    <!-- <link rel="stylesheet" href="acc.css" />  -->

  </head>

  <body style="margin-top: 120px; font-family: Poppins, sans-serif;">
		
    <header>
        <div>
            <img src="images/logo.png" class="logo">
            <ul class="nav">
            <div class="nav__list">
                <a href="managemenu.php" class="nav__link active">MENU</a>
                <a href="manageacc.html" class="nav__link">ACCOUNT</a>
                <a href="managetable.html" class="nav__link">TABLE</a>
            </div>	
            </ul>
	    </div>
        </nav>
    </header>
        <h1 class="text-center" style="font-family: Poppins, sans-serif;">MENU AVAILABILITY</h1>
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="row">			
                        <div class="col-md-8">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" style="background: #000;" data-bs-toggle="modal" data-bs-target="#addUserModal">Add Menu</button>
                        </div>            
                        <div class="row" >
                        <table id="datatable" class="table">
                            <thead>
                                <tr>
                                    <th>Menu_ID</th>
                                    <th>Menu Type</th>
                                    <th>Menu Name</th>
                                    <th>Menu Image</th>
                                    <th>Menu Ingredient</th>
                                    <th>Price (RM)</th>
                                    <th>Availability</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td> 
                                    <td>1</td>
                                    <td>Latte</td>
                                    <td>1.jpg</td>
                                    <td>Expresso, Milk</td>
                                    <td>8.00</td>
                                    <td>yes</td>
                                    <td style="width: 150px;">
                                    <a class="btn btn-dark edit-link" style="background-color: black; color:white">Edit</a>
                                    <a href="" class="btn btn-dark" style="background-color: black; color:white">Delete</a>
                                    </td>
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
            // 'paging': true,
            "bPaginate": false,
            'order':[],
            'ajax':{
                'url': 'menu_fetch.php',
                'type': 'post',
            },
            'fnCreatedRow': function(nRow, aData, iDataIndex)
            {
                $(nRow).attr('id', aData[0]);
            },
            'columnDefs': [
                { 
                    'width': '15%', 
                    'targets': 2 
                },
                { 
                    'width': '25%', 
                    'targets': 4 
                },
                { 
                    'orderable': false,
                    'targets': [2, 4]
                }
            ]
        });
    </script>

    <!-- Button trigger modal -->
    <!-- add data -->
    <script type="text/javascript">
        $(document).on('submit', '#saveUserForm', function(event){
        event.preventDefault();
        var menu_type = $('#inputMenuType').val();
        var menu_name = $('#inputMenuName').val();
        var menu_image = $('#inputMenuImage').val();
        var menu_ing = $('#inputMenuIng').val();
        var price = $('#inputPrice').val();
        var availability = $('#inputAvailability').val();

        if (menu_type != '' && menu_name != '' && menu_image != '' && menu_ing != '' && price != '' && availability != '') {
            $.ajax({
                url: "menu_add.php",
                data: { menu_type: menu_type, menu_name: menu_name, menu_image: menu_image, menu_ing: menu_ing, price: price, availability: availability },
                type: 'post',
                success: function(data) 
                {
                    var json = JSON.parse(data);
                    status = json.status;
                    if (status == 'success') 
                    {
                        table = $('#datatable').DataTable();
                        table.draw();
                        alert('User added successfully!');
                        $('#inputMenuType').val('');
                        $('#inputMenuName').val('');
                        $('#inputMenuImage').val('');
                        $('#inputMenuIng').val('');
                        $('#inputPrice').val('');
                        $('#inputAvailability').val('');
                        $('#addUserModal').modal('hide');
                    }
                }
            });
            } else {
                alert("Please fill all the Required fields");
            }
        });
    
    // edit data
    $(document).on('click', '.editBtn', function(event){
        var id = $(this).data('id');
        var trid = $(this).closest('tr').attr('id');
        $.ajax({
            url: "menu_get_single.php",
            data:{id: id},
            type: "post",
            success:function(data)
            {
                var json = JSON.parse(data);
                $('#id').val(json.id);
                $('#trid').val(trid);
                $('#_inputMenuType').val(json.menu_type);
                $('#_inputMenuName').val(json.menu_name);
                $('#_inputMenuImage').val(json.menu_image);
                $('#_inputMenuIng').val(json.menu_ing);
                $('#_inputPrice').val(json.price);
                $('#_inputAvailability').val(json.availability);
                $('#editUserModal').modal('show');
            }
        });
    });


    $(document).on('submit', '#updateUserForm', function(){
    var id = $('#id').val();
    var trid = $('#trid').val();
    var menu_type = $('#_inputMenuType').val();
    var menu_name = $('#_inputMenuName').val();
    var menu_image = $('#_inputMenuImage').val();
    var menu_ing = $('#_inputMenuIng').val();
    var price = $('#_inputPrice').val();
    var availability = $('#_inputAvailability').val();
    $.ajax({
        url:"menu_update.php",
        data:{id:id, menu_type:menu_type, menu_name:menu_name, menu_image:menu_image, menu_ing:menu_ing, price: price, availability: availability},
        type:'post',
        success:function(data){
            var json = JSON.parse(data);
            status = json.status;
            if(status=='success')
            {
                table = $('#datatable').DataTable();
                var button = '<a href="javascript:void();" class="btn btn-sm btn-info editBtn" data-id="' + id + '" >Edit</a> <a href="javascript:void();" class="btn btn-sm btn-danger btnDelete" data-id="' + id + '" >Delete</a>';
                var row = table.row("[id='" + trid + "']");
                row.row("[id='" + trid +"']").data([id, menu_type, menu_name, menu_image, menu_ing, price, availability, button]);
                $('#editUserModal').modal('hide');

                // Rebind the click event for the "Edit" button
                $('.editBtn').on('click', function(event){
                    var id = $(this).data('id');
                    var trid = $(this).closest('tr').attr('id');
                    $.ajax({
                        url: "menu_get_single.php",
                        data:{id: id},
                        type: "post",
                        success:function(data)
                        {
                            var json = JSON.parse(data);
                            $('#id').val(json.id);
                            $('#trid').val(trid);
                            $('#_inputMenuType').val(json.menu_type);
                            $('#_inputMenuName').val(json.menu_name);
                            $('#_inputMenuImage').val(json.menu_image);
                            $('#_inputMenuIng').val(json.menu_ing);
                            $('#_inputPrice').val(json.price);
                            $('#_inputAvailability').val(json.availability);
                            $('#editUserModal').modal('show');
                        }
                    });
                });

                // Rebind the click event for the delete button
                $('.btnDelete').on('click', function(event){
                    var id = $(this).data('id');
                    if(confirm('Are you sure you want to delete this user?'))
                    {
                        $.ajax({
                            url: "menu_delete.php",
                            data:{id:id},
                            type:"post",
                            success:function(data)
                            {
                                var json = JSON.parse(data);
                                var status = json.status;
                                if(status=='success')
                                {
                                    $('#' + id).closest('tr').remove();
                                }
                                else{
                                    alert('failed');
                                }
                            }
                        });
                    }
                });
            }
            else{
                alert('failed');
            }
        }
    });
});



    //delete user
    $(document).on('click','.btnDelete', function(event){
        var id = $(this).data('id');
        if(confirm('Are you sure you want to delete this user?'))
        {
            $.ajax({
                url: "menu_delete.php",
                data:{id:id},
                type:"post",
                success:function(data)
                {
                    var json = JSON.parse(data);
                    var status = json.status;
                    if(status=='success')
                    {
                        $('#' + id).closest('tr').remove();
                    }
                    else{
                        alert('failed');
                    }
                }
            });
        }
    });
    </script>        
            
    <!-- update user modal -->
    <!-- Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateUserForm" action="javascript:void();" method="post">
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <input type="hidden" id="trid" name="trid" value="">
                    <div class="mb-3 row">
                        <label for="inputMenuType" class="col-sm-2 col-form-label">Menu Type</label>
                        <div class="col-sm-10">
                            <input type="text" name="_menutype" class="form-control" id="_inputMenuType" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputMenuName" class="col-sm-2 col-form-label">Menu Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="_inputMenuName" name="_inputMenuName">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputMenuImage" class="col-sm-2 col-form-label">Menu Image</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="_inputMenuImage" name="_inputMenuImage">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputMenuIng" class="col-sm-2 col-form-label">Menu Ingredients</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="_inputMenuIng" name="_inputMenuIng">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="_inputPrice" name="_inputPrice">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputAvailability" class="col-sm-2 col-form-label">Availability</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="_inputAvailability" name="_inputAvailability">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
              
    <!-- add user modal -->
    <!-- Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="saveUserForm" action="javascript:void();" method="post">
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="inputMenuType" class="col-sm-2 col-form-label">Menu Type</label>
                        <div class="col-sm-10">
                            <input type="text" name="menu_type" class="form-control" id="inputMenuType" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputMenuName" class="col-sm-2 col-form-label">Menu Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputMenuName" name="inputMenuName">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputMenuImage" class="col-sm-2 col-form-label">Menu Image</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputMenuImage" name="inputMenuImage">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputMenuIng" class="col-sm-2 col-form-label">Menu Ingredients</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputMenuIng" name="inputMenuIng">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPrice" name="inputPrice">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputAvailability" class="col-sm-2 col-form-label">Availability</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputAvailability" name="inputAvailability">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>