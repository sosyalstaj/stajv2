<?php
global $conn;
if(!$conn){
	echo "veritabani bağlantı hatasi";
}
else{
	
	$sorgu="select * from tbl_hakkimizda where user_id=".$_SESSION["staj"]["id"];
	if($sonuc=mysqli_query($conn,$sorgu))
	{	
		$array=mysqli_fetch_array($sonuc);
	}
		
}

if(@$_POST["kaydet"]){
	global $conn;
	$icerik=@$_POST["icerik"];
	$tarih=@date('Y-m-d');
	$userID=$_SESSION["staj"]["id"];
	if(!mysqli_num_rows($sonuc)>0)
	{
		$sorgu2="INSERT INTO tbl_hakkimizda(user_id, baslik, icerik, tarih) VALUES ('$userID','xxx','$icerik','$tarih')";
		if($sonuc=mysqli_query($conn,$sorgu2))
		{	
			echo '<div class="alert alert-success">
				  <strong>Başarılı!</strong> İşlem başarılı bir şekilde kaydedildi...
				</div>
				<script>  alert("Başarılı...");
				window.location="index.php?sayfa=hakkinda";
		        </script> 
				';
		}
		else{
			echo '
			<div class="alert alert-danger">
			  <strong>Başarısız!</strong> Kaydetme işlemi başarısız.
			</div>
			<script>  alert("Başarısız!");
				window.location="index.php?sayfa=hakkinda";
		      </script> 
			';
		}
	}
	else{
		$sorgu3="Update tbl_hakkimizda SET user_id='$userID', baslik='xxx', icerik='$icerik', tarih='$tarih' ";

		if($sonuc=mysqli_query($conn,$sorgu3))
		{	
			echo '<div class="alert alert-info">
				  <strong>Başarılı!</strong> İşlem başarılı bir şekilde güncellendi...
				</div>
				<script>  alert("Başarılı...");
				window.location="index.php?sayfa=hakkinda";
		        </script> 
				';
		}
		else{
			echo '<div class="alert alert-warning">
				  <strong>Başarısız!</strong> Güncelleme gerçeklenemedi.
				</div>
				<script>  alert("Başarısız!");
				window.location="index.php?sayfa=hakkinda";
		      </script> 
				';
		}
	}
	
}
?>

<div class="row">
  <div >
  <h3 class="baslik col-sm-12">HAKKIMDA </h3>
  </div>
</div>

  <form class="form-horizontal" method="post" action="" >
 	 
	<div class="form-group">
      <label class="control-label col-sm-2" for="sure">İçerik:
       <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
      </label>
      <div class="col-sm-6">
        <textarea class="form-control" rows="5" id="icerik" name="icerik"><?php echo @$array["icerik"];  ?></textarea>
		</div>
		</div>

        <div class="form-group">    
         <div class="row">
              <div class="col-sm-offset-2 col-sm-2">
              <div class="form-group">				 
      			<input type="submit" class="btn btn-default" name="kaydet" id="kaydet" value="KAYDET"/>
				</div>
			
               
              </div>
          </div>
		</div>  
  </form>
 