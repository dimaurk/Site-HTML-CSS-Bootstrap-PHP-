<?php
$kt=$_POST['kt'];
$kp=$_POST['kp'];
$n=$_POST['n'];
$k=$_POST['k'];
$t=$_POST['t'];
$c=$_POST['c'];
// определяем начальные данные
    $hostname  = '';
    $basename   = '';
    $username = '';
    $passwordname  = '';
	
   $conn = new mysqli($hostname, $username, $passwordname, $basename) or die       ('Невозможно открыть базу');
   // Формируем запрос из таблицы с именем blog
	$sql = ("INSERT INTO Товары (Код_товара, Код_поставщика, Название_товара, Категория, Тип_материала, Цвет) VALUES ('$kt', '$kp', '$n', '$k', '$t', '$c')");
   // В цикле перебираем все записи таблицы и выводим их
   $conn->query($sql) or die   ('Ошибка, неправельно введены данные');
 if ($sql) echo "Добавлено в базу данных.";	
?>
