 


<div id="proje_hakkinda">
<form name="form1" method="post" action="">
<label id="proje_hakkinda_baslik">
<center>PROJELER</center>
</label>
<label id="proje_hakkinda_icerik">
Proje Adı:
</label>
<input type="text" id="proje_hakkinda_onsoz" name="isimi" value="<?php echo @$_POST['isimi']; ?>"> <br/>
  <label id="proje_hakkinda_icerik">
Tarih:
</label>
<input type="date" name="tarih" class="form-control" value=<?php echo @$_POST['tarih'];  ?>>
<label id="proje_hakkinda_icerik">
İçerik :
</label>
<textarea id="proje_hakkinda_textarea"  name="icerik" > <?php echo @$_POST['icerik'];  ?></textarea><br>
<?php

if(@$_POST["gonder"])
{
	echo'<input id="proje_hakkinda_duzenle" type="submit" name="duzenle" value="Projeyi Kaydet" >';
}
else{
	echo'<input id="proje_hakkinda_duzenle" type="submit" name="ekle" value="Proje Ekle" >';
}
?>
<input type="text" style="visibility: hidden; position:absolute;"  name="ID"  value=" <?php echo @$_POST['ID'];  ?>">
</form>
</div>


<?php 
//Bir oturum açıkmı kontrol ediyoruz 
$oturum="açık"; //Buraya sessionun açık oldgunu eklenecek
	
	if(@$_POST["sil"])
	{
		require_once("include/projeClass.php");
		$proje=new Proje();
			
			$proje-> setId(@$_POST["projeID"]);
			$proje->setLoginId(@$_SESSION["staj"]->getId());
			 projeSil($proje);		
	}
	
	if(@$_SESSION["staj"]){
		require_once("include/projeClass.php");
		$proje=new Proje();
			
			$proje->setLoginId(@$_SESSION["staj"]->getId());
			 projeListele($proje);
	}
	
	
	if(@$_POST["ekle"])
	{
		if(@$_SESSION["staj"]){
			if(@$_POST["icerik"]!=""&&@$_POST["isimi"]!=""&&@$_POST["tarih"]!=""){
				echo "asd";
		
			require_once("include/projeClass.php");

			$proje=new Proje();
				
			$proje->setLoginId(@$_SESSION["staj"]->getId()); //oturumdan login adi verilecek
			$proje->setProjeAdi(@$_POST["isimi"]);
			$proje->setProjeIcerik(@$_POST["icerik"]);
			$proje->setTarih(@$_POST["tarih"]);
			
			echo "Proje =".$proje->getLoginId()."adi ".$proje->getProjeAdi()." icerik ".$proje->getProjeIcerik()." tarih ".$proje->getTarih();
			projeEkle($proje);
			}
			else{
				echo "
                <script>  alert('Lütfen Boş Alan Girmeyiniz...');
		        
		        </script> ";
			}
		
			}
			else{
				echo "
                <script>  alert('Projenizi paylaşabilmeniz için üye girişi yapmalısınız...');
		        window.location='../../staj/index.php?sayfa=giris.php';
		        </script> ";
			}
	
	}
	
	if(@$_POST["duzenle"])
	{
		if($oturum=="açık"){

		echo "asd";
		
		require_once("include/projeClass.php");

		$proje=new Proje();
		
			$proje->setId(@$_POST["ID"]); 
			$proje->setLoginId(@$_SESSION["staj"]->getId()); //oturumdan login adi verilecek
			$proje->setProjeAdi(@$_POST["isimi"]);
			$proje->setProjeIcerik(@$_POST["icerik"]);
			$proje->setTarih(@$_POST["tarih"]);
			
			//echo "Proje =".$proje->getLoginId()."adi ".$proje->getProjeAdi()." icerik ".$proje->getProjeIcerik()." tarih ".$proje->getTarih();
			projeDuzenle($proje);
			}
			else{
				echo "
                <script>  alert('Projenizi paylaşabilmeniz için üye girişi yapmalısınız...');
		        window.location='../../staj/index.php?sayfa=giris.php';
		        </script> ";
			}
	
	}
	


	
?>
	
	
	


<link rel="stylesheet" type="text/css" href="../css/projeler.css">
<!--
<div id="proje-content">
<label id="proje-baslik">Sosyal Yardımlaşma Platformu </label><br/><br/>
<label id="proje-icerik">Türkiye'de toplumda Sosyal Yardımlaşma bilincinin kazanması ve pekiştirilmesini amaçlayan bu proje, 3 Modül den oluşmakta birlikte bunlar;
 İhtiyaç Sahibi, Gönüllü ve Yöneticidir. Gönüllü yardımda bulunmak istediği ürünü sisteme genel bilgileri ile girer.Sisteme kayıtlı olan İhtiyaç Sahibi ihtiyaç duyduğu ürünü
 rezerve eder. Yönetici bu rezerveyi uygun bulması halinde onaylar ve ürün ihtiyaç sahibi ile eşleşir.Gerçek iletim aşaması başlar.</label><br>
<label id="proje-ekleyen">Ömür Buruk</label><label id="proje-ekleyen">Ekleyen : </label>
<label id="proje-tarih">28.04.2016</label><label id="proje-tarih">Tarih :</label>

-->

</div>