<?php
if (isset($_SESSION['username'])) {

} else {
    header('location: ./');
}
?>

<div class="container">
    <h1>Inventory</h1>
    <div class="con">
        <div class="content">
            <div class="contentHeader">
                <h3>Stock</h3>
                <input type="text" id="searchInput" class="textField" placeholder="Search...">
            </div>
            <div class="contentBody">
                <div class="table-container">
                    <!-- <button class="btn" onclick="addCuisine()">Add</button> -->
                    <table id="dataTable">
                        <thead>
                            <tr>
                                <th onclick="sortTable(0)">Id</th>
                                <th onclick="sortTable(1)">Name</th>
                                <th onclick="sortTable(2)">Quantity</th>
                                <th onclick="sortTable(3)">Unit</th>
                                <th onclick="sortTable(4)">Released</th>
                                <th onclick="sortTable(5)">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "conn.php";

                            $sql = "SELECT * FROM inventory";
                            $query = $conn->query($sql);
                            if ($query->num_rows > 0) {
                                while ($row = $query->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["id"] . "</td>";
                                    echo "<td>" . $row["name"] . "</td>";
                                    echo "<td>" . $row["quantity"] . "</td>";
                                    echo "<td>" . $row["unit"] . "</td>";
                                    echo "<td>" . $row["released"] . "</td>";
                                    echo "<td>" . $row["status"] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6' style='text-align:center'>0 results</td></tr>";
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="contentFooter">
                <!-- <div class="pagination">
                    <button class="btn" onclick="prevPage()">Previous</button>
                    <span id="pageInfo"></span>
                    <button class="btn" onclick="nextPage()">Next</button>
                </div> -->
            </div>
        </div>
        <div class="content">
            <div class="contentHeader">
                <h3>Add Item</h3>
            </div>
            <div class="contentBody">
                <form action="" method="post">
                    <div class="textFieldContainer">
                        <b for="itemName">Item Name: </b>
                        <input class="textField" type="text" name="itemName" id="itemName" placeholder="Enter item name">
                    </div>
                    <br>
                    <div class="texFieldContainer">
                        <b for="quantity">Quantity: </b>
                        <input class="textField" type="number" name="quantity" id="quantity" min="0" placeholder="Enter quantity">
                    </div>
                    <br>
                    <div class="texFieldContainer">
                        <b for="unit">Unit: </b>
                        <input class="textField" type="text" name="unit" id="unit" placeholder="Enter unit">
                    </div>
            </div>
            <div class="contentFooter">
                <button type="submit" name="confirm" id="confirm" class="btn">Confirm</button>
                <?php
                    if (isset($_POST['confirm'])) {
                        $itemName = $_POST['itemName'];
                        $quantity = $_POST['quantity'];
                        $unit = $_POST['unit'];
                        $released = 0;
                        $status = 1;

                        // Corrected SQL statement
                        $sql = "INSERT INTO inventory (name, quantity, unit, released, status) VALUES ('$itemName', '$quantity', '$unit','$released', '$status')";

                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            echo "<script>alert('An item has been added');</script>";
                            header('location: ./?view=inventory');
                        } else {
                            echo "<script>alert('An error occurred while adding item: " . mysqli_error($conn) . "');</script>";
                        }
                    }
                ?>
                </form>
            </div>
        </div>
    </div>
</div>

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
</style>
