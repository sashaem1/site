<?php
session_start();
include 'bd.php';
$_SESSION['change_id'] = $_POST['id'];
$id = $_SESSION['change_id'];
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
$new = get_new($db, $id);
$comments = get_comments($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/change_new.css">
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
                <img src="img/newes/<?=$new[3]?>" alt="">
            </div>
            <div class="info">
                <h1><?=$new[1] ?></h1>
                <div class="about">
                    <?=$new[2] ?>
                </div>
            </div>
            <div class="feed">
                <div class="title">
                    <div class="btn">
                        <p>Редактировать</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="add_container">
                <div class="add_body">
                    <form action="actions\change_new.php" method="post" class="form" enctype="multipart/form-data">
                        <h2>Изменить новость</h2>
                        <label for="">Картинка новости</label>
                        <input type="file" name="new_img">
                        <label for="">Имя новости</label>
                        <input type="text" name="new_name">
                        <label for="">Текст новости</label>
                        <textarea  rows="10" name="new_text"></textarea>
                        <!-- <textarea type="text" name="new_text"> -->
                        <div class="buttons">
                            <button type="submit">Изменить новость</button>
                            <button type="button" class="can_btn1">Отмена</button>
                        </div>
                    </form>
                </div>
            </div>    
    </section>
                <script src="js\cange_new.js"></script>

    <? include ('footer.html')?>
</body>
</html>