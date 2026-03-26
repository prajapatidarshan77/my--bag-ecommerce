<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="Bag";

    $pdo=mysqli_connect($servername,$username,$password,$dbname);
    if($pdo){
        //echo"connection";
    }
    else{
        echo"connection failed".mysqli.error();
    }
?>