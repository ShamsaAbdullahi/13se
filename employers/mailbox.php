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
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
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
        <div class="content-wrapper"  style="margin-left: 0px;padding-top: 120px;padding-bottom: 120px; background:white;">

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
                            <section class="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box box-primary">
                                            <div class="box-header with-border">
                                                <h3 class="box-title" style="margin-bottom: 20px;">Mailbox</h3>
                                                <div class="pull-right">
                                                    <a href="create-mail.php" class="btn btn-warning btn-flat"><i
                                                            class="fa fa-envelope"></i> Create</a>
                                                </div>
                                                <!-- /.box-tools -->
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body no-padding">
                                                <div class="table-responsive mailbox-messages">
                                                    <table id="example1" class="table table-hover table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Subject</th>
                                                                <th>Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                              $sql = "SELECT * FROM mailbox WHERE id_fromuser='$_SESSION[id_emp]' OR id_touser='$_SESSION[id_emp]'";
                              $result = $conn->query($sql);
                              if ($result->num_rows >  0) {
                                while ($row = $result->fetch_assoc()) {
                              ?>
                                                            <tr>
                                                                <td class="mailbox-subject"><a
                                                                        href="read-mail.php?id_mail=<?php echo $row['id_mailbox']; ?>"><?php echo $row['subject']; ?></a>
                                                                </td>
                                                                <td class="mailbox-date">
                                                                    <?php echo date("d-M-Y h:i a", strtotime($row['createdAt'])); ?>
                                                                </td>
                                                            </tr>
                                                            <?php
                                }
                              }
                              ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Subject</th>
                                                                <th>Date</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                    <!-- /.table -->
                                                </div>
                                                <!-- /.mail-box-messages -->
                                            </div>
                                            <!-- /.box-body -->

                                        </div>
                                        <!-- /. box -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </section>

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



    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../js/adminlte.min.js"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script>
    $(function() {
        $('#example1').DataTable();
    })
    </script>

</body>

</html>