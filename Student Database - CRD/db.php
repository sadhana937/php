<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "students";

$conn = mysqli_connect($servername, $username, $password,$database);

if (!$conn){
    die("error detected". mysqli_error($conn));
}

?> 

