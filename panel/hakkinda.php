<?php

?>

<div class="row">
  <div >
  <h3 class="baslik col-sm-12">Hakkinda</h3>
  </div>
</div>

  <form class="form-horizontal" method="post" action="" >
 	 
	<div class="form-group">
      <label class="control-label col-sm-2" for="sure">İçerik:
       <span style="color:red; font-size:15px;" title="Bu alan zorunludur.">*</span>
      </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="icerik" placeholder="içerik"name="icerik"  >
		</div>
		</div>

        <div class="form-group">    
         <div class="row">
              <div class="col-sm-offset-2 col-sm-2">
              <div class="form-group">
			  <?php
			
			global $conn;
			$query1 ="select id from tbl_hakkimizda  where user_id ='".$_SESSION["staj"]["id"]."' ";
			$kont=mysqli_query($conn,$query1);
			$num_rows = mysqli_num_rows($kont);
			if($num_rows==0)
			{
				echo'
				 <input type="hidden" name="kaydet"  value="1"/>
      			<button type="submit" class="btn btn-default" name="ekle" id="ekle">EKLE</button> 
				</div>
				';
			}
			else{
				echo'
				<input type="hidden" name="kaydet"  value="1"/>
      			<button type="submit" class="btn btn-default" name="kaydet" id="kaydet">KAYDET</button> 
				</div>
				';
			}
			?>
			 
               
              </div>
          </div>
		</div>  
  </form>
