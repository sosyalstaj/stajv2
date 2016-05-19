<?php
	$id =-1;
	 $row ;
	if(isset($_GET["id"]))
	{
		$row =duyuruGetir();
	}else
	{
		 header("Location: index.php?sayfa=duyuru");
		die();
	}

?>
<div id="advantages">
    <div class="container">
                <div id="dvicerik">
                    <div class="box same-height clickable">
                        
                        <h3><a href="#"><?php echo $row["baslik"]; ?></a></h3>
                        <p><?php echo $row["icerik"]; ?></p>
                    </div>
                </div>
    </div>
</div>