<?php
    session_start();
    require_once ('../bd.php');

    $login=$_POST['login'];
    $pasword=$_POST['pasword'];
    $pasword = md5($pasword);
    
    $check_user = mysqli_query($data, "SELECT * FROM `пользователь` WHERE логин = '$login' AND пароль = '$pasword'");

    
    if(mysqli_num_rows($check_user) > 0){
        $user = mysqli_fetch_assoc($check_user );

        $_SESSION['user'] = [
            "name" => $user['имя_пользователя'],
            "ava" => $user['фото_профиля'],
            "type" => $user['Тип_пользователя_тип_пользователя']
        ];
        header('Location: ../profile.php');
        
    } else {
        $_SESSION['msg']='Неправильные логин или пароль';
        header('Location: ../autoris.php');
    }
?>