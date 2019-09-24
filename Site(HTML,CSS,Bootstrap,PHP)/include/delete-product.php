<?php
 
require_once 'db_connect.php';
 
$sql = "DELETE FROM products WHERE id = '.$row['id'].'";
$query = $link->query($sql);
if($query === TRUE) {
  echo "<p>Удаление прошло успешно</p>";
  echo "<a href='../admin.php'><button type='button'>Ок</button></a>";
} else {
  echo "Ошибка удаления " . $sql . ' ' . $link->connect_error;
  echo "<a href='../admin.php'><button type='button'>Ок</button></a>";
}

$link->close();

?>