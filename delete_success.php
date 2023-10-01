<?php include_once 'navbar.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success message</title>
</head>
<body>

<div class="success alert" style="left: 600px;top:150px">
    <div class="alert-body">
        Your details have been successfully deleted
    </div>
</div>
    
<a class="btn btn-primary" style="position: relative;left:245px;" class="text-light text-decoration-none" href="list_demand.php">Demands list</a> 
<a class="btn btn-primary" style="position: relative;left:1000px;" class="text-light text-decoration-none" href="creation_demand.php">New demand</a>
  
</body>
</html>

<style>.box{
  margin-top:60px;
  display:flex;
  justify-content:space-around;
  flex-wrap:wrap;
}

.alert{
  margin-top:25px;
  background-color:#fff;
  font-size:25px;
  font-family:sans-serif;
  text-align:center;
  width:300px;
  height:100px;
  padding-top: 150px;
  
  position:relative;
  border: 1px solid #efefda;
  border-radius: 2%;
  
}

.alert::before{
  width:100px;
  height:100px;
  position:absolute;
  border-radius: 100%;
  inset: 20px 0px 0px 100px;
  font-size: 60px;
  line-height: 100px;
  border : 5px solid gray;
  animation-name: reveal;
  animation-duration: 1.5s;
  animation-timing-function: ease-in-out;
}

.alert>.alert-body{
  opacity:0;
  animation-name: reveal-message;
  animation-duration:1s;
  animation-timing-function: ease-out;
  animation-delay:1.5s;
  animation-fill-mode:forwards;
}

@keyframes reveal-message{
  from{
    opacity:0;
  }
  to{
    opacity:1;
  }
}

.success{
  color:green;
}

.success::before{
  content: '✓';
  background-color: #eff;
  box-shadow: 0px 0px 12px 7px rgba(200,255,150,0.8) inset;
  border : 5px solid green;
}

.error{
  color: red;
}

.error::before{
  content: '✗';
  background-color: #fef;
  box-shadow: 0px 0px 12px 7px rgba(255,200,150,0.8) inset;
  border : 5px solid red;
}

@keyframes reveal {
  0%{
    border: 5px solid transparent;
    color: transparent;
    box-shadow: 0px 0px 12px 7px rgba(255,250,250,0.8) inset;
    transform: rotate(1000deg);
  }
  25% {
    border-top:5px solid gray;
    color: transparent;
    box-shadow: 0px 0px 17px 10px rgba(255,250,250,0.8) inset;
    }
  50%{
    border-right: 5px solid gray;
    border-left : 5px solid gray;
    color:transparent;
    box-shadow: 0px 0px 17px 10px rgba(200,200,200,0.8) inset;
  }
  75% {
    border-bottom: 5px solid gray;
    color:gray;
    box-shadow: 0px 0px 12px 7px rgba(200,200,200,0.8) inset;
    }
  100%{
    border: 5px solid gray;
    box-shadow: 0px 0px 12px 7px rgba(200,200,200,0.8) inset;
  }
}
</style>