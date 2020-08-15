<?php

$conn = mysqli_connect("localhost", "root", "", "task2");

if(!$conn){
    echo "Error : ".mysqli_connect_error();
}


?>