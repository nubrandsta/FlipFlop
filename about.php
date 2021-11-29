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
</head>
<body>
<div class="card " id="main-content" style="width:85%;">
        <img class="card-img-top" src="..." alt="About">
        <div class="card-body" id="main-content-body">
          <h3 class="card-title" id="main-content-title">Berbagi pengetahuan</h3>
          <p class="card-text" id="main-content-text">
              Situs ini dibuat untuk berbagi pengalaman, pengetahuan dan bahan pembelajaran tentang teknologi (elektronik, komputer, IoT) atau proyek DIY lainya
        </p>
            <h5 class="card-text">
                Tugas pemrograman 2
            </h5>
        </div>
      </div>

      <div class="card " id="content-1" style="width:85%;">
        <img class="card-img-top" src="menutama.png" alt="Proyek">
        <div class="card-body" id="main-content-body">
          <h3 class="card-title" id="main-content-title">Proyek</h3>
          <p class="card-text" id="main-content-text">
              Program kasir untuk membantu pendataan penjualan, dibuat untuk mata kuliah Model dan Simulasi
        </p>
        </div>
      </div>
      <div class="card " id="content-1" style="width:85%;">
        <img class="card-img-top" id="pdfs" src="elecfordummies.jpg" alt="PDFs">
        <div class="card-body" id="main-content-body">
          <h3 class="card-title" id="main-content-title">PDF</h3>
          <p class="card-text" id="main-content-text">
              Rekomendasi buku sebagai bahan
        </p>
        </div>
      </div>

      <?php include("html/footer.php");?>

</body>
</html>