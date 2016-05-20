<?php

$id=$_SESSION['staj']['id'];

if(@$_POST){
		if(@$_POST["duyuru"]=="paylas"){
			$d_adi=$_POST["duyuruAdi"];
			$d_icerik=$_POST["duyuruIcerik"];
			$tarih=Date("j-n-o");
			global $conn;
			$sorgu = "INSERT INTO `tbl_duyuru`( `baslik`, `icerik`, `tarih`,`user_id`) VALUES('".$d_adi."','".$d_icerik."','".$tarih."','".$id."')";
			$sonuc=mysqli_query($conn,$sorgu);
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
              <h3 class="box-title">Yeni Duyuru Ekle</h3>
            </div>
            <!-- /.box-header -->
			<form action="" method="post">
				<div class="box-body">
				  <div class="form-group">
					<input class="form-control" placeholder="Duyuru Adı:" name="duyuruAdi">
				  </div>
				  <div class="form-group">
					<h5 class="box-title">Duyuru İçeriği</h5>
				  </div>
				  <div class="form-group">
						<textarea id="compose-textarea" class="form-control" style="height: 300px" name="duyuruIcerik" >
						</textarea>
				  </div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
				  <div class="pull-right">
				  		<input type="hidden" name="duyuru" value="paylas" />
					<button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Paylaş</button>
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