<?php

require_once("../include/config.php");

global $conn;


$sorgu = "SELECT * FROM `tbl_duyuru` WHERE `id`=".$_POST["q"]."";
$sonuc = mysqli_query($conn,$sorgu);


if($sonuc){	
	while($sutun=mysqli_fetch_array($sonuc)){
		$id=$sutun[0];
		$d_adi=$sutun[1];
		$d_icerik=$sutun[2];
		$d_tarih=$sutun[3];
		$user_id=$sutun[4];
		echo json_encode(array("durum"=> true, "id"=> "$id", "d_adi"=> "$d_adi", "d_icerik"=> "$d_icerik", "d_tarih"=> "$d_tarih", "user_id"=> "$user_id" ));
		//echo json_encode($sutun);
	}
}
else
{
	echo json_encode(array("durum"=>false));
}

?>