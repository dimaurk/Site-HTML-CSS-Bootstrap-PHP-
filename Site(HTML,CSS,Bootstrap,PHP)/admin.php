<?php 

include("include/db_connect.php");

?>

<!DOCTYPE html>
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stolbov - заборы, ворота, калитки</title>
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
          <li><a href="index.html">Выйти</a></li>
        </ul>
      </div>
    </div>
  </div>

<div class="container">
  <a data-toggle="modal" data-target="#addTovar">
    <button type="button" class="btn btn-primary btn-lg" style="width:30%">Добавить товар</button>
  </a>
</div>

<div class="modal fade" id="addTovar" tabindex="-1" role="dialog">
    <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-header"><button class="close" type="button" data-dismiss="modal">x</button>
             <h2 class="modal-title" id="myModalLabel">Добавление товара</h2>
          </div>

            <div class="modal-body">
              <form name="MyForm" action="include/add-product.php" method="post">
                
                <div class="form-group">
                  <label>Имя изображения <span class="text-danger">*</span></label>
                  <input type="text" name="image" id="image" class="form-control" placeholder="Например: img1.jpg" required>
                </div>
                
                <div class="form-group"> 
                  <label>Название товара:<span class="text-danger">*</span></label>
                  <input type="text" name="title" id="title" class="form-control" placeholder="" required>
                </div>
                
                <div class="form-group"> 
                  <label>Цена (По умолчанию - Договорная):</label>
                  <input type="text" name="price" id="price" class="form-control" placeholder="Договорная" required>
                </div>
                
                <div class="form-group">
                  <label>Категория товара:<span class="text-danger">*</span></label>
                    <select class="form-control" name="type" id="type">
                      <option value="Забор">Забор</option>
                      <option value="Ворота">Ворота</option>
                      <option value="Калитка">Калитка</option>
                      <option value="Козырек">Козырек</option>
                    </select> 
                </div>
                
                <div class="form-group"> 
                  <label>Описание товара:<span class="text-danger">*</span></label>
                  <textarea name="description" id="description" cols="1" rows="5" style="width:100%"></textarea>
                </div>
                
                <div class="form-group"> 
                  <label>Отобразить/Скрыть:<span class="text-danger">*</span></label>
                    <select class="form-control" name="visible" id="visible"> 
                      <option value="1">Отобразить товар</option>
                      <option value="0">Скрыть товар</option>
                    </select>
                </div>
                
                <div class="form-group">
                  <a href="include/add-product.php">
                  <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary">
                  Добавить товар</button></a>
                </div>
              </form>
            </div>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="deleteProduct">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title">Удалить запись</h4>
  </div>
  <div class="modal-body">
  <p>Do you really want to remove ?</p>
  </div>
  <div class="modal-footer">
  <a href="include/delete-product.php">
  <button type="button" class="btn btn-primary" id="removeBtn">Удалить</button>
  </a>
  <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
  </div>
  </div>
  </div>
</div>

<div class="container">
  
<table class="table table-striped table-bordered">
    <thead>
        <tr class="bg-primary text-white">
            <th>Id</th>
            <th>Имя изображения</th>
            <th>Имя товара</th>
            <th>Цена</th>
            <th>Категория</th>
            <th>Описание</th>
            <th>Видимость</th>
            <th class="text-center">Управление</th>
        </tr>
    </thead>
    <tbody>

        <?php
         $query  = "SELECT * FROM products";
         $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) > 0 ) 
		{
			$row = mysqli_fetch_array($result);

			do {
			echo('
        <tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['image'].'</td>
            <td>'.$row['title'].'</td>
            <td>'.$row['price'].'</td>
            <td>'.$row['type'].'</td>
            <td>'.$row['description'].'</td>
            <td>'.$row['visible'].'</td>
            <td align="center">
                <a href="edit-product.php?editId='.$row['id'].'" class="btn btn-warning"><i class="fa fa-fw fa-edit"></i> Изменить</a>
                <a href="include/delete-product.php" onclick="deleteProduct('.$row['id'].')" class="btn btn-danger"><i class="fa fa-fw fa-trash"></i> Удалить</a>
            </td>
        </tr>
        ');
				}
			while ($row = mysqli_fetch_array($result));
		}?>
    </tbody>
</table>

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