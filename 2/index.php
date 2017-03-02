<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "bd.php";
require_once "function.php";
$goods_array = array ();

	$goods = creature_array_of_goods();
	foreach ($goods as $key => $good_value)
	{
		foreach ($good_value as $title => $value)
		{
			$good_value['cat_id'] = search_category_by_id($good_value['cat_id']);
		}
		$goods_array[] = $good_value;
	}
	$amount = count($goods_array);
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
			<th>Удалить товар</th>
			<th>Изменить товар</th>
		</tr>
		<?php
			foreach ($goods_array as $table => $table_title)
			{
		?>
		<tr>
			<td><?=$table_title['id'] ?></td>
			<td><?=$table_title['name'] ?></td>
			<td><?=$table_title['cat_id'] ?></td>
			<td><?=$table_title['price'] ?></td>
			<td><form method="post" action="delete.php"><input type="hidden" name="delete" value="<?=$table_title['id'] ?>"><button>x</button></form></td>
			<td><form method="post" action="edit.php"><input type="hidden" name="edit" value="<?=$table_title['id'] ?>"><button>Изменить</button></form></td>
		</tr>
		<?php
		}
		?>
	</table>
	<form method="post" action="add.php">
	<input type="hidden" name="add" value="">
	<label>Наименование товара:</label><br/>
	<input type="text" name="name"></input><br/>
	<label>Категория товара:</label><br/>
	<input type="text" name="category"></input><br/>
	<label>Стоимость товара:</label><br/>
	<input type="text" name="price"></input><br/>
	<button>Добавить товар</button>
	</form>
</body>
</html>
