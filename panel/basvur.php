<?php
global $conn;
if(!$conn){
	echo "veritabani bağlanti hatasi";
}
else{
	
	$sorgu="select * from tbl_kullanici where rol=3";
			
}



if(@$_POST["basvur"]){
	
	$isyeri_id=@$_POST["firma"];
	$ogrenci_id=$_SESSION["staj"]["id"];
	$onsoz=@$_POST["onsoz"];
	$aciklama=@$_POST["aciklama"];
	$tarih=date("j-n-o");
	echo $tarih;

$sorgu2="INSERT INTO `tbl_basvuru`(`isyeri_id`, `ogrenci_id`, `tarih`, `onsoz`, `aciklama`,anlasma) VALUES (".$isyeri_id.",".$ogrenci_id.",'".$tarih."','".$onsoz."','".$aciklama."',-1)";
echo $sorgu2;
	if($sonuc2=mysqli_query($conn,$sorgu2))
	{	
		echo "Başvuru yapıldı";
	}
	else
	{
		echo "Başvuru yapılamadı";
	}
}
?>


<center>
	<div class="box-body">
        <div class="col-md-6" >
        
            <form method="POST" action="" class="form-horizontal">
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Firmalar</label>

                  <div class="col-sm-10">
                    <select name="firma" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
					<?php
					if($sonuc=mysqli_query($conn,$sorgu))
					{
						while($array=mysqli_fetch_array($sonuc))
						{
							
							echo "<option value=".$array["id"].">".$array["adi"]."</option>";
						
						}
					}
				  ?>
					</select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Önsöz</label>

                  <div class="col-sm-10">
                    <input name="onsoz"type="text" class="form-control" name="parola" id="inputPassword3" placeholder="Önsöz" />
                  </div>
                </div>
				      <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Açıklama</label>

                  <div class="col-sm-10">
                    <input type="text" name="aciklama"class="form-control" name="parola" id="inputPassword3" placeholder="Açıklama" />
                  </div>
                </div>

                <input type="submit" class="btn btn-info pull-right" name="basvur" value="Başvur"/>
             
            
            </form>
		</div>
	</center>