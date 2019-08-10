<?php
$k=$_POST['k'];
$i=$_POST['i'];
$a=$_POST['a'];
$n=$_POST['n'];
// определяем начальные данные
    $hostname  = '';
    $basename   = '';
    $username = '';
    $passwordname  = '';
	
   $conn = new mysqli($hostname, $username, $passwordname, $basename) or die       ('Невозможно открыть базу');
   // Формируем запрос из таблицы с именем blog
	$sql = ("INSERT INTO Поставщики (Код_поставщика, Название_поставщика, Адрес_поставщика, Телефон_поставщика) VALUES ('$k', '$i', '$a', '$n')");
   // В цикле перебираем все записи таблицы и выводим их
   $conn->query($sql) or die   ('Ошибка, неправельно введены данные');
 if ($sql) echo "Добавлено в базу данных.";	
?>
