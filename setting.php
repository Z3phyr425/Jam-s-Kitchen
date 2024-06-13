<?php
    if(isset($_SESSION['username'])){

    }else{
        header('location: ./');
    }
?>

<div class="container">
    <h1>Setting</h1>
    <div class="con">
        <div class="content">
            <h2>LOG OUT</h2>
           
            <form action="" id="productContainer" method="post">
                <button type="submit" name="logout">Log Out</button>
                <?php
                    if(isset($_POST['logout'])){
                        session_destroy();
                        header('location: ./');
                    }
                ?>
            </form>
            
        </div>
     
    </div>
</div>