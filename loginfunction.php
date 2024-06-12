<?php
include "conn.php";
if (isset($_POST['username']) && isset($_POST['password'])){
    function validate ($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    if (empty($username OR $password)){
        header("Location: login.php?error=username and password is required");
        exit();
    } elseif (empty($username)){
        header("Location: login.php?error=username is required");
        exit();
            }elseif(empty($password)){
                header("Location: login.php?error=password is required");
                exit();
            }else{
               $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
                   $result= mysqli_query($conn, $sql);
               if(mysqli_num_rows($result)){
               }
            }
        }else{
            
            $_SESSION['USER'] = $username;
            header("Location: index.html");
            exit();
        }
    
        

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = $_POST['username'];
  $password = $_POST['password'];
 
  $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
}
$result = $conn->query($query);

if($result->num_rows == 1){
  header("Location: index.html");
  exit();
}
else{
    header("Location: login.php?error=Invalid Username and Password");
  exit();
}
$conn->close();


?>