<?php
    session_start();
    // unset($_SESSION['user']);
    include '../bd.php';
    $db = connect_db();

    $id = $_POST["id"];

    mysqli_query($db,"DELETE FROM `комментарий` WHERE `комментарий`.`идентификатор_комментария` ='$id'");
    header("Location: ".$_SERVER['HTTP_REFERER']);
?>