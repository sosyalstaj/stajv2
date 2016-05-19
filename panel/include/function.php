<?php
	session_start();

	session_kontrol();
	function session_kontrol()
	{
		// session atanmamş sa login.php ye yönlendir
		if(!isset($_SESSION["staj"])){
			header("Location: ../index.php?sayfa=giris");
		}
	}

	function successMesaj($txt)
	{
		return "<h4 class='alert_success'>$txt</h4>";
	}

	function errorMesaj($txt)
	{
		return " <h4 class='alert_error'>$txt</h4>";
	}

	function temizle($text)
	{
		$text =htmlspecialchars($text);
		return $text;
	}

	function sayfa_getir()
	{
		$sayfa =@$_GET["sayfa"];
		if($sayfa =="profil-duzenle")
		{
			require_once("ogrProfilDuzenle.php");
		}
	}

	function islemler()
	{

	}
?>