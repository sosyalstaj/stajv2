<div class="col-md-6" style="width:100%;">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Başvurular</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tbody><tr>
                      <th style="width: 10px">#</th>
                      <th>Önsöz</th>
                      <th>Açıklama</th>
                      <th style="width: 100px">Tarih</th>
					   <th style="width: 200px">Anlaşma</th>
					   <th style="width: 50px">İşlem</th>
                    </tr>


<?php
		if(@$_POST["sil"])
		{
			global $conn;
			$id=@$_GET["id"];
			$query5 = "DELETE FROM `tbl_basvuru` WHERE id=".$id;
			if($sonuc5 = mysqli_query($conn,$query5))
			{
				echo successMesaj("Başvuru Silindi");
				
			}
			else
			{
				echo errorMesaj("Başvuru Silinemedi");
				
			}
		}
			
		
		global $conn;
		$query = "select * from tbl_basvuru where ogrenci_id=".$_SESSION["staj"]["id"];
		$sonuc = mysqli_query($conn,$query);
		if($sonuc)
		{	
	?>
		
	
	
	<?php
	$k=0;
			while ($row = mysqli_fetch_array($sonuc)) {
				$k++;
				if($row["anlasma"]==0)
					$anlasma="Başvurunuz reddedildi";
				else if($row["anlasma"]==1)
					$anlasma="Başvurunuz kabul edildi";
				else
					$anlasma="Başvurunuz bekleniyor";
			?>
			
					
                    
                    <tr>
                      <td><?php echo $k; ?></td>
                      <td><?php echo $row["onsoz"]; ?></td>
                      <td>
                       <?php echo $row["aciklama"]; ?>
                      </td>
                      <td><?php echo $row["tarih"]; ?></td>
					  <?php
					 if($row["anlasma"]==0)
					echo "<td class=\"btn-danger\">$anlasma </td>";
					else if($row["anlasma"]==1)
					echo "<td class=\"btn-success\"> $anlasma </td>";
					else
					echo "<td class=\"btn-warning\"> $anlasma </td>";
					 ?>
					 <td><form method="POST" action="index.php?sayfa=basvurular-goster&id=<?php echo $row["id"]; ?>"><input type="submit" name="sil"  class="btn btn-danger" value="Sil"/></form></td>
                    </tr>
             
				
				<?php
			
			
			
			
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