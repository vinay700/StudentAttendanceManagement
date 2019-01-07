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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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
        <span><a class="nav-link" href="student.php"><i class="fas">&#xf007;</i> Student</a></span>

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
            <li class="breadcrumb-item active"><a href="student.php">Student</a></li>
                        <li class="breadcrumb-item active"> Add Student</li>

          </ol>
<form action="addstudprocess.php" method="POST">
<label>Student Name: <input type="text" name="student_name" required></label>
<label>Usn:<input type="text" name="usn" required></label>
<label>Semester:<select class="input-field" name="semester" required>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    </select> </label>&nbsp;&nbsp;&nbsp;
  
 <label>Year: 
  <select class="input-field" name="year">
  <option></option>
    <option value="2015-2018">2015-2018</option>
    <option value="2014-2017">2014-2017</option>
    <option value="2016-2019">2016-2019</option>
  </select></label>
<button type="submit">Add</button>
</form>
<div class="dropdown-divider"></div>
<form action="addallstudent.php" method="post" enctype="multipart/form-data">
            <div>
                <label>Choose Excel
                    File</label> <input type="file" name="file"
                    id="file" accept=".xls,.xlsx">
                <button type="submit" id="submit" name="import"
                    class="btn-submit">Import</button>
            </div>        
        </form>
        <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Student Details</div>
            <div class="card-body">
              <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
  <tr>
    <th>Student Name</th>
    <th>USN</th>
    <th>Semester</th>
    <th>Year</th>
   
    
  </tr>
</thead>
<tbody>
<?php
$con = mysqli_connect("localhost","root","","student");
if(!$con)
{
    die("Connection failed: "	);
}
else
{
  $sql = "SELECT * FROM student ";
  $result = mysqli_query($con, $sql);
  if(mysqli_num_rows($result)>0)
   {
      // output data of each row
      while($row = mysqli_fetch_assoc($result))
      {
          echo "<tr><td> " . $row["student_name"]. " </td><td> " . $row["usn"]. "</td><td> " . $row["semester"]. "</td><td> "
          . $row["year"]. "</td></tr> ";
      }
  } 
  else 
  {
      echo "0 results";
  }
}
mysqli_close($con);
?>
</tbody>
</table>

</div>
</div>
</div>
</div>








   <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
</body>
</html>