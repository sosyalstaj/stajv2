<div class="col-md-6" style="width:100%;">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Anlaşmalar</h3>
                </div>
                <div class="box-body">
                  <table class="table table-bordered">
                    <tbody><tr>
                      <th style="width: 10px">#</th>
                      <th>Öğrenci No</th>
                      <th>Öğrenci Sınıfı</th>
					  <th >Öğrenci Soyadı</th>
                      <th >Öğrenci Soyadı</th>
					   <th >İşyeri Adı</th>
					   <th >Anlaşmalar</th>
					   
                    </tr>


<?php

		global $conn;
		$query = "SELECT * FROM tbl_basvuru as B INNER JOIN tbl_ogrenci as O on O.user_id =B.ogrenci_id INNER JOIN tbl_kullanici as K on K.id = O.user_id WHERE B.anlasma =-1 and O.aka_id =".$_SESSION["staj"]["id"];
		$sonuc = mysqli_query($conn,$query);
		
		if($sonuc)
		{	
	?>
		
	
	
	<?php
	$k=0;
			while ($row = mysqli_fetch_array($sonuc)) {
				$k++;
					
				$anlasma="Başvurunuz bekleniyor";
				$query2 = "select * from tbl_kullanici where id=".$row["isyeri_id"];
				$sonuc2 = mysqli_query($conn,$query2);
				while ($row2 = mysqli_fetch_array($sonuc2)) {
				
			?>
			
					
                    
                    <tr>
                   
					     <td><?php echo $k; ?></td>
                      <td><a href="index.php?sayfa=profil-gor&id=<?php echo $row["ogrenci_id"]; ?>"><?php echo $row["okul_no"]; ?></a></td>
                      <td>
                       <?php echo $row["sinif"]; ?>
                      </td>
                      <td><?php echo $row["adi"]; ?></td>
					  <td><?php echo $row["soyadi"];?></td>
					  <td><a href="index.php?sayfa=profil-gor&id=<?php echo $row["isyeri_id"]; ?>"><?php echo $row2["adi"];?></a></td>
					   <td class="btn-warning"><?php echo $anlasma ?></td>
					 
                    </tr>
             
				
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
              </div>
</div>