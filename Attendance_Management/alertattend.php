

<?php
session_start();
$studid=$_POST['acs'];
$sid=$_POST['sid'];
$session=$_POST['session'];
$date=$_POST['txtDate'];
 

$con = mysqli_connect("localhost","root","","student");
if($con)
{
	if(!empty($_POST['sid'])&& !empty($_POST['session'])&& !empty($_POST['txtDate']))
	{
		foreach( $studid as $v ) 
		{
			$sql = "INSERT into attendance(session,date1,sid,student_id) 
					 VALUES ('$session','$date','$sid','$v')";
					 
			  if (mysqli_query($con, $sql))
			  {
			    echo "<script type='text/javascript'>alert('Attendance Submited')</script>";
			    echo "<script type='text/javascript'>location.href='stafflogin.php'</script>";

			  } else 
			  {
			      echo "<script type='text/javascript'>alert('Attendance Submited Unsuccessful')</script>";
			      echo "<script type='text/javascript'>location.href='stafflogin.php'</script>";

			  }
		  }
	}
	else
	{
		echo "<script type='text/javascript'>alert('Enter all Fields')</script>";
		echo "<script type='text/javascript'>location.href='staffattendance.php'</script>";
	}
	
}
else
{
	echo "Wrong credentials";
}
?>