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
    <title>About</title>

<style>
  #abouttext{
    text-align:center;
  }
  #egarden{
    width:70%;
    display:block;
    margin:auto;
  }
  #flop{
    width:30%;
    display:block;
    margin:auto;
  }
</style>
</head>
<body>
<div class="card " id="main-content" style="width:85%;">
        <img class="card-img-top" src="..." alt="About">
        <div class="card-body" id="main-content-body">
          <h3 class="card-title" id="main-content-title">Berbagi pengetahuan</h3>
          <p class="card-text" id="abouttext">
              Situs ini dibuat untuk berbagi pengalaman, pengetahuan dan bahan pembelajaran tentang teknologi (elektronik, komputer, IoT) atau proyek DIY lainya.<br>
              Proyek ini dibuat untuk memenuhi tugas mini project.<br><br>
              oleh<br>
              Sukma Adhi Wijaya, NIM:1220426 <br>
              Patar Manalu, NIM:1220437 <br><br>
        </p>
            <h5 class="card-text">
                Mini Project 1
            </h5>
        </div>
      </div>

      <div class="card " id="content-1" style="width:85%;">
        
        <div class="card-body" id="main-content-body">
        <a id="content-link" href="egarden.php?action=view" >
      <h3 class="card-title" id="main-content-title">E-Garden</h3></a>
          <img src="egarden.png" class="img-fluid" alt="Responsive image" id="egarden">
          <p class="card-text" id="main-content-text">
          Sistem IoT untuk memantau kondisi lingkungan dan mengatur secara otomatis proses penyiraman dan regulasi suhu
        </p>
        </div>
      </div>
      <div class="card " id="content-1" style="width:85%;">
      <a id="content-link" href="index.php" >
      <h3 class="card-title" id="main-content-title">Forum</h3></a>
        <img class="card-img-top" id="flop" src="floplogo-trans1.png" alt="PDFs">
        <div class="card-body" id="main-content-body">
          
          <p class="card-text" id="main-content-text">
              Berbagi pendapat dan ilmu pada forum
        </p>
        </div>
      </div>
      <br><br><br>

      <?php include("html/footer.php");?>

</body>
</html>