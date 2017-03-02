<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "bd.php";
require_once "function.php";


if (count($_POST['delete']))
{
	$id = (int) $_POST['delete'];
	
	if(delete_good_by_id($id))
	{
		header('Location: index.php');
		die();
	}
	else 
	{
		echo 'error';
	}
}