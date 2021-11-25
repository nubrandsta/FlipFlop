<?php
session_start();
$conn = mysqli_connect("localhost","root","","db_flop");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flop</title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link href="/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        #Body{
    background-color: #000000;
    opacity: 1;
    background-image:  radial-gradient(#2eff7d 2px, transparent 2px), radial-gradient(#2eff7d 2px, #000000 2px);
    background-size: 80px 80px;
    background-position: 0 0,40px 40px;
}   
#main-content{
    margin:auto;
    margin-top:1%;
    margin-bottom:1%;
    width:85%;
    background-color:#29e470;
    color:#29e470;
}
#main-content-body{
    background-color: #212529;
    color:white;
}
#main-content-title{
    text-align:center;
}
#main-content-info{
    text-align:right;
    color:#212529;
    margin-right:5%;
    font-family:monospace;

}
#main-content-text{
    text-align:center !important;
}
#content-link{
    color:white !important;
    text-decoration: none;
    text-align:center !important;
}
#content-1{
    margin:auto;
    margin-top:1%;
    background-color:#212529;
}
#pdfs{
    width:20%;
    height:30%;
    
}
#navbarTop{
    display:grid;
    text-align:center;
    background-color: #212529;
     opacity: 1;
    background-size: 50px 50px;
    background-image:  repeating-linear-gradient(0deg, #2eff7d, #2eff7d 2px, #212529 10px, #212529);
}
#mainbrand{
    width:10%;
    height:10%;
    margin:0 auto;
    padding:0%;
    
}
#navbarBottom{
    background-color:#212529 !important;
}
#currentPage{
    color:#212529 !important;
    padding-left:5%;
}
#links{
    color:#29e470 !important;
    padding-right:5%;   
    padding-left:5%;
    text-decoration:none;
    font-weight: bold;
}
#footerBottom{
    position:fixed !important;
    bottom:0;
    width:100%;
    
}
    </style>



</head>
<body>
<?php
include "html/header.php";

$query = mysqli_query($conn,"SELECT post_title,post_desc,poster,post_date FROM tb_post;");
while($data=mysqli_fetch_assoc($query)){
    echo
    '<div class="card " id="main-content" style="width:75%;margin-top:1%;">
    <a id="main-content-info">diposting pada '.$data["post_date"].'</a>
    <div class="card-body" id="main-content-body">
    <a id="content-link" href="content.php?title='.$data["post_title"].'" >
      <h3 class="card-title" id="main-content-title">'.$data["post_title"].'</h3></a>
    
      <p class="card-text" id="main-content-text">
          '.$data["post_desc"].'
    </p>
        <h5 class="card-text">oleh 
            '.$data["poster"].'
        </h5>
    </div>
  </div>' 
    ;
    
}
echo "<br><br><br><br>";
include "html/footer.php" ;
?>

</body>
</html>

