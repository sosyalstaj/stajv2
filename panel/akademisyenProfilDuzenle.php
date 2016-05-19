<?php
	$id =$_SESSION["staj"]["id"];
	global $conn;
	$query_profil ="Select K.adi,K.soyadi,K.mail,K.foto,K.rol,A.unvan,A.tc,A.uni_id from 
			tbl_kullanici as K INNER JOIN tbl_akademisyen as A on K.id = A.user_id WHERE K.id =".$id;
			
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
      
              
              <div class="box-footer">
                
                <input type="submit" name="akademisyenProfilDuzenle" class="btn btn-info pull-right"value="Güncelle"/>
              </div>
              <!-- /.box-footer -->
            </form>
		</div>
	</center>