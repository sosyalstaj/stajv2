<?php
$id=$_SESSION["staj"]["id"];



?>


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
                      <th>Aciklama</th>
                      <th style="width: 100px">Tarih</th>
					   <th style="width: 150px">Anlaşma</th>
                    </tr>


<?php

		global $conn;
		$query = "select * from tbl_basvuru where isyeri_id=$id and okundu=1";
		$sonuc = mysqli_query($conn,$query);
		if($sonuc)
		{	
	?>
		
	
	
	<?php
	$k=0;
			while ($row = mysqli_fetch_array($sonuc)) {
				$k++;
			?>
			
		
                    
                    <tr>
                      <td><?php echo $k; ?></td>
                      <td><?php echo $row["onsoz"]; ?></td>
                      <td>
                       <?php echo $row["aciklama"]; ?>
                      </td>
                      <td><?php echo $row["tarih"]; ?></td>
					  <td><?php if ($row["anlasma"]==1){ echo "Anlaşma Sağlandi"; } 
							 else if ($row["anlasma"]==0) {echo "Reddedildi"; }
							 else if ($row["anlasma"]==-1) {echo "Onay Bekleniyor"; } ?>
					  </td>
					  
		
                    </tr>
             
               <!-- /.box-body -->
				
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








