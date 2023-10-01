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
<h1 style="position: relative;left:60px;"> List of Demands</h1>
    <div class="container table-responsive" > <!-- Set a maximum width of 1200px and center the content horizontally -->
        <table style="overflow-x: hidden;" class="table table-bordered table-hover table-striped">
            <!-- Your table content goes here -->
        <thead class="table-dark">
        <tr>
            <th scope="col" class="text-center">User ID</th>
            <th scope="col" class="text-center">Full name</th>
            <th scope="col" class="text-center">Field</th>
            <th scope="col" class="text-center">University</th>
            <th scope="col" class="text-center">Level</th>
            <th scope="col" class="text-center">Aim</th>
            <th scope="col" class="text-center">Street address</th>
            <th scope="col" class="text-center">Phone number</th>
            <th scope="col" class="text-center">Date</th>
            <th scope="col" class="text-center">Details</th>
            <th scope="col" class="actions-header text-center" colspan="2">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // to show up demands list
        
                
            $ObjPDO = connexion();
            $demands = getDemands($ObjPDO);
        

            foreach ($demands as $demand) {
                $result = getUniversityById($ObjPDO, $demand['university']);
            
                $univers = $demand['university'];
                foreach($result as $r){
                    $univers = $r['your_university'];
                }
                $results = getUserById($ObjPDO, $demand['full_name']);
                $user_name = $demand['full_name'];
                foreach ($results as $rs) {
                    $user_name = $rs['your_full_name'] ;
                }   
                        
                echo "<tr>";
                echo "<td>{$demand['Id']}</td>";
                echo "<td>{$user_name}</td>";
                echo "<td>{$demand['field_of_studies']}</td>";
                echo "<td>{$univers}</td>";
                echo "<td>{$demand['level']}</td>";
                echo "<td>{$demand['aim']}</td>";
                echo "<td>{$demand['street_address']}</td>";
                echo "<td>{$demand['phone_number']}</td>";
                echo "<td>{$demand['date']}</td>";
                echo "<td><a href='view_details.php?id={$demand['Id']}'><input type='submit' class='btn btn-primary' value='View Details '></a></td>";  
                echo "<td><a href='update.php?id={$demand['Id']}'><input type='submit' class='btn btn-dark' value='Modify'></a></td>";
                echo "<td><a href='delete.php?id={$demand['Id']}'><input type='submit' class='btn btn-danger' value='Delete'></a></td>";
                echo "</tr>";
            
        }
        ?>
        </tbody>
        
    </div> 
</body>

</html>    

       

        
            
            

                
            
            
  








