<?php

if($_SESSION){
  $user = $_SESSION['username'];
  $link = "logout.php";
  $prompt = "logout";
}
else{
  $user = "guest";
  $link = "login.php?action=login";
  $prompt = "login";
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flip Flop</title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



    <style>
      #user-log{
        color:#2eff7d;
        text-decoration:none;
      }
      #login-btn{
        background-color:#212529;
        color:#2eff7d;
        text-decoration:none;
        border-radius:1%;
      }
      #login{
        background-color:#2eff7d !important;
        color:#212529;
        text-decoration:none;

      }
      #logout{
        background-color:tomato !important;
        color:white;
        text-decoration:none;
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
        <span class="navbar-brand mb-2 h2" id="links">
          <ul class= "list-group list-group-horizontal" id="login-btn">
        <li class="list-group-item bg-transparent"><a href="#" id="user-log"> <?php echo $user ; ?> </a></li>
        <li class="list-group-item bg-transparent" id="<?php echo $prompt;?>"><a href="/<?php echo $link; ?>" id="<?php echo $prompt;?>"> <?php echo $prompt;?></a></li>
          </ul>
        </span>
      </nav>

</body>
</html>