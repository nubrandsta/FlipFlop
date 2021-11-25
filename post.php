<?php
session_start();
$conn = mysqli_connect("localhost","root","","db_flop");
if($_SESSION){
    $user = $_SESSION['username'];
    $prompt = "logout";
    $islogged = true;
  }
  else{
    $user = "guest";
    $prompt = "login";
    $islogged = false;
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tulis Post</title>

    <style>
        #post-form{
            margin-bottom:2%;
        }
        #post-title-field{
            margin-top:1%;
            margin-bottom:1%;
            width:30%;
        }
        #post-desc-field{
            margin-top:1%;
            margin-bottom:1%;
            width:50%;
        }
    </style>
</head>
<body>
    
<?php
    include "html/header.php";
?>

<div class="card " id="main-content" style="width:85%;margin-top:1%;">
    <a id="main-content-info">Tulis</a>
    <div class="card-body" id="main-content-body">
      <h3 class="card-title" id="main-content-title">Tulis Postingan</h3>
      <p class="card-text" id="main-content-text"></p>

      <form action="" method="POST">
    <div class="form-group" id="post-form">
    <hr>
        <label for="new-comment">Judul</label>
        <input type="text" name = "post-title" class="form-control" id="post-title-field" placeholder="Judul postingan">
        <label for="new-comment">Deskripsi</label>
        <input type="text" name = "post-desc" class="form-control" id="post-desc-field" placeholder="Deskripsi">
        <label for="new-comment">Deskripsi</label>
        <textarea type="text" name = "post-content" class="form-control" id="post-post-field" placeholder="Isi post" rows=20></textarea>
    </div>
    <button type="submit" class="btn btn-primary" id="btn-submit">Submit</button>
</form>
        
        
        <h5 class="card-text"><h5>
    </div>
  </div>

<br><br><br>
<?php
    include "html/footer.php";
?>

</body>
</html>