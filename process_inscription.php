
<?php
include_once 'function.php';
session_start();
$ObjPDO = connexion();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["envoi"])) {
    if (!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = sha1($_POST['mdp']);
        
        // Check if the pseudo already exists in the database
        $checkUser = $ObjPDO->prepare('SELECT * FROM users WHERE pseudo = ?');
        $checkUser->execute(array($pseudo));
        
        if ($checkUser->rowCount() == 0) {
            // Pseudo doesn't exist, so insert the user
            $insertUser = $ObjPDO->prepare('INSERT INTO users(pseudo, mdp) VALUES(?, ?)');
            $insertUser->execute(array($pseudo, $mdp));
            
            // Retrieve the inserted user
            $recupUser = $ObjPDO->prepare('SELECT * FROM users WHERE pseudo = ? AND mdp = ?');
            $recupUser->execute(array($pseudo, $mdp));
            
            if ($recupUser->rowCount() > 0) {
                $_SESSION['pseudo'] = $pseudo;
                $_SESSION['mdp'] = $mdp;
                $_SESSION['id'] = $recupUser->fetch()['id'];
                header('Location: creation_demand.php');
            } else {
                echo "An error occurred while retrieving the user.";
            }
        } else {
            echo "Username already exists. Please choose a different one.";
            echo "<a class='btn btn-dark'  href='connexion.php'>connexion</a>";
        }
    } else {
        echo "Please complete all fields.";
    }
}
?>


<?php
include_once 'function.php';
session_start();
$ObjPDO = connexion();

if (isset($_POST["envoi"])) {
    if (!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = sha1($_POST['mdp']);
        
    
            // Retrieve the inserted user
            $recupUser = $ObjPDO->prepare('SELECT * FROM users WHERE pseudo = ? AND mdp = ?');
            $recupUser->execute(array($pseudo, $mdp));
            
            if ($recupUser->rowCount() > 0) {
                $_SESSION['pseudo'] = $pseudo;
                $_SESSION['mdp'] = $mdp;
                $_SESSION['id'] = $recupUser->fetch()['id'];
                header('Location: view_details.php');
            } else {
                echo "Incorrect password.";
            }
        } 
    } else {
        echo "Please complete all fields.";
    }

?>
