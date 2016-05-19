<?php
	include("../include/config.php");
	$value=$_POST["value"];
	global $conn;
		$sorgu = "SELECT * FROM tbl_kullanici WHERE adi LIKE '%$value%' LIMIT 4 ";  
	    $sonuc=mysqli_query($conn,$sorgu);
		 if($sonuc)
		 {
			 while($sutun=mysqli_fetch_array($sonuc))
			{	
				//echo "<a class='aliciarama_link' href='index.php?sayfa=mesajlar&aliciID=".$sutun["id"]."'>
				//<div class='aliciarama_icerik' id=".$sutun["id"].">".$sutun["adi"]."   ".$sutun["soyadi"]." </div></a><br>";
				
				echo "<div class='aliciarama_icerik' id='".$sutun["id"]."'>".$sutun["adi"]." ".$sutun["soyadi"]." </div><br>";
			}
		 }
		 else
		 {
			 echo "Aranan Kayýt Bulunamadý";
		 }
		 
?>