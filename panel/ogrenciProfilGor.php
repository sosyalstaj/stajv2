<?php




	$id =$_SESSION["staj"]["id"];//  sessiondan gelecek

		global $conn;
		$query ="select * from tbl_kullanici where id=$id";
		$sonuc =mysqli_query($conn,$query);
		if(@mysqli_num_rows($sonuc) ==1)
		{
				$kullanici=mysqli_fetch_array($sonuc);
				$query3 ="select * from tbl_iletisim where user_id=$id";
				$sonuc3 =mysqli_query($conn,$query3);
				if( mysqli_num_rows($sonuc3) ==1){
					$iletisim=mysqli_fetch_array($sonuc3);
					
				}else{
					$iletisim["web_site"]="Girilmemis";
					$iletisim["facebook"]="Girilmemis";
					$iletisim["github"]="Girilmemis";
					$iletisim["gmail"]="Girilmemis";
					$iletisim["tel"]="Girilmemis";
				
				}
				
				
				
				

		}
		$query1="SELECT*FROM tbl_hakkimizda where user_id=$id";//".$_SESSION["staj"]->getId();
		$sonuc1 =mysqli_query($conn,$query1);
		if(@mysqli_num_rows($sonuc1) ==1)
		{
			$hakkinda=mysqli_fetch_array($sonuc1);
			
		}
		else{
			$hakkinda["baslik"]="girilmemis";
			$hakkinda["icerik"]="girilmemis";
			$hakkinda["tarih"]="girilmemis";
		}
	

?>

			  
			  
			  
			  
			  
			  
			  <section class="content">
		<div class="row">
   <div class="col-md-12">
	<ul class="timeline">
				<!-- END timeline item -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-user bg-aqua"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> <?php echo $kullanici["mail"]; ?> </span>
                    <h3 class="timeline-header no-border"><a href="#"><h4><?php echo $kullanici["adi"]." ".$kullanici["soyadi"]; ?></h4> <center><img src="<?php echo $kullanici["foto"]; ?>" style="width:120px; height:120px; " /></center>
					</a> </h3>
                  </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
                <!-- timeline time label -->
                <li class="time-label">
                  <span class="bg-red">
                  Hakkinda
                  </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-envelope bg-blue"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> <?php echo $hakkinda["tarih"]; ?></span>
                    <h3 class="timeline-header"><a href="#"> <?php echo $hakkinda["baslik"]; ?></h3>
                    <div class="timeline-body" style="padding-left:10px;">
                      <?php echo $hakkinda["icerik"]; ?>
                    </div>
                    <div class="timeline-footer">
                      <a href="index.php?sayfa=profil-duzenle" class="btn btn-primary btn-xs">Duzenle</a>
                      <a class="btn btn-danger btn-xs">Sil</a>
                    </div>
                  </div>
                </li>
				 <li class="time-label">
                  <span class="bg-red">
                  Projeler
                  </span>
                </li>
                <?php
				$query2="SELECT*FROM tbl_proje where user_id=$id";//".$_SESSION["staj"]->getId();
				$sonuc2 =mysqli_query($conn,$query2);
				if(@mysqli_num_rows($sonuc2) >=1)
				{
				$k=0;
				while($proje=mysqli_fetch_array($sonuc2)){
					$k++;
			
				?>
				<li>
                  <i class="fa fa-comments bg-yellow"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> <?php echo $proje["tarih"]; ?></span>
                    <h3 class="timeline-header"><a href="#"><?php echo $proje["p_adi"]; ?> </a></h3>
                    <div class="timeline-body">
                    <?php echo $proje["p_icerik"]; ?>
                    </div>
                    <div class="timeline-footer">
                      <a class="btn btn-warning btn-flat btn-xs">Tamamini Gor</a>
                    </div>
                  </div>
                </li>
				<?php
				
				
			}
		}
		
		?>
                  <li class="time-label">
                  <span class="bg-red">
                  iletisim
                  </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-envelope bg-blue"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> </span>
                    <h3 class="timeline-header"><a href="#"> Baslica Bilgiler</h3>
                    <div class="timeline-body" style="padding-left:10px;">
						Facebook : <?php echo $iletisim["facebook"]; ?><br>
					    Web Site : <?php echo $iletisim["web_site"]; ?><br>
					      Github : <?php echo $iletisim["github"]; ?><br>
					    Telefon : <?php echo $iletisim["tel"]; ?><br>
					    Gmail : <?php echo $iletisim["gmail"]; ?><br>
                    </div>
                    <div class="timeline-footer">
                      <a class="btn btn-primary btn-xs">Duzenle</a>
                     
                    </div>
                  </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline time label -->
                <li class="time-label">
                  <span class="bg-green">
                   Resimler
                  </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-camera bg-purple"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> </span>
                    <h3 class="timeline-header"><a href="#"><?php echo $kullanici["adi"]." ".$kullanici["soyadi"]; ?></a> yuklenen fotograflari</h3>
                    <div class="timeline-body">
					<?php
				$query31="SELECT*FROM tbl_foto where user_id=$id";//".$_SESSION["staj"]->getId();
				$sonuc31 =mysqli_query($conn,$query31);
				if(@mysqli_num_rows($sonuc31) >=1)
				{
				$k=0;
				while($foto=mysqli_fetch_array($sonuc31)){
					$k++;
			
				?>
				<img src="<?php echo $foto["foto"]; ?> alt="..." class="margin"/>
				<?php
				
				
			}
		}
		?>
					
                    </div>
                  </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
               
                <!-- END timeline item -->
                <li>
                  <i class="fa fa-clock-o bg-gray"></i>
                </li>
              </ul>
			  </div>
			  </div>
          <!-- row -->
        
          <div class="row" style="margin-top: 10px;">
            <div class="col-md-12">
              <div class="box box-primary"> 
                <div class="box-header">
                  <h3 class="box-title"><i class="fa fa-code"></i> Timeline Markup</h3>
                </div>
                <div class="box-body">
                  <pre style="font-weight: 600;">
						<?php echo "Bu bilgiler ".$kullanici["adi"]." ".$kullanici["soyadi"]."kullanicisina aittir. ";?>
    
                  </pre>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section>