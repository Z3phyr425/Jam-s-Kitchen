<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jam's_kitchen";

$conn = new mysqli($servername, $username, $password, $dbname);

if(!$conn){
   die("Connection failed:". $conn->error);   
}

?>