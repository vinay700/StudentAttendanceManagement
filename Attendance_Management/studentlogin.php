<?php
session_start();
$_SESSION['email']=$_SESSION['login_user'];
$name=$_SESSION['email'];
if(isset($_SESSION['login_user']))
{
}
else
{
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <!-- Bootstrap core CSS-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Attendance Management</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <meta charset="utf-8">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="studentlogin.php">BMSCE</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
        <div><?php
          echo "<span style='color:#FFFFFF;text-align:center;'>".$name."</span>";
          ?></div>
          </li>
          </div>


    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="studentlogin.php"style="font-size:20px;">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        
        <li class="nav-item ">
        
        <span><a class="nav-link" href="studchangepassword.php"><i class="material-icons"style="font-size:20px">&#xe869;</i> Change Password</a>
        </span>

        </li>
        <li class="nav-item ">
        <span><a class="nav-link" href="logout.php"><i class="material-icons"style="font-size:20px">&#xe8ac;</i> Logout</a></span>

        </li>
        
      </ul>
     

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="studentlogin.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- Icon Cards-->
          

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Attendance Details</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Course Title</th>
                      <th>Semester</th>
                      <th>Total No Of Classes</th>
                      <th>No Of Classes Attended</th>
                      <th>Percentage</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    
                    
                     
                    <?php
                    $con = mysqli_connect("localhost","root","","student");
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    else
                    {
                      $query = "SELECT student_id,semester from student where username= '$name'";
                      $result = mysqli_query($con, $query);
                      if(mysqli_num_rows($result)>0)
                       {
                          // output data of each row
                          while($row = mysqli_fetch_assoc($result))
                          {
                              $studid=$row["student_id"];
                              $sem=$row["semester"];
                              $query1 = "SELECT * from subjects where semester='$sem'";
                              $result1 = mysqli_query($con, $query1);
                              if(mysqli_num_rows($result1)>0)
                               {
                                  // output data of each row
                                  while($row = mysqli_fetch_assoc($result1))
                                  {
                                      $sid=$row["sid"];
                                      $cc=$row["coursecode"];
                                      $sc=$row["subjectname"];
                                      echo "<tr><td>".$row["coursecode"]."</td><td>".$row["subjectname"]."</td>";
                                      $query2 = "SELECT COUNT(distinct date1) as classes from attendance where sid='$sid'";
                                      $result2 = mysqli_query($con,$query2);
                                      if(mysqli_num_rows($result2)>0)
                                      {
                                        while($row = mysqli_fetch_assoc($result2))
                                        {
                                           $tot=$row["classes"];
                                          echo"<td>" . $row["classes"]."</td>";
                                          $query3 = "SELECT COUNT(*) as total from attendance where sid='$sid' AND student_id='$studid'";
                                          $result3 = mysqli_query($con,$query3);
                                          if(mysqli_num_rows($result3)>0)
                                          {
                                            while($row = mysqli_fetch_assoc($result3))
                                            {
                                              echo"<td>" . $row["total"]."</td>";
                                              $noc=$row["total"];
                                              
                                              $intot=(int)$tot;
                                              $innoc=(int)$noc;
                                              if($intot!=0)
                                              {
                                                $percentage=($innoc/$intot)*100;
                                                if($percentage<85)
                                                {
                                                  echo "<td><font color='red'>".$percentage."%</font></td>";
                                                }
                                                else
                                                {
                                                   echo "<td>".$percentage."%</td>";

                                                }
                                              }
                                              else
                                              {
                                                echo "<td>0</td>";
                                              }
                                              echo "</tr>";
                                            }
                                          }
                                        }
                                      }
                                  }
                              }
                          }
                        }
                      }

                    mysqli_close($con);
                    ?> 
                    
                     
                    
                    </tr>
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>











        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span></span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>


  </body>

</html>
