<div id="advantages">
    <div class="container">
       <div class="same-height-row">
            <?php
                $sonuc =duyurulariGetir();
                while ($row =mysqli_fetch_array($sonuc))
                {
                   
            ?>
                <div class="col-sm-4">
                    <div class="box same-height clickable">
                        <div class="icon"><i class="fa fa-tags"></i></div>
                        <h3><a href="?sayfa=duyuru_detay&id=<?php echo $row['id'];?>"><?php echo $row["baslik"]; ?></a></h3>
                        <p><?php echo $row["icerik"]; ?></p>
                    </div>
                </div>
			<?php
                }
            ?>
                 
        </div>
    </div>
</div>