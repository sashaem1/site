<?php
    session_start();
?>

<div class="Header">
    <div class="container">
        <div class="nav">
            <a href="index.php"><div class="logo">
                <img src="img/logo2.svg" alt="logo">
            </div></a>
            <ul class="menu">
                <!-- <li>
                    <a href="index.php">
                        Главная
                    </a>
                </li> -->
                <li>
                    <a href="newes.php">
                        Новости
                    </a>
                </li>
                <li>
                    <a href="games.php">
                        Игры
                    </a>
                </li>
                <li>
                    <a href="">
                        О нас
                    </a>
                </li>
                <!-- <div class="line"></div> -->
            </ul>
            <div class="ava">
                <a  href="profile.php"><img src="img/avatrs/<?=$_SESSION['user']['ava'] ? $_SESSION['user']['ava'] : 'noname.jpg' ?>" alt="ava"></a>
            </div>
        </div>
    </div>
</div>