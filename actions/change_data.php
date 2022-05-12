<?php
    session_start();
//    require_once ('../bd.php');
    include '../bd.php';
    $data = connect_db();

    $old_name = $_SESSION['user']['name'];

    $name=$_POST['name'];
    $pasword=$_POST['pasword'];
    $pasword_confirm=$_POST['pasword_confirm'];
    $file_name = $_FILES['ava']['name'];

    $change_count = 0;

    $query = "UPDATE `пользователь` SET ";

    $id = mysqli_fetch_all(mysqli_query($data,"SELECT id_пользователя FROM `пользователь` WHERE имя_пользователя = '$old_name'"));
    $id = $id[0][0];

    // echo $id[0][0];

    if ($name != "" && strlen($name)>2) {
        $query = $query . "`имя_пользователя` = '$name'";
        $change_count +=1;
    }
    if ($pasword != "" && strlen($pasword)>2 && $pasword_confirm === $pasword) {
        if($change_count > 0) $query = $query .", ";
        $pasword = md5($pasword);
        $query = $query . "`пароль` = '$pasword'";
        $change_count +=1;
    }
    if ($file_name != "") {
        $path = 'img/avatrs/'. $_FILES['ava']['name'];
        if(!move_uploaded_file($_FILES['ava']['tmp_name'], '../'. $path)){
            $_SESSION['msg']='Ошибка при загрузке изображения';
            header('Location: ../registr.php');      
        }
        if($change_count > 0) $query = $query .", ";
        $query = $query . "`фото_профиля` = '$file_name'";
        $change_count +=1;
    }
    if($change_count>0){
        $query = $query . " WHERE `пользователь`.`id_пользователя` = $id";
        mysqli_query($data,$query);
    }
    // echo $query;

    $_SESSION['user']['ava']=$file_name;

    header('Location: ../profile.php');
?>