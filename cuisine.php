<?php
include "conn.php";

if(isset($_SESSION['username'])){

}else{
    header('location: ./');
}
?>
<div class="container">
    <h1>Cuisine</h1>
    <div class="con">
        <div class="content">
            <div class="contentHeader">
                <h3>Dishes</h3>
            </div>
            <div class="contentBody" id="contentDish">
                <div class="dishContainer" id="dish-1" onclick='selectDish(1, "Sizzling Kapampangan Sisig")'>
                    <img src="./images/dish1.png" alt="" class="dishImg">
                    <b class="dishName">Sizzling Kapampangan Sisig</b>
                </div>
                <div class="dishContainer" id="dish-2" onclick='selectDish(2, "BMCL")'>
                    <img src="./images/dish2.png" alt="" class="dishImg">
                    <b class="dishName">BMCL</b>
                </div>
                <div class="dishContainer" id="dish-3" onclick='selectDish(3,"Cheesy Lasagna")'>
                    <img src="./images/dish3.png" alt="" class="dishImg">
                    <b class="dishName">Cheesy Lasagna</b>
                </div>
                <div class="dishContainer" id="dish-4" onclick='selectDish(4,"Combo J(Sisig, Chicken Skin, Chichabu)")'>
                    <img src="./images/dish4.png" alt="" class="dishImg">
                    <b class="dishName">Combo J(Sisig, Chicken Skin, Chichabu)</b>
                </div>
                <div class="dishContainer" id="dish-5" onclick='selectDish(5,"Cheese Sticks")'>
                    <img src="./images/dish5.png" alt="" class="dishImg">
                    <b class="dishName">Cheese Sticks</b>
                </div>
            </div>
            <div class="contentFooter">
                
            </div>
        </div>
        <div class="content">
            <div class="contentHeader">
                <h3>Release Order</h3>
            </div>
            <div class="contentBody">
                <form action="" method="post">
                    <input type="hidden" id="cuisineNumber" name="cuisineNumber">
                    <div class="textFieldContainer">
                        <b for="itemName">Cuisine Name: <span id="cuisineName"></span></b>
                    </div>
                    <br>
                    <div class="texFieldContainer">
                        <b for="order">Amount: </b>
                        <input class="textField" type="number" name="order" id="order" min="0" placeholder="Enter number of order">
                    </div>
            </div>
            <div class="contentFooter">
                <button type="submit" name="confirm" id="confirm" class="btn">Confirm</button>
                <?php
                    if (isset($_POST['confirm'])) {
                        $cuisineNumber = $_POST['cuisineNumber'];
                        if($cuisineNumber){
                            $items = ["pork belly", "chicken liver","pepper", "onion", "lemon", "salt", "soy sauce"];
                            $order = $_POST['order'];
                            $itemList = "'" . implode("','", $items) . "'";
    
                            $sql = "SELECT * FROM inventory WHERE name IN ($itemList)";
                            $query = mysqli_query($conn, $sql);

                            $amountToSubtract = [
                                "pork belly" => 1,
                                "chicken liver" => 3,
                                "pepper" => 1,
                                "onion" => 1,
                                "lemon" => 1,
                                "salt" => 0.00184835,
                                "soy sauce" => 0.00184835,
                            ];

                            if ($query) {
                                while ($row = mysqli_fetch_assoc($query)) {
                                    $itemName = $row['name'];
                                    $itemQuantity = $row['quantity'];
                                    $itemReleased = $row['released'];
                                    
                                    $totalAmountToSubtract = $amountToSubtract[$itemName] * $order;

                                    $newQuantity = $itemQuantity - $totalAmountToSubtract;
                                    
                                    $newReleased = $itemReleased + $totalAmountToSubtract;
                                    
                                    if ($newQuantity < 0) {
                                        $newQuantity = 0;
                                    }

                                    // Update the quantity in the database
                                    $updateSql = "UPDATE inventory SET quantity='$newQuantity', released='$newReleased' WHERE name='$itemName'";
                                    $updateResult = mysqli_query($conn, $updateSql);

                                    
                                }
                                if ($updateResult) {
                                    echo "<script>alert('Order Complete')</script>";
                                } else {
                                    echo "Error updating $itemName: " . mysqli_error($conn) . "<br>";
                                }
                            } 
                        }
                    }
                ?>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
        function selectDish(dishNumber, dishName){
            let cuisineNumber = document.getElementById('cuisineNumber');
            let cuisineName = document.getElementById('cuisineName');
            cuisineNumber.value = dishNumber;
            cuisineName.innerHTML = dishName;
        }
    </script>


<style>
    .con {
        width: 100%;
        padding: 0;
        display: flex;
        flex-direction: row;
    }

    .content {
        padding: 0;
        width: 85vh;
        height: max-content;
    }

    .content h3 {
        text-align: start;
        margin-left: 0.5rem;
    }

    .contentHeader {
        display: flex;
        justify-content: space-between;
        background-color: rgba(255, 255, 255, 0.2);
        padding: 0.3rem;
        border-radius: 0.5rem;
    }

    .contentBody {
        text-align: start;
        padding: 0.8rem;
    }

    #contentDish{
        display: flex;
        text-align: center;
    }

    .contentFooter {
        background-color: rgba(255, 255, 255, 0.2);
        text-align: right;
        padding: 0.3rem;
    }

    .textField {
        color: #292929;
        width: 97%;
    }

    .table-container {
        width: 100%;
    }

    .table-container table {
        width: 80%;
        margin-left: auto;
        margin-right: auto;
        border-collapse: collapse;
        border-radius: 1rem;
    }
    table, td, th{
        border: 1px solid #fff;
        padding: 0.5rem;
        border-radius: 1rem;
    }

    #searchInput{
        width: 20%;
        height: 2vh;
        border-radius: 50rem;
        margin-top: auto;
        margin-bottom: auto;
    }

    .dishContainer{
        padding: 0.5rem;
        margin: 0.5rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 15vh;
        height: 20vh;
        background-color: rgba(255,255,255, 0.3);
        border-radius: 0.3rem;

        cursor: pointer;
        transition: 0.2s ease;
    }

    .dishContainer:hover{
        box-shadow: 2px 2px 5px 1px rgba(0, 0, 0, 0.2);
    }

    .dishImg{
        width: 10vh;
    }

    .dishName{
        margin-top: 1rem;
        color: #292929;
    }
</style>
