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
    <link href="/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title><?php echo $_GET['title'];?></title>

<style>
    #post{
        font-size:110%;
    }
    
    #comments{
        background-color:#212529;
        color:white;
    }
    #comment{
    text-align:left;
    font-size:80%;
    }   
    #commentDate{
        text-align:right !important;
        font-family:monospace;
        font-size:80%;
        float:right;
    }
    #comment-form{
        margin:auto;
        
    }
    
    #comment-field{
        width:50%;
        margin-top:2%;
    }
    #btn-submit{
        margin-top:1%;
    }
    
</style>    

</head>


<body>
    <?php 
    include "html/header.php";

    $title = $_GET['title'];
    $post_query = mysqli_query($conn, "SELECT post_title,post_desc,post_content,poster,post_date FROM tb_post");
    $comment_query = mysqli_query($conn, "SELECT username,comment,comment_date FROM tb_comment WHERE post_title ='$title'");
    $post_data = mysqli_fetch_assoc($post_query);
    
    
    ?>

    <div class="card " id="main-content" style="width:85%;margin-top:1%;">
    <a id="main-content-info">Diposting oleh <?php echo $post_data["poster"] .' pada '.$post_data["post_date"];?></a>
    <div class="card-body" id="main-content-body">
      <h3 class="card-title" id="main-content-title"><?php echo $post_data["post_title"]; ?></h3>
      <p class="card-text" id="main-content-text"><?php echo $post_data["post_desc"]; ?></p>
        <hr>
        <p class="card-text" id="post"><?php echo $post_data["post_content"]; ?></p>
        <hr>
        <h5 class="card-text">Komentar<h5>
        <ul class="list-group list-group-flush">
            <?php while($comment_data = mysqli_fetch_assoc($comment_query)){
                echo '<hr><li class="list-group-item" id="comments">
                <p id="commenter">-'.$comment_data["username"].' </p>
                <span id="comment">"'.$comment_data["comment"] .'"</span><span id="commentDate">'. $comment_data["comment_date"].'</span>
                </li>';
            }
            ?>
        </ul>
        <form>
            <div class="form-group" id="comment-form">
            <hr>
                <label for="new-comment">Tulis Komentar</label>
               
                <input type="text" class="form-control" id="comment-field">
            </div>
            <button type="submit" class="btn btn-primary" id="btn-submit">Submit sebagai <?php echo $user; ?></button>
        </form>
    </div>
  </div>
<br><br><br>
<?php
    echo file_get_contents("html/footer.php");
    ?>
</body>
</html>