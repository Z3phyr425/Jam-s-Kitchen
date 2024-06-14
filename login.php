
<?php
    include 'conn.php';

    session_start();
    error_reporting(0);
    $username = $_SESSION['username'];
    if(isset($_SESSION['username'])){
        header("location: ./?view=dashboard");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jam's Kitchen - Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <div class="logoContainer">
            <img src="hat2.png" alt="">
        </div>
        <h1>Sign In</h1>
        <h4>Welcome to Jam's Kitchen</h4>
        <form action="" method="post">
            <div>
                <label for="username">Username: </label>
                <input type="text" id="username" class="textField" name="username" placeholder="Enter your username" required>
            </div>
            <div>
                <label for="password">Password: </label>
                <input type="password" id="password" class="textField" name="password" placeholder="Enter your password" required>
            </div>
            <div id="checkBoxContainer">
                <input type="checkbox" id="checkBox"><span>Show Password</span>
            </div>
            <div>
                <a style="margin-left: 12%;text-decoration: none" href="register.php">Don't have an account? Click here</a>
            </div>
            <div id="btnContainer">
                <input type="submit" name="login" value="Login" class="btn">
            </div>
            <?php
                if(isset($_POST['login'])){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    
                    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result)){
                        $_SESSION['username'] = $username;
                        header('location: ./?view=dashboard');
                    }else{
                        echo "<script>alert('Invalid Credentials')</script>";
                    }
                }
            ?>
        </form>
    </div>
    
    

    <script src="login.js"></script>
</body>
</html>