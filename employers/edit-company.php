<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
if (empty($_SESSION['id_emp'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../db.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Job Portal</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="//use.fontawesome.com/releases/v5.7.2/css/all.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../css/AdminLTE.min.css">
    <link rel="stylesheet" href="../css/_all-skins.min.css">
    <!-- Custom -->
    <link rel="stylesheet" href="../css/custom.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body>
<div class="wrapper">

        
<header>

<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top" >
<div class="container-fluid">
<a class="navbar-brand" href="#">Blue Jobs</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<ul class="navbar-nav ms-auto flex-nowrap">
<li class="nav-item">
  <a class="nav-link " href="../jobs.php">Jobs</a>
</li>


</div>
</nav>

   
</header>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper"  style="margin-left: 0px;padding-top: 50px;padding-bottom: 120px; background:white;">

      <section id="candidates" class="content-header">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Welcome <b><?php echo $_SESSION['name']; ?></b></h3>
                </div>
                <div class="box-body no-padding">

                <nav class="nav flex-column">
                <a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i>&nbspDashboard</a>

                  <a class="nav-link" href="edit-company.php"><i class="fas fa-user"></i>&nbspMy Details</a>

                                      
                  <a class="nav-link" href="create-job-post.php"><i class="fas fa-list"></i>&nbspCreate Job Post</a>
                  <a class="nav-link" href="my-job-post.php"><i class="fas fa-envelope"></i>&nbspMy Job  Post</a>
                  <a class="nav-link" href="job-applications.php"><i class="fas fa-cogs"></i>&nbspJob Applications</a>
                  <a class="nav-link" href="mailbox.php"><i class="fas fa-envelope"></i>&nbspMailbox</a>
                  <a class="nav-link" href="settings.php"><i class="fas fa-cogs"></i>&nbspSettings</a>

                  <a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i>&nbsplogout</a>
                  </nav>
                                
                                
                                
                                
                                
                                
                                
                                
                  
                </div>
              </div>
            </div>
                        <div class="col-md-9 bg-white padding-2">
                            <h2><i>My Profile</i></h2>
                            <p>In this section you can change your details</p>
                            <div class="row">
                                <form action="update-company.php" method="post" enctype="multipart/form-data">
                                    <?php
                  $sql = "SELECT * FROM employers WHERE id_emp='$_SESSION[id_emp]'";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                  ?>
                                    <div class="col-md-6 latest-job ">
                                        <div class="form-group">
                                            <label>UserName</label>
                                            <input type="text" class="form-control input-lg" name="username"
                                                value="<?php echo $row['username']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Firstname</label>
                                            <input type="text" class="form-control input-lg" name="firstname"
                                                value="<?php echo $row['firstname']; ?>" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Lastname</label>
                                            <input type="text" class="form-control input-lg" name="lastname"
                                                value="<?php echo $row['lastname']; ?>" required="">
                                        </div>


                                       
                                    </div>
                                    <div class="col-md-6 latest-job ">
                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <input type="email" class="form-control input-lg" id="email"
                                                placeholder="Email" value="<?php echo $row['email']; ?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="contactno">Phone Number</label>
                                            <input type="text" class="form-control input-lg" id="contactno" name="phone"
                                                placeholder="Contact Number" value="<?php echo $row['phone']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="Location">Location</label>
                                            <select class="form-control" name="location" id="location">
                                                <option> Kakamega
                                                </option>
                                                <option>Nairobi</option>
                                                <option>Kisumu</option>
                                                <option>Mombasa</option>
                                            </select>
                                        </div><br>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-flat btn-success">Update
                                                Profile</button>
                                        </div>


                                    </div>
                                    <?php
                    }
                  }
                  ?>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </section>



        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer" style="margin-left: 0px;">
            <div class="text-center">
                <strong>Copyright &copy; 2021</strong> All rights
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../js/adminlte.min.js"></script>
</body>

</html>