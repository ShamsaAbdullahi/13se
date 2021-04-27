<?php
session_start();

if (isset($_SESSION['id_user']) || isset($_SESSION['id_company'])) {
    header("Location: index.php");
    exit();
}

require_once("db.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Job Portal</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <link rel="stylesheet" href="css/_all-skins.min.css">
    <!-- Custom -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap");

body {
    background-color:white;
    font-family: "Poppins", sans-serif;
    font-weight: 300
}

.height {
    height: 100vh
}

.form-group {
    position: relative;
    margin-bottom: 10px;
    margin-top: 10px;
    
}

.form-group i {
    position: absolute;
    font-size: 18px;
    top: 15px;
    left: 10px
}

.form-control {
    height: 50px;
    background-color: whitesmoke;
    text-indent: 24px;
    font-size: 15px
}

.form-control:focus {
    background-color: ;
    box-shadow: none;
    color: black;
    border-color: #4f63e7;
}

.form-check-label {
    margin-top: 2px;
    font-size: 14px
}
select.form-control option{
background-color: #577FBA;
color:black;
}


  </style>
</head>

<body>
    <div class="wrapper">
    

<header>
      
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
              <a class="navbar-brand" href="#">Blue Jobs</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto flex-nowrap">
                  <li class="nav-item">
                  <a class="nav-link" href="jobs.php">Jobs</a>
                  </li>
                  <?php if (empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
                  <li class="nav-item">
                  <a class="nav-link" href="login.php">Login</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="sign-up.php">Sign Up</a>
                  </li>
                  <?php } else {

                  if (isset($_SESSION['id_user'])) {
                  ?>
                   <li class="nav-item">
                  <a class="nav-link" href="user/index.php">Dashboard</a>
                  </li>
                  <?php
                          } else if (isset($_SESSION['id_company'])) {
                          ?>
                  <li class="nav-item">
                  <a class="nav-link" href="company/index.php">Dashboard</a>
                  </li>
                  <?php } ?>
                  <li class="nav-item">
                  <a class="nav-link" href="logout.php">logout</a>
                  </li>
                  <?php } ?>

              </ul>
              </div>
          </div>
          </nav>
      </header>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin-left: 0px; background-color: white;">
       <section class="content-header">
        <div class="container">
          <div class="row latest-job margin-top-50 ">
          <h2 style="line-height: 1.2; margin-bottom:20px; text-align:center; margin-top:10px;">Employer/Company Profile</h2>
            
            <form method="post"  id="registerCompanies" action="addemp.php" enctype="multipart/form-data"  class="form-inline justify-content-center">
              <div class="col col-sm-6 offset-sm-3 text-center">
              <div class="form-group">
                  <input class="form-control input-lg" type="text" name="username" placeholder="Company Name" required>
                </div>

                <div class="form-group">
                  <input class="form-control input-lg" type="text" name="firstname" placeholder="First Name" required>
                </div>
                <div class="form-group">
                  <input class="form-control input-lg" type="text" name="lastname" placeholder="Lastname">
                </div>
                <div class="form-group">
                  <input class="form-control input-lg" type="text" name="email" placeholder="Email" required>
                </div>

               

                <?php
                //If Company already registered with this email then show error message.
                if (isset($_SESSION['registerError'])) {
                ?>
                  <div>
                    <p class="text-center" style="color: red;">Email Already Exists! Choose A Different
                      Email!</p>
                  </div>
                <?php
                  unset($_SESSION['registerError']);
                }
                ?>
              </div>


              <div class="col-md-6 offset-sm-3 text-center ">
                <div class="form-group">
                  <input class="form-control input-lg" id="password" type="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                  <input class="form-control input-lg" id="cpassword" type="password" name="cpassword" placeholder="Confirm Password" required>
                </div>
                <div id="passwordError" class="btn btn-flat btn-danger hide-me">
                  Password Mismatch!!
                </div>
                <div class="form-group">
                  <input class="form-control input-lg" type="text" name="phone" placeholder="Phone Number" minlength="10" maxlength="10" autocomplete="off" onkeypress="return validatePhone(event);" required>
                </div>
                <div class="form-group">
                  <!-- <label for="Location">Location</label> -->
                  <select class="form-control" placeholder="location" name="location" id="location">
                  <option value="" disabled selected hidden>Enter location</option>
                    <option value="Kakamega"> Kakamega</option>
                    <option value="Nairobi">Nairobi</option>
                    <option value="Kisumu">Kisumu</option>
                    <option value="Mombasa">Mombasa</option>
                  </select>
                </div>
                
                <div class="form-group checkbox">
                  <label><input type="checkbox" required> I accept terms & conditions</label>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-secondary btn-lg">Register</button>
                </div>



              </div>
            </form>

          </div>
        </div>
      </section><br><br>



    </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer" style="margin-left: 0px;">
            <div class="text-center">
                <strong>Copyright &copy; 2021.</strong> All
                rights
                reserved.
            </div>
        </footer>

        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
    <!-- AdminLTE App -->
    <script src="js/adminlte.min.js"></script>

    <script type="text/javascript">
    function validatePhone(event) {

        //event.keycode will return unicode for characters and numbers like a, b, c, 5 etc.
        //event.which will return key for mouse events and other events like ctrl alt etc. 
        var key = window.event ? event.keyCode : event.which;

        if (event.keyCode == 8 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 39) {
            // 8 means Backspace
            //46 means Delete
            // 37 means left arrow
            // 39 means right arrow
            return true;
        } else if (key < 48 || key > 57) {
            // 48-57 is 0-9 numbers on your keyboard.
            return false;
        } else return true;
    }
    </script>



    <script>
    $("#registerCompanies").on("submit", function(e) {
        e.preventDefault();
        if ($('#password').val() != $('#cpassword').val()) {
            $('#passwordError').show();
        } else {
            $(this).unbind('submit').submit();
        }
    });
    </script>
</body>

</html>