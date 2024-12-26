<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Model Crud</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  </head>


  <body>

    <!-- Modal -->
    <div class="modal fade" id="completeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            
            <form>
                <div class="mb-3">
                    <label for="completename" class="form-label">Name</label>
                    <input type="text" class="form-control" id="completename" placeholder="Enter your name">
                </div>
                <div class="mb-3">
                    <label for="completemail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="completemail" aria-describedby="emailHelp" placeholder="Enter your email">
                </div>
                <div class="mb-3">
                    <label for="completemobile" class="form-label">Phone number</label>
                    <input type="text" class="form-control" id="completemobile" placeholder="Enter your phone number">
                </div>
                <div class="mb-3">
                    <label for="completeplace" class="form-label">Place</label>
                    <input type="text" class="form-control" id="completeplace" placeholder="Enter your place">
                </div>
            </form>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-dark" onclick="adduser()">Submit</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>

    <div class="container">
        <h1 class="text-center my-5">Booking CRUD</h1>
        <button type="button" class="btn btn-dark my-4" data-bs-toggle="modal" data-bs-target="#completeModal">
        Add new users
        </button>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

    <script>
        function adduser() {
            var nameAdd=$('#completename').val()
            var emailAdd=$('#completemail').val()
            var mobileAdd=$('#completemobile').val()
            var placeAdd=$('#completeplace').val()

            $.ajax({
                url: "insert.php",
                type: 'post',
                data:{
                    nameSend:nameAdd,
                    emailSend:emailAdd,
                    mobileSend:mobileAdd,
                    placeSend:placeAdd
                },
                success:function(data,status){
                    //function to display data;
                    console.log(status);
                }
            })
        }
    </script>
  </body>


</html>