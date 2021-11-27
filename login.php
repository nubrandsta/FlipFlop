<?php
session_start();
if(empty($_GET['action'])){
    header("location: login.php?action=login");
}
else{
    $action = $_GET['action'];
}
$error = "";
$conn = mysqli_connect("localhost","root","","db_flop");
IF($_SERVER["REQUEST_METHOD"]=="POST"){
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    $query_check = mysqli_query($conn, "SELECT EXISTS(SELECT * FROM tb_user WHERE username = '$username') AS 'exist'");
    $data_check = mysqli_fetch_assoc($query_check);
    if($data_check["exist"] == 0){
        $error = "Username ".$username." tidak ada!";
        
    }
    else{
        $query_check =mysqli_query($conn, "SELECT password FROM tb_user WHERE username = '$username'");
        $data_check = mysqli_fetch_assoc($query_check);
        if($data_check["password"] != $password){
            $error = "Password salah!";
        }
        else{
            $error = "Password benar";
            $_SESSION["username"] = $username;
            header("location: index.php");
        }

    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>FLoP Login</title>

    <style>
        #main-content-title{
            color:black !important;
            font-weight: bold;
        }
        #login-username{
            width:90%;
            margin:auto;
        }
        #login-password{
            width:90%;
            margin:auto;
        }
        #label{
            margin:auto;
            margin-left:5%;
            margin-bottom:1%;
            margin-top:2%;
        }
        #btn-submit{
            margin-top:3%;
            margin-bottom:3%;
            margin-left:5%;
        }
    </style>
</head>
<body id="Body"> 
<nav class="navbar navbar-dark bg-dark py-0" id="navbarTop">
        <span2 class="navbar-brand mb-1 h1"><img id="mainbrand" class="img-fluid" src="floplogo-trans1.png"></span>
</nav>
<nav class="navbar navbar-dark bg-dark py-0 " id="navbarBottom">
    <span class="navbar-brand mb-0 h1" id="currentPage">
        <ul class="list-group list-group-horizontal">
            <li class="list-group-item bg-transparent"><a href="/index.php" id="links">Home</a></li>
            <li class="list-group-item bg-transparent"><a href="/pdfs.html" id="links">PDFs</a></li>
            <li class="list-group-item bg-transparent"><a href="/proyek.html" id="links">Proyek</a></li>
            <li class="list-group-item bg-transparent"><a href="#" id="links">About</a></li>
        </ul>
    </span>
</nav>
<br><br>

<div class="card " id="main-content" style="width:50%">
<h3 class="card-title" id="main-content-title">LOGIN</h3>
    <div class="card-body" id="main-content-body">
        <p class="card-text" id="main-content-text"><?php echo $error;?></p>
        <form action="" method="POST">
            <div class="form-group" id="login-form">
            <label for="login-username" id="label" >Username</label>
            <input type="text" name = "username" class="form-control" id="login-username" placeholder="username">
             <label for="login-password" id="label">Password</label>
            <input type="text" name = "password" class="form-control" id="login-password" placeholder="password" >
            </div>
        <button type="submit" class="btn btn-primary" id="btn-submit">Login</button>
        </form>
    </div>
    </div>

  

    <br><br><br>


<?php 
include "html/footer.php";
?>

</body>
</html>