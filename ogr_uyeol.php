<div class="content-input">
	<label>  Cinsiyet </label>
	<div>
	<select name="cinsiyet" size="1" class="form-control">
		<option value="1">Bay</option>
	    <option value="0">Bayan</option>
	</select>
	</div>
</div>

<div class="content-input">
	<label>Doğum Tarihi</label>
	<div>
		 <select name="dgun"  style="width:75px ; height:35px;">
			 <?php
				for($i=1;$i<32;$i++){
					echo "<option value=\"".$i."\">$i</option>";
				}
			 ?>
			</select>
	
			<select name="day"  style="width:100px ; height:35px ;">
				<?php
					$aylar =array(1=>"Ocak","Şubat","Mart","Nisan","Mayıs","Haziran",
					"Temmuz","Agustos","Eylül","Ekim","Kasım","Aralık");
					for($i=1;$i<=12;$i++){
						echo "<option value=\"".$i."\">$aylar[$i]</option>";
					}
				?>
			</select>

			<select name="dyil"  style="width:75px ; height:35px; ">
				<?php
					$yil=Date('Y');					
					for($i=$yil;$i > 1930 ;$i--){
						echo "<option value=\"".$i."\">$i</option>";
					}
				?>
			</select>

	</div>
</div>

<div class="content-input">
	<label>  İl </label>
	<div>
	<select name="sehir" size="1" id="il-sec" class="form-control">
		<option value="-1">ilk seç</option>
        <?php 
            il_listele();
        ?>
    </select>
	</div>
</div>

<div class="content-input">
	<label>  İlçe </label>
	<div>
	<select name="ilce" size="1" id="ilce-sec" class="form-control">
                 
    </select>
	</div>
</div>