<?php
session_start();
include 'dbconfig.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/custom.css" >
</head>
<body>

<div class="container">
    <h3 align="center" class="main_heading">Import and Export Data Using PHP, Mysql and Bootstrap</h3>



    <div class="row import_export">
    <div class="col-md-6" align="center">
        
            <form action="export.php" method="post">
                <input type="submit" name="export"  class="btn btn-success" value="Export Data">
            </form>
       
    </div>    
    <div class="col-md-6" align="center">
    <button class="btn btn-success" data-toggle="modal" data-target="#uploadCsv">Import</button>
    </div>

    <?php
    
    if(isset($_SESSION['msg'])){ 
    
    ?>

    <div class="col-md-6 msg_section" align="center" >
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Imported Successfully.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    </div>

    <?php 
    
    }
    unset($_SESSION['msg']);

    ?>


  
    <div class='row table-responsive table_records'>
        <table id='myTable' class='table table-striped table-bordered'>
            <thead>
                <tr>
                    <th>EMP ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Registration Date</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $sql="SELECT * FROM employeeinfo";
                $run=mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($run)){
            ?>
                <tr>
                    <td><?= $row['emp_id'] ?></td>
                    <td><?= $row['firstname'] ?></td>
                    <td><?= $row['lastname'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['reg_date'] ?></td>
                </tr>   
                <?php } ?> 
            </tbody>
        </table>
    </div>

    <div id="uploadCsv" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload CSV File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
            <form id="upload_csv_file">
                <div class="form-group">
                    <label for="upload_files" >Select File:</label>
                    <input type="file" class="form-control" name="upload_csv" id="upload_csv">
                    <button class="btn btn-success upload_section">Submit</button>
                </div>
            </form>
            </div>
        
        </div>
    </div>
    </div>
   

</div>

<script src="js/jquery.min.js" type="text/javascript" ></script> 
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/custom.js" type="text/javascript"></script> 


</body>
</html>  