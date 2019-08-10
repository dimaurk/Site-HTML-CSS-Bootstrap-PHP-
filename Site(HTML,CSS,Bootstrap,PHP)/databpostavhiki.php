﻿<html>
  <head>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/main.css">
  </head>
<body>

<div class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">ST<i class="fa fa-circle"></i>LBO</i><i class="fa fa-vimeo"></i></a>
      </div> 
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
		  <li><a href="search.html">Поиск</a></li>
          <li><a href="uslugy.html">Услуги</a></li>
		  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Каталог товаров<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="zabory.html">Заборы</a></li>
					<li><a href="kalitki.html">Калитки</a></li>
					<li><a href="vorota.html">Ворота</a></li>
					<li><a href="kozurki.html">Козырьки</a></li>
				</ul>
			</li>
          <li><a href="kontakty.html">Контакты</a></li>
          <li><a href="admin579stolbov.html">Назад</a></li>
        </ul>
      </div>
    </div>
</div>
<div class="container">
<?
// определяем начальные данные
    $hostname  = '';
    $basename   = '';
    $username = '';
    $passwordname  = '';

   $conn = new mysqli($hostname, $username, $passwordname, $basename) or die       ('Невозможно открыть базу');
   // Формируем запрос из таблицы с именем blog
   $sql = "SELECT * FROM `Поставщики`";
   $result = $conn->query($sql); 
   // В цикле перебираем все записи таблицы и выводим их
   
   {
 // выводим на страницу сайта заголовки HTML-таблицы
  echo '<table border="1">';
  echo '<thead>';
  echo '<tr>';
  echo '<th>Код_поставщика</th>';
  echo '<th>Название_поставщика</th>';
  echo '<th>Адрес_поставщика</th>';
  echo '<th>Телефон_поставщика</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
  
   // выводим в HTML-таблицу все данные клиентов из таблицы MySQL 
   while ($data = $result->fetch_assoc()){
    echo '<tr>';
    echo '<td align=center>' . $data['Код_поставщика'] . '</td>';
    echo '<td align=center>' . $data['Название_поставщика'] . '</td>';
    echo '<td align=center>' . $data['Адрес_поставщика'] . '</td>';
	echo '<td align=center>' . $data['Телефон_поставщика'] . '</td>';
    echo '</tr>';
  }
  
    echo '</tbody>';
  echo '</table>';
   }
?>
</div>

<div class="collslast">
		<div class="container">
		<h5 align="center">@StolbovCampanies</h5>
		</div>
	</div>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>