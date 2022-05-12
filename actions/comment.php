<?php
    session_start();
//    require_once ('../bd.php');
    include '../bd.php';
    $data = connect_db();

    $text = $_POST['text'];
    $name = $_SESSION['user']['name'];
    $time = date("Y-m-d H:i:s");
    $id = $_SESSION['com_id'];

    mysqli_query($data, "INSERT INTO `комментарий` (`идентификатор_комментария`, `идентификатор_родителя`, `идентификатор_новости`, `имя_пользователя`, `текст`, `дата`) VALUES 
    (NULL, NULL, '$id', '$name', '$text', '$time')");

header("Location: ".$_SERVER['HTTP_REFERER']);