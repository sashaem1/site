<?php
    session_start();
    //    require_once ('../bd.php');
        include '../bd.php';
        $db = connect_db();
    
        $text ="<p>".$_POST['new_text']."</p>";
        $name = $_POST['new_name'];
        $file_name = $_FILES['new_img']['name'];

        $path = 'img/newes/'. $_FILES['new_img']['name'];
        if(!move_uploaded_file($_FILES['new_img']['tmp_name'], '../'. $path)){
            $_SESSION['msg']='Ошибка при загрузке изображения';
            echo "asdASDSADASD";
            header("Location: "."../newes.php");     
        }

        mysqli_query($db,"INSERT INTO `новость` (`идентификатор_новости`, `название`, `содержание`) VALUES (NULL, '$name', '$text')");
        $news = mysqli_query($db,"SELECT идентификатор_новости FROM `новость` 
        ORDER BY идентификатор_новости DESC");
        $news = mysqli_fetch_array($news);
        $id = $news[0];
        // echo "хуц";
        // echo count($news)-1;
        // echo $id;
        // echo "хуй";

        mysqli_query($db,"INSERT INTO `изображение` (`id`, `изображение`, `Новость_идентификатор_новости`, `Игра_идентификатор_игры`) VALUES (NULL, '$file_name', '$id', NULL)");

        header("Location: ".$_SERVER['HTTP_REFERER']);
?>