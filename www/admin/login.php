<?php
session_start();

if (!empty($_SESSION['user'])) {
    header('Location: /');
}
if (!empty($_SESSION['admin'])) {
    header('Location: admin.php');
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Админ</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/form.css">
</head>

<header class="header">
    <h1><a href="../index.php">Главная</a></h1>
</header>

<body>

    <!-- Форма авторизации -->

    <form class="form" method="post" action="validation.php">
        <h2>Админ панель</h2>
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <button class="action-button" type="submit" class="login-btn">Войти</button>
     
        <?php
            if (!empty($_SESSION['message'])) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>

</body>
</html>