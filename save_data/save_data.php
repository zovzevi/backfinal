
<?php

header('Content-Type: text/html; charset=UTF-8');
include('connect.php');
$user = 'u67389';
$pass = '2833131';

try {
    $db_conn = new PDO('mysql:host=localhost;dbname=u67389', $user, $pass,
    [PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
	
} catch (PDOException $e) {
	die($e->getMessage());
}

$fio=$_POST['fio'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$date=$_POST['date'];
$gender=$_POST['gender'];
$pass=md5($_POST['pass']);


if ($db_conn){
 
$stmt = $db_conn->prepare("INSERT INTO users (fio, tel, email, year,gender,password) VALUES (:fio, :tel, :email,:year,:gender,:password)");
$stmt->bindParam(':fio', $fio);
$stmt->bindParam(':tel', $tel);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':year', $date);
$stmt->bindParam(':gender', $gender);
$stmt->bindParam(':password', $pass);
$stmt->execute();
if (!empty($_POST['choice'])){
$lang=$_POST['choice'];
$insert_id = $db_conn->lastInsertId();
$n=count($lang);
  for($i=0;$i<$n;$i++){
    
    $stmt = $db_conn->prepare("INSERT INTO lang (user_id,lang) VALUES (:user_id, :lang)");
    $stmt->bindParam(':user_id', $insert_id);
    $stmt->bindParam(':lang', $lang[$i]);
    $stmt->execute();
  }
}
  header('Location: ../auth.php');
  exit();

}
else {
  header('Location: www/index.php');
  echo 'Не удалось добавить пользователя';
  exit();
}



?>



