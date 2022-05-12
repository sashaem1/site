<?php
    session_start();
//    require_once ('../bd.php');
include '../bd.php';
$data = connect_db();

    $text = $_POST['text'];
    $name = $_SESSION['user']['name'];
    $time = date("Y-m-d H:i:s");
    $id = $_SESSION['game_id'];
    $grade = $_POST['grade'];

    mysqli_query($data, "INSERT INTO `отзыв` (`идентификатор_отзыва`, `имя_пользователя`, `идентификатор_игры`, `рейтинг`, `текст`, `дата`) VALUES 
    (NULL, '$name', '$id', '$grade', '$text', '$time')");

header("Location: ".$_SERVER['HTTP_REFERER']);