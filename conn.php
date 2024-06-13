<?php

$servername = "localhost";
$name = "root";
$password = "";
$dbname = "jam's_kitchen";

$conn = new mysqli($servername, $name, $password, $dbname);

if(!$conn){
   die("Connection failed:". $conn->error);   
}

?>