<?php
    session_start();
    // unset($_SESSION['user']);
    include '../bd.php';
    $db = connect_db();

    $id = $_POST["id"];

    
    mysqli_query($db,"DELETE FROM `изображение` WHERE `изображение`.`Новость_идентификатор_новости` = '$id'");
    mysqli_query($db,"DELETE FROM `комментарий` WHERE `комментарий`.`идентификатор_новости` = '$id'");
    mysqli_query($db,"DELETE FROM `новость` WHERE `новость`.`идентификатор_новости` ='$id'");
    header("Location: ".$_SERVER['HTTP_REFERER']);
?>