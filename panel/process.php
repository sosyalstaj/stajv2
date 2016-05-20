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
		else if(@$_GET["islem"] =="arama")
		{
			$arama =temizle(@$_POST["arama"]);
			$akademisyen =temizle(@$_POST["akademisyen"]);
			$isyeri =temizle(@$_POST["isyeri"]);
			$ogrenci =temizle(@$_POST["ogrenci"]);
			
			$proje =temizle(@$_POST["projeler"]);
			$sehir =temizle(@$_POST["sehir"]);
			$sayfa ="index.php?sayfa=profil-gor&id=";
			echo "<div class='box-body no-padding'>";
            echo  "<ul class='nav nav-pills nav-stacked'>";
			if($sehir ==1 &&  $isyeri ==1)
			{
				$query ="SELECT K.id,K.adi FROM tbl_isyeri as I INNER JOIN tbl_kullanici as 
						K on I.user_id = K.id INNER JOIN tbl_il as IL on I.il = IL.id WHERE IL.il like '%$arama%'";
				$sonuc =mysqli_query($conn ,$query);
				if($sonuc)
				{
					while($row =mysqli_fetch_array($sonuc))
					{
						$ad =$row["adi"]; $id=$row["id"];
						echo "<li><a href='$sayfa$id''><i class='fa fa-circle-o text-light-blue'></i> $ad </a></li>";
					}
				}
			}
			else if($sehir ==1 && $ogrenci =1)
			{
				$query ="SELECT K.id,K.adi,K.soyadi FROM tbl_ogrenci as O INNER JOIN tbl_kullanici as 
				K on O.user_id = K.id INNER JOIN tbl_il as I on I.id = O.il WHERE I.il like '%$arama%'";
				$sonuc =mysqli_query($conn ,$query);
				if($sonuc)
				{
					while($row =mysqli_fetch_array($sonuc))
					{
						$ad =$row["adi"]; $soyad =$row["soyadi"];$id=$row["id"];
						echo "<li><a href='$sayfa$id''><i class='fa fa-circle-o text-light-blue'></i> $ad $soyad</a></li>";
					}
				}
			}
			else if($akademisyen ==1 || $isyeri ==1 || $ogrenci ==1)
			{
				$query ="Select * from tbl_kullanici where adi like '%$arama%' or soyadi like '%$arama%'";
				$sonuc =mysqli_query($conn ,$query);
				if($sonuc)
				{
					while($row =mysqli_fetch_array($sonuc))
					{
						$ad =$row["adi"]; $soyad =$row["soyadi"];$id=$row["id"];
						echo "<li><a href='$sayfa$id''><i class='fa fa-circle-o text-light-blue'></i> $ad $soyad</a></li>";
					}
				}
			}else if($proje ==1)
			{
				$query ="Select P.p_adi,K.id from tbl_proje as P  
				INNER JOIN tbl_kullanici as K on K.id =P.user_id
				 where P.p_adi like '%$arama%' or P.p_icerik like '%$arama%' ";
				$sonuc =mysqli_query($conn ,$query);
				if($sonuc)
				{
					while($row =mysqli_fetch_array($sonuc))
					{
						$adi =$row["p_adi"]; $id=$row["id"];
						echo "<li><a href='$sayfa$id''><i class='fa fa-circle-o text-light-blue'></i> $adi </a></li>";
					}
				}
			}

			echo "</ul></div>";
		}
		
	}
?>