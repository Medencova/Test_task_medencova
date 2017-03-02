<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "bd.php";
require_once "function.php";

if (count($_POST['save']))
{
	//распаковка данных
	$id = (int) $_POST['save'];
	$name = $_POST['edit_name'];
	$category = $_POST['edit_cat'];
	$price = (int) $_POST['edit_price'];


	if ($row = mysqli_fetch_assoc(search_category_by_name($category)))
	{	
		$cat = $row['id'];		
		update_goods($id, $name, $price, $cat);
		die();
	}
	else 
	{
		
		if (write_new_category_by_name($category))
		{
			$cat = get_category_by_name($category);
		}
		update_goods($id, $name, $price, $cat);
	}
	
}	
