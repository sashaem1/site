<?php
session_start();
require('bd.php');
$_SESSION['game_id'] = $_GET['id'];
$games = mysqli_query($data, "SELECT * FROM `игра`");
$games = mysqli_fetch_all($games);
$coments = mysqli_query($data, "SELECT DISTINCT идентификатор_отзыва, отзыв.имя_пользователя,
идентификатор_игры, рейтинг, текст, фото_профиля 
FROM `отзыв` join пользователь on пользователь.имя_пользователя = отзыв.имя_пользователя");
$coments = mysqli_fetch_all($coments);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/cart.css">
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
            <div class="mainImg">
                <img src="img/games/<?=$games[$_GET['id']-1][1]?>.jpg" alt="">
            </div>
            <div class="info">
                <h1><?=$games[$_GET['id']-1][2] ?></h1>
                <div class="about">
                    <p><?=$games[$_GET['id']-1][3]?></p>
                </div>
            </div>
            <div class="feed">
                <div class="title">
                    <h1>Отзывы</h1>
                        <?php 
                            if($_SESSION['user']) echo '
                                <div class="btn">
                                     <p>Коментировать</p>
                                </div>';
                        ?>
                </div>
                
                <?php 
                    for($j=0; $j<count($coments); $j++) :
                        if($_GET['id'] == $coments[$j][2]) :
                ?>
                <div class="cart">
                    <div class="user_ava">
                        <img src="img/avatrs/<?=$coments[$j][5]?>" alt="">
                    </div>
                    <div class="comment">
                        <h2><?=$coments[$j][1] ?></h2>
                        <p><?=$coments[$j][4] ?></p>
                    </div>
                </div>
                <?php 
                endif;
                endfor;
                ?> 
            </div>
        </div>
    </section>

    <script src="js/rev_btn.js"></script>
    <? include ('footer.html')?>
</body>
</html>