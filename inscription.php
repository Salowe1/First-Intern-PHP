<?php include_once 'navbar.php';?>
<?php 
include_once 'function.php';
session_start();
$ObjPDO = connexion();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]) && isset($_POST["your_full_name"]) && isset($_POST["mdp"])) {
  $your_full_name = htmlspecialchars($_POST['your_full_name']);
  
  $mdp = sha1($_POST['mdp']);
  $insertUser = $ObjPDO->prepare('INSERT INTO users(your_full_name, mdp)VALUES(?, ?)');
  $insertUser->execute(array($your_full_name, $mdp));

  $recupUser = $ObjPDO->prepare('SELECT * FROM users WHERE your_full_name = ? AND mdp = ?');
  $recupUser->execute(array($your_full_name, $mdp));
  if ($recupUser->rowCount() > 0) {
      $_SESSION['your_full_name'] = $your_full_name;
      $_SESSION['mdp'] = $mdp;
      $_SESSION['id'] = $recupUser->fetch()['id'];
      $ObjPDO = connexion();

  $stmt = addUser($ObjPDO, $your_full_name, $mdp);
  $lastId = $_SESSION['id'];
  
  header("Location: creation_demand.php?id=" . $lastId);
  exit();
      
  }
  
} ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>
    <form method="POST"  class="formular" action="inscription.php" align-text="center">
        <label for="Pseudo">Full Name:</label>
        <input type="text" name="your_full_name" autocomplete="off">
        <br>
        <label for="Password">Password:</label>
        <input type="password" name="mdp" autocomplete="off">
        <br><br>
        <input type="submit" value="Register" class="first btn btn-outline-pink btn btn-primary text-light text-decoration-none"  name="submit">
    </form>
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
      
   