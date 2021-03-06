<?php
	session_start();

	session_kontrol();
	mesajSay();
	function session_kontrol()
	{
		// session atanmamş sa login.php ye yönlendir
		if(!isset($_SESSION["staj"])){
			session_destroy();
			header("Location: ../index.php?sayfa=giris");
		}
	}

	function mesajSay()
	{
		global $conn;
		$id =$_SESSION["staj"]["id"];
		$query ="select id from tbl_mesaj where durum =0 and alici_id =$id";
			$b_sayi=0;
			if($sonuc=mysqli_query($conn,$query))
			{
				$b_sayi=mysqli_num_rows($sonuc);
			}
		$_SESSION["staj"]["mesaj"] =$b_sayi;
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
				require_once("isyeriProfilDuzenle.php");
			} 
           
		}
		else if($sayfa=="form-goster"){
			require_once("staj_form.php");
		}
		else if($sayfa=="profil-goster"){
			if($_SESSION["staj"]["rol"] == 1){
				 require_once("ogrenciProfilGor.php");
			}else if($_SESSION["staj"]["rol"] == 2){
				 require_once("akademisyenProfilGor.php");
			}else if($_SESSION["staj"]["rol"] == 3){
				require_once("isyeriProfilGor.php");
			} 
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
		else if($sayfa=="duyurular-goster"){
			require_once("duyuruGoster.php");
		}
		else if($sayfa=="duyurular-ekle"){
			require_once("duyuruEkle.php");
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
			if ($_SESSION["staj"]["rol"]==1)
				require_once("ogrenci_basvuru_goster.php");
			else 
				require_once("basvurular.php");
		}
		else if($sayfa=="hakkinda"){
			require_once("hakkinda.php");
		}
		else if($sayfa=="basvurular-gecmis"){
			require_once("basvurugecmisi.php");
		}
		else if($sayfa=="staj_eslesmeleri"){
			require_once("akademisyen_staj_gor.php");
		}
		else if($sayfa=="staj_sonuclananlar"){
			require_once("akademisyen_staj_gor.php");
		}
		else if($sayfa=="staj_beklenenler"){
			require_once("akademisyen_staj_gor_beklenenler.php");
		}
		else if($sayfa=="profil-gor"){
			require_once("profilgor.php");
		}
		else if($sayfa=="ogrenci-goster"){
			require_once("akademisyenogrencionayla.php");
		}
		else if($sayfa=="ogrenci-listem"){
			require_once("akademisyenogrencilistesi.php");
		}else if($sayfa=="arama"){
			require_once("arama.php");
		}
		else if($_SESSION["staj"]["rol"] == 1){
			 require_once("ogrenciProfilGor.php");
		}else if($_SESSION["staj"]["rol"] == 2){
			 require_once("akademisyenProfilGor.php");
		}else if($_SESSION["staj"]["rol"] == 3){
			require_once("isyeriProfilGor.php");
		}
		
	}

	function islemler()
	{
		if(@$_POST["profilduzenle"])
		{
			return profilGuncelle();
		}
		else if(@$_POST["akademisyenProfilDuzenle"])
		{
			return AkademisyenprofilGuncelle();
		}
		else if(@$_POST["isyeriGuncelle"])
		{
			return isyeriprofilGuncelle();
		}
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

	function optionListele($sonuc ,$id,$value,$text)
	{
		if($sonuc)
		{
			while($row=mysqli_fetch_array($sonuc))
			{
				if($row["$value"]== $id)
				{
					echo "<option selected='selected' value='".$row["$value"]."'>".$row["$text"]."</option>";
				}
				else
				{
					echo "<option value='".$row["$value"]."'>".$row["$text"]."</option>";
				}
			}
		}
	}

	function fakulteListele($uni_id)
	{
		global $conn;
		$query ="SELECT id, fakulte_adi FROM tbl_fakulte WHERE uni_id =$uni_id";
		$sonuc =mysqli_query($conn,$query);
		if($sonuc)
		{
			echo "<option value='-1'>Fakülte Seç</option>";
			while ($row = mysqli_fetch_array($sonuc)) {
				echo "<option value=".$row['id'].">".$row['fakulte_adi']."</option>";
			}
		}
	}

	function bolumListele($fakulte)
	{
		global $conn;
		$query ="select id,bolum_adi from tbl_bolum where fakulte_id = $fakulte";
		$sonuc =mysqli_query($conn,$query);
		if($sonuc)
		{
			echo "<option value='-1'>Bölüm Seç</option>";
			while ($row = mysqli_fetch_array($sonuc)) {
				echo "<option value=".$row['id'].">".$row['bolum_adi']."</option>";
			}
		}
	}

	function akademisyenListele($uni_id)
	{
		global $conn;
		$query ="SELECT K.adi,K.soyadi,K.id FROM tbl_akademisyen as UID 
		INNER JOIN tbl_kullanici as K on UID.user_id = K.id WHERE UID.uni_id = $uni_id";
		$sonuc =mysqli_query($conn,$query);
		if($sonuc)
		{
			echo "<option value='-1'>Akademisyen Seç</option>";
			while ($row = mysqli_fetch_array($sonuc)) {
				echo "<option value=".$row['id'].">".$row['adi']." ".$row['soyadi']."</option>";
			}
		}
	}

	function profilGuncelle()
	{
		$id =$_SESSION["staj"]["id"];

		$mail=temizle(@$_POST["mail"]);
		$parola=temizle(@$_POST["parola"]);
		$adi=temizle(@$_POST["ad"]);
		$soyadi=temizle(@$_POST["soyad"]);
		$cinsiyet=temizle(@$_POST["cinsiyet"]);
		$uni=temizle(@$_POST["uni"]);
		$fakulte=temizle(@$_POST["fakulte"]);
		$bolum=temizle(@$_POST["bolum"]);
		$sinif=temizle(@$_POST["sinif"]);
		$okul_no=temizle(@$_POST["okul_no"]);
		$il=temizle(@$_POST["il"]);
		$ilce=temizle(@$_POST["ilce"]);
		$adres=temizle(@$_POST["adres"]);
		$akademisyen=temizle(@$_POST["akademisyen"]);
		$hakkimda=temizle(@$_POST["hakkimda"]);

		global $conn;
		$msg ="";
		$query ="update tbl_kullanici SET adi='$adi' , soyadi ='$soyadi' ,mail ='$mail',hakkimda='$hakkimda' ";
		$yuklenecek_dosya = "profil/" . md5($_FILES['foto']['name']).substr($_FILES['foto']['name'], -4);
		if($_FILES["foto"]["name"] != "")
		{
			if (move_uploaded_file($_FILES['foto']['tmp_name'], $yuklenecek_dosya))
			{
			    $query .=",foto='$yuklenecek_dosya' ";
			    $_SESSION["staj"]["foto"]=$yuklenecek_dosya;
				$query3="insert into tbl_foto(foto,user_id) values('$yuklenecek_dosya',$id)";
				$sonuc4 =mysqli_query($conn,$query3);
			}else
			{
				$msg =errorMesaj("Foto yüklenemedi");
			}
		}
		if($parola !="")
		{
			$parola =md5($parola);
			$query .=" , parola='$parola'";
		}
		$query .=" where id =$id ; ";
		$query2 ="update tbl_ogrenci SET cinsiyet =$cinsiyet,il=$il,ilce =$ilce 
			,adres='$adres', uni =$uni , fakulte=$fakulte ,bolum =$bolum ,
			 sinif =$sinif,okul_no ='$okul_no',aka_id=$akademisyen where user_id=$id";
		
		if(mysqli_query($conn,$query) && mysqli_query($conn,$query2))
		{
			return $msg.successMesaj("Kayı işlemi başarılı");
		}else
		{
			return $msg.errorMesaj("Kayıt işlemi tamamlanamadı");
		}
	}
	
	
	
	function isyeriprofilGuncelle()
	{
		$id =$_SESSION["staj"]["id"];

		$mail=temizle(@$_POST["mail"]);
		$parola=temizle(@$_POST["parola"]);
		$adi=temizle(@$_POST["ad"]);
		$soyadi=temizle(@$_POST["soyad"]);
		$adres=temizle(@$_POST["adres"]);
		$aciklama=temizle(@$_POST["aciklama"]);
		$il=temizle(@$_POST["il"]);
		$ilce=temizle(@$_POST["ilce"]);
		$hakkimda=temizle(@$_POST["hakkimda"]);
		global $conn;
		$msg ="";
		$query ="update tbl_kullanici SET adi='$adi' , soyadi ='$soyadi' ,mail ='$mail',hakkimda='$hakkimda' ";
		$yuklenecek_dosya = "profil/" . md5($_FILES['foto']['name']).substr($_FILES['foto']['name'], -4);
		if($_FILES["foto"]["name"] != "")
		{
			if (move_uploaded_file($_FILES['foto']['tmp_name'], $yuklenecek_dosya))
			{
			    $query .=",foto='$yuklenecek_dosya' ";
			    $_SESSION["staj"]["foto"]=$yuklenecek_dosya;
				$query3="insert into tbl_foto(foto,user_id) values('$yuklenecek_dosya',$id)";
				$sonuc4 =mysqli_query($conn,$query3);
			}else
			{
				$msg =errorMesaj("Foto yüklenemedi");
			}
		}
		if($parola !="")
		{
			$parola =md5($parola);
			$query .=" , parola='$parola'";
		}
		$query .=" where id =$id ; ";
		$query2 ="update tbl_isyeri SET il=$il,ilce =$ilce 
			,adres='$adres', aciklama ='$aciklama'  where user_id=$id";
		if(mysqli_query($conn,$query) && mysqli_query($conn,$query2))
		{
			return $msg.successMesaj("Güncelleme işlemi başarılı");
		}else
		{
			return $msg.errorMesaj("Güncelleme işlemi tamamlanamadı");
		}
	}
	
	function AkademisyenprofilGuncelle()
	{
		$id =$_SESSION["staj"]["id"];

		$mail=temizle(@$_POST["mail"]);
		$parola=temizle(@$_POST["parola"]);
		$adi=temizle(@$_POST["ad"]);
		$soyadi=temizle(@$_POST["soyad"]);
		$uni=temizle(@$_POST["uni"]);
		$hakkimda=temizle(@$_POST["hakkimda"]);
		global $conn;
		$msg ="";
		$query ="update tbl_kullanici SET adi='$adi' , soyadi ='$soyadi' ,mail ='$mail',hakkimda='$hakkimda' ";
		$yuklenecek_dosya = "profil/" . md5($_FILES['foto']['name']).substr($_FILES['foto']['name'], -4);
		if($_FILES["foto"]["name"] != "")
		{
			if (move_uploaded_file($_FILES['foto']['tmp_name'], $yuklenecek_dosya))
			{
			    $query .=",foto='$yuklenecek_dosya' ";
			    $_SESSION["staj"]["foto"]=$yuklenecek_dosya;
				$query3="insert into tbl_foto(foto,user_id) values('$yuklenecek_dosya',$id)";
				$sonuc4 =mysqli_query($conn,$query3);
			}else
			{
				$msg =errorMesaj("Foto yüklenemedi");
			}
		}
		if($parola !="")
		{
			$parola =md5($parola);
			$query .=" , parola='$parola'";
		}
		$query .=" where id =$id";
		$query2 ="update tbl_akademisyen SET uni_id =$uni where user_id =$id";
		
		if(mysqli_query($conn,$query) && mysqli_query($conn,$query2))
		{
			return $msg.successMesaj("Güncelleme işlemi başarılı");
		}else
		{
			return $msg.errorMesaj("Güncelleme işlemi tamamlanamadı");
		}
	}
	
?>
