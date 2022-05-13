<?php
session_start();
include 'bd.php';
$_SESSION['com_id'] = $_GET['id'];
//$news = mysqli_query($data, "select новость.идентификатор_новости, название, содержание, изображение from изображение
//join новость on изображение.Новость_идентификатор_новости = новость.идентификатор_новости
//GROUP BY новость.идентификатор_новости, изображение
//ORDER BY  новость.идентификатор_новости");
//$news = mysqli_fetch_all($news);
//// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//$coments = mysqli_query($data, "SELECT DISTINCT идентификатор_комментария, идентификатор_родителя,
//идентификатор_новости, комментарий.имя_пользователя, текст, фото_профиля 
//FROM `комментарий` join пользователь on пользователь.имя_пользователя = комментарий.имя_пользователя");
//$coments = mysqli_fetch_all($coments);

$db = connect_db();
$news = get_news($db);
$comments = get_comments($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/new.css">
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
                <img src="img/newes/<?=$news[$_GET['id']-1][3]?>.jpg" alt="">
            </div>
            <div class="info">
                <h1><?=$news[$_GET['id']-1][1] ?></h1>
                <div class="about">
                    <?=$news[$_GET['id']-1][2] ?>
                </div>
            </div>
            <div class="feed">
                <div class="title">
                    <h1>Комментарии</h1>
                        <!-- <script src="js/com_btn.js"> -->
                            <?php 
                                if($_SESSION['user']) echo '
                                    <div class="btn">
                                            <p>Комментировать</p>
                                    </div>';
                            ?>
                        <!--</script> -->
                </div>
                <?php 
                    for($j=0; $j<count($comments); $j++) :
                        if($_GET['id'] == $comments[$j][2]) :
                ?>
                <div class="cart">
                    <div class="user_ava">
                        <img src="img/avatrs/<?=$comments[$j][5]?>" alt="">
                    </div>
                    <div class="comment">
                        <div class="user_name">
                            <h2><?=$comments[$j][3] ?></h2>
                            <?php 
                            if($_SESSION['user']['type'] === "администратор" || $_SESSION['user']['name'] === $comments[$j][3])
                             echo '<form action="actions/delet_com.php" method="post">
                                <button class="cross" value="'. $comments[$j][0] . '" name="id" id="btn">
                                    <img src="img/cross2.svg" alt="">
                                </button>
                            </form >';
                            ?>
                        </div>
                        <p><?=$comments[$j][4] ?></p>
                    </div>
                </div>
                <?php 
                endif;
                endfor;
                ?> 
            </div>
        </div>
    </section>
                <script src="js/com_btn.js"></script>

    <? include ('footer.html')?>
</body>
</html>