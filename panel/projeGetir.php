<?php

require_once("../include/config.php");

global $conn;


$sorgu = "SELECT * FROM `tbl_proje` WHERE `id`=".$_POST["q"]."";
$sonuc = mysqli_query($conn,$sorgu);


if($sonuc){	
	while($sutun=mysqli_fetch_array($sonuc)){
		$id=$sutun[0];
		$p_adi=$sutun[1];
		$p_icerik=$sutun[2];
		$p_tarih=$sutun[3];
		$user_id=$sutun[4];
		echo json_encode(array("durum"=> true, "id"=> "$id", "p_adi"=> "$p_adi", "p_icerik"=> "$p_icerik", "p_tarih"=> "$p_tarih", "user_id"=> "$user_id" ));
		//echo json_encode($sutun);
	}
}
else
{
	echo json_encode(array("durum"=>false));
}

?>