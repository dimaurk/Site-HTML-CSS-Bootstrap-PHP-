<?php

	include("include/db_connect.php");

?>


<!DOCTYPE html>
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stolbov - ворота</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/catalog.css">
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
          <li><a href="company_services.html">Услуги</a></li>
		  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Каталог товаров<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="fances.php">Заборы</a></li>
					<li><a href="wickets.php">Калитки</a></li>
					<li><a href="gates.php">Ворота</a></li>
					<li><a href="visors.php">Козырьки</a></li>
				</ul>
			</li>
          <li><a href="contacts.html">Контакты</a></li>
          <li><a  data-toggle="modal" data-target="#basicModal"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
		  <li><a data-toggle="modal" data-target="#madalpass"><i class="fa fa-user-o" aria-hidden="true"></i></a></li>
        </ul>
      </div>
    </div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="list-group">
				<a href="fances.php" class="list-group-item">Заборы</a>
				<a href="wickets.php" class="list-group-item">Калитки</a>
				<a href="gates.php" class="list-group-item">Ворота</a>
				<a href="visors.php" class="list-group-item">Козырьки</a>
			</div>
		</div>
		<div class="col-md-9">
	<div class="row">
		
	<?php
      $limit = 6;
      /*How may adjacent page links should be shown on each side of the current page link.*/
      $adjacents = 2;
      $sql = "SELECT COUNT(*) 'total_rows' FROM products";
      $res = mysqli_fetch_object(mysqli_query($link, $sql));
      $total_rows = $res->total_rows;
      $total_pages = ceil($total_rows / $limit);
      
      
      if(isset($_GET['page']) && $_GET['page'] != "") {
        $page = $_GET['page'];
        $offset = $limit * ($page-1);
      } else {
        $page = 1;
        $offset = 0;
      }
      $query  = "SELECT * FROM products WHERE (type = 'Забор') AND (visible = '1') LIMIT $offset, $limit";
      $result = mysqli_query($link, $query);
      if (mysqli_num_rows($result) > 0 ) 
		{
			$row = mysqli_fetch_array($result);

			do {
			echo('
								
				<div class="col-sm-4">
					<div class="product">
						<div class="product-img">
							<a href="#"><img src="img/fances/'.$row["image"].'" alt=""></a>
						</div>
						<p class="product-title">
							<a href="#">'.$row["title"].'</a>
						</p>
						<p><a href="#"><button  type="button" class="btn btn-primary">Подробнее</button></a>
						<a href="#"><button  type="button" class="btn btn-warning">В корзину</button></a></p>
						<p class="product-price">Цена: '.$row["price"].'</p>
					</div>
				</div>

				');
				}
			while ($row = mysqli_fetch_array($result));
		}

      //Here we generates the range of the page numbers which will display.
      if($total_pages <= (1+($adjacents * 2))) {
        $start = 1;
        $end   = $total_pages;
      } else {
        if(($page - $adjacents) > 1) { 
          if(($page + $adjacents) < $total_pages) { 
            $start = ($page - $adjacents);            
            $end   = ($page + $adjacents);         
          } else {             
            $start = ($total_pages - (1+($adjacents*2)));  
            $end   = $total_pages;               
          }
        } else {               
          $start = 1;                                
          $end   = (1+($adjacents * 2));             
        }
      }
      //If you want to display all page links in the pagination then
      //uncomment the following two lines
      //and comment out the whole if condition just above it.
      /*$start = 1;
      $end = $total_pages;*/
    ?>

			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-9">
		
<?php if($total_pages > 1) { ?>
	<nav aria-label="Навигация">
          <ul class="pagination justify-content-center">
            <!-- Link of the first page -->
            <li class='"page-item" <?php ($page <= 1 ? print 'disabled' : '')?>'>
              <a class="page-item" href='fances.php?page=1'>В начало</a>
            </li>
            <!-- Links of the pages with page number -->
            <?php for($i=$start; $i<=$end; $i++) { ?>
            <li class='"page-item" <?php ($i == $page ? print 'active' : '')?>'>
              <a class="page-item" href='fances.php?page=<?php echo $i;?>'><?php echo $i;?></a>
            </li>
            <?php } ?>
            <!-- Link of the last page -->
            <li class='"page-item" <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
              <a class="page-item" href='fances.php?page=<?php echo $total_pages;?>'>В конец</a>
            </li>
		  </ul>
	</nav>
       <?php } ?>
       <?php mysqli_close($link); ?>
    </div>
 </div>
</div>
		

<div class="modal fade" id="basicModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-header"><button class="close" type="button" data-dismiss="modal">x</button>
             <h2 class="modal-title" id="myModalLabel">Обратная связь</h2>
          </div>
			<div class="modal-body">
				<form name="MyForm" action="mail.php" method="post">
					<p><input class="input" name="name" type="text" style="width:40%" /> Ваше имя </p>
					<p><input class="input" name="email" type="text" style="width:40%" /> Электронная почта</p>
					<p><input class="input" name="sub" type="text" style="width:40%" /> Тема сообщения</p>
					<p>Текст сообщения:<br /><textarea name="body" cols="1" rows="5" style="width:70%" /></textarea></p>
					<p><input id="submit" value="Отправить" type="submit" /></p>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
function check() {
	if ($('#input').val() != '')
		$('#button123').removeAttr('disabled');
	else
		$('#button123').attr('disabled','disable'); 
	if ($('#input').val() === '')
	$('#button123').removeAttr('disabled');
}
</script>
<div class="modal fade" id="madalpass" tabindex="-1" role="dialog">
    <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-header"><button class="close" type="button" data-dismiss="modal">x</button>
             <h2 class="modal-title" id="myModalLabel" align=center>Вход администратором</h2>
          </div>
			<div class="modal-body">
				<form action="enter.php" method="post">
					<p align=center>Введите пароль: <input class="input" onkeyup="check();" type="password" name="paswd" style="width:35%" /></p>
					<p align=center><input value="Войти" name="submit" type="submit" id="button123" disabled="disabled" /></p>
				</form>
			</div>
		</div>
	</div>
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