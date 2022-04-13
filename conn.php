<?php
//connecting to database
$servername='localhost';
$username='root';
$password='';
$database='signin';
//creating the connection
$conn=mysqli_connect($servername,$username,$password,$database);
if (!$conn) {
    echo "connection Unsuccesful";
}







?>