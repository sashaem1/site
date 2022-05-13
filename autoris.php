<?php
session_start();
//require('bd.php');
include 'bd.php';
$data = connect_db();
if ($_SESSION['user'] ) {
    header('Location: profile.php');
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
        <div class="container_ava">
            <div class="auto">
                <form action="actions/singin.php" method="post" >
                    <label for="">Логин</label>
                    <input type="text" name="login">
                    <label for="">Пароль</label>
                    <input type="pasword" name="pasword">
                    <button type="submit">Войти</button>
                    <p>Нет аккаунта? <a href="registr.php">Зарегистрируйтесь</a>!</p>
                    <?php 
                            if($_SESSION['msg']){
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