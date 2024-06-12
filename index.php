<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Midterm Practice</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php
        include "header.php";
    ?>
    
    <?php
        $view = $_GET['view'] ?? "dashboard";
        if($view == "dashboard"){
            include 'dashboard.php';
        }
    
        if($view == "cuisine"){
            include 'cuisine.php';
        }
    
        if($view == "inventory"){
            include 'inventory.php';
        }
    
        if($view == "account"){
            include 'account.php';
        }
    
        if($view == "setting"){
            include 'setting.php';
        }
    ?>
    <footer>
        
    </footer>

    
</body>
</html>