<?php

require_once("include/config.php");

global $conn;


$sorgu = "SELECT K.adi, K.soyadi, M.konu, M.mesaj, M.id  FROM tbl_mesaj AS M INNER JOIN tbl_kullanici AS K ON M.alici_id = K.id WHERE M.id=".$_POST["q"]."";
$sonuc = mysqli_query($conn,$sorgu);


if($sonuc){	
	while($sutun=mysqli_fetch_array($sonuc)){
		$ad=$sutun[0];
		$soyadi=$sutun[1];
		$konu=$sutun[2];
		$mesaj=$sutun[3];
		$id=$sutun[4];
		echo json_encode(array("durum"=> true, "adi"=> "$ad", "soyadi"=> "$soyadi", "konu"=> "$konu", "mesaj"=> "$mesaj", "id"=> "$id" ));
		//echo json_encode($sutun);
	}
}
else
{
	echo json_encode(array("durum"=>false));
}



?>
