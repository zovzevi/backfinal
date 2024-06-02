
<?php
function clear_data($val){
    $val = trim($val);
    $val = stripslashes($val);
    $val = strip_tags($val);
    $val = htmlspecialchars($val);
    return $val;
}
 
$name = clear_data($_POST['name']);
$num = clear_data($_POST['num']);
$phone = clear_data($_POST['phone']);
$email = clear_data($_POST['email']);
$ip = clear_data($_POST['ip']);
$url = clear_data($_POST['url']);
$text = clear_data($_POST['text']);
 
$pattern_phone = '/^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/';
 
$pattern_name = '/^[А-ЯЁ][а-яё]*$/';
$err = [];
$flag = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  
    if (preg_match($pattern_name, $name)){
        $err['name'] = '<small class="text-danger">Здесь только русские буквы</small>';
        $flag = 1;
    }
    if (mb_strlen($name) > 10 || empty($name)){
        $err['name'] = '<small class="text-danger">Имя должно быть не больше 10 символов</small>';
        $flag = 1;
    }
    if (!filter_var($num, FILTER_VALIDATE_INT) || strlen($num) > 2){
        $err['num'] = '<small class="text-danger">Здесь должно быть только двузначное число</small>';
        $flag = 1;
    }
    if (empty($num)){
        $err['num'] = '<small class="text-danger">Поле не может быть пустым</small>';
        $flag = 1;
    }
    if (!preg_match($pattern_phone, $phone)){
        $err['phone'] = '<small class="text-danger">Формат телефона не верный!</small>';
        $flag = 1;
    }
    if (empty($phone)){
        $err['phone'] = '<small class="text-danger">Поле не может быть пустым</small>';
        $flag = 1;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $err['email'] = '<small class="text-danger">Формат Email не верный!</small>';
        $flag = 1;
    }
    if (empty($email)){
        $err['email'] = '<small class="text-danger">Поле не может быть пустым</small>';
        $flag = 1;
    }
    if (!filter_var($ip, FILTER_VALIDATE_IP)){
        $err['ip'] = '<small class="text-danger">Формат ip не верный!</small>';
        $flag = 1;
    }
    if (empty($ip)){
        $err['ip'] = '<small class="text-danger">Поле не может быть пустым</small>';
        $flag = 1;
    }
    if (!filter_var($url, FILTER_VALIDATE_URL)){
        $err['url'] = '<small class="text-danger">Формат url не верный!</small>';
        $flag = 1;
    }
    if (empty($url)){
        $err['url'] = '<small class="text-danger">Поле не может быть пустым</small>';
        $flag = 1;
    }
    if (empty($text)){
        $err['text'] = '<small class="text-danger">Поле не может быть пустым</small>';
        $flag = 1;
    }
    if ($flag == 0){
        Header("Location:". $_SERVER['HTTP_REFERER']."?mes=success");
    }
}
if ($_GET['mes'] == 'success'){
    $err['success'] = '<div class="alert alert-success">Сообщение успешно отправлено!</div>';
    
}


?>