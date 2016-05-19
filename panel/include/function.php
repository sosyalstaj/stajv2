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
			if($_SESSION["staj"]["rol"] == 1){
				 require_once("ogrProfilDuzenle.php");
			}else if($_SESSION["staj"]["rol"] == 2){
				 require_once("akademisyenProfilDuzenle.php");
			}else if($_SESSION["staj"]["rol"] == 3){
				require_once("isverenProfilDuzenle.php");
			} 
           
		}
		else if($sayfa=="form-goster"){
			require_once("staj_form.php");
		}
		else if($sayfa=="profil-goster"){
			require_once("/profil/index.php");		
		}
		else if($sayfa=="mesajlar"){
			require_once("brojem.php");
		}
		else if($sayfa=="projeler-goster"){
			require_once("projeGoster.php");
		}
		else if($sayfa=="projeler-ekle"){
			require_once("projeEkle.php");
		}
		else if($sayfa=="iletisim"){
			require_once("iletisim.php");
		}
		else if($sayfa=="iletisim"){
			require_once("iletisim.php");
		}
		else if($sayfa=="basvurular-yap"){
			require_once("basvur.php");
		}
		else if($sayfa=="basvurular-goster"){
			require_once("ogrenci_basvuru_goster.php");
		}
	}

	function islemler()
	{

	}
	function il_listele()
	{
		global $conn;
		$query = "select * from tbl_il";
		$sonuc = mysqli_query($conn,$query);
		if($sonuc)
		{	
			while ($row = mysqli_fetch_array($sonuc)) {
				echo "<option value=".$row['id'].">".$row['il']."</option>";
			}
		}
	}
	function ilce_listele($il_id)
	{
		global $conn;
		$query ="select * from tbl_ilce where il_id = $il_id";
		$sonuc =mysqli_query($conn,$query);
		if($sonuc)
		{
			echo "<option value='-1'>ilçe seç</option>";
			while ($row = mysqli_fetch_array($sonuc)) {
				echo "<option value=".$row['id'].">".$row['ilce']."</option>";
			}
		}
	}
?>