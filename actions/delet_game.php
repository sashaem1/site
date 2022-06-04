<?php
    session_start();
    // unset($_SESSION['user']);
    include '../bd.php';
    $db = connect_db();

    $id = $_POST["id"];

    mysqli_query($db,"DELETE FROM `отзыв` WHERE `отзыв`.`идентификатор_игры` = '$id'");
    mysqli_query($db,"DELETE FROM `игра` WHERE `игра`.`идентификатор_игры` = '$id'");
    header("Location: ".$_SERVER['HTTP_REFERER']);
?>