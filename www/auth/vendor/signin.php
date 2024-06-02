<?php

    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = md5($_POST['password']);
    $i=0;
    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$login' AND `password` = '$password'");

    if (mysqli_num_rows($check_user) > 0) {
        $user = mysqli_fetch_assoc($check_user);
        $lang=mysqli_query($connect, "SELECT lang FROM lang WHERE(user_id='{$user['id']}');");
        $user_lang=[];
        while ($res = mysqli_fetch_array($lang)){
            $user_lang[$i]= $res['lang'];
            $i=$i+1;

          }
        $_SESSION['user'] = [
            "tel"=>$user['tel'],
            "id" => $user['id'],
            "full_name" => $user['fio'],
            "email" => $user['email'],
            "lang"=>$user_lang,
            "date"=>$user['year']
        ];

        header('Location: ../profile.php');

    } else {
        $_SESSION['message'] = 'Не верный логин или пароль';
        header('Location: ../auth.php');
    }
    ?>

<pre>
    <?php
    print_r($check_user);
    print_r($user);
    ?>
</pre>
