<?php
session_start();
include 'dbconfig.php';

if(is_array($_FILES)){

    $filename=$_FILES["upload_csv"]["tmp_name"];  
    $ext = explode('.',$_FILES["upload_csv"]["name"]);

    if($ext[1] == 'csv'){

     if($_FILES["upload_csv"]["size"] > 0)
     {
        $file = fopen($filename, "r");
        $i=0;
          while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
           {
             if($i == 0){
               $i++;
               continue;
             }
             
              $check_dup = "SELECT * FROM employeeinfo where email='".$getData[3]."'";
              $dup_run= mysqli_query($conn, $check_dup);
              $affected_rows = mysqli_num_rows($dup_run); 

                if($affected_rows < 1){

                $sql = "INSERT into employeeinfo (firstname,lastname,email,reg_date) 
                      values ('".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."')";
                      $result = mysqli_query($conn, $sql);

                }
            }

           $_SESSION['msg']='Imported Successfully';
           echo true;
      
           fclose($file);  
     }  

    }else{
        echo false;
    }


}

?>