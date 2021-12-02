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

$action = $_GET['action'];
if(empty($action)){
  header("location:egarden.php?action=view");
}
else{
  if($action == "cek"){
    $tempdata = rand(15,40);
    $humiddata = rand(60,80);
    $waterdata = rand(40,70);
    $lastvent = $getlast_data['vent_status'];
    $timenow = date("Y/m/d h:i:s");
    $action = "Cek";
    $newdata_query = mysqli_query($conn, "INSERT INTO tb_egarden (temp,humidity,water,vent_status,time,action) VALUES('$tempdata','$humiddata','$waterdata','$lastvent','$timenow','$action')");
    header("location:egarden.php?action=view");
  }
  if($action == "toggle"){
    $tempdata = rand(15,40);
    $humiddata = rand(60,80);
    $waterdata = rand(40,70);
    $lastvent = $getlast_data['vent_status'];
    if($lastvent == 1){
      $lastvent = 0;
    }
    else{
      $lastvent = 1;
    }
    $timenow = date("Y/m/d h:i:s");
    $action = "Toggle Vent";
    $newdata_query = mysqli_query($conn, "INSERT INTO tb_egarden (temp,humidity,water,vent_status,time,action) VALUES('$tempdata','$humiddata','$waterdata','$lastvent','$timenow','$action')");
    header("location:egarden.php?action=view");
  }
  if($action == "siram"){
    $tempdata = rand(15,40);
    $humiddata = rand(60,80);
    $waterdata = rand(40,70);
    $lastvent = $getlast_data['vent_status'];
    $timenow = date("Y/m/d h:i:s");
    $action = "Siram";
    $newdata_query = mysqli_query($conn, "INSERT INTO tb_egarden (temp,humidity,water,vent_status,time,action) VALUES('$tempdata','$humiddata','$waterdata','$lastvent','$timenow','$action')");
    header("location:egarden.php?action=view");
  }
}






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
        
        width:100%;
        
        
        
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
        margin-right:5%;
        display:grid;
        grid-template-columns: 33% 33% 36%;
      }
      #button-cluster-element{
        margin-right:5%;
        
      }
      .btn-icon{
       
        width:10%;

      }
      #button-water{
        width:5%;
      }
      #button-humidity{
        width:5%;
      }
      #button-temp{
        width:5%;
      }
      #button-vent{
        width:20%;
      }
      #button-siram{
        width:15%;
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
        echo '<h5 class="btn btn-success" id="koneksi">KONEKSI OK |---------| Cek terakhir : '.$lastupdate.'</h5>';
        echo '
        <h5 id="label"><img class="btn-icon" id="button-temp" src="thermometer.png">Suhu</h5>
        <div class="progress" id="bar">
          <div class="progress-bar" id="tempbar" role="progressbar" style="width: '.$temp_percent.'%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$temp.' C</div>
        </div>
        <h5 id="label"><img class="btn-icon" id="button-humidity" src="hygrometer.png">  Kelembapan Udara</h5>
        <div class="progress" id="bar">
          <div class="progress-bar" role="progressbar" style="width: '.$humidity.'%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$humidity.' %</div>
        </div>
        <h5 id="label"><img class="btn-icon" id="button-water" src="alcohol.png">  Kelembapan Tanah</h5>
        <div class="progress" id="bar">
          <div class="progress-bar" role="progressbar" style="width: '.$water.'%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$water.' %</div>
        </div>';
        echo '<div id="status-div"><h5 id="label"><img class="btn-icon" id="button-water" src="vent.png">  Ventilasi : <button class="btn btn-primary" id="status">'.$vent_status.'</button></h5></div>';
        echo '<div id="status-div"><h5 id="label"><img class="btn-icon" id="button-water" src="watering.png"> Terakhir kali disiram pada : <button class="btn btn-primary" id="status">'.$lastwater.'</button></h5></div>';
        echo '<div id="button-cluster">
              <a href="egarden.php?action=cek" class="btn btn-primary" id="button-cluster-element"><img class="btn-icon" id="button-refresh" src="refresh.png">  Cek</a>
              <a href="egarden.php?action=toggle" class="btn btn-success" id="button-cluster-element"><img class="btn-icon" id="button-vent" src="vent.png">Ventilasi</a>  
              <a href="egarden.php?action=siram" class="btn btn-info" id="button-cluster-element"><img class="btn-icon" id="button-siram" src="watering.png">  Siram</a>
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