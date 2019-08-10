<?php

$kto=$_POST['kto'];
$da=$_POST['da'];
$ko=$_POST['ko'];
$op=$_POST['op'];
$ic=$_POST['ic'];
$za=$_POST['za'];
$adr=$_POST['adr'];
// определяем начальные данные
    $hostname  = '';
    $basename   = '';
    $username = '';
    $passwordname  = '';
	
   $conn = new mysqli($hostname, $username, $passwordname, $basename) or die       ('Невозможно открыть базу');
   // Формируем запрос из таблицы с именем blog
	$sql = ("INSERT INTO Заказы (Код_товара, Дата_заказа, Количество, Описание, Исполнитель, Заказчик, Адрес_заказчика) VALUES ('$kto', '$da', '$ko', '$op', '$ic', '$za', '$adr')");
   // В цикле перебираем все записи таблицы и выводим их
   $conn->query($sql) or die   ('Ошибка, неправельно введены данные');
 if ($sql) echo "Добавлено в базу данных.";	
?>
