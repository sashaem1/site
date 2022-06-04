<?php
    session_start();
    //    require_once ('../bd.php');
        include '../bd.php';
        $db = connect_db();
    
        $text ="<p>".$_POST['new_text']."</p>";
        $name = $_POST['new_name'];
        $file_name = $_FILES['new_img']['name'];

        $id = $_SESSION['change_id'];

        $change_count = 0;

        $query = "UPDATE `новость` SET "; 

        if ($file_name != "") {
            $path = 'img/newes/'. $_FILES['new_img']['name'];
            if(!move_uploaded_file($_FILES['new_img']['tmp_name'], '../'. $path)){
                $_SESSION['msg']='Ошибка при загрузке изображения';
                header('Location: ../profile.php');      
            }
            
            mysqli_query($db,"UPDATE `изображение` SET `изображение` = '$file_name' 
            WHERE `изображение`.`Новость_идентификатор_новости` = '$id'");
    
        }

        if ($name != "") {
            $query = $query . "`название` = '$name'";
            $change_count++;
        }

        if ($text != "") {
            if($change_count>0) $query = $query . ", ";
            $query = $query . "`содержание` = '$text'";
            $change_count++;
        }

        if($change_count>0){
            $query = $query . " WHERE `новость`.`идентификатор_новости` = '$id'";
            mysqli_query($db,$query);
        }

        header('Location: ../newes.php');
?>