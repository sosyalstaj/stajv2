<?php
	
	session_start();

	function sayfa_getir()
	{
		$sayfa =@$_GET["sayfa"];
		if($sayfa =="kayit_ol")
		{
			require_once("kayit_ol.php");
		}else if($sayfa =="giris")
		{
			require_once("giris.php");
		}else if($sayfa =="duyuru" || @$_GET["search"])
		{
			require_once("duyuru.php");
		}
		else if($sayfa =="duyuru_detay")
		{
			require_once("duyuru_detay.php");
		}else
		{
			require_once("slider.php");
			require_once("duyuru.php");
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

	function girisYap($mail,$sifre)
	{
		
		$mail=temizle($mail);
		$sifre=MD5($sifre);
		global $conn;
		$query ="select * from tbl_kullanici where mail='$mail' and parola='$sifre'";// and onay=1";
		$sonuc =mysqli_query($conn,$query);
		if(@mysqli_num_rows($sonuc) ==1)
		{
			$row=mysqli_fetch_array($sonuc);
			$rol=$row["rol"];
			$mail=$row["mail"];
			$id=$row["id"];
			$adi =$row["adi"];
			$soyadi =$row["soyadi"];
			$foto =$row["foto"];

			$query ="select id from tbl_mesaj where durum =0 and alici_id =$id";
			$b_sayi=0;
			if($sonuc=mysqli_query($conn,$query))
			{
				$b_sayi=mysqli_num_rows($sonuc);
			}
			$user=array("id"=>$id,"adi"=>$adi,"soyadi"=>$soyadi,"mail"=>$mail,"rol"=>$rol,"mesaj"=>$b_sayi,"foto"=>$foto); 
			
			$_SESSION["staj"] =$user;
				
			header("Location: panel/index.php");

		}else 
		{
			return errorMesaj("Kullanıcı kayıtlı veya Onaylı değil.");
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

	function uyeOl()
	{
		global $conn;
		$adi =temizle(@$_POST["adi"]);
		$soyadi =temizle(@$_POST["soyadi"]);
		$mail =temizle(@$_POST["email"]);
		$parola =@$_POST["parola"];
		$parolatekrar = @$_POST["parolatekrar"];
		$rol =temizle(@$_POST["rol"]);
		if($parolatekrar == $parola)
		{
			$parola =md5($parola);
			$query ="insert into tbl_kullanici(adi,soyadi,mail,parola,rol,onay,foto) 
			value('$adi','$soyadi','$mail','$parola',$rol,0,'profil/user.png')";
			if(@mysqli_query($conn,$query))
			{
				$id = mysqli_insert_id($conn);
				$query ="";
				if($rol == 1)
				{
					$cinsiyet=temizle(@$_POST["cinsiyet"]);
					$dgun=temizle(@$_POST["dgun"]);
					$day=temizle(@$_POST["day"]);
					$dyil=temizle(@$_POST["dyil"]);
					$il=temizle(@$_POST["sehir"]);
					$ilce=temizle(@$_POST["ilce"]);
					$d_tarih =$dgun."-".$day."-".$dyil;
					$query ="insert into tbl_ogrenci(cinsiyet,d_tarihi,il,ilce,user_id) 
					value($cinsiyet,'$d_tarih',$il,$ilce,$id)";
					
				}else if($rol ==2)
				{
					$TC=temizle(@$_POST["tc"]);
					$unvan=temizle(@$_POST["unvan"]);
					$query ="insert into tbl_akademisyen(unvan,tc,user_id) 
					value('$unvan','$TC',$id)";

				}else if($rol ==3)
				{
					$il=temizle(@$_POST["sehir"]);
					$ilce=temizle(@$_POST["ilce"]);
					$adres=temizle(@$_POST["adres"]);
					$aciklama =temizle(@$_POST["aciklama"]);
					$query ="insert into tbl_isyeri(il,ilce,adres,aciklama,user_id) 
					value($il,$ilce,'$adres','$aciklama',$id)";
				}
				if(mysqli_query($conn,$query))
				{
					return successMesaj("Kayıt işlemi başarılı"); 
				}
				else{
					return errorMesaj("Kayıt işlemi gerçekleştirilemedi");
				}
			}else{
				return errorMesaj("Bir hata oluştu.");
			}
		}else
		{
			return errorMesaj("Parolanız birbiriyle uyuşmuyor.");
		}
		
	}

	function duyurulariGetir()
	{
		global $conn;
        $limit =3;
        $sayfa =@$_GET["sayfa"];
        $query ="Select id,baslik, SUBSTRING(icerik,1,200) as icerik from tbl_duyuru ";
        if($sayfa =="duyuru")
        {
        	$limit =15;
        }
        if(isset($_GET["search"]))
        {
        	$s =temizle($_GET["search"]);
        	$query .="where icerik like '%$s%' or baslik like '%$s%' ";
        }
        $query .=" order by id desc limit ".$limit;
        return mysqli_query($conn,$query);
	}

	function duyuruGetir()
	{
		global $conn;
		$id =temizle($_GET["id"]);
		$query ="Select * from tbl_duyuru where id=".$id;
		$sonuc =mysqli_query($conn,$query);
		if($sonuc)
		{
			if(mysqli_num_rows($sonuc) == 1)
			{
				return mysqli_fetch_array($sonuc);
			}else
			{
				header("Location : index.php?sayfa=duyuru");
				die();
			}
		}else
		{
			header("Location : index.php?sayfa=duyuru");
			die();
		}
	}
?>