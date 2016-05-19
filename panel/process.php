<?php
	if(strtolower($_SERVER["HTTP_CONNECTION"]) != "xmlhttprequest")
	{
		include_once("../include/config.php");
		include_once("/include/function.php");
		if(@$_GET["islem"]=="fakulte")
		{
			$uni_id =temizle(@$_POST["uni"]);
			fakulteListele($uni_id);
			
		}
		else if(@$_GET["islem"]=="bolum")
		{
			$fakulte =temizle(@$_POST["fakulte"]);
			bolumListele($fakulte);
		}
		else if(@$_GET["islem"]=="ilce")
		{
			$il =temizle(@$_POST["il"]);
			ilce_listele($il);
		}
		else if(@$_GET["islem"] =="akademisyenList")
		{
			$uni_id =temizle(@$_POST["uni"]);
			akademisyenListele($uni_id);
		}
		
	}
?>