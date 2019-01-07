<?php
session_start();

$con = mysqli_connect("localhost","root","","student");
if($con)
{
	if(!empty($_POST['username']) && !empty($_POST['password']))
	{
		$utype=$_POST['usertype'];
		
		
		$sql="select * from logintab 
		where email='".$_POST['username']."' and password='".$_POST['password']."'and user='".$_POST['usertype']."'";
		$result=$con->query($sql);
		if(mysqli_num_rows($result)>0)
		{
			if($utype=="staff")
		      {
		      	$_SESSION['login_user']=$_POST['username'];
		        header( "Location: stafflogin.php" );
		      }
		      else if($utype=="student")
		      {
		      	
		      	$_SESSION['login_user']=$_POST['username'];
		        header( "Location: studentlogin.php" );
		      }
		      else if($utype=="admin")
		      {
				  $_SESSION['login_user']=$_POST['username'];
			        header( "Location: admin.php" );
			  }
		}
		else
		{
			echo "<script type='text/javascript'>alert('Invalid Username or Password')</script>";
			echo "<script type='text/javascript'>location.href='login.php'</script>";

		}
	}
	else
	{
	}
	
}
else
{
	echo "Wrong credentials";
}
?>