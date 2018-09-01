<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Parking</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="css/sweetalert/sweetalert.css">


</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading text-center">
                        <h3 class="panel-title font-weight-bold">Login Admin E-Parking</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="control/login.php" id="login">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus required="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" required="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

    <script type="text/javascript" src="js/sweetalert/sweetalert.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#login').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type:$(this).attr('method'),
                    url:$(this).attr('action'),
                    data:$(this).serialize(),
                    success:function(result) {
                        if (result == 0) {
                         swal({
                            title: "Peringatan",
                            text: "Username Salah",
                            type: "warning",
                            showConfirmButton: false,
                            timer: 1500
                            }, function(){
                                swal.close();
                            });
                        }
                        else if (result == 2) {
                           swal({
                            title: "Peringatan",
                            text: "Password Salah",
                            type: "warning",
                            showConfirmButton: false,
                            timer: 1500
                            }, function(){
                                swal.close();
                            });

                        }
                        else{
                            swal({
                                 title: "Logged In",
                                 type: "success",
                                 showConfirmButton: false,
                                 timer: 2000
                                 }, function(){
                                    swal.close(); 
                                    window.location.href = "index.php";

                                 });
                             
                        }
                    }
                })
            })
        })
    </script>

</body>

</html>
