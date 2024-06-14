<?php
    if(isset($_SESSION['username'])){

    }else{
        header('location: ./');
    }

    include 'conn.php';
?>

<div class="container">
    <h1>Account</h1>
    <div class="con">
        <div class="content">
            <div class="contentHeader">
                <h3>User Details</h3>
            </div>
            <div class="contentBody">
                
                <form action="" method="post">
                <?php
                    $sql = "SELECT * FROM users WHERE username='$username'";
                    $result = mysqli_query($conn, $sql);

                    if($result->num_rows > 0){
                        while($rows = $result->fetch_assoc()){
                            echo "<b>Username: </b><span>". $rows['username'] . "</span><br><br>";
                            echo "<b>Password: </b><span>". $rows['password'] . "</span><br><br>";
                            if($rows['role'] == 1){
                                echo "<b>Role: </b><span>Admin</span><br><br>";
                            }else{
                                echo "<b>Role: </b><span>User</span>";
                            }
                            
                        }
                    }else{
                        echo "01110100 01100001 01110010 01110101 01100010 00100000 00101101 01010110 01100001 01101101 01110000 01111001 01111001 01111001 00100000 00110001 00110000 00111010 00110101 00111001 01110000 01101101 00100000 00110001 00110011 00101111 00110000 00110110 00101111 00110010 00110000 00110010 00110100";
                    }
                ?>
                    
                <button type="submit" name="logout" id="logout" class="btn">Logout</button>
                <?php
                if (isset($_POST['logout'])) {
                    session_destroy();
                    header('location: ./');
                }
                ?>
                </form>
            </div>
            <div class="contentFooter">
                <?php
                    echo "<button id='update' class='btn'>Update</button>";
                ?>
            </div>
        </div>
        <div class="content" id="updatePassword">
            <div class="contentHeader">
                <h3>Update Password</h3>
                <h2 id="closeUpdatePassword">&times;</h2>
            </div>
            <div class="contentBody">
                <form action="" method="post">
                    <div class="textFieldContainer">
                        <b for="password">Password: </b>
                        <input class="textField" type="password" name="passwordTextField" id="password" placeholder="Enter your password">
                    </div>
                    <br>
                    <div class="texFieldContainer">
                        <b for="cpassword">Confirm Password: </b>
                        <input class="textField" type="password" name="cpasswordTextField" id="cpassword" placeholder="Confirm your password">
                    </div>
                    <div id="checkBoxContainer">
                        <input type="checkbox" id="checkBox"><span>Show Password</span>
                    </div>
                
            </div>
            <div class="contentFooter">
                <button type="submit" name="confirm" id="confirm" class="btn">Confirm</button>
            </div>
            <?php
                if (isset($_POST['confirm'])) {
                    $password = $_POST['passwordTextField'];
                    $cpassword = $_POST['cpasswordTextField'];
                    
                    if ($password != $cpassword) {
                        echo "<script>alert('Password mismatch');</script>";
                    } else {
                        $username = $_SESSION['username']; // Assuming username is stored in session
                        $sql = "UPDATE users SET password='$password' WHERE username='$username'";
            
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            echo "<script>alert('Password updated successfully');</script>";
                        } else {
                            echo "<script>alert('Error updating password: " . mysqli_error($conn) . "');</script>";
                        }
                    }
                }

                
            ?>
            </form>
        </div>
    </div>
</div>

<script src="account.js"></script>
<style>
    .con{
        padding: 0;
    }

    .content{
        padding: 0;
        width: 80vh;
        height: max-content;
    }

    .content h3{
        text-align: start;
        margin-left: 0.5rem;
    }

    .contentHeader{
        display:flex;
        justify-content: space-between;
        background-color: rgba(255, 255, 255, 0.2);
        padding: 0.3rem;
        border-radius: 0.5rem;
    }

    #closeUpdatePassword{
        transform: translateY(-90%);
        cursor: pointer;
    }

    .contentBody{
        text-align: start;
        padding: 0.8rem;
    }

    .contentFooter{
        background-color: rgba(255, 255, 255, 0.2);
        text-align: right;
        padding: 0.3rem;
    }
    .textField{
        color: #292929;
    }

    #updatePassword{
        width: 0;
        opacity: 0;
        transition: 0.5s ease-in-out;
    }
    
    #updatePassword.show{
        width: 80vh;
        opacity: 1;
    }

    #checkBoxContainer{
        cursor: pointer;
    }
</style>