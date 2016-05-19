<?php
	if(strtolower($_SERVER["HTTP_CONNECTION"]) != "xmlhttprequest")
	{
		include_once("/include/function.php");
		require_once("/include/config.php");
		if(@$_GET["islem"]=="uyeol")
		{
			$rol =@$_POST["rol"];
			/*
				rol 1 :öğrenci
				rol 2 :Akademisyen
				rol 3 :İşyeri
			*/
			if($rol == 1)
			{
				include_once("ogr_uyeol.php");
			}else if($rol == 2)
			{
				include_once("akademisyen_uyeol.php");
			}else if($rol == 3)
			{
				include_once("isyeri_uyeol.php");
			}
		}
		else if(@$_GET["islem"]=="ilce_listele")
		{
			$il_id =temizle(@$_POST["sehir"]);
			ilce_listele($il_id);
		}
	}

?>