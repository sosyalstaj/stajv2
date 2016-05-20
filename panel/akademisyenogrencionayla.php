<?php
$id=$_SESSION["staj"]["id"];
if(@$_POST["onay"]){
	$gelen=$_POST["anid"];

	global $conn;
		$query = "UPDATE  tbl_ogrenci set akaonay=1,akaokunma=1 where id=".$gelen ;
	
		$sonuc = mysqli_query($conn,$query);
		echo "<div class='pad margin no-print'>
          <div class='callout callout-info' style='margin-bottom: 0!important;'>
            <h4><i class='fa fa-info'></i> Not:</h4>
            Basvuru istegi onaylandi.
          </div>
        </div>";
}
else if (@$_POST){
		$gelen=$_POST["anid"];
		global $conn;
		$query2 = "UPDATE  tbl_ogrenci set akaonay=0,akaokunma=1 where  id=".$gelen ;
		$sonuc2 = mysqli_query($conn,$query2);
		echo "<div class='pad margin no-print'>
          <div class='callout callout-info' style='margin-bottom: 0!important;'>
            <h4><i class='fa fa-info'></i> Not:</h4>
            Basvuru istegi reddedildi.
          </div>
        </div>";
	
}


?>


<div class="col-md-6" style="width:100%;">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Öğrenci Onayla</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tbody><tr>
                      <th style="width: 10px">#</th>
                      <th>Adi</th>
                      <th>Soyadi</th>
                      <th style="width: 100px">Okul No</th>
					   <th style="width: 150px">Onay Durumu</th>
					   <th style="width: 100px">Onay - Red</th>
                    </tr>


<?php

		global $conn;
		$query = "select * from tbl_ogrenci where aka_id=$id and akaokunma=0";
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
                      <td><?php echo $row2["adi"]; ?></td>
                      <td>
                       <?php echo $row2["soyadi"]; ?>
                      </td>
                      <td><?php echo $row["okul_no"]; ?></td>
					  <td><?php if ($row["akaonay"]==1){ echo "Öğrenciniz"; } 
							 else if ($row["akaonay"]==0) {echo "Reddedildi"; }
							 else if ($row["akaonay"]==-1) {echo "Onay Bekleniyor"; } ?>
					  </td>
					  <form action="" method="POST">
					    <td>
						<input type="submit" name="onay" class="btn btn-success" value="1"/>
						<input type="submit" name="reddet"  class="btn btn-danger" value="0"/> 
						</td>
					 <input type="hidden" name="anid" value="<?php echo $row["id"]; ?>" />
					  
					 </form>
		
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








