<?php
global $conn;
if(!$conn){
	echo "veritabani bağlanti hatasi";
}
else{
	
	$sorgu="select * from tbl_akademisyen where user_id=2"/*.$_SESSION["staj"]->getID().""*/;
	$sorgu2="select * from tbl_kullanici where id=2"/*.$_SESSION["staj"]->getID().""*/;
	$sorgu3="select * from tbl_akademisyen_uni inner join tbl_akademisyen on tbl_akademisyen_uni.user_id=tbl_akademisyen.user_id inner join tbl_uni on tbl_uni.id=tbl_akademisyen_uni.uni_id where tbl_akademisyen.user_id=2"/*.$_SESSION["staj"]->getID().""*/;
	$sorgu4="select * from tbl_uni";
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
	
}

if(@$_POST["duzenle"]){
	$adi=@$_POST["adi"];
	$soyadi=@$_POST["soyadi"];
	$tc=@$_POST["tc"];
	$unvan=@$_POST["unvan"];
	$foto=@$_POST["foto"];
	$uni=@$_POST["uni"];
	$mail=@$_POST["mail"];
	$parola=@$_POST["parola"];
	

	
if(!$conn){
	echo "veritabani bağlanti hatasi";
}else{
	$sorgu="Update tbl_akademisyen SET tc=".$tc.",unvan=\"".$unvan."\" where user_id=2"/*.$_SESSION["staj"]->getID().""*/;
	$sorgu2="Update tbl_kullanici SET adi=\"".$adi."\" , soyadi=\"".$soyadi."\" , mail=\"".$mail."\" , parola=\"".MD5($parola)."\" , foto=\"".$foto."\" where id=2"/*.$_SESSION["staj"]->getID().""*/;
	$sorgu4="select * from tbl_uni where uni_adi='".$uni."'";
	if($sonuc4=mysqli_query($conn,$sorgu4))
	{	
		$array4=mysqli_fetch_array($sonuc4);
	}
	$sorgu3="Update tbl_akademisyen_uni SET uni_id=".$array4["id"]." where user_id=2"/*.$_SESSION["staj"]->getID().""*/;
		if(mysqli_query($conn,$sorgu)&&mysqli_query($conn,$sorgu2)&&mysqli_query($conn,$sorgu3)){
			
			echo "Güncellendi.";
			header ("location:akademisyenProfilDuzenle.php");
		}
		else 
		{ 
			echo "Güncellenemedi.";
}
	
}
}
?>




        <center>
        <div class="col-md-6" >
        
            <form method="POST" action="" class="form-horizontal">
			<div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo $array2["foto"];?>" alt="User profile picture">
              <input type="file" class="btn" name="foto"/>
            </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="mail"id="inputEmail3" placeholder="Email" value="<?php echo $array2["mail"]; ?>"/>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Şifre</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="parola" id="inputPassword3" placeholder="Şifre" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Ad</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3"name="adi" placeholder="Ad" value="<?php echo $array2["adi"]; ?>"/>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" name="s"class="col-sm-2 control-label">Soyad</label>

                  <div class="col-sm-10">
                    <input type="text" name="soyadi"class="form-control" id="inputPassword3" placeholder="Soyad" value="<?php echo $array2["soyadi"]; ?>"/>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">TC Kimlik No</label>

                  <div class="col-sm-10">
                    <input type="text"name="tc" class="form-control" id="inputPassword3" placeholder="TC Kimlik No" value="<?php echo $array["tc"]; ?>"/>
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
                  <label for="inputPassword3" class="col-sm-2 control-label">Ünvan</label>

                  <div class="col-sm-10">
                    <input type="text" name="unvan"class="form-control" id="inputPassword3" placeholder="Ünvan" value=" <?php echo $array["unvan"]; ?>" />
                  </div>
                </div>
              </div>
              
              <div class="box-footer">
                <input type="submit" class="btn btn-info pull-right" name="duzenle" value="Güncelle"/>
              </div>
              <!-- /.box-footer -->
            </form>
		</div>
	</center>
     
