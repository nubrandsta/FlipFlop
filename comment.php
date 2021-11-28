<?php
session_start();
$conn = mysqli_connect("localhost","root","","db_flop");

if($_SESSION){
    $user = $_SESSION['username'];
    $prompt = "logout";
    $islogged = true;
    if(empty($_GET["id"])){
        header("location:index.php");
    }
    else{
        $id_comment = $_GET["id"];
        if(empty($_GET["action"])){
            header("location: comment.php?id=".$id_comment."&action=Edit");
        }
        else{
            $action = $_GET["action"];
            $checkquery = mysqli_query($conn, "SELECT username FROM tb_comment WHERE id_comment = '$id_comment'");
            $checkdata = mysqli_fetch_assoc($checkquery);
            if($checkdata['username'] != $user){
                header("location: index.php");
            }
            else{
                $getquery = mysqli_query($conn,"SELECT post_title,comment,comment_date FROM tb_comment WHERE id_comment = '$id_comment'");
                $getdata = mysqli_fetch_assoc($getquery);
                if($action == "Edit"){
                    if($_SERVER["REQUEST_METHOD"]=="POST"){
                        $comment = $_POST["comment"];
                        $date = date("Y/m/d");
                        $updatequery = mysqli_query($conn, "UPDATE tb_comment SET comment = '$comment', comment_date = '$date' WHERE id_comment = '$id_comment'");
                        header("location: content.php?title=".$getdata["post_title"]);
                    }

                }
                elseif($action == "Delete"){
                    $deletequery = mysqli_query($conn, "DELETE FROM tb_comment WHERE id_comment = '$id_comment'");
                    header("location: content.php?title=".$getdata["post_title"]);

                }
                else{
                    header("location: comment.php?id=".$id_comment."&action=Edit");
                }

            }
        }
    }
  }
  else{
    header("location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Comment</title>

    <style>
        #label-title{
            margin:auto;
            text-align:center;
            
        }
        #post-title-field{
            width:75%;
            margin:auto;
            text-align:center;
            margin-bottom:2%;
            
        }
        #label-comment{
            text-align:left;
            margin-left:13%;
        }
        #post-comment-field{
            width:75%;
            margin:auto;
            margin-bottom:2%;
            
        }
        #btn-edit{
            margin-left:13%;
        }
        #btn-delete{
            float:right;
            margin-right:13%;
        }
    </style>
</head>

<?php include("html/header.php"); ?>

<body>
<div class="card " id="main-content" style="width:75%;margin-top:1%;">
<a id="main-content-info"></a>
<div class="card-body" id="main-content-body">
  <h3 class="card-title" id="main-content-title"><?php echo $action;?> Comment</h3>
  <p class="card-text" id="main-content-text"></p>

  <form action="" method="POST">
<div class="form-group" id="post-form">
<hr>
    <p id="label-title">Judul Artikel</p>
    <input type="text" name = "post-title" class="form-control" id="post-title-field" placeholder="Judul postingan" value="<?php echo $getdata['post_title'];?>" disabled>
    <label for="post-desc-field" id="label-comment">Komentar</label>
    <textarea type="text" name = "comment" class="form-control" id="post-comment-field" placeholder="Komentar Anda" rows="3"><?php echo $getdata['comment']; ?></textarea>
</div>
<button type="submit" class="btn btn-primary" id="btn-edit">Edit</button>
<a class="btn btn-danger" id="btn-delete" href="comment.php?id=<?php echo $id_comment;?>&action=Delete">HAPUS KOMENTAR</a>
</form>
    
    
    <h5 class="card-text"><h5>
</div>
</div>
<br><br><br>
<?php include("html/footer.php"); ?>

</body>
</html>