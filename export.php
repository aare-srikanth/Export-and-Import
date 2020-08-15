<?php

include 'dbconfig.php';

if(isset($_POST["export"])){
      $date=date("d-m-Y");
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename='.$date.'_Emloyee_data.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('ID', 'First Name', 'Last Name', 'Email', 'Joining Date'));  
      $query = "SELECT * from employeeinfo ORDER BY emp_id ASC";  
      $result = mysqli_query($conn, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 } 

 ?>