<?php

$sid=$_GET['subid'];
$fid=$_GET['fid'];
$con = mysqli_connect("localhost","root","","student");
if($con)
{
	$sql = "SELECT COUNT(fid) as counter from assign_faculty where fid='$fid' ";
    $result = mysqli_query($con, $sql);
	  if(mysqli_num_rows($result)>0)
	   {
	      // output data of each row
	      while($row = mysqli_fetch_assoc($result))
	      {
	      	if($row["counter"]<3)
	      	{
	      		$sql = "INSERT INTO assign_faculty (sid, fid)
				VALUES ('".$_GET['subid']."','".$_GET['fid']."')";
				if (mysqli_query($con, $sql))
			  {
					echo "<script type='text/javascript'>confirm('Assigned successfully!')</script>";
					echo "<script type='text/javascript'>location.href='http://localhost/Attendance_Management/assignsubjects.php'</script>";

			  }
			   else 
			  {
			      echo "<script type='text/javascript'>alert('Error')</script>";
			      echo "<script type='text/javascript'>location.href='http://localhost/Attendance_Management/assignsubjects.php'</script>";

			  }
	      	}
	      	else
			{
				echo "<script type='text/javascript'>alert('This faculty has been already assigned 3 subjects')</script>";
		        echo "<script type='text/javascript'>location.href='http://localhost/Attendance_Management/assignsubjects.php'</script>";
			}
		}

	  }
	 
			
	}
		

else
{
	echo "Wrong credentials";
}
mysqli_close($con);



?>

