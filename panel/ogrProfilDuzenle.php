<form class="form-horizontal" method="POST" action="">
		<div class="box-body box-profile">
	        <img class="profile-user-img img-responsive img-circle" src="<?php echo $array2["foto"];?>" alt="User profile picture">
	        <input type="file"name="foto" class="btn"/>
	    </div>
	    
	    
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
					
				  ?>
					</select>
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
</form>