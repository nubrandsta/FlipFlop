<?php
session_start();
if(empty($_GET['action'])){
    header("location: login.php?action=login");
}
else{
    $action = $_GET['action'];
}
$forms_1 = '';
$forms_2 = '';
$error = 'Selamat Datang';

$conn = mysqli_connect("localhost","root","","db_flop");
if($action == "login"){
    $forms_1 = '<div class="card " id="main-content" style="width:40%">
        <h3 class="card-title" id="main-content-title">LOG IN</h3>
            <div class="card-body" id="main-content-body">
                <p class="card-text" id="main-content-text">';$forms_2='</p>
                <form action="" method="POST">
                    <div class="form-group" id="login-form">
                    <label for="login-username" id="label" >Username</label>
                    <input type="text" name = "username" class="form-control" id="login-username" placeholder="username">
                     <label for="login-password" id="label">Password</label>
                    <input type="text" name = "password" class="form-control" id="login-password" placeholder="password" >
                    </div>
                <button type="submit" class="btn btn-primary" id="btn-submit">Login</button>
                <a class="btn btn-primary" id="btn-register" href="login.php?action=register">Daftar</a>
                </form>
            </div>
            </div>
        ';
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        
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
}
elseif($action == "register"){
    $forms_1 = '<div class="card " id="main-content" style="width:50%">
    <h3 class="card-title" id="main-content-title">REGISTER</h3>
        <div class="card-body" id="main-content-body">
            <p class="card-text" id="main-content-text">';
            $forms_2='</p>
            <form action="" method="POST">
                <div class="form-group" id="login-form">
                <label for="login-username" id="label" >Username</label>
                <input type="text" name = "username" class="form-control" id="login-username" placeholder="username">
                 <label for="login-password" id="label">Password</label>
                <input type="text" name = "password" class="form-control" id="login-password" placeholder="password" >
                <label for="login-data" id="label">Alamat E-mail</label>
                <input type="text" name = "email" class="form-control" id="login-data" placeholder="Email" >
                <label for="login-data" id="label">Nama</label>
                <input type="text" name = "nama" class="form-control" id="login-data" placeholder="Nama" >
                </div>
            <button type="submit" class="btn btn-primary" id="btn-submit">DAFTAR</button>
            <a class="btn btn-primary" id="btn-back" href="login.php?action=login">Kembali</a>
            </form>
        </div>
        </div>
    ';
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $name = $_POST["nama"];
        $email = $_POST["email"];
        if(empty($username)||empty($password)||empty($name)||empty($email)){
            $error = "Kolom tidak boleh kosong!";
        }
        else{
            if(!ctype_alnum($username)){
                $error = "Username hanya dapat mengandung alfanumerik!";
            }
            else{
                $query_check = mysqli_query($conn, "SELECT EXISTS(SELECT * FROM tb_user WHERE username = '$username') AS 'exist'");
                $data_check = mysqli_fetch_assoc($query_check);
                 if($data_check["exist"] == 1){
                     $error = "Username ".$username." sudah diambil!";
                    }
                    else{
                        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                            $error = "Email tidak valid";
                        }
                        else{
                            $register_query = mysqli_query($conn, "INSERT INTO tb_user (username,password,user_level,full_name,email) VALUES ('$username', '$password','2', '$nama', '$email');");
                            $error = "Mendaftarkan...";
                            sleep(3);
                            header("location:login.php?action=login");
                        }
                    }
            }
        }
    }
}
else{
    header("location: index.php");
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
            color:#212529 !important;
            font-weight: bold;
        }
        #login-username{
            width:90%;
            margin-left:5%;
        }
        #login-password{
            width:90%;
            margin-left:5%;
        }
        #login-data{
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
        #btn-register{
            margin-top:3%;
            margin-bottom:3%;
            margin-right:5%;
            float:right;
        }
        #btn-back{
            margin-top:3%;
            margin-bottom:3%;
            margin-right:5%;
            float:right;
            background-color:tomato;
            border-color:tomato;
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
            <li class="list-group-item bg-transparent"><a href="/index.php" id="links">Forum</a></li>
            <!-- <li class="list-group-item bg-transparent"><a href="/pdfs.html" id="links">PDFs</a></li>
            <li class="list-group-item bg-transparent"><a href="/proyek.html" id="links">Proyek</a></li> -->
            <li class="list-group-item bg-transparent"><a href="a" id="links">About</a></li>
        </ul>
    </span>
</nav>
<br><br>

<?php 
echo $forms_1;
echo $error;
echo $forms_2;

if($action == "login"){

}
elseif($action == "register"){
    
}
?>

  

    <br><br><br>


<?php 
include "html/footer.php";
?>

</body>
</html>