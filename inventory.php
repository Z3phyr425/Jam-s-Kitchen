<?php
    if(isset($_SESSION['username'])){

    }else{
        header('location: ./');
    }
?>

<div class="container">
        <h1>Inventory</h1>
        <div class="con">
            <div class="content">
                <h2>Inventory's Data</h2>
               
                <div class="table-container">
        <input type="text" id="searchInput" placeholder="Search...">
        <button onclick="addCuisine()">Add</button>
        <table id="dataTable">
            <thead>
                <tr>
                    <th onclick="sortTable(0)">Id</th>
                    <th onclick="sortTable(1)">Name</th>
                    <th onclick="sortTable(2)">Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "conn.php";

                $sql = "Select * from inventory";
                $query = $conn->query($sql);
                if($query->num_rows > 0){
                    while($row = $query->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["quantity"] . "</td>";
                        echo "</tr>";
                    }
                }else{
                    echo "<tr><td colspan='4'>0 results</td></tr>";
                }

                ?>   
            </tbody>
        </table>
        <div class="pagination">
            <button onclick="prevPage()">Previous</button>
            <span id="pageInfo"></span>
            <button onclick="nextPage()">Next</button>
        </div>
    </div>
    
                  
              
                
    </div>
    <div class="container" id="modal">
        <form action="" method="post">
                
            <input type="text" name="name" placeholder="Enter Name">
            <br>
            <br>
            <input type="text" name="quantity" placeholder="Enter Quantity">
            <br>
            <br>
            <?php
            if (isset($_POST[save])) {
                $name = mysqli_real_escape_string($conn, $_POST['name']);
                $name = mysqli_real_escape_string($conn, $_POST['name']);
            }
            ?>
            <input type="submit" value="Add" name="save">
        </form>
    </div>

  

    <script src="script.js"></script>