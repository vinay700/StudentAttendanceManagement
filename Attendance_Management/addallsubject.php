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
          
                $coursecode = "";
                if(isset($Row[0])) 
                {
                    $coursecode = mysqli_real_escape_string($conn,$Row[0]);
                }
                
                $subjectname = "";
                if(isset($Row[1])) 
                {
                    $subjectname = mysqli_real_escape_string($conn,$Row[1]);
                }
                $semester = "";
                if(isset($Row[3])) 
                {
                    $semester = mysqli_real_escape_string($conn,$Row[3]);
                }
                $credits = "";
                if(isset($Row[2])) 
                {
                    $credits = mysqli_real_escape_string($conn,$Row[2]);
                }
                
                
                if (!empty($coursecode) || !empty($subjectname)||!empty($type)|| !empty($semester)|| !empty($credits)) 
                {
                    $query = "INSERT INTO subjects (coursecode, subjectname , type , semester , credits)
  									VALUES ('".$coursecode."','".$subjectname."','".$type."','".$semester."','".$credits."')";
                    $result = mysqli_query($conn, $query);
                
                    if (! empty($result)) 
                    {
                    	echo "<script type='text/javascript'>confirm('submitted successfully!')</script>";
                    	//header( 'Location: http://localhost/Attendance_Management/addsubject.php' ) ;
                    	echo "<script type='text/javascript'>location.href='http://localhost/Attendance_Management/addsubject.php'</script>";

                      
                    } else 
                    {
                    	echo "<script type='text/javascript'>alert('error!')</script>";	
                        echo "<script type='text/javascript'>location.href='http://localhost/Attendance_Management/addsubject.php'</script>";
                        
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