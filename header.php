<?php
    if(isset($_SESSION['username'])){

    }else{
        header('location: ./');
    }
?>
<header>
        <h1>Jam's Kitchen</h1>
        <ul>Main
            <li><a href="?view=dashboard">Dashboard</a></li>
        </ul>
        <ul>Management
            <li><a href="?view=cuisine">Cuisine</a></li>
            <li><a href="?view=inventory">Inventory</a></li>
            <li><a href="?view=account">Account</a></li>
            <!-- <li><a href="?view=setting">Setting</a></li> -->
        </ul>
</header>