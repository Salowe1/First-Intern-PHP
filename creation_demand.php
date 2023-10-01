<?php include_once 'navbar.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New demand</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body style='overflow-x:hidden;'>
<h1 style="position: relative;"> Create Your Demand</h1>
     <section id="section-login">
            
        <fieldset>
            <form method="POST" class="formular" action="process.php" autocomplete="off" enctype="multipart/form-data">
                <p>
                    <label for="full_name">Full Name:</label>
                    <input id="full_name" name="full_name" type="text"  required value="<?php 
                    
                    if($_GET['id']){
                      echo $_GET['id'];
                    $ObjPDO = connexion();
                    $recupUser = $ObjPDO->prepare('SELECT * FROM users WHERE your_full_name = ? AND mdp = ?');
                    
                     
                      $id = $_GET['id'];
                      $UserId = getUserById($ObjPDO, $id);

                      foreach ($UserId as $user) {
                      
                      
                      echo $user['your_full_name'];
                      
                     
                      
                  }}
                      
                   ?>">
                </p>
                
                    
                <p>
                    <label for="field_of_studies">Field of Studies:</label>
                    <input id="field_of_studies" name="field_of_studies" type="text" placeholder="Computer science" required value="">
                </p>	

                <p>
                    <label for="university">University:</label>
                    
        


                    <select class="btn btn-primary dropdown-toggle" name="university" id="university">
                      <?php
                      $ObjPDO = connexion();
                      $universities = getUniversity($ObjPDO);
                      
                      foreach ($universities as $university) {
                        $id = $university['id'];
                        $universityName = $university['your_university'];
                        echo "<option value='$id'>$universityName</option>";
                      }
                      ?>
                    </select>

                </p>
                <p>
                    <label for="level">Level:</label>
                    <select class="btn btn-primary dropdown-toggle" id="level" name="level">
                      
                        <option value="Licence 1" selected>Licence 1</option>
                        <option value="Licence 2">Licence 2</option>
                        <option value="Licence 3">Licence 3</option>
                        <option value="Master 1">Master 1</option>
                        <option value="Master 2">Master 2</option>
                    </select>
                </p>

                <p>
                    <label for="aim">Aim (Which specific skills do you want to work on?):</label><span id="aim"></span>
                    <input type="text" name="aim" id="aim" placeholder="Web development with PHP"  required value=""> 
                </p>
                <p>
                    <label for="street_address">Street Address:</label>
                    <input id="street_address" name="street_address" type="text" placeholder=" 01BP2568 Ouagadougou 01" required value="">
                </p>

                <p>
                    <label for="phone_number">Phone number:</label><span id="phone_number"></span>
                    <input type="tel" name="phone_number" id="phone_number" minlength="8" maxlength="13" pattern="\d{8,13}" placeholder="Please enter between 8 and 13 digits" required value="">
                </p>     
                <p>
                    <label for="date">Date:</label>
                    <input type="date" name="date" id="date" required>
                </p>
     
                <button class="first btn btn-outline-pink" type="submit" name="submit" value="Register">Register </button>
            </form>
            <br>  
        </fieldset>
            
    </section> 
        
  <a class="btn btn-primary" style="position: relative;left:245px;" class="text-light text-decoration-none" href="list_demand.php">Demands list</a> 
 <a class="btn btn-primary" style="position: relative;left:1000px;" class="text-light text-decoration-none" href="creation_demand.php">New demand</a>
</body>
</html>






<style>*, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

.formular {
  max-width: 300px;
  position:relative;
  left: 500px;
  background: #f4f7f8;
  border-radius: 8px;
}

h1 {
  margin: 0 0 30px 0;
  text-align: center;
}

input[type="text"],
input[type="password"],
input[type="date"],
input[type="datetime"],
input[type="email"],
input[type="number"],
 
input[type="tel"],
input[type="time"],
input[type="url"],
textarea,
select {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 16px;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: #e8eeef;
  color: #8a97a0;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}

input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;
}

select {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
}

.btn-outline-pink {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color:  #084ef2;
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
  margin-bottom: 10px;
}

fieldset {
  margin-bottom: 30px;
  border: none;
}

legend {
  font-size: 1.4em;
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 8px;
}



.number {
  background-color: #5fcf80;
  color: #fff;
  height: 30px;
  width: 30px;
  display: inline-block;
  font-size: 0.8em;
  margin-right: 4px;
  line-height: 30px;
  text-align: center;
  text-shadow: 0 1px 0 rgba(255,255,255,0.2);
  border-radius: 100%;
}

@media screen and (min-width: 480px) {

    .formular {
    max-width: 480px;
  }

}
</style>
      
   