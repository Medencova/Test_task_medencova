<?php
require_once "bd.php";

//поиск категории товара по id категории
function search_category_by_id($id)
{
	global $link;
	
	$query = "SELECT * FROM `categories` WHERE `id` = '{$id}'";

	$result = mysqli_query($link, $query);

	if ($row = mysqli_fetch_assoc($result))
	{
		foreach ($row as $number => $category_array)
		{
			return $category = $row['category'];			
		}	
	}
}

function search_category_by_name($category)
{
	global $link;
	$query = "SELECT * FROM `categories` WHERE `category` = '{$category}'";
	return $result = mysqli_query($link, $query);
}
function get_category_by_name($category)
{
	global $link;
	$query = "SELECT * FROM `categories` WHERE `category` = '{$category}'";
	$result = mysqli_query($link, $query);

	if ($result)
	{
		$row = mysqli_fetch_assoc($result);
		return $cat = (int) $row['id'];		
	}
}

function update_goods($id, $name, $price, $cat)
{
	global $link;
	$query = "UPDATE `goods`  SET  `name` = '{$name}', `price` = '{$price}', `cat_id` = '{$cat}' WHERE `id` = '{$id}'";

	$result = mysqli_query($link, $query);
	
	if ($result)
	{
		header("Location: index.php");
		die();
	}
	else
	{
		echo 'error';
	}
	
}
//получение ассоциативного массива товаров
function creature_array_of_goods()
{
	global $link;
	
	$query = "SELECT * FROM `goods` ";

	$result = mysqli_query($link, $query);

	while ($row = mysqli_fetch_assoc($result))
	{
		$goods[] = $row;
	}
	return $goods;
}


function get_goods_array_by_id($id)
{
	global $link;
	$query = "SELECT * FROM `goods` WHERE `id` = '$id' LIMIT 1";
	
	$result = mysqli_query($link, $query);
	
	while ($row = mysqli_fetch_assoc($result))
	{
		$good_array[] = $row;
	}
	return $good_array;
}



function delete_good_by_id($id)
{
	global $link;
	$query = "DELETE FROM `goods` WHERE `id` = '$id' LIMIT 1";
	
	$result = mysqli_query($link, $query);
	return $result;
}


function write_new_category_by_name($category)
{
	global $link;
	$query = "INSERT INTO `categories` (`id`, `category`) VALUES (NULL, '{$category}')";
	$result = mysqli_query($link, $query);
	return $result;
}