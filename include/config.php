<?php
	define("host","85.95.227.156");
	define("user","sosyalstaj");
	define("pass","Egitim123");
	define("db","egitim");


	$conn = mysqli_connect(host,user,pass,db) or die("Veri tabanı bağlanti hatası");
	mysqli_set_charset($conn,"utf8");
	mysqli_query($conn,"SET NAMES 'utf8' COLLATE 'utf8_turkish_ci'");
	
?>
