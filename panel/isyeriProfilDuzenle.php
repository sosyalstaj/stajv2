<?php

if(@$_POST["sil"]){
			global $conn;
			$id=$_POST["anid"];
			$query5 = "delete from tbl_foto where id=$id";
			$sonuc5 = mysqli_query($conn,$query5);
	
	
}
	$id =$_SESSION["staj"]["id"];
	global $conn;
	$query_profil ="Select K.adi,K.mail,K.hakkimda,K.foto,K.rol,I.id,I.ilce,I.adres,I.aciklama,I.il from 
			tbl_kullanici as K INNER JOIN tbl_isyeri as I on K.id = I.user_id WHERE K.id =".$id;
			
	$kisi_sonuc=mysqli_query($conn,$query_profil);
	$kisi=mysqli_fetch_array($kisi_sonuc);
?>
<center>
        <div class="col-md-6" >
        
            <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
			<div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo $kisi["foto"];?>" alt="User profile picture">
              <input type="file"name="foto" class="btn"/>
            </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="mail"id="inputEmail3" placeholder="Email"value="<?php echo $kisi["mail"]; ?>"/>
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
                    <input type="text" class="form-control" name="ad"id="inputEmail3" placeholder="Ad"value="<?php echo $kisi["adi"]; ?>"/>
                  </div>
                </div>
                
				
		
								
                  	<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">İl</label>

                  <div class="col-sm-10">
                    <select name="il" id="il" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
					<?php
					$query_il ="Select id,il from tbl_il";
					$il_sonuc =mysqli_query($conn,$query_il);
					optionListele($il_sonuc ,$kisi["il"],"id","il");
				  ?>
					</select>
                  </div>
                </div>
			     	<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">İlçe</label>

                  <div class="col-sm-10">
                    <select name="ilce" id ="ilce" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
					         <option value="-1">Ýl Seç</option>
          <?php
					$query_ilce ="Select id,ilce from tbl_ilce WHERE il_id=".$kisi["il"];
					$ilce_sonuc =mysqli_query($conn,$query_ilce);
					optionListele($ilce_sonuc ,$kisi["ilce"],"id","ilce");
				  ?>
					</select>
                  </div>
                </div>
				
				  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Adres</label>

                  <div class="col-sm-10">
                    <input type="text"name="adres" class="form-control" id="inputPassword3" placeholder="Adres"value="<?php echo $kisi["adres"]; ?>"/>
                  </div>
                </div>
				  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Açıklama</label>

                  <div class="col-sm-10">
                    <input type="text"name="aciklama" class="form-control" id="inputPassword3" placeholder="Adres"value="<?php echo $kisi["aciklama"]; ?>"/>
                  </div>
                </div>
              
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Hakkımda</label>

                  <div class="col-sm-10">
                    <textarea name="hakkimda"  class="form-control" rows="4"><?php echo $kisi["hakkimda"]; ?></textarea>
                  </div>
                </div>
              
              
                
                <input type="submit" name="isyeriGuncelle" class="btn btn-info pull-right" value="Güncelle"/>
             
            </form>
			
			
			<div style="width:100%;">
			<?php
			
					global $conn;
					$query4 = "select * from tbl_foto where user_id=".$_SESSION["staj"]["id"];
					$sonuc4 = mysqli_query($conn,$query4);
					if($sonuc4)
					{	
						$k=0;
						while ($row4 = mysqli_fetch_array($sonuc4)) {
							?>
							<form action="" method="POST" style="width:160px; float:left;"><br/>
							<div style="width:150px;">
							<img class="profile-user-img img-responsive " src="<?php echo $row4["foto"];?>" alt="User profile picture">
							<input type="submit" name="sil" class="btn btn-info pull-right" value="Sil"/>
							 <input type="hidden" name="anid" value="<?php echo $row4["id"]; ?>" />
							 </div>
							</form>
							<?php
		
					}
					
					}
			?>
			
				</div>
		</div>
	</center>