<?php
global $conn;
if(!$conn){
	echo "veritabani baðlanti hatasi";
}
else{
	
	$sorgu="select * from tbl_isyeri where user_id=".$_SESSION["staj"]["id"];
	$sorgu2="select * from tbl_kullanici where id=".$_SESSION["staj"]["id"];
	
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
	$sorgu3="select * from tbl_ilce where il_id=".$array["il"] ;
	$sorgu4="select * from tbl_il";
}



if(@$_POST["duzenle"]){
	$adi=@$_POST["adi"];
	$foto=@$_POST["foto"];
	$mail=@$_POST["mail"];
	$parola=@$_POST["parola"];$adi=@$_POST["adi"];
	$aciklama=@$_POST["aciklama"];
	$il=@$_POST["il"];
	$ilce=@$_POST["ilce"];
	$adres=@$_POST["adres"];

	
if(!$conn){
	echo "veritabani baðlanti hatasi";
}else{
if ($parola!="")
	{
	$sorgu="Update tbl_isyeri SET adres=\"".$adres."\",aciklama=\"".$aciklama."\" where user_id=".$_SESSION["staj"]["id"];
	$sorgu2="Update tbl_kullanici SET adi=\"".$adi."\" , mail=\"".$mail."\" , parola=\"".MD5($parola)."\" , foto=\"".$foto."\" where id=".$_SESSION["staj"]["id"];

	$sorgu3="select * from tbl_il where il='".$il."'";
	if($sonuc3=mysqli_query($conn,$sorgu3))
	{	
		$array3=mysqli_fetch_array($sonuc3);
		echo "girdi".$array3["id"];
	}
	$sorgu4="Update tbl_isyeri SET il=".$array3["id"]." where user_id=".$_SESSION["staj"]["id"];
	
	$sorgu5="select * from tbl_ilce where ilce='".$ilce."'";	
	if($sonuc5=mysqli_query($conn,$sorgu5))
	{	
		$array5=mysqli_fetch_array($sonuc5);
		echo "girdi".$array5["id"];
	}
	$sorgu6="Update tbl_isyeri SET ilce=".$array5["id"]." where user_id=".$_SESSION["staj"]["id"];
		if(mysqli_query($conn,$sorgu)&&mysqli_query($conn,$sorgu2)&&mysqli_query($conn,$sorgu4)&&mysqli_query($conn,$sorgu6)){
			
			echo "Güncellendi.";
			header ("location:isverenProfilDuzenle.php");
		}
		else 
		{ 
			echo "Güncellenemedi.";
}
	
}	
else
{
	echo "þifre boþ girildi";
}
}

}




?>


        <center>
        <div class="col-md-6" >
        
            <form class="form-horizontal" method="POST" action="">
			<div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo $array2["foto"];?>" alt="User profile picture">
              <input type="file" class="btn" name="foto"/>
            </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" name="mail" class="form-control" id="inputEmail3" value="<?php echo $array2["mail"]; ?>" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" name="parola" class="form-control" id="inputPassword3" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Ad</label>

                  <div class="col-sm-10">
                    <input type="text" name="adi" class="form-control" id="inputEmail3" placeholder="Ad" value="<?php echo $array2["adi"]; ?>"/>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Açýklama</label>

                  <div class="col-sm-10">
                    <input type="text" name="aciklama" class="form-control" id="inputPassword3" placeholder="Açýklama" value="<?php echo $array["aciklama"]; ?>"/>
                  </div>
                </div>
				
				
				
								<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Ýlçe</label>

                  <div class="col-sm-10">
                    <select name="ilce" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
					<?php
					if($sonuc3=mysqli_query($conn,$sorgu3))
					{	
		
					while($array3=mysqli_fetch_array($sonuc3))
					{
						if($array3["id"]==$array["ilce"])
							echo "<option  selected=\"selected\">".$array3["ilce"]."</option>";
						else
							echo "<option >".$array3["ilce"]."</option>";
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
                  <label for="inputEmail3" class="col-sm-2 control-label">Ýl</label>

                  <div class="col-sm-10">
                    <select name="il" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
					<?php
					if($sonuc4=mysqli_query($conn,$sorgu4))
					{	
		
					while($array4=mysqli_fetch_array($sonuc4))
					{
						if($array4["id"]==$array["il"])
							echo "<option  selected=\"selected\">".$array4["il"]."</option>";
						else
							echo "<option >".$array4["il"]."</option>";
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
                    <input type="text" name="adres" class="form-control" id="inputPassword3" placeholder="Adres" value="<?php echo $array["adres"]; ?>"/>
                  </div>
                </div>
              </div>
              
              
                
                <input type="submit" name="duzenle"class="btn btn-info pull-right" value="Güncelle"/>
              
            </form>
		</div>
	</center>