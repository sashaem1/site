<?php
    session_start();
//    require_once ('../bd.php');
include '../bd.php';
$data = connect_db();

    $name=$_POST['name'];
    $login=$_POST['login'];
    $pasword=$_POST['pasword'];
    $pasword_confirm=$_POST['pasword_confirm'];
    $file_name = $_FILES['ava']['name'];
    
    if($pasword === $pasword_confirm){
        $path = 'img/avatrs/'. $_FILES['ava']['name'];
        if(!move_uploaded_file($_FILES['ava']['tmp_name'], '../'. $path)){
            $_SESSION['msg']='Ошибка при загрузке изображения';
            header('Location: ../registr.php');      
        }

        $pasword = md5($pasword);

        mysqli_query($data, "INSERT INTO `пользователь` 
        (`id_пользователя`, `имя_пользователя`, `логин`, `пароль`, `фото_профиля`, `Тип_пользователя_тип_пользователя`) 
        VALUES (NULL, '$name', '$login', '$pasword', '$file_name', 'авторизованный')");

        $_SESSION['msg']='Регистрация прошла успешно';
        header('Location: ../autoris.php'); 
        
    } else {
        $_SESSION['msg']='Пароли не совпадают';
        header('Location: ../registr.php');
    }
?>