<?php
$id=$_SESSION["staj"]["id"];
if(@$_POST["onay"]){
	$gelen=$_POST["anid"];

	global $conn;
		$query = "UPDATE  tbl_basvuru set anlasma=1,okundu=1 where id=".$gelen ;
	
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
		$query2 = "UPDATE  tbl_basvuru set anlasma=0,okundu=1 where  id=".$gelen ;
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
                  <h3 class="box-title">Basvurular</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tbody><tr>
                      <th style="width: 10px">#</th>
                      <th>Onsoz</th>
                      <th>Aciklama</th>
                      <th style="width: 100px">Tarih</th>
					   <th style="width: 150px">Anlasma</th>
					   <th style="width: 100px">Onay - Red</th>
                    </tr>


<?php

		global $conn;
		$query = "select * from tbl_basvuru where isyeri_id=$id and okundu=0";
		$sonuc = mysqli_query($conn,$query);
		if($sonuc)
		{	
	?>
		
	
	
	<?php
	$k=0;
			while ($row = mysqli_fetch_array($sonuc)) {
				$k++;
				echo "g";
			?>
			
		
                    
                    <tr>
                      <td><?php echo $k; ?></td>
                      <td><?php echo $row["onsoz"]; ?></td>
                      <td>
                       <?php echo $row["aciklama"]; ?>
                      </td>
                      <td><?php echo $row["tarih"]; ?></td>
					  <td><?php if ($row["anlasma"]==1){ echo "Anlasma Saglandi"; } 
							 else if ($row["anlasma"]==0) {echo "Reddedildi"; }
							 else if ($row["anlasma"]==-1) {echo "Onay Bekleniyor"; } ?>
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








