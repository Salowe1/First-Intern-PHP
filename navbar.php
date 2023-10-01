<?php include_once 'function.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gestion stagiaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body style='overflow-x:hidden;'>
      <nav class="navbar navbar-expand-lg bg-primary mb-5 ">
          <div class="container-fluid">
            <a class="navbar-brand text-light" href="">Intern Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          </div>
          <div class="subnav">
          <button class="subnavbtn" style=" left:100px;">User<i class="fa fa-caret-down"></i></button>
          <div class="subnav-content">
            <a href="list_user.php" >List of Users</a>
            <a href="inscription.php">Creation User</a>
          </div>
          </div>
          <div class="subnav">
          <button class="subnavbtn" style=" left:100px;">University<i class="fa fa-caret-down"></i></button>
          <div class="subnav-content">
            <a href="list_university.php" >List Universities</a>
            <a href="creation_university.php">Creation University</a>
          </div>
          </div>
          <div class="subnav">
            <button class="subnavbtn">Demand<i class="fa fa-caret-down"></i></button>
            <div class="subnav-content">
              <a href="list_demand.php" >List Demands</a>
              <a href="creation_demand.php">Creation Demand</a>
            </div>
          </div>
          
      </nav>
<style> 
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      padding: 12px 16px;
      z-index: 1;
    }
    .dropdown:hover .dropdown-content {
      display: block;
    }
    .subnav {  
      overflow: hidden;
      float: right;
      color: white;
      text-align: center;
      text-decoration: none;
      
      }
    .subnav .subnavbtn {
      font-size: 17px;
      border: none;
      outline: none;
      color: white;
      
      padding: 7px 16px;
      background-color: inherit;
      font-family: inherit;
      margin: 0;
    }
    .subnav-content {
      display: none;
      position: absolute;
      left: 0;
      background-color: black;
      width: 100%;
      z-index: 3;
    }
    .subnav-content a {
      float: right;
      color: white;
      text-decoration: none;
      font-size: 17px;
      margin: 4px;
    }
    .subnav-content a:hover {
      background-color: #eee;
      color: black;
      display: block;
    }
    .subnav:hover .subnav-content {
      display: block;
    }
</style>
</body>
</html>
