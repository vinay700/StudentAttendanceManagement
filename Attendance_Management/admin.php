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

      <a class="navbar-brand mr-1" href="admin.php">BMSCE</a>

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
          <a class="nav-link" href="admin.php"style="font-size:20px;">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item ">
        <span><a class="nav-link" href="student.php"><i class="fas" style="font-size:20px;">&#xf007;</i>  Student</a></span>

        </li>
        <li class="nav-item ">
        <span><a class="nav-link" href="subject.php"><i class="fa fa-th-list" style="font-size:20px;"></i>  Subjects</a></span>

        </li>
        <li class="nav-item ">
        <span><a class="nav-link" href="adminattendance.php"><i class="material-icons" style="font-size:20px">check_box</i> Attendance</a>
        </span>

        </li>
        <li class="nav-item ">
        <span><a class="nav-link" href="faculty.php"><i class='fas fa-user-tie' style='font-size:20px'></i> Faculty</a></span>

        </li>




       <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#"   data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
            <i class="fas fa-fw fa-folder" ></i>
            <span style='font-size:16px'>System</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="assignsubjects.php">Assign Subjects</a>
          </div>
        </li>




        <li class="nav-item ">
        <span><a class="nav-link" href="report.php"><i class="material-icons"style="font-size:20px">&#xe8cd;</i> Reports</a></span>

        </li>
        <li class="nav-item ">
        
        <span><a class="nav-link" href="changepassword.php"><i class="material-icons"style="font-size:20px">&#xe869;</i> Change Password</a>
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
              <a href="admin.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- Icon Cards-->
          

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Students Details</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Academic Year</th>
                      <th>Semester</th>
                      <th>Number of Students</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <td>2016-2019</td>
                    <td>5</td>
                     
                    <?php
                    $con = mysqli_connect("localhost","root","","student");
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    else
                    {
                        $query = "SELECT COUNT(*) FROM student where semester='5'";
                        $result = mysqli_query($con,$query);
                        $row = $result->fetch_row();
                        echo "<td>" . $row[0]."</td>";
                    }

                    mysqli_close($con);
                    ?> 
                    </tr>
                    <tr>
                    <td>2017-2020</td>
                    <td>3</td>
                     
                    <?php
                    $con = mysqli_connect("localhost","root","","student");
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    else
                    {
                        $query = "SELECT COUNT(*) FROM student where semester='3'";
                        $result = mysqli_query($con,$query);
                        $row = $result->fetch_row();
                        echo "<td>" . $row[0]."</td>";
                    }

                    mysqli_close($con);
                    ?> 
                    </tr>
                    <tr>
                    <td>2018-2021</td>
                    <td>1</td>
                     
                    <?php
                    $con = mysqli_connect("localhost","root","","student");
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    else
                    {
                        $query = "SELECT COUNT(*) FROM student where semester='1'";
                        $result = mysqli_query($con,$query);
                        $row = $result->fetch_row();
                        echo "<td>" . $row[0]."</td>";
                    }

                    mysqli_close($con);
                    ?> 
                    </tr>
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>









<div id="content-wrapper">
<div class="container-fluid">
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Faculty Details
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Designation</th>
              <th>Number of Faculties</th>   
            </tr>
          </thead>
        <tbody>
        <tr>
        <td>Professor & HOD</td>
          <?php
            $con = mysqli_connect("localhost","root","","student");
            if(!$con)
            {
              die("Connection failed: " );
            }
            else
            {
                  $query = "SELECT COUNT(*) FROM faculty where designation='Professor and Head of Dept'";
                  $result = mysqli_query($con,$query);
                  $row = $result->fetch_row();
                  echo "<td>" . $row[0]."</td>";
            } 
            mysqli_close($con);
          ?>
          </tr>
          <tr>
        <td>Associate Professor</td>
          <?php
            $con = mysqli_connect("localhost","root","","student");
            if(!$con)
            {
              die("Connection failed: " );
            }
            else
            {
                  $query = "SELECT COUNT(*) FROM faculty where designation='Associate Professor'";
                  $result = mysqli_query($con,$query);
                  $row = $result->fetch_row();
                  echo "<td>" . $row[0]."</td>";
            } 
            mysqli_close($con);
          ?>
          </tr>
          <tr>
        <td>Asst Professor</td>
          <?php
            $con = mysqli_connect("localhost","root","","student");
            if(!$con)
            {
              die("Connection failed: " );
            }
            else
            {
                  $query = "SELECT COUNT(*) FROM faculty where designation='Asst Professor'";
                  $result = mysqli_query($con,$query);
                  $row = $result->fetch_row();
                  echo "<td>" . $row[0]."</td>";
            }
            mysqli_close($con);
          ?>
          </tr>
        </tbody>
      </table>

      </div>
    </div>
  </div>
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
