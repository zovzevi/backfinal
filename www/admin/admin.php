<?php
session_start();
if (!empty($_SESSION['user'])) {
    header('Location: /');
}
if (empty($_SESSION['admin'])) {
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
    <h2>Админ<h2>
    <a href="logout.php">Выход</a>
    </form>
    <?php include('../../data/data.php')?>


</body>
</html>