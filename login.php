<?php
include('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
</head>
<body >
<div class="line ">

<div class="content">
    <div class="shadow-text">
        <img src="hat2.png" alt="" class="img">
    <h2 >Jam's </h2>
    <h2 >Kitchen </h2>
  </div>
   
</div>
</div> 
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Login</h2>
                <form id="loginForm" method="post" action="loginfunction.php">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit"  class="btn btn-danger btn-block">Login</button>
                </form>
                <div id="error" class="text-danger mt-2"></div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  
</body>
</html>
