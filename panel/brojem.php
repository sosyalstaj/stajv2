<?php
	
	//$_SESSION['staj']->getID();
	$id=$_SESSION['staj']['id'];
	
	if(@$_POST){
		if(@$_POST["m"]=="gitti"){
			//Mesaj gönderme iþlemini burada yapýyorum
			$alici=$_POST["aliciIDgiden"];
			$konu=$_POST["konu"];
			$alicininMesaj=$_POST["alicininMesaj"];
			$tarih=Date("j-n-o");
			global $conn;
			//$sorgu = "INSERT INTO `tbl_mesaj`(`gonderen_id`, `alici_id`, `konu`, `mesaj`, `tarih`) 
			//		VALUES ('".$_SESSION['staj']->getID()."' , '".$alici."' , '".$konu."' , '".$alicininMesaj."' , '11-11-2016')";
			$sorgu = "INSERT INTO `tbl_mesaj`(`gonderen_id`, `alici_id`, `konu`, `mesaj`, `tarih`) 
					VALUES ('".$id."' , '".$alici."' , '".$konu."' , '".$alicininMesaj."' , '".$tarih."')";
			$sonuc=mysqli_query($conn,$sorgu);
		}
		else{
			//Mesaj silme iþlemini burada yapýyorum
			global $conn;
			$sorgu = "DELETE FROM `tbl_mesaj` WHERE `id`=".$_POST["idgizli"]."";
			$sonuc=mysqli_query($conn,$sorgu);
		}
	}

	
?>

<!doctype html>
<html>
<head>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<link href="projem.css" rel="stylesheet" type="text/css">
 


<script language="javascript" type="text/javascript">
			$(function()
			{
				$(".aliciarama_sonuc").hide();
				$("input[name=alici]").keyup(function(){
					var value=$(this).val();
					var konu="value="+value;
					if(value!="")
					{
						$.ajax({
							type:"POST",
							url:"mesajAjax.php",
							data:konu,
							success:function(sonuc)
							{
								$(".aliciarama_sonuc").show().html(sonuc);
							}
						});
						$(".aliciarama_sonuc").click(function(){
							$(".aliciarama_sonuc").hide();
						});
					}
					else{
						$(".aliciarama_sonuc").hide();
						$(".aliciarama_sonuc").click(function(){
							$(".aliciarama_sonuc").hide();
						});
					}
				});
			});
		</script>

</head>

<body>
<?php

global $conn;
$sorgu1 = "SELECT COUNT(`tbl_mesaj`.`id`) FROM `tbl_mesaj` LEFT JOIN `tbl_kullanici` ON tbl_mesaj.gonderen_id = tbl_kullanici.id WHERE `alici_id`='".$id."'";
$sorgu2 = "SELECT COUNT(`tbl_mesaj`.`id`) FROM `tbl_mesaj` LEFT JOIN `tbl_kullanici` ON tbl_mesaj.alici_id = tbl_kullanici.id WHERE `gonderen_id`='".$id."'";		
$sonuc1=mysqli_query($conn,$sorgu1);
$sonuc2=mysqli_query($conn,$sorgu2);
if($sonuc1){
	$gelenMesajSayi=mysqli_fetch_row($sonuc1);
}
if($sonuc2){
	$gidenMesajSayi=mysqli_fetch_row($sonuc2);
}

?>
<div id="mesaj">
	<div id="mesajright">
		
		<div class="box box-solid">
            <div class="box-header with-border box box-primary">
              <h3 class="box-title">Mesajlar</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
			<div id="yeniTikla" class="btn btn-primary btn-block margin-bottom" >Yeni Mesaj GÃ¶nder</div>
              <ul class="nav nav-pills nav-stacked">
                <li id="gelenTikla" class="active" >
					<a href="#"><i class="fa fa-inbox"></i> Gelen Kutusu
					<span class="label label-primary pull-right"><?php echo $gelenMesajSayi[0]; ?></span></a></li>
                <li id="gidenTikla" ><a href="#"><i class="fa fa-envelope-o"></i> Giden Kutusu
					<span class="label label-warning pull-right"><?php echo $gidenMesajSayi[0]; ?></span></a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
	</div>
 
 
 
 
 
	<div id="mesajleft" class="gelenKutusu">
	<div class="col-md-9" style="width:100%">
          <div class="box box-primary" >
		<div class="box-header with-border">
				<h3 class="box-title">Gelen Kutusu</h3>
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

		//$sorgu = "SELECT `adi`,`soyadi`,`foto`,`tarih`,`tbl_mesaj`.`id` FROM `tbl_mesaj` LEFT JOIN `tbl_kullanici` ON tbl_mesaj.gonderen_id = tbl_kullanici.id WHERE `alici_id`='".$_SESSION['staj']->getID()."'";
		  $sorgu = "SELECT `adi`,`soyadi`,`foto`,`tarih`,`tbl_mesaj`.`id` FROM `tbl_mesaj` LEFT JOIN `tbl_kullanici` ON tbl_mesaj.gonderen_id = tbl_kullanici.id WHERE `alici_id`='".$id."'";
		$sonuc=mysqli_query($conn,$sorgu);

		if($sonuc){
			while($sutun=mysqli_fetch_row($sonuc)){
				echo '				
            
                  <tr>
                    <td><img src="'.$sutun[2].'" width="64px" height="64px" /></td>
                    <td class="mailbox-name" ><a href="#" id="'.$sutun[4].'" class="mesajiicerik" >'.$sutun[0]." ".$sutun[1].'</a></td>
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
	</div>


	
	
	<div id="mesajleft" class="gidenKutusu" style="visibility:hidden;">
		<div class="col-md-9" style="width:100%">
          <div class="box box-primary" >
		<div class="box-header with-border">
				<h3 class="box-title">Giden Kutusu</h3>
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

		//$sorgu = "SELECT `adi`,`soyadi`,`foto`,`tarih`,`tbl_mesaj`.`id` FROM `tbl_mesaj` LEFT JOIN `tbl_kullanici` ON tbl_mesaj.alici_id = tbl_kullanici.id WHERE `gonderen_id`='".$_SESSION['staj']->getID()."'";
		$sorgu = "SELECT `adi`,`soyadi`,`foto`,`tarih`,`tbl_mesaj`.`id` FROM `tbl_mesaj` LEFT JOIN `tbl_kullanici` ON tbl_mesaj.alici_id = tbl_kullanici.id WHERE `gonderen_id`='".$id."'";
		$sonuc=mysqli_query($conn,$sorgu);

		if($sonuc){
			while($sutun=mysqli_fetch_row($sonuc)){
				echo 
				'				
            
                  <tr>
                    <td><img src="'.$sutun[2].'" width="64px" height="64px" /></td>
                    <td class="mailbox-name" ><a href="#" id="'.$sutun[4].'" class="mesajiicerikGiden" >'.$sutun[0]." ".$sutun[1].'</a></td>
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
	</div>
	

	
	<!--  Mesaj içeðini buraya yazdýracaðým  -->
	
<div id="mesajlarim" >
<div id="yenimesajlarim">
	<div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Mesaj Oku</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <div id="ileti"></div>
                <div id="gonderen"></div>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
              </div>
              <!-- /.mailbox-controls -->
              <div id="gonderenMesaj" class="mailbox-read-message">

              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
			  <form action="" method="post">
				<input type="hidden" id="idGizli" name="idgizli" /></input>
				<button type="submit" class="btn btn-default"><i class="fa fa-trash-o"></i> Sil</button>
				<button type="button" class="btn btn-default"><i class="fa fa-print"></i> YazdÄ±r</button>
			</form>
			  </div>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
	</div>
	
	
	<!-- Yeni Mesaj Yeri -->
	<div id="yeniMesajYolla">
		<div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Yeni Mesaj GÃ¶nder</h3>
            </div>
            <!-- /.box-header -->
			<form action="" method="post">
				<div class="box-body">
				  <div class="form-group">
						<div id="aliciaramabolumu">
							<input type="text" id="alici" name="alici" placeholder="AlÄ±cÄ± AdÄ±:" class="form-control">
							<div class="alicikarama_sonuc" style="position:absolute;">
								<div class="aliciarama_sonuc"  style="cursor:pointer">
								<span>Sonuc</span>
								</div>
							</div>
						</div>
				  </div>
				  <div class="form-group">
					<input class="form-control" placeholder="Konu:" name="konu">
				  </div>
				  <div class="form-group">
						<textarea id="compose-textarea" class="form-control" style="height: 300px" name="alicininMesaj">
						</textarea>
				  </div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
				  <div class="pull-right">
				  		<input type="hidden" name="m" value="gitti" />
						<input type="hidden" name="aliciIDgiden" id ="aliciIDgidenid"></input>
					<button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> GÃ¶nder</button>
				  </div>
				</div>
			</form>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
	</div>
</div>



</div>




<script>
/*
function mesajlarimmm(i) {
	console.log("mesajlarimmm("+i+")");
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                console.log(xmlhttp.responseText);
            }
        };
        xmlhttp.open("GET", "mesajIcerikGetir.php?q=" + i, true);
        xmlhttp.send();
}

function yenimesajlarim(i) {
    document.getElementById(i).style.visibility='visible';
	document.getElementById("mesajlarim").style.visibility='hidden';
}
function anamesaj(i) {
	document.getElementById("yenimesajlarim").style.visibility='hidden';
	document.getElementById("mesajlarim").style.visibility='hidden';
}
*/


/*
var checkBoxSayac = function() {
  var n = $( "input:checked" ).length;
  if(n==0){
	$("#gizle").css("display","none");
  }
  else{
	$("#gizle").css("display","inline");
  }
}
checkBoxSayac();
 
$( "input[type=checkbox]" ).on( "click", checkBoxSayac );
*/


$(document).ready(function()
{		
	$(".gidenKutusu").hide();
	$("#yeniMesajYolla").hide();
	$("#yenimesajlarim").hide();
	//document.getElementsByClassName('gidenKutusu').style.visibility='hidden';
    $("msjkonu").click(function()
	{
        $("#msjkonu").load("brocem.html ");
    });
	
	$("#gelenTikla").click(function(){
		console.log("gelen kutusu tiklandi");
		$("#yeniMesajYolla").hide();
		$(".gidenKutusu").hide();
		$(".gelenKutusu").show();
		$("#yenimesajlarim").show();
		$("#gidenTikla").attr("class","");
		$("#gelenTikla").attr("class","active");
	});
	
	
	$("#gidenTikla").click(function(){
		console.log("giden kutusu tiklandi");
		$("#yeniMesajYolla").hide();
		$(".gelenKutusu").hide();
		$(".gidenKutusu").show();
		$("#gelenTikla").attr("class","");
		$("#gidenTikla").attr("class","active");
		$(".gidenKutusu").css("visibility","visible");
		$("#yenimesajlarim").show();
	});
	
	$("#yeniTikla").click(function(){	
		$(".gelenKutusu").show();
		$(".gidenKutusu").hide();
		$("#yenimesajlarim").hide();
		$("#yeniMesajYolla").show();
		console.log("tiklandi");
	});
	
	$(".mesajiicerik").click(function(){
		$("#yenimesajlarim").show();
		console.log("this: "+ this.id);
		$.ajax({
		  method: "POST",
		  url: "mesajIcerikGetir.php",
		  data: { "q" : this.id },
		  dataType: "json",
		  success:function(veri){
			if(veri.don=="bbb"){
				console.log("döndü");
			}
			else{
				console.log("girdi");
				console.log(veri);
				console.log(veri["durum"]);
				if(veri=="")
				{ 
					console.log("veri boþ"); 
				}
				if(veri["durum"]==true){
					$("#gonderen").html("<h5>Kimden:"+veri["adi"]+" "+veri["soyadi"]+"</h5>");
					$("#ileti").html("<h3>"+veri["konu"]+"</h3>");
					$("#gonderenMesaj").html(veri["mesaj"]);
					$("#gonderenTd").text("");
					$("#gonderenTd").html("<strong>GÃ¶nderen</strong>");
					$("#idGizli").val(veri["id"]);
					//alert($("#gonderen").val())
					//console.log($("#gonderen").val());;  
					console.log(veri["adi"]);
					console.log(veri["soyadi"]);
					console.log(veri["mesaj"]);
				}
				else{
					console.log("girmedi");
				}
			}
			
		  }
		});
	});
	
	
	
	$(".mesajiicerikGiden").click(function()
	{

		console.log("this: "+ this.id);
		$.ajax({
		  method: "POST",
		  url: "mesajGidenMesajGetir.php",
		  data: { "q" : this.id },
		  dataType: "json",
		  success:function(veri){
			if(veri.don=="bbb"){
				console.log("döndü");
			}
			else{
				console.log("girdi");
				console.log(veri);
				console.log(veri["durum"]);
				if(veri=="")
				{ 
					console.log("veri boþ"); 
				}
				if(veri["durum"]==true){
					$("#gonderen").html("<h5>Kime:"+veri["adi"]+" "+veri["soyadi"]+"</h5>");
					$("#ileti").html("<h3>"+veri["konu"]+"</h3>");
					$("#gonderenMesaj").html(veri["mesaj"]);
					$("#gonderenTd").text("");
					$("#gonderenTd").html("<strong>AlÄ±cÄ±</strong>");
					$("#idGizli").val(veri["id"]);
					//alert($("#gonderen").val())
					//console.log($("#gonderen").val());;  
					console.log(veri["adi"]);
					console.log(veri["soyadi"]);
					console.log(veri["mesaj"]);
				}
				else{
					console.log("girmedi");
				}
			}
			
		  }
		});
	});
	
	$(".aliciarama_sonuc").click(function(){
	
		var aliciAd = $(".aliciarama_icerik:hover").html();
		console.log(aliciAd);
		$("#alici").val(aliciAd);
		
		var aliciId = $(".aliciarama_icerik:hover").attr('id');
		console.log(aliciId);
		
		$("#aliciIDgidenid").val(aliciId);
		
		
		$(".aliciarama_sonuc").hide();
		
	});
	
	
});

</script>

<script>
  $(function () {
    $("#compose-textarea").wysihtml5();
  });
</script>


</body>
</html>
