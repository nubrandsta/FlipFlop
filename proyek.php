<?php 
session_start();
include("html/header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyek</title>
    <link rel="icon" href="/favicon.png" type="image/x-icon">
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        #thumbnail-garden{
            display:block;
            width:70%;
            margin: 0 auto !important;
            text-align:center;
            justify-content: center;

            
        }

    </style>

</head>
<body>

<div class="card " id="main-content" style="width:75%;margin-top:1%;">
    <a id="main-content-info">oleh Admin </a>
    <div class="card-body" id="main-content-body">
    <a id="content-link" href="egarden.php?action=cek" >
      <h3 class="card-title" id="main-content-title">E-Garden</h3></a>
      
      <img src="egarden.png" class="img-fluid" alt="Responsive image" id="thumbnail-garden">
        <h5 class="card-text" id="main-content-text">Sistem IoT untuk memantau kondisi lingkungan dan mengatur secara otomatis proses penyiraman dan regulasi suhu </h5>
    </div>
  </div>
  <br><br><br>

</body>
</html>

<?php
include("html/footer.php");
?>