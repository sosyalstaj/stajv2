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

<div class="content-input">
	<label>  Adres </label>
	<div>
	<textarea name="adres"></textarea>
	</div>
</div>

<div class="content-input">
	<label>  Açıklama </label>
	<div>
	<textarea name="aciklama"></textarea>
	</div>
</div>