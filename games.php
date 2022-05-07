<?php
require('bd.php');
$games = mysqli_query($data, "SELECT * FROM `игра`");
$games = mysqli_fetch_all($games);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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