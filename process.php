<?php
    include_once 'function.php';
    
    $ObjPDO = connexion();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'delete') {
        $id = $_POST['id']; 
        $stmt = deleteDemand($ObjPDO, $id);
        if ($stmt->rowCount() > 0) {
            echo "<p>User with ID $id has been deleted.</p>";
        } else {
            echo "<p>Deletion failed for user with ID $id.</p>";
        }
        header("Location: delete_success.php");
        exit();
    }
    
?>
<?php
include_once 'function.php';
$ObjPDO = connexion();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]) && isset($_POST["field_of_studies"]) && isset($_POST["university"]) && isset($_POST["level"]) && isset($_POST["aim"]) && isset($_POST["street_address"]) && isset($_POST["phone_number"]) && isset($_POST["date"])&& isset($_POST["full_name"])){
    $full_name = $_POST["full_name"];
    $field_of_studies = $_POST["field_of_studies"];
    $university = $_POST["university"];
    $level = $_POST["level"];
    $aim = $_POST["aim"];
    $street_address = $_POST["street_address"];
    $phone_number = $_POST["phone_number"];
    $date = $_POST["date"];
    

    $stmt = addDemand($ObjPDO, $full_name, $field_of_studies, $university, $level, $aim, $street_address, $phone_number, $date);
    
    // Get the last inserted ID
    $lastInsertedId = $ObjPDO->lastInsertId();
    // Start a session
    session_start();
   
    
    // Redirect to view_details.php with the new user's ID
    header("Location: view_details.php?id=" . $lastInsertedId);
    exit();
        
    }
    

?>
<?php
include_once 'function.php';
$ObjPDO = connexion();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'modify') {
        // Establish a database connection
        $ObjPDO = connexion();
        // Gather data from the POST request
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $field_of_studies = $_POST['field_of_studies'];
        $university = $_POST['university'];
        $level = $_POST['level'];
        $aim = $_POST['aim'];
        $street_address = $_POST['street_address'];
        $phone_number = $_POST['phone_number'];
        $date = $_POST["date"];
        $stmt = updateDetails($ObjPDO, $id, $full_name, $field_of_studies, $university, $level, $aim, $street_address, $phone_number, $date);
        // Execute the SQL query to update the data
        $stmt->execute();
        header("Location: modify_success.php");
    }
}        
?>

<?php
include_once 'function.php';
$ObjPDO = connexion();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]) && isset($_POST["your_university"])) {
    
    $your_university = $_POST["your_university"];
    $ObjPDO = connexion();
    
    // Check if the university already exists
    $existing_univ = getUniversityByName($ObjPDO, $your_university);

    if (empty($existing_univ)) {
        // University doesn't exist, so add it
        $stmt = addUniversity($ObjPDO, $your_university);
        header("Location: univ_creation_success.php");
    } else {
        // University already exists, handle this case as needed
        header("Location: univ_creation_error.php");
    }
    
    exit();
}
?>


<?php
include_once 'function.php';
$ObjPDO = connexion();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]) && isset($_POST["your_full_name"])) {
    
    $full_name = $_POST["your_full_name"];
    $ObjPDO = connexion();
    
    // Check if the user already exists by full name
    $existing_name = getFullName($ObjPDO, $full_name);

    if (empty($existing_name)) {
        // User doesn't exist by full name, so check by ID
        $user_id = $_POST["user_id"]; // Assuming you have a form field for user ID
        $user_by_id = getFullNameById($ObjPDO, $user_id);

        if (empty($user_by_id)) {
            // Neither by full name nor by ID, so add the user
            $stmt = addFullName($ObjPDO, $full_name);
            header("Location: creation_demand.php");
        } else {
            // User already exists by ID, handle this case as needed
            header("Location: list_demand.php");
        }
    } else {
        // User already exists by full name, handle this case as needed
        header("Location: list_demand.php");
    }
    exit();
    } else {
    // If there was no POST request, check if a full_name session variable exists
        if (isset($_SESSION["success"])) {
            $full_name_input_value = $full_name;
        }   
    }
?>





