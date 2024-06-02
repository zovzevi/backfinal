<?php

    $connect = mysqli_connect('localhost', 'u67389', '2833131', 'u67389');

    if (!$connect) {
        die('Error connect to DataBase');
    }