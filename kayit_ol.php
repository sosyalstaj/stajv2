<?php
	$sonuc="";
	if(@$_POST["kaydet"])
	{
		$sonuc =uyeOl();
	}

?>

<form id="kayitOl" method="post">
	<div class="content-input">
		<label>    </label>
		<div>
			<?php echo $sonuc; ?>
		</div>
	</div>
	<div class="content-input">
		<label>  Adı  </label>
		<div>
			<input name="adi" type="text"   value="" required="">	
		</div>
	</div>

	<div class="content-input">
		<label>  Soyadı </label>
		<div>
			<input name="soyadi" type="text"   value="" required="">	
		</div>
	</div>
	
	<div class="content-input">
		<label>  Email Addresi </label>
		<div>
			<input name="email" type="email"  value="">
		</div>
	</div>

	<div class="content-input">
		<label>  Parola </label>
		<div>
			<input name="parola" type="password"  value="">
		</div>
	</div>

	<div class="content-input">
		<label>  Parola Tekrar </label>
		<div>
			<input name="parolatekrar" type="password"  value="">
		</div>
	</div>

	<div class="content-input">
		<label>  Rol </label>
		<div>
			<select name="rol" id="yetki" size="1" class="form-control">
				<option selected value="1">Öğrenci</option>
				<option value="2">Akademisyen</option>
				<option value="3">İşveren</option>
			</select>
		</div>
	</div>
	

	
	
	<br/> 
	<div class="orta" id="secilenRol">
        <?php include_once("ogr_uyeol.php");?>
    </div>
	
	</br>
	

	<div class="content-actions">
		
			<input type="submit" name="kaydet" value="Kaydet" id="kaydet"  class="btn"/> 
	</div>
</form>
</div>