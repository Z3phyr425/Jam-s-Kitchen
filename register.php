
<?php
    include 'conn.php';

    session_start();
    error_reporting(0);
    $username = $_SESSION['username'];
    if(isset($_SESSION['username'])){
        header("location: ./?view=dashboard");
    }

    $select = "SELECT * FROM users";
    $myresult = mysqli_query($conn, $select);
    if(mysqli_num_rows($myresult)){
        header("location: ./?view=dashboard");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FFD0D0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .register-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .register-container h2 {
            margin-top: 0;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: none;
            background-color: rgb(255, 228, 228);
            border-radius: 4px;
        }
        .form-group input:focus {
            border-color: #007bff;
            outline: none;
        }
        .register-button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .register-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
            </div>
            
            <div>
                <a style="margin-left: 18%;margin-bottom: 1%; text-decoration: none" href="login.php">Already have an account?</a>
            </div>
            <br>
                <button type="submit" class="register-button" name="register">Register</button>
            <?php
                if(isset($_POST['register'])){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $confirm_password = $_POST['confirm_password'];
                
                    // Check if passwords match
                    if ($password != $confirm_password) {
                        echo "Passwords do not match.";
                        exit();
                    }
                
                
                    // Insert data into the database
                    $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '1')";
                
                    if ($conn->query($sql) === TRUE) {
                        echo "Registration successful.";
                        header('location: login.php');
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
            ?>
        </form>
    </div>
</body>
</html>