<?php
    $con = mysqli_connect("localhost","root","","student");
	if(!$con)
	{
	    die("Connection failed:");
	}
	else
	{ 	
		if((!empty($_POST['fname'])) && (!empty($_POST['lname'])) && (!empty($_POST['email'])) && (!empty($_POST['pwd'])))
		{
			if($_POST['pwd']==$_POST['cpwd'])
			{
				$sql = "INSERT into logintab(firstname,lastname,email,password,user) 
				 VALUES ('".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["email"]."','".$_POST["pwd"]."','".$_POST["usertype"]."')";
				  if (mysqli_query($con, $sql))
				  {
				    echo "<script type='text/javascript'>alert('Registeration Successful')</script>";
				    echo "<script type='text/javascript'>location.href='login.php'</script>";

				  } else 
				  {
				      echo "<script type='text/javascript'>alert('Registeration Unsuccessful')</script>";
				      echo "<script type='text/javascript'>location.href='registration.php'</script>";

				  }
			}
			else
			{
				echo "<script type='text/javascript'>alert('Password does not match')</script>";
				echo "<script type='text/javascript'>location.href='registration.php'</script>";

			}
		}
		else
		{
			echo" enter all fields ";
			
		}
	}
	mysqli_close($con);
    ?>