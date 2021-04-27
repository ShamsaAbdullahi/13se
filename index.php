<?php

//To Handle Session Variables on This Page
session_start();


//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");
?>

<!doctype html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Job Portal</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"> -->
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
  <!-- font awesome -->
  <link rel="stylesheet" type="text/css" href="//use.fontawesome.com/releases/v5.7.2/css/all.css">
  <link rel="stylesheet" href="assets/css/flaticon.css">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
    <style>
@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap');
</style>


</script>

</head>

<body >
    <header>
    <div class="wrapper">
       
     <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top" >
      <div class="container-fluid">
     <a class="navbar-brand" href="#">Blue Jobs</a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link " href="jobs.php">Jobs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#candidates">Employees</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#company">Employer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About us</a>
        </li>
        </ul>
       

        <ul class="navbar-nav ms-auto flex-nowrap">
        
        <?php if (empty($_SESSION['id_emp']) && empty($_SESSION['id_user'])) { ?>
                    <li>
                        <a  class="nav-link" href="login.php">Login</a>
                    </li>
                    <li>
                        <a class="nav-link" href="sign-up.php">Sign Up</a>
                    </li>
                    <?php } else {

                        if (isset($_SESSION['id_user'])) {
                        ?>
                    <li>
                        <a class="nav-link" href="user/index.php">Dashboard</a>
                    </li>
                    <?php
                        } else if (isset($_SESSION['id_company'])) {
                        ?>
                    <li>
                        <a class="nav-link" href="employers/index.php">Dashboard</a>
                    </li>
                    <?php } ?>
                    <li>
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    <?php } ?>
       
      
    </ul>
       
     
    </div>
  </div>
</nav>
    </header>



    <div class="content-wrapper" style="margin-left: 0px;">

        <section class="content-header " style="background:white;">
            <!-- <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center index-head">
                        <h1>All <strong>JOBS</strong> In One Place</h1>
                        <p>Blue Collar Services</p>
                        <p><a class="btn btn-success btn-lg" href="jobs.php" role="button">Search Jobs</a></p>
                    </div>
                </div>
            </div> -->

            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="https://images.pexels.com/photos/3894375/pexels-photo-3894375.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block" style="top: 50%; transform: translateY(-50%); color:black; ">
                        <h4>All Jobs In One Place</h4>
                        <p>Blue Collar Services</p>
                        <p><a class="btn btn-dark btn-lg" href="jobs.php" role="button">Search Jobs</a></p>
                 </div>
                </div>
                <div class="carousel-item">
                <img src="https://images.pexels.com/photos/4820682/pexels-photo-4820682.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block" style="top: 50%; transform: translateY(-50%); color:white;">
                        <h4>All Jobs In One Place</h4>
                        <p>Blue Collar Services</p>
                        <p><a class="btn btn-dark btn-lg" href="jobs.php"  role="button">Search Jobs</a></p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="https://images.pexels.com/photos/4427957/pexels-photo-4427957.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block" style="top: 50%; transform: translateY(-50%); color:white;">
                        <h4>All Jobs In One Place</h4>
                        <p>Blue Collar Services</p>
                        <p><a class="btn btn-dark btn-lg" href="jobs.php" role="button">Search Jobs</a></p>
                </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
        </section>


      
        <section class="content-header" style="background:white; padding-top: 50px;padding-bottom: 200px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 latest-job margin-bottom-30">
                    <div class="section-tittle text-center"  style="margin-top:35px;">
                            <span style="color: #fb246a;text-transform: uppercase;margin-bottom: 28px;display: block;">Recent Jobs</span>
                            <h2 style="color: #28395a;font-size: 50px; font-weight: 700; line-height: 1.2;margin-bottom: 65px;">Featured Jobs</h2>
                        </div>
                        <div class="row justify-content-center" style="padding: 36px 30px;">
                        <div class="col-xl-10">
                        <?php
                        

                        $sql = "SELECT * FROM job_post Order By Rand() Limit 4";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $sql1 = "SELECT * FROM employers WHERE id_emp='$row[id_emp]'";
                                $result1 = $conn->query($sql1);
                                if ($result1->num_rows > 0) {
                                    while ($row1 = $result1->fetch_assoc()) {
                        ?>
                        <div class="attachment-block clearfix" style="margin-bottom:30px;">
                            <img class="attachment-img" src="img/headhunting.png" alt="Attachment Image">
                            <div class="attachment-pushed">
                                <h4 class="attachment-heading"> &nbsp &nbsp<a style="text-decoration:none;font-size: 24px;"
                                        href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?> "><?php echo $row['jobtitle']; ?></a>
                                    <span
                                        class="attachment-heading pull-right"><a class="btn btn-outline-primary" href="jobs.php" role="button">Available</a></button></span>
                              </h4><br>
                                <div class="attachment-text">
                                    <div> &nbsp &nbsp &nbsp<strong style="font-size: 15px; color: #808080;line-height: 1.8;"><?php echo $row1['username']; ?> &nbsp &nbsp &nbsp &nbsp <i class="fas fa-map-marker-alt"></i> &nbsp<?php echo $row1['location']; ?> &nbsp &nbsp &nbsp &nbsp <i class="fas fa-coins"></i> Ksh <?php echo $row['minimumsalary']; ?>-<?php echo $row['maximumsalary']; ?> 
                                             </strong></div>
                                </div>
                            </div>
                        </div>
                        <?php
                                    }
                                }
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </section>




        <div id="candidates" class="content-header pt-150 pb-150" style="background:url(img/how-applybg.png); min-height:100%; background-size: cover; background-repeat: no-repeat;">
            <div class="container">
                <div class="row">
                <div class="col-lg-12">
                        <div class="section-tittle white-text text-center">
                            <span style="color: #fb246a; text-transform: uppercase; margin-bottom: 28px; display: block; line-height: 1.5; margin-top: 50px;">Application process</span>
                            <h2 style="line-height: 1.2; margin-bottom: 95px;"> How it works</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-process text-center mb-30" style="background: #26317f; margin-bottom: 150px;padding: 44px 28px; ">
                            <div>
                                <span class="fi-rr-search-alt " style="font-size: 60px; color: #fff; margin-bottom: 20px;"></span>
                            </div>
                            <div class="process-cap">
                               <h5 style="color:white;">1. Search a job</h5>
                               <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut laborea.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-process text-center mb-30" style="background: #26317f; margin-bottom: 150px; padding: 44px 28px; ">
                            <div class="process-ion">
                                <span class="fi-rr-edit" style="font-size: 60px; color: #fff; margin-bottom: 20px;"></span>
                            </div>
                            <div class="process-cap">
                               <h5 style="color:white;">2. Apply for job</h5>
                               <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut laborea.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-process text-center mb-30" style="background: #26317f; margin-bottom: 150px; padding: 44px 28px; ">
                            <div class="process-ion">
                                <span class="fi-rr-briefcase" style="font-size: 60px; color: #fff; margin-bottom: 20px;"></span>
                            </div>
                            <div class="process-cap">
                               <h5 style="color:white;">3. Get your job</h5>
                               <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut laborea.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    </div>




            <div id="company" class="our-services section-pad-t30" style="background:white;">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center" style="margin-top:55px;">
                            <span style="color: #fb246a;text-transform: uppercase;margin-bottom: 28px;display: block;">FEATURED</span>
                            <h2 style="color: #28395a;font-size: 50px; font-weight: 700; line-height: 1.2;margin-bottom: 95px;">Browse Top Categories </h2>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-contnet-center">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30" style="border: 1px solid #dafcef;padding: 44px 0;">
                            <div class="services-ion">
                                <span class="fas fa-tshirt"  style="font-size: 60px;margin-bottom: 13px;color: #014b85;"></span>
                            </div>
                            <div class="services-cap">
                               <h5><a href="jobs.php" style="text-decoration:none">Laundry Services</a></h5>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30" style="border: 1px solid #dafcef;padding: 44px 0;">
                            <div class="services-ion">
                                <span class="fas fa-user-secret"  style="font-size: 60px;margin-bottom: 13px;color: #014b85;"></span>
                            </div>
                            <div class="services-cap">
                               <h5><a href="jobs.php" style="text-decoration:none">Security services</a></h5>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30" style="border: 1px solid #dafcef;padding: 44px 0;">
                            <div class="services-ion">
                                <span class="fas fa-water"  style="font-size: 60px;margin-bottom: 13px;color: #014b85;"></span>
                            </div>
                            <div class="services-cap">
                               <h5><a href="jobs.php" style="text-decoration:none">Cleaning Services</a></h5>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30" style="border: 1px solid #dafcef;padding: 44px 0;">
                            <div class="services-ion">
                                <span class="fas fa-tractor" style="font-size: 60px;margin-bottom: 13px;color: #014b85;"></span>
                            </div>
                            <div class="services-cap">
                               <h5><a href="jobs.php" style="text-decoration:none">Gardening Services</a></h5>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- More Btn -->
                <!-- Section Button -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="browse-btn2 text-center mt-50">
                            <a href="jobs.php" class="border-btn2" style="border: 1px solid #8b92dd;color: #8b92dd; background: none; padding: 19px 69px; margin-top:40px; text-transform: uppercase; cursor: pointer;
                                        display: inline-block;
                                        font-size: 14px;
                                        font-weight: 500;
                                        letter-spacing: 1px;
                                        text-decoration:none;
                                        border-radius: 5px;
                                        margin-bottom:90px;">Browse All Jobs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Services End -->




       


        <section id="about" class="content-header" style="background: #010b1d;color:white;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center latest-job margin-bottom-20">
                        <h1 style="color: #ffffff;font-size: 20px; margin-bottom: 29px; font-weight: 400;text-transform: uppercase;">About US</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <img src="img/logo.jpg" class="img-responsive">
                    </div>
                    <div class="col-md-6 about-text margin-bottom-20">
                        <p>Blue Collar Services
                        <p>The online job portal application allows job seekers and empolyers to connect.The
                            application provides the ability for job seekers to create their accounts, upload their
                            profile and resume, search for jobs, apply for jobs, view different job openings. The
                            application provides the ability for employeers to create their accounts, search
                            candidates, create job postings, and view candidates applications.
                        </p>
                        <p>
                            This website is used to enable the people who are in the society to connect to the
                            people theywork in the community so as to allow them to grow the coomunity at large. Our
                            website aims at helping the community at large.

                        </p>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer" style="margin-left: 0px; background: #010b1d">
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <!-- AdminLTE App -->
    <script src="js/adminlte.min.js"></script>

</body>

</html>










</body>

