<?php
	$id =$_SESSION["staj"]["id"];
	global $conn;
	$query_profil ="Select K.adi,K.soyadi,K.mail,K.foto,K.hakkimda,K.rol,O.aka_id,O.cinsiyet,O.id,O.ilce,O.uni,O.adres,O.okul_no,O.sinif,O.bolum,O.uni,O.fakulte,O.il from 
			tbl_kullanici as K INNER JOIN tbl_ogrenci as O on K.id = O.user_id WHERE K.id =".$id;
			
	$kisi_sonuc=mysqli_query($conn,$query_profil);
	$kisi =mysqli_fetch_array($kisi_sonuc);
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
                  <label for="inputPassword3" class="col-sm-2 control-label">Soyad</label>

                  <div class="col-sm-10">
                    <input type="text"name="soyad" class="form-control" id="inputPassword3" placeholder="Soyad"value="<?php echo $kisi["soyadi"]; ?>"/>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Cinsiyet</label>

                  <div class="col-sm-10">
                    <select name="cinsiyet" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                 	 <option value='1' selected="<?php if($kisi["cinsiyet"]==1)echo "selected";?>">Erkek</option>
				 	 <option value='0' selected="<?php if($kisi["cinsiyet"]==0)echo "selected";?>">Kadın</option>
					</select>
                  </div>
				  
                </div>
		
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Üniversite</label>

                  <div class="col-sm-10">
                    <select name="uni" id="uni" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
  					       <option value="-1">Ünüversite Seç</option>
             <?php
    						$query_uni ="Select id ,uni_adi from tbl_uni";
    						$uni_sonuc =mysqli_query($conn,$query_uni);
    						optionListele($uni_sonuc ,$kisi["uni"],"id","uni_adi");
  				  	?>
					</select>
                  </div>
                </div>
                	<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Fakülte</label>

                  <div class="col-sm-10">
                    <select name="fakulte" id="fakulte" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                      <option value="-1">Fakülte Seç</option>
      					<?php
      						$query_fak ="Select id,uni_id,fakulte_adi from tbl_fakulte WHERE uni_id=".$kisi["uni"];
      						$fak_sonuc =mysqli_query($conn,$query_fak);
      						optionListele($fak_sonuc ,$kisi["fakulte"],"id","fakulte_adi");
      				  	?>
					</select>
                  </div>
                </div>
			     	<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Bölüm</label>

                  <div class="col-sm-10">
                    <select name="bolum" id="bolum" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
					         <option value="-1">Bölüm Seç</option>
          <?php
						$query_bolum ="Select id,bolum_adi from tbl_bolum WHERE fakulte_id=".$kisi["fakulte"];
						$bol_sonuc =mysqli_query($conn,$query_bolum);
						optionListele($bol_sonuc ,$kisi["fakulte"],"id","bolum_adi");
				  ?>
					</select>
                  </div>
                </div>
				 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Sınıf</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control"name="sinif" id="inputPassword3" placeholder="Sınıf"value="<?php echo $kisi["sinif"]; ?>"/>
                  </div>
                </div>
				 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Okul No</label>

                  <div class="col-sm-10">
                    <input type="text" name="okul_no"class="form-control" id="inputPassword3" placeholder="Okul No"value="<?php echo $kisi["okul_no"]; ?>"/>
                  </div>
                </div>
									


            <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Akademisyen </label>

                    <div class="col-sm-10">
                    <select name="akademisyen" id="akademisyen" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                      <option value="-1">Akademisyen Seç</option>
                  <?php
                    $query_aka ="SELECT CONCAT_WS(' ',K.adi ,K.soyadi) as 'isim',K.id FROM tbl_akademisyen as UID 
                    INNER JOIN tbl_kullanici as K on UID.user_id = K.id WHERE UID.uni_id = ".$kisi["uni"];
                    $bol_sonuc =mysqli_query($conn,$query_aka);
                    optionListele($bol_sonuc ,$kisi["aka_id"],"id","isim");
                  ?>
         
          </select>
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
					         <option value="-1">İl Seç</option>
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
                  <label for="inputPassword3" class="col-sm-2 control-label">Hakkımda</label>

                  <div class="col-sm-10">
                    <textarea name="hakkimda"  class="form-control" rows="4"><?php echo $kisi["hakkimda"]; ?></textarea>
                  </div>
                </div>
              
                
                <input type="submit" name="profilduzenle" class="btn btn-info pull-right"value="Güncelle"/>
           
              <!-- /.box-footer -->
            </form>
		</div>
	</center>