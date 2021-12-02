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
if($_GET['action'] == 'Tulis'){
    $action = "Tulis";
}
if($_GET['action'] == 'Edit'){
    $action = "Edit";
    $title = $_GET['title'];
}
if($_GET['action'] == 'Hapus'){
    $action = "Hapus";
    $title = $_GET['title'];
}
$post_action = '<div class="card " id="main-content" style="width:85%;margin-top:1%;">
<a id="main-content-info"><?php echo $date;?></a>
<div class="card-body" id="main-content-body">
  <h3 class="card-title" id="main-content-title"><?php echo $action;?> Postingan</h3>
  <p class="card-text" id="main-content-text"></p>

  <form action="" method="POST">
<div class="form-group" id="post-form">
<hr>
    <label for="post-title-field">Judul</label>
    <input type="text" name = "post-title" class="form-control" id="post-title-field" placeholder="Judul postingan">
    <label for="post-desc-field">Deskripsi</label>
    <input type="text" name = "post-desc" class="form-control" id="post-desc-field" placeholder="Deskripsi">
    <label for="post-post-field">Isi post</label>
    <textarea type="text" name = "post-content" class="form-control" id="post-post-field" placeholder="Isi post" rows=20></textarea>
</div>
<button type="submit" class="btn btn-primary" id="btn-submit">Submit</button>
</form>
    
    
    <h5 class="card-text"><h5>
</div>
</div>';
$date = date('Y/m/d');
$action = $_GET["action"];

if($action == "Edit"){
    $get_query = mysqli_query($conn, "SELECT post_title, post_desc, post_content, poster, post_date FROM tb_post WHERE post_title = '$title';");
    $get_post = mysqli_fetch_assoc($get_query);
    $isedit= True;
    if(empty($get_post)){
        header("location: index.php");
    }
    else{
        if($get_post['poster'] != $user){
            header("location: index.php");
        }
        else{
            
            $post_action = '<div class="card " id="main-content" style="width:85%;margin-top:1%;">
            <a id="main-content-info">'.$date.'</a>
            <div class="card-body" id="main-content-body">
              <h3 class="card-title" id="main-content-title">Edit Postingan</h3>
              <p class="card-text" id="main-content-text"></p>
        
              <form action="" method="POST">
            <div class="form-group" id="post-form">
            <hr>
                <label for="post-title-field">Judul</label>
                <input type="text" name = "post-title" class="form-control" id="post-title-field" placeholder="Judul post"ingan value="'.$get_post["post_title"].'" disabled>
                <label for="post-desc-field">Deskripsi</label>
                <input type="text" name = "post-desc" class="form-control" id="post-desc-field" placeholder="Deskripsi" value = "'.$get_post["post_desc"].'">
                <label for="post-post-field">Isi post</label>
                <textarea type="text" name = "post-content" class="form-control" id="post-post-field" placeholder="Isi post" rows=20>'.$get_post["post_content"].'</textarea>
            </div>
            <button type="submit" class="btn btn-primary" id="btn-submit">Submit</button>
            <a href="post.php?action=Hapus&title='.$title.'" class="btn btn-danger" id="prompt-delete">HAPUS POST</a>
            
        </form>
                
                
                <h5 class="card-text"><h5>
            </div>
          </div>';
        }
    }
}
elseif($action == "Tulis"){
    $post_action = '<div class="card " id="main-content" style="width:85%;margin-top:1%;">
    <a id="main-content-info">'.$date.'</a>
    <div class="card-body" id="main-content-body">
      <h3 class="card-title" id="main-content-title">Tulis Postingan</h3>
      <p class="card-text" id="main-content-text"></p>

      <form action="" method="POST">
    <div class="form-group" id="post-form">
    <hr>
        <label for="post-title-field">Judul</label>
        <input type="text" name = "post-title" class="form-control" id="post-title-field" placeholder="Judul postingan">
        <label for="post-desc-field">Deskripsi</label>
        <input type="text" name = "post-desc" class="form-control" id="post-desc-field" placeholder="Deskripsi" >
        <label for="post-post-field">DIsi</label>
        <textarea type="text" name = "post-content" class="form-control" id="post-post-field" placeholder="Isi post" rows=20></textarea>
    </div>
    <button type="submit" class="btn btn-primary" id="btn-submit">Submit</button>
    </form>
    </div>
    </div>';
}
elseif($action == "Hapus"){
    $get_query = mysqli_query($conn, "SELECT post_title, post_desc, post_content, poster, post_date FROM tb_post WHERE post_title = '$title';");
    $get_post = mysqli_fetch_assoc($get_query);
    if(empty($get_post)){
        header("location: index.php");
    }
    else{
        if($get_post['poster'] != $user){
            header("location: index.php");
        }
        else{
            $delete_comments = mysqli_query($conn, "DELETE FROM tb_comments WHERE post_title = '$title'");
            $delete_post = mysqli_query($conn, "DELETE FROM tb_post WHERE post_title = '$title'");
            header("location: index.php");
        }
    }
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
        #prompt-return{
            text-decoration:none;
            text-align:right;
            float:right;
            margin-right: 1%;
            color: tomato;
            font-size:110%;
            font-weight:bold;
            

        }
        #prompt-delete{
            text-decoration:none;
            text-align:right;
            float:right;
            margin-right:1%;
            font-weight:bold;
            font-size:110%;
        }
        
    </style>
</head>
<body>
    
<?php
    include "html/header.php";

    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $error = "";
        

        if($isedit == false){
        $post_title = htmlspecialchars($_POST["post-title"]);
        $post_desc = htmlspecialchars($_POST["post-desc"]);
        $post_content = htmlspecialchars($_POST["post-content"]);
            if(empty($post_title) || empty($post_desc) || empty($post_content)){
                echo $error ;
            }
            else{
                $tulis_query = mysqli_query($conn, "INSERT INTO tb_post (post_title,post_desc,post_content,poster,post_date) VALUES('$post_title','$post_desc','$post_content','$user','$date') ");
                $error ="working";
                header("Location: index.php");
                
            }
        }
        else{
            $post_desc = htmlspecialchars($_POST["post-desc"]);
            $post_content = htmlspecialchars($_POST["post-content"]);
            if(empty($post_desc) || empty($post_content)){
                echo $error ;
            }
            else{
                $update_query = mysqli_query($conn, "UPDATE tb_post SET post_desc = '$post_desc', post_content = '$post_content' WHERE post_title = '$title'");
                $error = "Updated";
                echo $error;
                header("Location: index.php");
            }
        }
    }
        
echo $post_action;
?>



<br><br><br>
<?php
    include "html/footer.php";
?>

</body>
</html>