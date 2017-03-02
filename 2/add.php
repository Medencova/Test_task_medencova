<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "bd.php";

if (count($_POST['add']))
{
	$name = $_POST['name'];
	$category = $_POST['category'];
	$price = (int) $_POST['price'];

	$query = "SELECT * FROM `categories` WHERE `category` = '{$category}' ";

	$result = mysqli_query($link, $query);

	if ($row = mysqli_fetch_assoc($result))
	{
		
		$cat = $row['id'];		
		$query_z = "INSERT INTO `goods` VALUES (NULL, '{$name}', '{$price}','{$cat}')";

		$result_z = mysqli_query($link, $query_z);
		
		if ($result_z)
		{
			header("Location: _index.php");
			die();
		}
		else
		{
			echo "995";
			echo 'error';
		}
		die();
	} 
	else 
	{
		$query = "INSERT INTO `categories` (`id`, `category`) VALUES (NULL, '{$category}')";
		$result = mysqli_query($link, $query);
		if ($result)
		{
			$query = "SELECT * FROM `categories` WHERE `category` = '{$category}'";
			$result = mysqli_query($link, $query);

			if ($result)
			{
				$row = mysqli_fetch_assoc($result);
				$cat = (int) $row['id'];		
			}
		}
		$query = "INSERT INTO `goods` (`id`, `name`, `price`, `cat_id`) VALUES (NULL, '{$name}', '{$price}','{$cat}')";

		$result = mysqli_query($link, $query);
		
		if ($result)
		{
			header('Location: _index.php');	
			die();
		}
		else
		{
			echo 'error';
		}
	}
	
}	
