<<<<<<< HEAD
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
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
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

</head>

<body>
    <header>
        <nav class="navbar navbar-static-top">
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="jobs.php">Jobs</a>
                    </li>
                    <li>
                        <a href="#candidates">Candidates</a>
                    </li>
                    <li>
                        <a href="#company">Company</a>
                    </li>
                    <li>
                        <a href="#about">About Us</a>
                    </li>
                    <?php if (empty($_SESSION['id_emp']) && empty($_SESSION['id_user'])) { ?>
                        <li>
                            <a href="login.php">Login</a>
                        </li>
                        <li>
                            <a href="sign-up.php">Sign Up</a>
                        </li>
                        <?php } else {

                        if (isset($_SESSION['id_user'])) {
                        ?>
                            <li>
                                <a href="user/index.php">Dashboard</a>
                            </li>
                        <?php
                        } else if (isset($_SESSION['id_company'])) {
                        ?>
                            <li>
                                <a href="employers/index.php">Dashboard</a>
                            </li>
                        <?php } ?>
                        <li>
                            <a href="logout.php">Logout</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>
    <div class="content-wrapper" style="margin-left: 0px;">

        <section class="content-header bg-main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center index-head">
                        <h1>All <strong>JOBS</strong> In One Place</h1>
                        <p>One search, global reach</p>
                        <p><a class="btn btn-success btn-lg" href="jobs.php" role="button">Search Jobs</a></p>
                    </div>
                </div>
            </div>
        </section>
        <section class="content-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 latest-job margin-bottom-20">
                        <h1 class="text-center">Latest Jobs</h1>
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
                                        <div class="attachment-block clearfix">
                                            <img class="attachment-img" src="img/photo1.png" alt="Attachment Image">
                                            <div class="attachment-pushed">
                                                <h4 class="attachment-heading"><a href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle']; ?></a>
                                                    <span class="attachment-heading pull-right">$<?php echo $row['maximumsalary']; ?>/Month</span>
                                                </h4>
                                                <div class="attachment-text">
                                                    <div><strong><?php echo $row1['username']; ?> | <?php echo $row1['location']; ?>
                                                            | </strong></div>
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

        <section id="candidates" class="content-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center latest-job margin-bottom-20">
                        <h1>Candidates</h1>
                        <p>Finding a job just got easier. Create a profile and apply with single mouse click.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-4">
                        <div class="thumbnail candidate-img">
                            <img src="img/browse.jpg" alt="Browse Jobs">
                            <div class="caption">
                                <h3 class="text-center">Browse Jobs</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="thumbnail candidate-img">
                            <img src="img/interviewed.jpeg" alt="Apply & Get Interviewed">
                            <div class="caption">
                                <h3 class="text-center">Apply & Get Interviewed</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="thumbnail candidate-img">
                            <img src="img/career.jpg" alt="Start A Career">
                            <div class="caption">
                                <h3 class="text-center">Start A Career</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="company" class="content-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center latest-job margin-bottom-20">
                        <h1>Companies</h1>
                        <p>Hiring? Register your company for free, browse our talented pool, post and track job
                            applications</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-4">
                        <div class="thumbnail company-img">
                            <img src="img/postjob.png" alt="Browse Jobs">
                            <div class="caption">
                                <h3 class="text-center">Post A Job</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="thumbnail company-img">
                            <img src="img/manage.jpg" alt="Apply & Get Interviewed">
                            <div class="caption">
                                <h3 class="text-center">Manage & Track</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="thumbnail company-img">
                            <img src="img/hire.png" alt="Start A Career">
                            <div class="caption">
                                <h3 class="text-center">Hire</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section id="about" class="content-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center latest-job margin-bottom-20">
                        <h1>About US</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <img src="img/browse.jpg" class="img-responsive">
                    </div>
                    <div class="col-md-6 about-text margin-bottom-20">
                        <p>Blue Collar Services
                        <p>The online job portal application allows job seekers and embolyers to connect.The
                            application provides the ability for job seekers to create their accounts, upload their
                            profile and resume, search for jobs, apply for jobs, view different job openings. The
                            application provides the ability for employeers to create their accounts, search
                            candidates, create job postings, and view candidates applications.
                        </p>
                        <p>
                            This website is used to ebable the people who are in the society to connect to the
                            people theywork in the community so as to allow them to grow the coomunity at large. Our
                            website aims at helping the community at large.

                        </p>
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
    <script src="js/adminlte.min.js"></script>










=======
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
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
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

</head>

<body>
    <header>
        <nav class="navbar navbar-static-top">
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="jobs.php">Jobs</a>
                    </li>
                    <li>
                        <a href="#candidates">Candidates</a>
                    </li>
                    <li>
                        <a href="#company">Company</a>
                    </li>
                    <li>
                        <a href="#about">About Us</a>
                    </li>
                    <?php if (empty($_SESSION['id_emp']) && empty($_SESSION['id_user'])) { ?>
                        <li>
                            <a href="login.php">Login</a>
                        </li>
                        <li>
                            <a href="sign-up.php">Sign Up</a>
                        </li>
                        <?php } else {

                        if (isset($_SESSION['id_user'])) {
                        ?>
                            <li>
                                <a href="user/index.php">Dashboard</a>
                            </li>
                        <?php
                        } else if (isset($_SESSION['id_company'])) {
                        ?>
                            <li>
                                <a href="employers/index.php">Dashboard</a>
                            </li>
                        <?php } ?>
                        <li>
                            <a href="logout.php">Logout</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>
    <div class="content-wrapper" style="margin-left: 0px;">

        <section class="content-header bg-main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center index-head">
                        <h1>All <strong>JOBS</strong> In One Place</h1>
                        <p>One search, global reach</p>
                        <p><a class="btn btn-success btn-lg" href="jobs.php" role="button">Search Jobs</a></p>
                    </div>
                </div>
            </div>
        </section>
        <section class="content-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 latest-job margin-bottom-20">
                        <h1 class="text-center">Latest Jobs</h1>
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
                                        <div class="attachment-block clearfix">
                                            <img class="attachment-img" src="img/photo1.png" alt="Attachment Image">
                                            <div class="attachment-pushed">
                                                <h4 class="attachment-heading"><a href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle']; ?></a>
                                                    <span class="attachment-heading pull-right">$<?php echo $row['maximumsalary']; ?>/Month</span>
                                                </h4>
                                                <div class="attachment-text">
                                                    <div><strong><?php echo $row1['username']; ?> | <?php echo $row1['location']; ?>
                                                            | </strong></div>
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

        <section id="candidates" class="content-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center latest-job margin-bottom-20">
                        <h1>Candidates</h1>
                        <p>Finding a job just got easier. Create a profile and apply with single mouse click.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-4">
                        <div class="thumbnail candidate-img">
                            <img src="img/browse.jpg" alt="Browse Jobs">
                            <div class="caption">
                                <h3 class="text-center">Browse Jobs</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="thumbnail candidate-img">
                            <img src="img/interviewed.jpeg" alt="Apply & Get Interviewed">
                            <div class="caption">
                                <h3 class="text-center">Apply & Get Interviewed</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="thumbnail candidate-img">
                            <img src="img/career.jpg" alt="Start A Career">
                            <div class="caption">
                                <h3 class="text-center">Start A Career</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="company" class="content-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center latest-job margin-bottom-20">
                        <h1>Companies</h1>
                        <p>Hiring? Register your company for free, browse our talented pool, post and track job
                            applications</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-4">
                        <div class="thumbnail company-img">
                            <img src="img/postjob.png" alt="Browse Jobs">
                            <div class="caption">
                                <h3 class="text-center">Post A Job</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="thumbnail company-img">
                            <img src="img/manage.jpg" alt="Apply & Get Interviewed">
                            <div class="caption">
                                <h3 class="text-center">Manage & Track</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="thumbnail company-img">
                            <img src="img/hire.png" alt="Start A Career">
                            <div class="caption">
                                <h3 class="text-center">Hire</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section id="about" class="content-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center latest-job margin-bottom-20">
                        <h1>About US</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <img src="img/browse.jpg" class="img-responsive">
                    </div>
                    <div class="col-md-6 about-text margin-bottom-20">
                        <p>Blue Collar Services
                        <p>The online job portal application allows job seekers and embolyers to connect.The
                            application provides the ability for job seekers to create their accounts, upload their
                            profile and resume, search for jobs, apply for jobs, view different job openings. The
                            application provides the ability for employeers to create their accounts, search
                            candidates, create job postings, and view candidates applications.
                        </p>
                        <p>
                            This website is used to ebable the people who are in the society to connect to the
                            people theywork in the community so as to allow them to grow the coomunity at large. Our
                            website aims at helping the community at large.

                        </p>
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
    <script src="js/adminlte.min.js"></script>










>>>>>>> 113a68544bfe6d2c687797412efa08ddcf7b496b
</body>