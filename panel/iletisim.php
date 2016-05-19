<?php
global $conn;
if(!$conn){
	echo "veritabani bağlantı hatasi";
}
else{
	
	$sorgu="select * from tbl_iletisim where user_id=".$_SESSION["staj"]["id"];
	if($sonuc=mysqli_query($conn,$sorgu))
	{	
		$array=mysqli_fetch_array($sonuc);
	}
		
}

if(@$_POST["duzenle"]){
	global $conn;
	$tel=@$_POST["tel"];
	$facebook=@$_POST["facebook"];
	$github=@$_POST["github"];
	$gmail=@$_POST["gmail"];
	$web_site=@$_POST["web_site"];
	
	if(!mysqli_num_rows($sonuc)>0)
	{
		$sorgu="INSERT INTO tbl_iletisim(facebook, gmail, github, web_site, tel, user_id) VALUES ('".$facebook."','".$gmail."','".$github."','".$web_site."','".$tel."',".$_SESSION["staj"]["id"].")";
		if($sonuc=mysqli_query($conn,$sorgu))
		{	
			echo '<div class="alert alert-success">
				  <strong>Başarılı!</strong> İşlem başarılı bir şekilde kaydedildi...
				</div>
				
				';
		}
		else{
			echo '
			<div class="alert alert-danger">
			  <strong>Başarısız!</strong> Kaydetme işlemi başarısız.
			</div>
			
			';
		}
	}
	else{
		$sorgu="Update tbl_iletisim SET tel='".$tel."', facebook='".$facebook."', github='".$github."', gmail='".$gmail."' , web_site='".$web_site."' where user_id=".$_SESSION["staj"]["id"];

		if($sonuc=mysqli_query($conn,$sorgu))
		{	
				echo '<div class="alert alert-info">
				  <strong>Başarılı!</strong> İşlem başarılı bir şekilde güncellendi...
				</div>
				
				';
		}
		else{
				echo '<div class="alert alert-warning">
				  <strong>Başarısız!</strong> Güncelleme gerçeklenemedi.
				</div>
				
				';
		}
	}
}
?>
<center>
	<div class="col-md-6" >
        
        <form method="POST" action="" class="form-horizontal">
			
            <div class="box-body">
               
			   	 <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Kişisel WebSite</label>

					<div class="col-sm-10">
						<input type="text" class="form-control" name="web_site"id="inputEmail3" placeholder="Kişisel WebSite" value="<?php echo $array["web_site"]; ?>"/>
					</div>
                </div>
				 <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Telefon</label>

					<div class="col-sm-10">
						<input type="text" class="form-control" name="tel"id="inputEmail3" placeholder="Telefon" value="<?php echo $array["tel"]; ?>"/>
					</div>
                </div>
                 <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Gmail</label>

					<div class="col-sm-10">
						<input type="email" class="form-control" name="gmail"id="inputEmail3" placeholder="Gmail" value="<?php echo $array["gmail"]; ?>"/>
					</div>
                </div>
				 <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">GitHub</label>

					<div class="col-sm-10">
						<input type="text" class="form-control" name="github"id="inputEmail3" placeholder="GitHub" value="<?php echo $array["github"]; ?>"/>
					</div>
                </div>
			
				 <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Facebook</label>

					<div class="col-sm-10">
						<input type="text" class="form-control" name="facebook"id="inputEmail3" placeholder="Facebook" value="<?php echo $array["facebook"]; ?>"/>
					</div>
                </div>
				
              
              
                <input type="submit" class="btn btn-info pull-right" name="duzenle" value="Güncelle"/>
              
            </form>
		</div>
	</center>
     
