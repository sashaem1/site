<?php
session_start();
// require('data.php');
require('bd.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/newes.css">
    <link rel="stylesheet" href="css/autoris.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap" rel="stylesheet">
    <title>JuegosGeniales</title>
</head>
<body>
    <? include 'header.php'?>
    <section class="Content">
        <div class="container">
            <div class="auto">
                <form action="actions/singup.php" method="post" enctype="multipart/form-data" >
                    <label for="">Имя пользователя</label>
                    <input type="text" name="name">
                    <label for="">Логин</label>
                    <input type="text" name="login">
                    <label for="">Аватар</label>
                    <input type="file" name="ava">
                    <label for="">Пароль</label>
                    <input type="pasword" name="pasword">
                    <label for="">Подтверждение пароля</label>
                    <input type="pasword" name="pasword_confirm">
                    <button type="submit">Зарегистрироваться</button>
                    <p>Есть аккаунт? <a href="autoris.php">Авторируйтесь</a>!</p>
                        <?php 
                            if($_SESSION){
                                echo '<p class="msg">'.  $_SESSION['msg'] . '</p>';
                            }
                            unset($_SESSION['msg']); 
                        ?>
                </form>
            </div>
        </div>
    </section>


    <? include ('footer.html')?>
</body>
</html>