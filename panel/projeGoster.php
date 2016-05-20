<?php

$id=$_SESSION['staj']['id'];

if(@$_POST){
		if(@$_POST["idgizli"]!=""){
			//Mesaj silme i򬥭ini burada yap񹯲um
			global $conn;
			$sorgu = "DELETE FROM `tbl_proje` WHERE `id`=".$_POST["idgizli"]."";
			$sonuc=mysqli_query($conn,$sorgu);
	
		}
		if(@$_POST["sil"])
		{
			global $conn;
			$id=@$_GET["id"];
			$query5 = "DELETE FROM `tbl_proje` WHERE id=".$id;
			$sonuc5 = mysqli_query($conn,$query5);
			header("Location:index.php?sayfa=projeler-goster");
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
              <div class="table-responsive mailbox-messages box-body">
                <table class="table table-bordered">
                  <tbody>
					<tr>
					<td>#</td>
					<td>Proje Adı</td>
					<td>Proje Tarihi</td>
					<td>İşlem</td>
					</tr>
			<?php
		global $conn;

		//$sorgu = "SELECT `adi`,`soyadi`,`foto`,`tarih`,`tbl_mesaj`.`id` FROM `tbl_mesaj` LEFT JOIN `tbl_kullanici` ON tbl_mesaj.alici_id = tbl_kullanici.id WHERE `gonderen_id`='".$_SESSION['staj']->getID()."'";
		$sorgu = "SELECT * FROM `tbl_proje` WHERE `user_id`='".$id."'";
		$sonuc=mysqli_query($conn,$sorgu);

		if($sonuc){
			$i=1;
			while($sutun=mysqli_fetch_row($sonuc)){
				echo 
				'				
            
                  <tr>
					<td>'.$i.'</td>
                    <td class="mailbox-name" ><div id="'.$sutun[0].'" class="projeGetir" style="cursor:pointer;" >'.$sutun[1].'</div></td>
					<td class="mailbox-date">'.$sutun[3].'</td>
					<td><form method="POST" action="index.php?sayfa=projeler-goster&id='.$sutun[0].'"><input type="submit" name="sil"  class="btn btn-danger" value="Sil"/></form></td>
                  </tr>
                 ';
				 $i++;
				
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
 
 
 <!-- Proje G�ster -->
 
 <div id="projelerListesi" class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <div id="projeAdi"></div>
                <div id="tarih"></div>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
              </div>
              <!-- /.mailbox-controls -->
              <div id="projeIcerik" class="mailbox-read-message">

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
	$("#projelerListesi").hide();
	$(".projeGetir").click(function(){
			$("#projelerListesi").show();
			console.log("this: "+ this.id);
			$.ajax({
			  method: "POST",
			  url: "projeGetir.php",
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
						//$("#gonderen").html("<h5>Kimden:"+veri["adi"]+" "+veri["soyadi"]+"</h5>");
						//$("#ileti").html("<h3>"+veri["konu"]+"</h3>");
						//$("#gonderenMesaj").html(veri["mesaj"]);
						//$("#gonderenTd").text("");
						//$("#gonderenTd").html("<strong>G�nderen</strong>");
						//$("#idGizli").val(veri["id"]);
						//alert($("#gonderen").val())
						//console.log($("#gonderen").val());;
						$(".box-title").html("Proje #"+veri["id"]);
						$("#projeAdi").html("<h3>"+veri["p_adi"]+"</h3>");
						$("#projeIcerik").html(veri["p_icerik"]);
						$("#tarih").html(veri["p_tarih"]);
						$("#idGizli").val(veri["id"]);
						
						console.log(veri["id"]);
						console.log(veri["p_adi"]);
						console.log(veri["p_icerik"]);
						console.log(veri["p_tarih"]);
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