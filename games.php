<?php

// подключение к бд и запрос выборки игр 
include 'bd.php';
$db = connect_db();

if ($_GET['sort_id']) {
    $id = strip_tags($_GET['sort_id']);
    $games = get_games($db, $id);
    for($i = 0; $i < count($games); $i++) {
        printf('<div class="cart" >
                    <div class="cartImg">
                    <a href="cart.php?id=%s"><img href="img/games/%s.jpg" src="img/games/%s.jpg" alt=""></a>
                    </div>
                    <div class="info">
                        <p id="nameGame" >%s</p>
                        <!-- <p>%s</p> -->
                    </div>
                </div>', $games[$i][0], $games[$i][1], $games[$i][1], $games[$i][2], $games[$i][3]);
    }
    exit();
} else {
    $games = get_games($db);
}
    //---------------------------------
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type = "text/javascript" src="js/jquery.js"></script>  
    <script type = "text/javascript" src="js/script.js"></script>  
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/game.css">
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
            <? include 'left_menu.html'?>
            <div class="game">
            <?php 
            for($j=0; $j < count($games);$j++) :
                // if(count($carts[$i]['feed']) > 3) :
            ?>
                <div class="cart" >
                    <div class="cartImg">
                    <a href="cart.php?id=<?= $games[$j][0] ?>"><img href="img/games/<?=$games[$j][1]?>.jpg" src="img/games/<?=$games[$j][1]?>.jpg" alt=""></a>
                    </div>
                    <div class="info">
                        <p id="nameGame" ><?= $games[$j][2] ?></p>
                        <!-- <p><?= $games[$j][3] ?></p> -->
                    </div>
                </div>
            <?php 
            // endif;
            endfor;
            ?>                    
            </div>
        </div>
    </div>


    <? include ('footer.html')?>
</body>
</html>