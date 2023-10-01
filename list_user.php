<?php include_once 'navbar.php'; ?>
<?php include_once 'function.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestion stagiaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body style="overflow-x:hidden;">
    <h1 style="position: relative;left:60px;"> List of Users</h1>
    <br>
    <div class="container table-responsive" > <!-- Set a maximum width of 1200px and center the content horizontally -->
        <table style="overflow-x: hidden;" class="table table-bordered table-hover table-striped">
            <!-- Your table content goes here -->
        <thead class="table-dark">
        <tr>
            <th scope="col" class="text-center">ID</th>
            <th scope="col" class="text-center">User Name</th>
        </tr>
        </thead>
        <tbody >
        <?php
        // Loop through the user data array and generate table rows
       
        $ObjPDO = connexion();
        $users = getUsers($ObjPDO);

        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>{$user['id']}</td>";
            echo "<td>{$user['your_full_name']}</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </div> 
</body>

</html>
  








