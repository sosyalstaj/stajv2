<?php
$id=$_SESSION["staj"]["id"];

if(@$_POST["sil"])
		{
			global $conn;
			$id=@$_GET["id"];
			echo $id;
			$query5 = "UPDATE tbl_ogrenci SET aka_id=0,akaonay=0,akaokunma=0 WHERE user_id=".$id;
			if($sonuc5 = mysqli_query($conn,$query5))
			{
				echo successMesaj("Öğrenci Silindi");
				
			}
			else
			{
				echo errorMesaj("Öğrenci Silinemedi");
				
			}
		}

?>


<div class="col-md-6" style="width:100%;">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Öğrencilerim</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tbody><tr>
                      <th style="width: 10px">#</th>
                      <th>Adı</th>
                      <th>Soyadı</th>
                      <th style="width: 100px">Okul No</th>
					   <th style="width: 50px">İşlem</th>
                    </tr>


<?php

		global $conn;
		$query = "select * from tbl_ogrenci where aka_id=$id and akaonay=1";
		$sonuc = mysqli_query($conn,$query);
		if($sonuc)
		{	
	?>
		
	
	
	<?php
	$k=0;
			while ($row = mysqli_fetch_array($sonuc)) {
				$k++;
				$uid=$row["user_id"];
				
				$query2 = "select * from tbl_kullanici where id=$uid";
				$sonuc2 = mysqli_query($conn,$query2);
				if($sonuc2)
				{	
					$row2 = mysqli_fetch_array($sonuc2)
			?>
			
		
                    
                    <tr>
						
                      <td><?php echo $k; ?></td>
					  <td><a href="index.php?sayfa=profil-gor&id=<?php echo $row["user_id"]; ?>"><?php echo $row["okul_no"]; ?></a></td>
                      <td><?php echo $row2["adi"]; ?></td>
                      <td>
                       <?php echo $row2["soyadi"]; ?>
                      </td>
                      <td><form method="POST" action="index.php?sayfa=ogrenci-listem&id=<?php echo $row["user_id"]; ?>"><input type="submit" name="sil"  class="btn btn-danger" value="Sil"/></form></td>
                   
					
		
                    </tr>
             
               <!-- /.box-body -->
				
				<?php
			
			
			
			
			}
		}
		}

?>
     </tbody></table>
 </div>
                <div class="box-footer clearfix">
                  <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#"><<</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">>></a></li>
                  </ul>
                </div>
              </div><!-- /.box -->
</div>








