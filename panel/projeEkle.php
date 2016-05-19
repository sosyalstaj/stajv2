<?php

$id=$_SESSION['staj']['id'];

if(@$_POST){
		if(@$_POST["proje"]=="gitti"){
			echo "<script>alert('zaaaa')</script>";
			$p_adi=$_POST["projeAdi"];
			$p_icerik=$_POST["projeIcerik"];
			$tarih=Date("j-n-o");
			global $conn;
			$sorgu = "INSERT INTO `tbl_proje` (`p_adi`, `p_icerik`, `tarih`, `user_id`) VALUES ('".$p_adi."','".$p_icerik."','".$tarih."','".$id."')";
			$sonuc=mysqli_query($conn,$sorgu);
			if($sonuc)
				echo "eklendi";
			else 
				echo "eklenmedi";
		}
	}
?>

<!doctype html>
<html>
<head>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>






<div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Yeni Proje Ekle</h3>
            </div>
            <!-- /.box-header -->
			<form action="" method="post">
				<div class="box-body">
				  <div class="form-group">
					<input class="form-control" placeholder="Proje Adı:" name="projeAdi">
				  </div>
				  <div class="form-group">
					<h5 class="box-title">Proje İçeriği</h5>
				  </div>
				  <div class="form-group">
						<textarea id="compose-textarea" class="form-control" style="height: 300px" name="projeIcerik" >
						</textarea>
				  </div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
				  <div class="pull-right">
				  		<input type="hidden" name="proje" value="gitti" />
					<button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Gönder</button>
				  </div>
				</div>
			</form>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
		
<script>
  $(function () {
    $("#compose-textarea").wysihtml5();
  });
</script>


</body>
</html>