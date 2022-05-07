<?php
require('data.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap" rel="stylesheet">
    <title>JuegosGeniales</title>
</head>
<body>
    <? include 'header.php'?>

    <div class="Content">
        <div class="container">
            <div class="offer">
                <h1>Студия разработки игр и ПО различного назначения</h1>
                <p>У нас найдутся игры для людей всех возрастов самых разных жанров. Так же вы сможете ознакомится с отзывами других пользователей и оставить свой</p>
                <a href="games.php"> <div class="btn">
                    <p>Попробовать</p>
                </div> </a>
            </div>  
            <div class="carts">
                <a href=""><div class="cart">
                    <img src="img/home/about.svg" alt="">
                    <p>О нас</p>
                </div></a>
                <a href="newes.php"><div class="cart">
                    <img src="img/home/news.svg" alt="">
                    <p>Новости</p>
                </div></a>
            </div>
        </div>
    </div>

    <? include ('footer.html')?>
</body>
</html>