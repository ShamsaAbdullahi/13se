<?php

//To Handle Session Variables on This Page
session_start();


//Including Database Connection From db.php file to avoid rewriting in all files
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
    <!-- Bootstrap -->
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
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
</head>

<body style="min-height: 100vh;">
   
    <header>
    <div class="wrapper" style="background:white;">
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
        <div class="content-wrapper" style="margin-left: 0px;padding-top: 120px;padding-bottom: 120px; background:white;">

            <section class="content-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 latest-job margin-top-50 margin-bottom-20 text-center">
                        <h2 style="color: #28395a;font-size: 50px; font-weight: 700; line-height: 1.2;margin-bottom:30px;">Jobs Available</h2>
                            <div class="input-group input-group-lg">
                                <input type="text" id="searchBar" class="form-control" placeholder="Search job">
                                <span class="input-group-btn">
                                    <button id="searchBtn" type="button" class="btn btn-primary btn-lg">Go!</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="candidates" class="content-header ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="box box-solid">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Filters</h3>
                                </div>
                                <div class="box-body no-padding">
                                    <ul class="nav nav-pills nav-stacked tree" data-widget="tree">

                                        <li class="treeview menu-open">
                                            <a href="#"><i class="fa fa-plane text-red"></i>Job Title <span class="pull-right"><i class="fa fa-angle-down pull-right"></i></span></a>
                                            <ul class="treeview-menu">
                                                <li><a href="" class="experienceSearch" data-target='Lundry'><i class="fa fa-circle-o text-yellow"></i>Laundry</a></li>
                                                <li><a href="" class="experienceSearch" data-target='Cleaner'><i class="fa fa-circle-o text-yellow"></i>Cleaner</a></li>
                                                <li><a href="" class="experienceSearch" data-target='Watchman'><i class="fa fa-circle-o text-yellow"></i>Watchman</a></li>

                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">

                            <?php

                            $limit = 4;

                            $sql = "SELECT COUNT(id_jobpost) AS id FROM job_post";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $total_records = $row['id'];
                                $total_pages = ceil($total_records / $limit);
                            } else {
                                $total_pages = 1;
                            }

                            ?>


                            <div id="target-content">

                            </div><br><br><br>
                            <div class="text-center">
                                <ul class="pagination text-center" id="pagination"></ul>
                            </div>



                        </div>
                    </div>
                </div>
            </section>



        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer" style="margin-left: 0px;">
            <div class="text-center">
                <strong>Copyright &copy; 2021</strong> All
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <!-- AdminLTE App -->
    <script src="js/adminlte.min.js"></script>
    <script src="js/jquery.twbsPagination.min.js"></script>

    <script>
        function Pagination() {
            $("#pagination").twbsPagination({
                totalPages: <?php echo $total_pages; ?>,
                visible: 5,
                onPageClick: function(e, page) {
                    e.preventDefault();
                    $("#target-content").html("loading....");
                    $("#target-content").load("jobpagination.php?page=" + page);
                }
            });
        }
    </script>

    <script>
        $(function() {
            Pagination();
        });
    </script>

    <script>
        $("#searchBtn").on("click", function(e) {
            e.preventDefault();
            var searchResult = $("#searchBar").val();
            var filter = "searchBar";
            if (searchResult != "") {
                $("#pagination").twbsPagination('destroy');
                Search(searchResult, filter);
            } else {
                $("#pagination").twbsPagination('destroy');
                Pagination();
            }
        });
    </script>

    <script>
        $(".experienceSearch").on("click", function(e) {
            e.preventDefault();
            var searchResult = $(this).data("target");
            var filter = "experience";
            if (searchResult != "") {
                $("#pagination").twbsPagination('destroy');
                Search(searchResult, filter);
            } else {
                $("#pagination").twbsPagination('destroy');
                Pagination();
            }
        });
    </script>

    <script>
        $(".citySearch").on("click", function(e) {
            e.preventDefault();
            var searchResult = $(this).data("target");
            var filter = "location";
            if (searchResult != "") {
                $("#pagination").twbsPagination('destroy');
                Search(searchResult, filter);
            } else {
                $("#pagination").twbsPagination('destroy');
                Pagination();
            }
        });
    </script>

    <script>
        function Search(val, filter) {
            $("#pagination").twbsPagination({
                totalPages: <?php echo $total_pages; ?>,
                visible: 5,
                onPageClick: function(e, page) {
                    e.preventDefault();
                    val = encodeURIComponent(val);
                    $("#target-content").html("loading....");
                    $("#target-content").load("search.php?page=" + page + "&search=" + val + "&filter=" +
                        filter);
                }
            });
        }
    </script>


</body>

</html>