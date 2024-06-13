<?php
    if(isset($_SESSION['username'])){

    }else{
        header('location: ./');
    }
?>

<div class="container">
    <h1>Cuisine</h1>
    <div class="con">
        <div class="content">
            <h2>Remaining Stocks</h2>
            <div id="productContainer">
                
            </div>
        </div>
        <div class="content">
            <h2>Stocks Used Today</h2>
        </div>
        <div class="content">
            <h2>Cuisines</h2>
        </div>
        <div class="content">
            <h2>Transactions</h2>
        </div>
    </div>
</div>