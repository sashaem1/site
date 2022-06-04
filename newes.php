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
                        <a href="new.php?id=<?= $news[$j][0] ?>"><img src="img/newes/<?=$news[$j][3]?>" alt=""></a>
                    </div>
                    <div class="info">
                        <p id="nameGame"><?=$news[$j][1] ?></p>
                        <?=$news[$j][2]?>
                    </div>
                    <?php
                    if($_SESSION['user']['type'] === "администратор")
                     echo '<form action="actions/delet_news.php" method="post">
                                <button class="pencil"  formaction="change_new.php" value="'. $news[$j][0] . '" name="id" id="btn1">
                                    <img src="img/pencil2.svg" alt="">
                                </button>
                                <button class="cross" value="'. $news[$j][0] . '" name="id" id="btn2">
                                    <img src="img/cross2.svg"  alt="">
                                </button>
                                
                            </form >';
                    ?>        
                </div>
                <?php 
                endfor;
                if($_SESSION['user']['type'] === "администратор"):
                ?>
                <div class="cart" id="add"> 
                    
                    <div class="addImg">
                        <img src="img/plus2.png" alt="">
                    </div>
                    <div class="info">
                        <p id="nameGame">Добавить новую новость</p>
                    </div>
                    <button class="add_btn"></button>
                </div>    
                <?php endif; ?>    
            </div>
            <div class="add_container">
                <div class="add_body">
                    <form action="actions\add_news.php" method="post" class="form" enctype="multipart/form-data">
                        <h1>Добавить новость</h1>
                        <label for="">Картинка новости</label>
                        <input type="file" name="new_img">
                        <label for="">Имя новости</label>
                        <input type="text" name="new_name">
                        <label for="">Текст новости</label>
                        <textarea  rows="10" name="new_text"></textarea>
                        <!-- <textarea type="text" name="new_text"> -->
                        <div class="buttons">
                            <button type="submit">Добавить новость</button>
                            <button type="submit" formaction="" id="can_btn1">Отмена</button>
                        </div>
                    </form>
                </div>
            </div>
            
        
    </section>

    <script src="js/add_new2.js"></script>
    <? include ('footer.html')?>
</body>
</html>