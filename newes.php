<?php
// require('data.php');
//require('bd.php');
//$news = mysqli_query($data, "select новость.идентификатор_новости, название, содержание, изображение from изображение
//    join новость on изображение.Новость_идентификатор_новости = новость.идентификатор_новости
//    GROUP BY новость.идентификатор_новости, изображение
//    ORDER BY  новость.идентификатор_новости");
//    $news = mysqli_fetch_all($news);
include 'bd.php';
$db = connect_db();
$news = get_news($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/newes.css">
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
            <div class="newes">
                <?php 
                    for($j=0; $j<count($news); $j++) :
                ?>
                
                <div class="cart">
                    
                    <div class="cartImg">
                        <a href="new.php?id=<?= $news[$j][0] ?>"><img src="img/newes/<?=$news[$j][3]?>.jpg" alt=""></a>
                    </div>
                    <div class="info">
                        <p id="nameGame"><?=$news[$j][1] ?></p>
                        <?=$news[$j][2]?>
                    </div>
                    <form action="actions/delet_com.php" method="post">
                                <button class="cross" value="'. $comments[$j][0] . '" name="id" id="btn">
                                    <img src="img/cross2.svg" alt="">
                                </button>
                            </form >
                </div>
                <?php 
                endfor;
                ?>     
            </div>
        </div>
    </section>


    <? include ('footer.html')?>
</body>
</html>