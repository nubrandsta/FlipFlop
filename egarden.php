<?php
session_start();
$conn = mysqli_connect("localhost","root","","db_flop");
$getlast_query = mysqli_query($conn, "SELECT * FROM tb_egarden WHERE time = (SELECT MAX(time) FROM tb_egarden);");
$getlast_data = mysqli_fetch_assoc($getlast_query);
$temp = $getlast_data['temp'];
$temp_percent = ($temp/40)*100;
$humidity = $getlast_data['humidity'];
$water = $getlast_data['water'];
$vent_status = $getlast_data['vent_status'];
if($vent_status==1){
  $vent_status = "Dibuka";
}
else{
  $vent_status = "Ditutup";
}
$lastupdate = $getlast_data['time'];

$lastwater_query = mysqli_query($conn,"SELECT time FROM tb_egarden WHERE time = (SELECT MAX(time) FROM tb_egarden WHERE action='siram')");
$lastwater_data = mysqli_fetch_assoc($lastwater_query);
$lastwater = $lastwater_data['time'];




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-garden</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
      #container{
        display:inline-grid;
        grid-template-columns: 50% 50%;
      }
      #ilustrasi{
        width:100%;
      }
      /* #ilustrasi-box{
        
      } */
      #entry-info{
        
        width:150%;
        
        
      }
      #main-content-text{
        text-align:left !important;
        margin-left:5%;
      }
      #koneksi{
        margin:auto;
        margin-left:5%;
        margin-right:5%;
        width:90%;
      }
      #bar{
        margin-left:5%;
        margin-right:5%;
        height:5%;
      }
      #label{
        margin-left:5%;
        margin-right:5%;
        margin-top:2%;
        height:4%;
      }
      #status{
        float:right;
        
      }
      #status-div{
        margin-bottom:4%;
      }
      #button-cluster{
        margin-left:5%;
        display:grid;
        grid-template-columns: 33% 33% 33%;
      }
      #button-cluster-element{
        margin-left:2%;
      }
     


    </style>
</head>
<body>
    <?php include("html/header.php");?>

  <div class="card " id="main-content" style="width:90%;margin-top:1%;">
    <a id="main-content-info">oleh Admin </a>
    <div class="card-body" id="main-content-body">
    <a id="content-link" href="egarden.php" >
      <h3 class="card-title" id="main-content-title">E-Garden</h3></a>
      <hr>
        <div id="container">
          <div id="ilustrasi-box">
       <img src="plantpot.png" class="img-fluid" alt="Ilustrasi" id="ilustrasi">
          </div>
          <div id="entry-info">
            <h3 id="main-content-text">Data Kebun</h3>
            <hr>
        
        <?php 
        echo '<h5 class="btn btn-success" id="koneksi">KONEKSI OK | Cek terakhir : '.$lastupdate.'</h5>';
        echo '
        <h5 id="label">Suhu</h5>
        <div class="progress" id="bar">
          <div class="progress-bar" id="tempbar" role="progressbar" style="width: '.$temp_percent.'%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$temp.' C</div>
        </div>
        <h5 id="label">Kelembapan Udara</h5>
        <div class="progress" id="bar">
          <div class="progress-bar" role="progressbar" style="width: '.$humidity.'%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$humidity.' %</div>
        </div>
        <h5 id="label">Kelembapan Tanah</h5>
        <div class="progress" id="bar">
          <div class="progress-bar" role="progressbar" style="width: '.$water.'%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$water.' %</div>
        </div>';
        echo '<div id="status-div"><h5 id="label">Ventilasi : <button class="btn btn-primary" id="status">'.$vent_status.'</button></h5></div>';
        echo '<div id="status-div"><h5 id="label">Terakhir kali disiram pada : <button class="btn btn-primary" id="status">'.$lastwater.'</button></h5></div>';
        echo '<div id="button-cluster"><button class="btn btn-primary" id="button-cluster-element">Cek</button>
              <button class="btn btn-primary" id="button-cluster-element">Cek</button>  
              </div>';
        ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br><br><br>

    <?php include("html/footer.php");?>
</body>
</html>