<?php
session_start();
if (empty($_SESSION['user'])) {
    header('Location: /');
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/form.css">
</head>
<body>
<header class="header">
    <h1><a href="../index.php">Главная</a></h1>
</header>

    <!-- Профиль -->

    <form class="list">
    <h2><?= $_SESSION['user']['full_name'] ?></h2>
    <p><?= $_SESSION['user']['date'] ?></p>
    <p><?= $_SESSION['user']['email'] ?><p>  
    <p><?= $_SESSION['user']['tel'] ?><p>  
    <p>
    <?php 
    $user_lang=$_SESSION['user']['lang'];
    $n=count( $user_lang);
             for($i=0;$i<$n;$i++){
              echo $user_lang[$i]." ";
            }
     ?>
    </p>
    <a href="vendor/logout.php">Выход</a>
    </form>


</body>
</html>