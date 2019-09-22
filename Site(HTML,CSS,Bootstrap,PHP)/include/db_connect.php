<?php
    $db_host  = 'localhost';
    $db_user   = 'admin';
    $db_pass = '12345';
    $db_database  = 'stolbov_db';
	
   $link = new mysqli($db_host, $db_user, $db_pass, $db_database);

    if (mysqli_connect_error()) 
    {
	die('Ошибка подключения (' . mysqli_connect_error() . ') '
    . mysqli_connect_error());
    } 
    
	mysqli_set_charset($link, "UTF-8");
?>