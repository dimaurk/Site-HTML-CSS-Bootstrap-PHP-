<?php
 
include("db_connect.php");
 
if($_POST) {
    $image = $_POST['image'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    $visible = $_POST['visible'];
 
    $sql = "INSERT INTO products (image, title, price, type, description, visible) 
    VALUES ('$image', '$title', '$price', '$type', '$description', '$visible')";

    if($link->query($sql) === TRUE) {
        echo "<p>New Record Successfully Created</p>";
        echo "<a href='../add-product.php'><button type='button'>Назад</button></a>";
        echo "<a href='../admin.php'><button type='button'>Ок</button></a>";
    } 
    else {
        echo "Error " . $sql . ' ' . $link->connect_error;
        echo "<a href='../admin.php'><button type='button'>Ок</button></a>";
    }
 
    $link->close();
}

?>