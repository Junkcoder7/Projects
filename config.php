<?php
$servername="localhost";
$username="root";
$password=""; 
$dbname="Studentrec_db";      
$connection = new mysqli($servername,$username,$password,$dbname);
if($connection->connect_error){
   die("Connection failed: " .mysqli_connect_error());
}      
// $sql="CREATE DATABASE Studentrec_db";
// if($connection->query($sql)===TRUE){
//     echo "database created successfully";
// }
// else
//     echo "error in connection";
// ?>