<?php
$conn = mysqli_connect("localhost","root","","student");
require_once('vendor/php-excel-reader/excel_reader2.php');
require_once('vendor/SpreadsheetReader.php');

if (isset($_POST["import"]))
{
       
  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        
        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          
                $facultyname = "";
                if(isset($Row[0])) 
                {
                    $facultyname = mysqli_real_escape_string($conn,$Row[0]);
                }
                
                $designation = "";
                if(isset($Row[1])) 
                {
                    $designation = mysqli_real_escape_string($conn,$Row[1]);
                }
                 $uname = "";
                if(isset($Row[2])) 
                {
                    $uname = mysqli_real_escape_string($conn,$Row[2]);
                }
                
                
                
                if (!empty($facultyname) || !empty($designation)|| !empty($uname)) 
                {
                    $query = "INSERT INTO faculty (facultyname, designation,uname )
  									VALUES ('".$facultyname."','".$designation."','".$uname."')";
                    $result = mysqli_query($conn, $query);
                
                    if (! empty($result)) 
                    {
                    	echo "<script type='text/javascript'>confirm('Added successfully!')</script>";
                    	//header( 'Location: http://localhost/Attendance_Management/addsubject.php' ) ;
                    	echo "<script type='text/javascript'>location.href='http://localhost/Attendance_Management/addfaculty.php'</script>";

                      
                    } else 
                    {
                    	echo "<script type='text/javascript'>alert('error!')</script>";	
                        echo "<script type='text/javascript'>location.href='http://localhost/Attendance_Management/addfaculty.php'</script>";
                        
                    }
                }
             }
         }
  }
  else
  { 
        echo "<script type='text/javascript'>alert('Invalid File Type. Upload Excel File.')</script>";
        echo "<script type='text/javascript'>location.href='http://localhost/Attendance_Management/addfaculty.php'</script>";

  }
}
?>