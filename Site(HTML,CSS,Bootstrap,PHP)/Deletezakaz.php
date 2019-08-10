<?php
$kzak=$_POST['kzak'];

// определяем начальные данные
    $hostname  = '';
    $basename   = '';
    $username = '';
    $passwordname  = '';
	
   $conn = new mysqli($hostname, $username, $passwordname, $basename) or die       ('Невозможно открыть базу');
   // Формируем запрос из таблицы с именем blog
	$sql = ("DELETE FROM Заказы WHERE Код_заказа = '$kzak'");
   // В цикле перебираем все записи таблицы и выводим их
   $conn->query($sql) or die   ('Ошибка, неправельно введены данные');
 if ($sql) echo "Запись успешно удалена";	
?>