
  <link rel="stylesheet" type="text/css" href="//use.fontawesome.com/releases/v5.7.2/css/all.css">

<?php

session_start();

require_once("db.php");

$limit = 4;

if (isset($_GET["page"])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}

$start_from = ($page - 1) * $limit;

$sql = "SELECT * FROM job_post LIMIT $start_from, $limit";
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

$conn->close();
