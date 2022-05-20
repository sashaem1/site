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
    <link rel="stylesheet" href="css/add_new.css">
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
           <form class="main_form" action="add_news.php">
               <div class="add_btns">
                    <button type="button" class="add_img_main" formaction="">
                        добавить основное изображение
                    </button>
                    <button type="button" class="add_txt_main" formaction="">
                        добавить название
                    </button>
                    <button type="button" class="add_img" formaction="">
                        добавить изображение
                    </button>
                    <button type="button" class="add_txt" formaction="">
                        добавить текст
                    </button>
               </div>
               <button class="add_new_btn">
                        добавить текст
                    </button>
           </form>
            
        </div>
    </section>
                <script src="js/add_new.js"></script>

    <? include ('footer.html')?>
</body>
</html>