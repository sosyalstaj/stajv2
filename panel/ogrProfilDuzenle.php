<?php
	global $conn;
if(!$conn){
	echo "veritabani bağlanti hatasi";
}
else{
	
	$sorgu="select * from tbl_ogrenci where user_id=1"/*.$_SESSION["staj"]->getID().""*/;
	$sorgu2="select * from tbl_kullanici where id=1"/*.$_SESSION["staj"]->getID().""*/;
	$sorgu3="select * from tbl_uni inner join tbl_ogrenci on tbl_uni.id=tbl_ogrenci.uni where tbl_ogrenci.user_id=1"/*.$_SESSION["staj"]->getID().""*/;
	$sorgu4="select * from tbl_uni";
	$sorgu5="select * from tbl_fakulte inner join tbl_ogrenci on tbl_fakulte.id=tbl_ogrenci.uni where tbl_ogrenci.user_id=1"/*.$_SESSION["staj"]->getID().""*/;
	$sorgu7="select * from tbl_bolum inner join tbl_ogrenci on tbl_bolum.id=tbl_ogrenci.fakulte where tbl_ogrenci.user_id=1"/*.$_SESSION["staj"]->getID().""*/;
	$sorgu9="select * from tbl_il inner join tbl_ogrenci on tbl_il.id=tbl_ogrenci.il where tbl_ogrenci.user_id=1"/*.$_SESSION["staj"]->getID().""*/;
	$sorgu10="select * from tbl_il";
	$sorgu11="select * from tbl_ilce inner join tbl_ogrenci on tbl_ilce.id=tbl_ogrenci.ilce where tbl_ogrenci.user_id=1"/*.$_SESSION["staj"]->getID().""*/;
	
	if($sonuc=mysqli_query($conn,$sorgu))
	{	
		$array=mysqli_fetch_array($sonuc);
	}
	else 
	{ 
		echo "Yuklenmedi.";
	}
	if($sonuc2=mysqli_query($conn,$sorgu2))
	{	
		$array2=mysqli_fetch_array($sonuc2);
	}
	else 
	{ 
		echo "Yuklenmedi.";
	}
	if($sonuc3=mysqli_query($conn,$sorgu3))
	{	
		$array3=mysqli_fetch_array($sonuc3);
	}
	else 
	{ 
		echo "Yuklenmedi.";
	}
	
		$sorgu6="select * from tbl_fakulte where tbl_fakulte.uni_id=".$array["fakulte"];
		$sorgu8="select * from tbl_bolum where tbl_bolum.fakulte_id=".$array["bolum"];
		
		$sorgu12="select * from tbl_ilce where tbl_ilce.il_id=".$array["il"];
		
		
		
		
if(@$_POST["duzenle"]){
	$foto=@$_POST["foto"];
	$mail=@$_POST["mail"];
	$parola=@$_POST["parola"];
	$adi=@$_POST["adi"];
	$soyadi=@$_POST["soyadi"];
	$cinsiyet=@$_POST["cinsiyet"];
	$uni=@$_POST["uni"];
	$fakulte=@$_POST["fakulte"];
	$bolum=@$_POST["bolum"];
	$sinif=@$_POST["sinif"];
	$okul_no=@$_POST["okul_no"];
	$il=@$_POST["il"];
	$ilce=@$_POST["ilce"];
	$adres=@$_POST["adres"];
	if($cinsiyet=="Erkek") 
		$cinsiyet=1;
	else 
		$cinsiyet=0;
	
	
if(!$conn){
	echo "veritabani bağlanti hatasi";
}else{
	$sorgu="Update tbl_ogrenci SET adres=\"".$adres."\",okul_no=\"".$okul_no."\",sinif=".$sinif." , cinsiyet=".$cinsiyet." where user_id=1"/*.$_SESSION["staj"]->getID().""*/;
	$sorgu2="Update tbl_kullanici SET adi=\"".$adi."\" , soyadi=\"".$soyadi."\" , mail=\"".$mail."\" , parola=\"".MD5($parola)."\" , foto=\"".$foto."\" where id=1"/*.$_SESSION["staj"]->getID().""*/;
	$sorgu4="select * from tbl_uni where uni_adi='".$uni."'";
	if($sonuc4=mysqli_query($conn,$sorgu4))
	{	
		$array4=mysqli_fetch_array($sonuc4);
	}
	$sorgu3="Update tbl_ogrenci SET uni=".$array4["id"]." where user_id=2"/*.$_SESSION["staj"]->getID().""*/;
	
	
		$sorgu5="select * from tbl_fakulte where fakulte_adi='".$fakulte."'";
	if($sonuc5=mysqli_query($conn,$sorgu5))
	{	
		$array5=mysqli_fetch_array($sonuc5);
	}
	$sorgu6="Update tbl_ogrenci SET fakulte=".$array5["id"]." where user_id=2"/*.$_SESSION["staj"]->getID().""*/;
	
		$sorgu7="select * from tbl_bolum where bolum_adi='".$fakulte."'";
	if($sonuc7=mysqli_query($conn,$sorgu7))
	{	
		$array7=mysqli_fetch_array($sonuc7);
	}
	$sorgu8="Update tbl_ogrenci SET bolum=".$array7["id"]." where user_id=2"/*.$_SESSION["staj"]->getID().""*/;
	
			$sorgu9="select * from tbl_il where il='".$fakulte."'";
	if($sonuc9=mysqli_query($conn,$sorgu9))
	{	
		$array9=mysqli_fetch_array($sonuc9);
	}
	$sorgu10="Update tbl_ogrenci SET il=".$array9["id"]." where user_id=2"/*.$_SESSION["staj"]->getID().""*/;
	
		$sorgu11="select * from tbl_ilce where ilce='".$fakulte."'";
	if($sonuc11=mysqli_query($conn,$sorgu11))
	{	
		$array11=mysqli_fetch_array($sonuc11);
	}
	$sorgu12="Update tbl_ogrenci SET bolum=".$array11["id"]." where user_id=2"/*.$_SESSION["staj"]->getID().""*/;
	
	
		if(mysqli_query($conn,$sorgu)&&mysqli_query($conn,$sorgu2)&&mysqli_query($conn,$sorgu3)&&mysqli_query($conn,$sorgu6)&&mysqli_query($conn,$sorgu8)&&mysqli_query($conn,$sorgu10)&&mysqli_query($conn,$sorgu12)){
			
			echo "Güncellendi.";
			header ("location:ogrenciProfilDuzenle.php");
		}
		else 
		{ 
			echo "Güncellenemedi.";
		}
	
}
}
	
}?>


<center>
        <div class="col-md-6">
        
            <form class="form-horizontal" method="POST" action="">
			<div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="" alt="User profile picture">
              <input type="file" name="foto" class="btn">
            </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="mail" id="inputEmail3" placeholder="Email" value="mehmet@gmail.com">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="parola" id="inputPassword3" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Ad</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="ad" id="inputEmail3" placeholder="Ad" value="Mehmet ">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Soyad</label>

                  <div class="col-sm-10">
                    <input type="text" name="soyad" class="form-control" id="inputPassword3" placeholder="Soyad" value="Yavrucu">
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Cinsiyet</label>

                  <div class="col-sm-10">
                    <select name="cinsiyet" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option selected="selected">Erkek</option>
				  <option selected="">Kadın</option>
					</select>
                  </div>
				  
                </div>
				
				
				
				
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Üniversite</label>

                  <div class="col-sm-10">
                    <select name="uni" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
					<option>Karadeniz Teknik �niversitesi</option><option selected="selected">Sakarya university</option>					</select>
                  </div>
                </div>
                	<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Fakülte</label>

                  <div class="col-sm-10">
                    <select name="fakulte" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
					
Notice:  Undefined variable: array5 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 244
<option>M�hendislik Fak�ltesi</option>					</select>
                  </div>
                </div>
			     	<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Bölüm</label>

                  <div class="col-sm-10">
                    <select name="bolum" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
					
Notice:  Undefined index: fakulte_adi in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 270

Notice:  Undefined variable: array7 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 270
<option selected="selected">?n?aat M�hendisli?i</option>					</select>
                  </div>
                </div>
				 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Sınıf</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="sinif" id="inputPassword3" placeholder="Sınıf" value="3">
                  </div>
                </div>
				 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Okul No</label>

                  <div class="col-sm-10">
                    <input type="text" name="okul_no" class="form-control" id="inputPassword3" placeholder="Okul No" value="305050">
                  </div>
                </div>
												
                  	<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">İl</label>

                  <div class="col-sm-10">
                    <select name="il" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
					
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Adana</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Ad?yaman</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Afyonkarahisar</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>A?r?</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Amasya</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Ankara</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Antalya</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Artvin</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Ayd?n</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Bal?kesir</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Bilecik</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Bing�l</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Bitlis</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Bolu</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Burdur</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Bursa</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>�anakkale</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>�ank?r?</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>�orum</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Denizli</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Diyarbak?r</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Edirne</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Elaz??</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Erzincan</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Erzurum</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Eski?ehir</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Gaziantep</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Giresun</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>G�m�?hane</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Hakkari</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Hatay</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Isparta</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Mersin</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>?stanbul</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>?zmir</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Kars</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Kastamonu</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Kayseri</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>K?rklareli</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>K?r?ehir</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Kocaeli</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Konya</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>K�tahya</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Malatya</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Manisa</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Kahramanmara?</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Mardin</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Mu?la</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Mu?</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Nev?ehir</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Ni?de</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Ordu</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Rize</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Sakarya</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Samsun</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Siirt</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Sinop</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Sivas</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Tekirda?</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Tokat</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Trabzon</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Tunceli</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>?anl?urfa</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>U?ak</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Van</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Yozgat</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Zonguldak</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Aksaray</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Bayburt</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Karaman</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>K?r?kkale</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Batman</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>??rnak</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Bart?n</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Ardahan</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>I?d?r</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Yalova</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Karab�k</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Kilis</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>Osmaniye</option>
Notice:  Undefined variable: array9 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 311
<option>D�zce</option>					</select>
                  </div>
                </div>
			     	<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">İlçe</label>

                  <div class="col-sm-10">
                    <select name="ilce" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
					
Notice:  Undefined variable: array11 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 337
<option>Seyhan</option>
Notice:  Undefined variable: array11 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 337
<option>Ceyhan</option>
Notice:  Undefined variable: array11 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 337
<option>Feke</option>
Notice:  Undefined variable: array11 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 337
<option>Karaisal?</option>
Notice:  Undefined variable: array11 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 337
<option>Karata?</option>
Notice:  Undefined variable: array11 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 337
<option>Kozan</option>
Notice:  Undefined variable: array11 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 337
<option>Pozant?</option>
Notice:  Undefined variable: array11 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 337
<option>Saimbeyli</option>
Notice:  Undefined variable: array11 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 337
<option>Tufanbeyli</option>
Notice:  Undefined variable: array11 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 337
<option>Yumurtal?k</option>
Notice:  Undefined variable: array11 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 337
<option>Y�re?ir</option>
Notice:  Undefined variable: array11 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 337
<option>Alada?</option>
Notice:  Undefined variable: array11 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 337
<option>?mamo?lu</option>
Notice:  Undefined variable: array11 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 337
<option>Sar?�am</option>
Notice:  Undefined variable: array11 in C:\xampp\htdocs\AdminLTE-2.3.3\pages\forms\ogrenciProfilDuzenle.php on line 337
<option>�ukurova</option>					</select>
                  </div>
                </div>
				
				
				
				
				
				  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Adres</label>

                  <div class="col-sm-10">
                    <input type="text" name="adres" class="form-control" id="inputPassword3" placeholder="Adres" value="Adana/Seyhan/�l�ms�z Sokak">
                  </div>
                </div>
              
              
                
                <input type="submit" name="duzenle" class="btn btn-info pull-right" value="Güncelle">
            

              <!-- /.box-footer -->
            
		</div></form>
	</div></center>
        