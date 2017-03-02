<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "bd.php";
require_once "function.php";
$good_array = array();

if (count($_POST['edit']))
{
	$id = (int) $_POST['edit'];

	$good_array = get_goods_array_by_id($id);
	
	foreach ($good_array as $table => $table_title)
	{
		$cat_id = $table_title['cat_id'];
	}
	$category = search_category_by_id($cat_id);	
}
$id = $table_title['id'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Тестовое задание</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <meta content="text/html" charset="utf-8" http-equiv="content-type"/>
</head>    
<body>
    <?php

    ?>
	<table cellspasing="0">
		<tr>
			<th>ID</th>
			<th>Наименование товара</th>
			<th>Категория</th>
			<th>Стоимость</th>
		</tr>
		<tr>
			<td><?=$id ?></td>
			<form method="post" action="edit_db.php">
			<input type="hidden" name='save' value="<?= $id?>">
			<td><input type="text" name="edit_name" value="<?=$table_title['name'] ?>"></td>
			<td><input type="text" name="edit_cat" value="<?=$category ?>"></td>
			<td><input type="text" name="edit_price"value="<?=$table_title['price'] ?>"></td>
		</tr>
	</table>
	<button>Сохранить</button>
	</form>
</body>
</html>
