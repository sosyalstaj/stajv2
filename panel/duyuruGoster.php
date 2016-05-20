<?php

$id=$_SESSION['staj']['id'];

if(@$_POST){
		if(@$_POST["idgizli"]!=""){
			//Mesaj silme i򬥭ini burada yap񹯲um
			global $conn;
			$sorgu = "DELETE FROM `tbl_duyuru` WHERE `id`=".$_POST["idgizli"]."";
			$sonuc=mysqli_query($conn,$sorgu);
	
		}
	}
?>

<div class="col-md-9" style="width:100%">
          <div class="box box-primary" >
		<div class="box-header with-border">
				<h3 class="box-title">Projeler</h3>
				<div class="box-tools pull-right">
					<?php echo " ".Date("j-n-o"); ?>
              </div>
            </div>
			
			
			<!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
			
			<?php
		global $conn;

		$sorgu = "SELECT * FROM `tbl_duyuru` WHERE `user_id`='".$id."'";
		$sonuc=mysqli_query($conn,$sorgu);

		if($sonuc){
			while($sutun=mysqli_fetch_row($sonuc)){
				echo 
				'				
            
                  <tr>
                    <td class="mailbox-name" ><div id="'.$sutun[0].'" class="duyuruGetir" style="cursor:pointer;" >'.$sutun[1].'</div></td>
					<td class="mailbox-date">'.$sutun[3].'</td>
                  </tr>
                 ';
				
			}
		}
		?>
		
		 </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
              </div>
            </div>
		
		
		</div>
          <!-- /. box -->
 </div>
 
 
 <!-- duyuru G�ster -->
 
 <div id="duyurularListesi" class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <div id="duyuruAdi"></div>
                <div id="tarih"></div>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
              </div>
              <!-- /.mailbox-controls -->
              <div id="duyuruIcerik" class="mailbox-read-message">

              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
			  <form action="" method="post">
				<input type="hidden" id="idGizli" name="idgizli" /></input>
				<button type="submit" class="btn btn-default"><i class="fa fa-trash-o"></i> Sil</button>
				<button type="button" class="btn btn-default"><i class="fa fa-print"></i> Yazdır</button>
			</form>
			  </div>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
		
		
 
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

<script>
$(document).ready(function()
{
	$("#duyurularListesi").hide();
	$(".duyuruGetir").click(function(){
			$("#duyurularListesi").show();
			console.log("this: "+ this.id);
			$.ajax({
			  method: "POST",
			  url: "duyuruGetir.php",
			  data: { "q" : this.id },
			  dataType: "json",
			  success:function(veri){
				if(veri==""){
					console.log("ddd");
				}
				else{
					console.log("girdi");
					console.log(veri);
					console.log(veri["durum"]);
					if(veri["durum"]==true){
						 
						$(".box-title").html("duyuru #"+veri["id"]);
						$("#duyuruAdi").html("<h3>"+veri["d_adi"]+"</h3>");
						$("#duyuruIcerik").html(veri["d_icerik"]);
						$("#tarih").html(veri["d_tarih"]);
						$("#idGizli").val(veri["id"]);
						
						console.log(veri["id"]);
						console.log(veri["d_adi"]);
						console.log(veri["d_icerik"]);
						console.log(veri["d_tarih"]);
						console.log(veri["user_id"]);
					}
					else{
						console.log("girmedi");
					}
				}
				
			}
		});
	});
});
</script>