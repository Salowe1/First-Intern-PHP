<?php

function connexion() {
    try {
        $ObjPDO = new PDO('mysql:dbname=first_phpp;host=localhost;charset=utf8', 'root', '');
        return $ObjPDO;
    } catch (PDOException $e) {
        echo 'Connexion échouée';
    }
}

function addDemand(PDO $ObjPDO, $full_name, $field_of_studies, $university, $level, $aim, $street_address, $phone_number, $date){
    $repPrep = $ObjPDO->prepare('INSERT INTO demands (full_name, field_of_studies, university, level, aim, street_address, phone_number, date) VALUES ( :full_name, :field_of_studies, :university, :level, :aim, :street_address, :phone_number, :date)');
    $bvc0 = $repPrep->bindValue(':full_name', $full_name, PDO::PARAM_STR);
    $bvc1 = $repPrep->bindValue(':field_of_studies', $field_of_studies, PDO::PARAM_STR);
    $bvc2 = $repPrep->bindValue(':university', $university, PDO::PARAM_STR);
    $bvc3 = $repPrep->bindValue(':level', $level, PDO::PARAM_STR);
    $bvc4 = $repPrep->bindValue(':aim', $aim, PDO::PARAM_STR);
    $bvc5 = $repPrep->bindValue(':street_address', $street_address, PDO::PARAM_STR);
    $bvc6 = $repPrep->bindValue(':phone_number', $phone_number, PDO::PARAM_STR);
    $bvc7 = $repPrep->bindValue(':date', $date, PDO::PARAM_STR); 
    $okExecution = $repPrep->execute();
    return $repPrep;
}

function addUser(PDO $ObjPDO, $full_name, $mdp){
    $repPrep = $ObjPDO->prepare('INSERT INTO demands (full_name, mdp)VALUES (:full_name, :mdp)');
    $bvc0 = $repPrep->bindValue(':full_name', $full_name, PDO::PARAM_STR);
    $bvc8 = $repPrep->bindValue(':mdp', $mdp, PDO::PARAM_STR);
    $okExecution = $repPrep->execute();
    return $repPrep;
}

function addUniversity(PDO $ObjPDO, $your_university){
    $repPrep = $ObjPDO->prepare('INSERT INTO universities (your_university) VALUES (:your_university)');
    $bvc7 = $repPrep->bindValue(':your_university', $your_university, PDO::PARAM_STR);
    $okExecution = $repPrep->execute();

    // Check if the university was added successfully
    if ($okExecution) {
        return true; // University added
    } else {
        return false; // University already exists or another error occurred
    }
}

function addFullName(PDO $ObjPDO, $full_name){
    $repPrep = $ObjPDO->prepare('INSERT INTO users (your_full_name) VALUES (:your_full_name)');
    $bvc7 = $repPrep->bindValue(':full_name', $full_name, PDO::PARAM_STR);
    $okExecution = $repPrep->execute();

    // Check if the university was added successfully
    if ($okExecution) {
        return true; // University added
    } else {
        return false; // University already exists or another error occurred
    }
}
function getDemands(PDO $ObjPDO){
    $repPrep = $ObjPDO->prepare('SELECT * FROM demands WHERE 
        full_name IS NOT NULL AND
        field_of_studies IS NOT NULL AND
        university IS NOT NULL AND
        level IS NOT NULL AND
        aim IS NOT NULL AND
        street_address IS NOT NULL AND
        phone_number IS NOT NULL AND
        date IS NOT NULL ORDER BY Id DESC');
    $repPrep->execute();
    return $repPrep;
}

function getUserDemandDetails(PDO $ObjPDO, $userId) {
    $repPrep = $ObjPDO->prepare('SELECT * FROM demands WHERE full_name IS NOT NULL AND
    field_of_studies IS NOT NULL AND
    university IS NOT NULL AND
    level IS NOT NULL AND
    aim IS NOT NULL AND
    street_address IS NOT NULL AND
    phone_number IS NOT NULL AND
    date IS NOT NULL AND full_name = (SELECT your_full_name FROM users WHERE id = :userId)');
    $repPrep->bindValue(':userId', $userId, PDO::PARAM_INT);
    $repPrep->execute();
    return $repPrep->fetchAll();
}
function getTargetedById(PDO $ObjPDO){
    $repPrep = $ObjPDO->prepare('SELECT users.your_full_name
    FROM demands
    INNER JOIN users ON demands.full_name = demands.full_name;
    ');
    $repPrep->execute();
    return $repPrep->fetchAll();
} 





function getDemandId(PDO $ObjPDO){
    $repPrep = $ObjPDO->prepare('SELECT users.your_full_name, users.id
    FROM users
    INNER JOIN demands ON users.your_full_name = demands.full_name;
    ');
    $repPrep->execute();
    return $repPrep->fetchAll();
}
function getUniversity(PDO $ObjPDO){
    $repPrep = $ObjPDO->prepare('SELECT * FROM universities');
    $repPrep->execute();
    return $repPrep;
}

function getUsers(PDO $ObjPDO){
    $repPrep = $ObjPDO->prepare('SELECT * FROM users');
    $repPrep->execute();
    return $repPrep;
}


function getUniversityById(PDO $ObjPDO, $id){
    $repPrep = $ObjPDO->prepare('SELECT *  FROM universities WHERE id = :id');
    $repPrep->bindValue(':id',$id,PDO::PARAM_STR);
    $repPrep->execute();
    return $repPrep->fetchAll();
}

function getUserById(PDO $ObjPDO, $id){
    $repPrep = $ObjPDO->prepare('SELECT *  FROM users WHERE id = :id');
    $repPrep->bindValue(':id',$id,PDO::PARAM_STR);
    $repPrep->execute();
    return $repPrep->fetchAll();
} 




function getFullNameById(PDO $ObjPDO, $id){
    $repPrep = $ObjPDO->prepare('SELECT *  FROM users WHERE id = :id');
    $repPrep->bindValue(':id',$id,PDO::PARAM_STR);
    $repPrep->execute();
    return $repPrep->fetchAll();
}

function getFullName(PDO $ObjPDO, $your_full_name){
    $repPrep = $ObjPDO->prepare('SELECT * FROM users WHERE your_full_name = :your_full_name');
    $repPrep->bindValue(':your_full_name', $your_full_name, PDO::PARAM_STR);
    $repPrep->execute();
    return $repPrep->fetchAll();
}

function getUniversityByName(PDO $ObjPDO, $your_university){
    $repPrep = $ObjPDO->prepare('SELECT * FROM universities WHERE your_university = :your_university');
    $repPrep->bindValue(':your_university', $your_university, PDO::PARAM_STR);
    $repPrep->execute();
    return $repPrep->fetchAll();
}

function getDemandById(PDO $ObjPDO, $id){
    $repPrep = $ObjPDO->prepare('SELECT * FROM demands WHERE id = :id');
    $repPrep->bindValue(':id',$id,PDO::PARAM_STR);
    $repPrep->execute();  
    return $repPrep;
}
function getUserDemandById(PDO $ObjPDO, $id){
    $repPrep = $ObjPDO->prepare('SELECT * FROM users WHERE id = :id');
    $repPrep->bindValue(':id',$id,PDO::PARAM_STR);
    $repPrep->execute();  
    return $repPrep->fetchAll();
}


function deleteDemand(PDO $ObjPDO, $id){
    $repPrep = $ObjPDO->prepare('DELETE FROM demands WHERE id = :id');
    $repPrep->bindValue(':id',$id,PDO::PARAM_STR);
    $okExecution = $repPrep->execute();
    return $repPrep;
}

function updateDetails(PDO $ObjPDO, $id, $full_name, $field_of_studies, $university, $level, $aim, $street_address, $phone_number, $date) {
    $repPrep = $ObjPDO->prepare("UPDATE demands SET full_name = :full_name, field_of_studies = :field_of_studies, university = :university, level = :level, aim = :aim, street_address = :street_address, phone_number = :phone_number, date = :date WHERE id = :id");
    $bvc0 = $repPrep->bindParam(':id', $id, PDO::PARAM_INT);
    $bvc1 = $repPrep->bindValue(':full_name',$full_name,PDO::PARAM_STR);
    $bvc2 = $repPrep->bindValue(':field_of_studies',$field_of_studies,PDO::PARAM_STR);
    $bvc3 = $repPrep->bindValue(':university',$university,PDO::PARAM_STR);
    $bvc4 = $repPrep->bindValue(':level',$level,PDO::PARAM_STR);
    $bvc5 = $repPrep->bindValue(':aim',$aim,PDO::PARAM_STR);
    $bvc5 = $repPrep->bindValue(':street_address',$street_address,PDO::PARAM_STR);
    $bvc6 = $repPrep->bindValue(':phone_number',$phone_number,PDO::PARAM_STR);
    $bvc7 = $repPrep->bindValue(':date',$date,PDO::PARAM_STR);
    $okExecution = $repPrep->execute();
    return $repPrep;
}



?>