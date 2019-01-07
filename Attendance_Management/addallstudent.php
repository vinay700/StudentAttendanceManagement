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
          
                $student_name = "";
                if(isset($Row[0])) 
                {
                    $student_name = mysqli_real_escape_string($conn,$Row[0]);
                }
                
                $usn = "";
                if(isset($Row[1])) 
                {
                    $usn = mysqli_real_escape_string($conn,$Row[1]);
                }
                $semester = "";
                if(isset($Row[2])) 
                {
                    $semester = mysqli_real_escape_string($conn,$Row[2]);
                }
                $year = "";
                if(isset($Row[3])) 
                {
                    $year = mysqli_real_escape_string($conn,$Row[3]);
                }
                
                
                if (!empty($student_name) || !empty($usn)|| !empty($semester)|| !empty($year)) 
                {
                    $query = "INSERT INTO student (student_name, usn , semester,year)
  									VALUES ('".$student_name."','".$usn."','".$semester."','".$year."')";
                    $result = mysqli_query($conn, $query);
                
                    if (! empty($result)) 
                    {
                    	echo "<script type='text/javascript'>confirm('submitted successfully!')</script>";
                    	//header( 'Location: http://localhost/Attendance_Management/addsubject.php' ) ;
                    	echo "<script type='text/javascript'>location.href='http://localhost/Attendance_Management/addstudent.php'</script>";

                      
                    } else 
                    {
                    	echo "<script type='text/javascript'>alert('error!')</script>";	
                        echo "<script type='text/javascript'>location.href='http://localhost/Attendance_Management/addstudent.php'</script>";
                        
                    }
                }
             }
         }
  }
  else
  { 
        echo "<script type='text/javascript'>alert('Invalid File Type. Upload Excel File.')</script>";
        
  }
}
?>