<?php
include 'upload.php';
$flag = false;
if(!empty($_POST['name']) && !empty($_POST['gender']) && !empty($_POST['email'])){
    $flag = true;
    $name = filter_input(INPUT_POST, 'name',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $gender = $_POST['gender'];
    if(!file_exists('database/users.csv')){
        file_put_contents('database/users.csv','');
    }

    $fp = fopen('database/users.csv','a');
    fwrite($fp,"$name,$email,$gender,$filePath\n");
    fclose($fp);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        .container {
            width: 400px;
        }
    </style>
</head>
<body style="padding-top: 3rem;">

<div class="container">
    <?php
    if($flag){
        echo "User Added ".$_POST['name']."<br>";
        echo "Email ".$_POST['email'];
        echo " Gender ".$_POST['gender'];
    }else{
        echo "<p style = 'color:red'>Invalid Data</p>";
    }
    ?>
    <hr>
    <a class="btn" href="adduser.php">return back</a>
    <a class="btn" href="table.php">view list</a>
</div>
</body>
</html>
