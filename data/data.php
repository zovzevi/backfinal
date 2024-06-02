<h1>Все данные о пользователях</h1>
<div>
<table border='1'>
    <tr>
      <td>Идентификатор</td>
      <td>ФИО</td>
      <td>Телефон</td>
      <td>Почта</td>
      <td>Дата рождения</td>
      <td>Пол</td>
      <td>Языки програмирования</td>
    </tr>
    <?php
    $host='localhost';
    $user = 'u67389';
    $pass = '2833131';
    $db_name='u67389';
    $link =mysqli_connect($host,$user,$pass,$db_name);

    mysqli_set_charset($link,'utf8');
    
      $sql = mysqli_query($link, 'SELECT * FROM users');
      
      while ($result = mysqli_fetch_array($sql)) {
        $lang=mysqli_query($link, "SELECT lang FROM lang WHERE(user_id='{$result['id']}');");
        echo '<tr>' .
             "<td>{$result['id']}</td>" .
             "<td>{$result['fio']}</td>" .
             "<td>{$result['tel']} </td>" .
             "<td>{$result['email']} </td>" .
             "<td>{$result['year']} </td>" .
             "<td>{$result['gender']} </td>" ;
             
             echo "<td>";
             while ($res = mysqli_fetch_array($lang)){
              echo $res['lang'].' ';
            }
            echo"</td>";
        echo  "<td><a href='?del_id={$result['id']}'>Удалить</a></td>".'</tr>';    
      }
      if (isset($_GET['del_id'])) {
        $id = $_GET['del_id'];
        settype($id, 'integer');
        $lang=mysqli_query($link, "DELETE FROM lang WHERE user_id='$id'");
        $sql = mysqli_query($link, "DELETE FROM users WHERE id ='$id'");
        
      }
?>
</table>
</div>
