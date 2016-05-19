<?php  
	global $conn;
		$sorgu = "SELECT * from tbl_kullanici as K INNER JOIN tbl_ogrenci as O on K.id = O.user_id inner JOIN tbl_bolum as B on B.id = O.bolum  Where K.id=1 ";  
	    $sorgu2= "SELECT * from tbl_kullanici as K INNER JOIN tbl_iletisim as I on K.id = I.user_id WHERE K.id=1 ";  
		$sonuc=mysqli_query($conn,$sorgu);
		$sonuc2=mysqli_query($conn,$sorgu2);
		
		 if($sonuc)
			 $sutun=mysqli_fetch_array($sonuc);
				
		 else
			echo "Aranan Kayıt Bulunamadı 1";
		
		if($sonuc2)
			 $sutun2=mysqli_fetch_array($sonuc2);
		else
			echo "Aranan Kayıt Bulunamadı 2";

		;

?>

<div class="row">
  <div >
  <h3 class="baslik col-sm-12">Öğrencinin Bilgileri</h3>
  </div>
</div>

  <form class="form-horizontal" method="post" action="staj_formu_cikti.php" >
 	 
  	<div class="form-group">
      <label class="control-label col-sm-2" for="adi">Adı:     
	  <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
      </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="adim" placeholder="ad" name="adim"  value="<?php  echo $sutun['adi'];?>" >
      </div>
    </div>
  
   	<div class="form-group">
      <label class="control-label col-sm-2" for="adi">Soyadı:
       <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
      </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="soyad" placeholder="soyad"  name="soyad"  value="<?php  echo $sutun['soyadi'];?>" >
      </div>
    </div>
	
	 	<div class="form-group">
      <label class="control-label col-sm-2" for="numara">Öğrenci No :
       <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
      </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="numara" placeholder="numara"  name="numara"  value="<?php  echo $sutun['okul_no'];?>">
      </div>
    </div>
  
  
  <div class="form-group">
      <label class="control-label col-sm-2" for="bolum_sinif">Bölüm/Sınıf :
       <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
      </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="bolum_sinif" placeholder="bolum/sinif"  name="bolum_sinif" value="<?php  echo $sutun['bolum_adi'];?>" >
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:
      </label>
      <div class="col-sm-6">
        <input type="email" class="form-control" id="emailim" placeholder="email" name="emailim"  value="<?php  echo $sutun['mail'];?>">
      </div>
    </div>
    
	
   <div class="form-group">
    <label class="control-label col-sm-2" for="inputTell">Telefon:
     <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
    </label>
    <div class="controls col-sm-6">
      <input type="text" class="form-control bfh-phone" maxlength="11" id="telefonum"  data-format="(ddd) ddd-dddd"  placeholder="telefon no. " name="telefonum"  value="<?php  echo $sutun2['tel'];?>">
    </div>
  </div>
	 
	 
   <div class="form-group">
      <label class="control-label col-sm-2" for="adres">Adres:
       <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
      </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="adresim" placeholder="adres"  name="adresim" value="<?php  echo $sutun['adres'];?>" >
      </div>
    </div>
	
<div class="row">
  <div >
  <h3 class="baslik col-sm-12">Öğrencinin Nüfus Kayıt Bilgileri</h3>
  </div>
</div>
	
	 <div class="form-group">
      <label class="control-label col-sm-2" for="seri">N.Cüzdan Seri No:
       <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
      </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="seri" placeholder="seri"  name="seri" >
      </div>
    </div>
	
	   <div class="form-group">
      <label class="control-label col-sm-2" for="tc">TC Kimlik No:
       <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
      </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="tc" placeholder="TC"name="tc"  >
            <span id="tcHata" style="color:red; font-size:15px;" title="Bu alan zorunludur." class="tcHata"></span>

		</div>
		</div>
		
		
		<div class="form-group">
      <label class="control-label col-sm-2" for="baba">Baba Adı:      
	  <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
      </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="baba" placeholder="baba" name="baba"  >
      </div>
    </div>
  
   	<div class="form-group">
      <label class="control-label col-sm-2" for="anne">Anne Adı:
       <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
      </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="anne" placeholder="anne"  name="anne" >
      </div>
    </div>
	
	
   	<div class="form-group">
      <label class="control-label col-sm-2" for="dogumYeri">Doğum Yeri:
       <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
      </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="dogumYeri" placeholder="dogumYeri"  name="dogumYeri" >
      </div>
    </div>
		
	<div class="form-group">
      <label class="control-label col-sm-2" for="dogumYil">Doğum Y.:
       <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
      </label>
       <div class="col-sm-6">
     <input type="date" class="form-control" id="dogumYil" placeholder="dogumYil"  name="dogumYil" value="<?php echo Date('Y-m-d');?>" >
         </div>
	</div>
	
	<div class="form-group">
	<label  class="control-label col-sm-2"for="il">	Nüfusa Kayıtlı Olduğu İl:
	<span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
  </label>
    <div class="col-sm-6">
        <select name="sehir" size="1" id="il-sec" class="form-control">
		   <option value="-1">ilk seç</option>
                 <?php 
                    il_listele();
                ?>
		</select>
		</div>
	</div>
	
	
	<div class="form-group">
	<label  class="control-label col-sm-2"for="ilce">İlçe:
	<span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
  </label>
    <div class="col-sm-6">
      <select name="ilce" size="1" id="ilce-sec" class="form-control">
               <?php   ilce_listele($_POST["sehir"]); ?>
       </select>
		</div>
	</div>
	
	 
	
	  <div class="form-group">
      <label class="control-label col-sm-2" for="mahalle">Mahalle- Köy:
       <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
      </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="mahalle" placeholder="mahalle"  name="mahalle" >
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="cilt">Cilt No:
       <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
      </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="cilt" placeholder="cilt"  name="cilt" >
      </div>
    </div>
	
	
		<div class="form-group">
      <label class="control-label col-sm-2" for="aile">	Aile Sıra No :
       <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
      </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="aile" placeholder="aile"  name="aile" >
      </div>
    </div>
    
		<div class="form-group">
      <label class="control-label col-sm-2" for="sira">	 Sıra No :
       <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
      </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="sira" placeholder="sira"  name="sira" >
      </div>
    </div>	

	<div class="form-group">
      <label class="control-label col-sm-2" for="nufus">	Verildiği Nüfus Dairesi :
       <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
      </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="nufus" placeholder="nufus"  name="nufus" >
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="neden">	Veriliş Nedeni :
       <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
      </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="neden" placeholder="neden"  name="neden" >
      </div>
    </div>
  
  
  
<div class="form-group">
      <label class="control-label col-sm-2" for="neden">	Veriliş Tarih :
       <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
      </label>
      <div class="col-sm-6">
        <input type="date" class="form-control" id="verilisTarihi" placeholder="verilisTarihi"  name="verilisTarihi" value="<?php echo Date('Y-m-d');?>" >
      </div>
    </div>
  
 <div class="row">
  <div >
  <h3 class="baslik col-sm-12">Staj Yapılacak Yerin</h3>
  </div>
</div>

    
    

		<div class="form-group">
      <label class="control-label col-sm-2" for="kurum adı">Adı:       <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
      </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="kurumAdi" placeholder="kurumAdi" name="kurumAdi"  >
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="kurum adres">Adres:
       <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
      </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="kurumAdres" placeholder="kurumAdres"  name="kurumAdres">
      </div>
    </div>
  
   	<div class="form-group">
      <label class="control-label col-sm-2" for="Üretim/Hizmet Alanı">Üretim:
       <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
      </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="alan" placeholder="alan"  name="alan" >
      </div>
    </div>
	  <div class="form-group">
    <label class="control-label col-sm-2" for="isyeriTelefon">Telefon:
     <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
    </label>
    <div class="controls col-sm-6">
      <input type="text" class="form-control bfh-phone" maxlength="11" id="isyeriTelefon"  data-format="(ddd) ddd-dddd"  placeholder="telefon no. " name="isyeriTelefon">
    </div>
  </div>
	

    
	   <div class="form-group">
      <label class="control-label col-sm-2" for="fax">Faks No:
       <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
      </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="fax" placeholder="fax"name="fax"  >
		</div>
		</div>
		
	<div class="form-group">
      <label class="control-label col-sm-2" for="kurumEmail">Email:
	   <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
      </label>
      <div class="col-sm-6">
        <input type="email" class="form-control" id="kurumEmail" placeholder="kurumEmail" name="kurumEmail">
      </div>
    </div>

	  <div class="form-group">
      <label class="control-label col-sm-2" for="web">Web Adresi:
       <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
      </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="web" placeholder="web"name="web"  >
		</div>
		</div>
	
   	<div class="form-group">
      <label class="control-label col-sm-2" for="baslamaTarih">Staja Başlama Tarihi :
       <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
      </label>
      <div class="col-sm-6">
        <input type="date" class="form-control" id="baslamaTarih" placeholder="baslamaTarih"  name="baslamaTarih" value="<?php echo Date('Y-m-d');?>" >
      </div>
    </div>	
	<div class="form-group">
      <label class="control-label col-sm-2" for="bitisTarihi">	Bitiş Tarihi
	  :
       <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
      </label>
      <div class="col-sm-6">
        <input type="date" class="form-control" id="bitisTarihi" placeholder="bitisTarihi"  name="bitisTarihi" value="<?php echo Date('Y-m-d');?>">
      </div>
    </div>
		
		<div class="form-group">
      <label class="control-label col-sm-2" for="sure">Süresi (gün):
       <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
      </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="sure" placeholder="sure/gün"name="sure"  >
		</div>
		</div>
      
        <div class="form-group">    
         <div class="row">
              <div class="col-sm-offset-2 col-sm-2">
              <div class="form-group">
			  <input type="hidden" name="kaydet"  value="1"/>
      			<button type="submit" class="btn btn-default" name="yazir" id="yazir">YAZDIR</button> 
      			<!-- <input type="submit" class="form-control" name="hastaEkle" id="hastaEkle" value="hasta Al">-->
    		 </div>
               
              </div>
          </div>
    </div>  
  </form>
