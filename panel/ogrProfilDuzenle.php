<?php
	global $conn;
if(!$conn){
	echo "veritabani bağlanti hatasi";
}
else{
	
	$sorgu="select * from tbl_ogrenci where user_id=".$_SESSION["staj"]["id"];
	$sorgu2="select * from tbl_kullanici where id=".$_SESSION["staj"]["id"];
	$sorgu3="select * from tbl_uni inner join tbl_ogrenci on tbl_uni.id=tbl_ogrenci.uni where tbl_ogrenci.user_id=".$_SESSION["staj"]["id"];
	$sorgu4="select * from tbl_uni";
	$sorgu5="select * from tbl_fakulte inner join tbl_ogrenci on tbl_fakulte.id=tbl_ogrenci.uni where tbl_ogrenci.user_id=".$_SESSION["staj"]["id"];
	$sorgu7="select * from tbl_bolum inner join tbl_ogrenci on tbl_bolum.id=tbl_ogrenci.fakulte where tbl_ogrenci.user_id=".$_SESSION["staj"]["id"];
	$sorgu9="select * from tbl_il inner join tbl_ogrenci on tbl_il.id=tbl_ogrenci.il where tbl_ogrenci.user_id=".$_SESSION["staj"]["id"];
	$sorgu10="select * from tbl_il";
	$sorgu11="select * from tbl_ilce inner join tbl_ogrenci on tbl_ilce.id=tbl_ogrenci.ilce where tbl_ogrenci.user_id=".$_SESSION["staj"]["id"];
	
	if($sonuc=mysqli_query($conn,$sorgu))
	{	
		$array=mysqli_fetch_array($sonuc);
	}
	if($sonuc2=mysqli_query($conn,$sorgu2))
	{	
		$array2=mysqli_fetch_array($sonuc2);
	}
	if($sonuc3=mysqli_query($conn,$sorgu3))
	{	
		$array3=mysqli_fetch_array($sonuc3);
	}
	
		$sorgu6="select * from tbl_fakulte where tbl_fakulte.uni_id=".$array["uni"];
		$sorgu8="select * from tbl_bolum where tbl_bolum.fakulte_id=".$array["fakulte"];
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
	if ($parola!="")
	{
	$sorgu="Update tbl_ogrenci SET adres=\"".$adres."\",okul_no=\"".$okul_no."\",sinif=".$sinif." , cinsiyet=".$cinsiyet." where user_id=".$_SESSION["staj"]["id"];
	
		$sorgu2="Update tbl_kullanici SET adi=\"".$adi."\" , soyadi=\"".$soyadi."\" , mail=\"".$mail."\" , parola=\"".MD5($parola)."\" , foto=\"".$foto."\" where id=".$_SESSION["staj"]["id"];
		$sorgu4="select * from tbl_uni where uni_adi='".$uni."'";
		if($sonuc4=mysqli_query($conn,$sorgu4))
		{	
			$array4=mysqli_fetch_array($sonuc4);
		}
		$sorgu3="Update tbl_ogrenci SET uni=".$array4["id"]." where user_id=".$_SESSION["staj"]["id"];
		
		
			$sorgu5="select * from tbl_fakulte where fakulte_adi='".$fakulte."'";
		if($sonuc5=mysqli_query($conn,$sorgu5))
		{	
			$array5=mysqli_fetch_array($sonuc5);
		}
		$sorgu6="Update tbl_ogrenci SET fakulte=".$array5["id"]." where user_id=".$_SESSION["staj"]["id"];
		
			$sorgu7="select * from tbl_bolum where bolum_adi='".$fakulte."'";
		if($sonuc7=mysqli_query($conn,$sorgu7))
		{	
			$array7=mysqli_fetch_array($sonuc7);
		}
		$sorgu8="Update tbl_ogrenci SET bolum=".$array7["id"]." where user_id=".$_SESSION["staj"]["id"];
		
				$sorgu9="select * from tbl_il where il='".$fakulte."'";
		if($sonuc9=mysqli_query($conn,$sorgu9))
		{	
			$array9=mysqli_fetch_array($sonuc9);
		}
		$sorgu10="Update tbl_ogrenci SET il=".$array9["id"]." where user_id=".$_SESSION["staj"]["id"];
		
			$sorgu11="select * from tbl_ilce where ilce='".$fakulte."'";
		if($sonuc11=mysqli_query($conn,$sorgu11))
		{	
			$array11=mysqli_fetch_array($sonuc11);
		}
		$sorgu12="Update tbl_ogrenci SET bolum=".$array11["id"]." where user_id=".$_SESSION["staj"]["id"];
		
		
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
	else
{
	echo "şifre boş girildi";

}

}
	
}
?>


<center>
        <div class="col-md-6" >
        
            <form class="form-horizontal" method="POST" action="">
			<div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo $array2["foto"];?>" alt="User profile picture">
              <input type="file"name="foto" class="btn"/>
            </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="mail"id="inputEmail3" placeholder="Email"value="<?php echo $array2["mail"]; ?>"/>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control"name="parola" id="inputPassword3" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Ad</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="ad"id="inputEmail3" placeholder="Ad"value="<?php echo $array2["adi"]; ?>"/>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Soyad</label>

                  <div class="col-sm-10">
                    <input type="text"name="soyad" class="form-control" id="inputPassword3" placeholder="Soyad"value="<?php echo $array2["soyadi"]; ?>"/>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Cinsiyet</label>

                  <div class="col-sm-10">
                    <select name="cinsiyet" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option selected="<?php if($array["cinsiyet"]==1)echo "selected";?>">Erkek</option>
				  <option selected="<?php if($array["cinsiyet"]==0)echo "selected";?>">Kadın</option>
					</select>
                  </div>
				  
                </div>
				
				
				
				
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Üniversite</label>

                  <div class="col-sm-10">
                    <select name="uni" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
					<?php
					if($sonuc4=mysqli_query($conn,$sorgu4))
					{	
		
					while($array4=mysqli_fetch_array($sonuc4))
					{
						if($array4["uni_adi"]==$array3["uni_adi"])
							echo "<option  selected=\"selected\">".$array4["uni_adi"]."</option>";
						else
							echo "<option >".$array4["uni_adi"]."</option>";
					}
					}
					else 
					{ 
						echo "Yuklenmedi.";
					}
					
				  ?>
					</select>
                  </div>
                </div>
                	<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Fakülte</label>

                  <div class="col-sm-10">
                    <select name="fakulte" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
					<?php
					if($sonuc6=mysqli_query($conn,$sorgu6))
					{	
		
					while($array6=mysqli_fetch_array($sonuc6))
					{
						if($array6["fakulte_adi"]==$array5["fakulte_adi"])
							echo "<option  selected=\"selected\">".$array6["fakulte_adi"]."</option>";
						else
							echo "<option >".$array6["fakulte_adi"]."</option>";
					}
					}
					else 
					{ 
						echo "Yuklenmedi.";
					}
					
				  ?>
					</select>
                  </div>
                </div>
			     	<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Bölüm</label>

                  <div class="col-sm-10">
                    <select name="bolum" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
					<?php
					if($sonuc8=mysqli_query($conn,$sorgu8))
					{	
		
					while($array8=mysqli_fetch_array($sonuc8))
					{
						if($array8["fakulte_adi"]==$array7["fakulte_adi"])
							echo "<option  selected=\"selected\">".$array8["bolum_adi"]."</option>";
						else
							echo "<option >".$array8["bolum_adi"]."</option>";
					}
					}
					else 
					{ 
						echo "Yuklenmedi.";
					}
					
				  ?>
					</select>
                  </div>
                </div>
				 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Sınıf</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control"name="sinif" id="inputPassword3" placeholder="Sınıf"value="<?php echo $array["sinif"]; ?>"/>
                  </div>
                </div>
				 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Okul No</label>

                  <div class="col-sm-10">
                    <input type="text" name="okul_no"class="form-control" id="inputPassword3" placeholder="Okul No"value="<?php echo $array["okul_no"]; ?>"/>
                  </div>
                </div>
												
                  	<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">İl</label>

                  <div class="col-sm-10">
                    <select name="il" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
					<?php
					if($sonuc10=mysqli_query($conn,$sorgu10))
					{	
		
					while($array10=mysqli_fetch_array($sonuc10))
					{
						if($array10["il"]==$array9["il"])
							echo "<option  selected=\"selected\">".$array10["il"]."</option>";
						else
							echo "<option >".$array10["il"]."</option>";
					}
					}
					else 
					{ 
						echo "Yuklenmedi.";
					}
					
				  ?>
					</select>
                  </div>
                </div>
			     	<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">İlçe</label>

                  <div class="col-sm-10">
                    <select name="ilce" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
					<?php
					if($sonuc12=mysqli_query($conn,$sorgu12))
					{	
		
					while($array12=mysqli_fetch_array($sonuc12))
					{
						if($array12["ilce"]==$array11["ilce"])
							echo "<option  selected=\"selected\">".$array12["ilce"]."</option>";
						else
							echo "<option >".$array12["ilce"]."</option>";
					}
					}
					else 
					{ 
						echo "Yuklenmedi.";
					}
					
				  ?>
					</select>
                  </div>
                </div>
				
				
				
				
				
				  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Adres</label>

                  <div class="col-sm-10">
                    <input type="text"name="adres" class="form-control" id="inputPassword3" placeholder="Adres"value="<?php echo $array["adres"]; ?>"/>
                  </div>
                </div>
              
              <div class="box-footer">
                
                <input type="submit" name="duzenle" class="btn btn-info pull-right"value="Güncelle"/>
              </div>
              <!-- /.box-footer -->
            </form>
		</div>
	</center>