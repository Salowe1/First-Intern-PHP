<?php include_once 'navbar.php';?>
<?php include_once 'function.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body style='overflow-x:hidden;'>
    <h1>Do you want to delete this user?</h1>
    <?php
    // Start the session
    $ObjPDO = connexion();
    $id = $_GET['id'];  
    $demands = getDemandById($ObjPDO, $id);
    foreach ($demands as $demand) {
        echo "<p>User ID: " . $demand['Id'] . "</p>";
        echo "<p>Full Name: " . $demand['full_name'] . "</p>";
        // Include other user details you want to display
        echo "<form method='POST' action='process.php'>";
        echo "<input type='hidden' name='id' value='" . $demand['Id'] . "'>";
        echo "<input type=\"submit\" class=\"btn btn-primary\" name=\"action\" value=\"delete\">";
        echo "</form>";
    }
    ?>
    <br><br><br>
    <a class="btn btn-primary" style="position: relative;left:245px;" class="text-light text-decoration-none" href="list_demand.php">Demand list</a> 
 <a class="btn btn-primary" style="position: relative;left:1000px;" class="text-light text-decoration-none" href="creation_demand.php">New demand</a>
</body>
</html>


<style>
    p{
        position: relative;
        left:50px;
        margin-top:40px
        
    }
    h1,button{
        position: relative;
        left:20px;
        
        
    }
    .btn{
        position: relative;
        left:20px;
    }

</style>
