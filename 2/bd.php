<?php
   
 $link = mysqli_connect("127.0.0.1", "root", "", "test_bd");
 

 if (!$link)
 {
	 die ("Нет соединения с БД!");
 }