<?php
// require('data.php');
session_start();
require('bd.php');
if (!$_SESSION['user'] ) {
    header('Location: autoris.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/newes.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap" rel="stylesheet">
    <title>JuegosGeniales</title>
</head>
<body>
    <? include 'header.php'?>
    <section class="Content">
        <div class="container_ava">
            <div class="auto">
                <form action="actions/change_data.php" method="post" enctype="multipart/form-data" >
                    <!-- <label for="">Имя пользователя</label>
                    <input type="text" name="name"> -->
                    <div class="img_user">
                        <label for="">Аватар</label>
                        <input type="file" name="ava">
                        <div class="img_view">
                            <img src="img/avatrs/<?=$_SESSION['user']['ava']?>" alt=""> 
                            <img src="img/avatrs/<?=$_SESSION['user']['ava']?>" alt="">
                            <img src="img/avatrs/<?=$_SESSION['user']['ava']?>" alt="">
                        </div>
                    </div>
                    <label for="">Пароль</label>
                    <input type="pasword" name="pasword">
                    <label for="">Подтверждение пароля</label>
                    <input type="pasword" name="pasword_confirm">
                    <div class="buttons">
                        <button type="submit">Сохранить изменения</button>
                        <button type="submit" formaction="actions/logout.php">Выйти из аккаунта</button>
                    </div>
                    
                    <!-- <p>Есть аккаунт? <a href="autoris.php">Авторируйтесь</a>!</p> -->
                        <?php 
                             
                        ?>
                </form>
            </div>
        </div>
    </section>


    <? include ('footer.html')?>
</body>
</html>