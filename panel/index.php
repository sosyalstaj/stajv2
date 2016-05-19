<?php 
  
  require_once("../include/config.php");
  require_once("include/function.php");
  require_once("header.php");
?>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $_SESSION["staj"]["foto"];?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION["staj"]["adi"]." ".$_SESSION["staj"]["soyadi"]; ?></p>
        </div>
      </div>
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Ara...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      
      <?php 
        // solmenü çağır rol e göre
          if($_SESSION["staj"]["rol"] == 1)
          {
            require_once("ogrSolMenu.php");
          }else if($_SESSION["staj"]["rol"] == 2)
          {
            require_once("akademisyenSolMenu.php");
          }else
          {
             require_once("isyeriSolMenu.php");
          }
          $durum ="";
          if(@$_POST)
          {
              $durum =islemler();
          }
      ?>

    </section>
  </aside>

  <div class="content-wrapper">
		<?php echo $durum; ?>
    <section class="content">
     
      <div class="row">
          <?php			
            sayfa_getir();
          ?>
      </div>

    </section>

  </div>
 <?php
  require_once("footer.php");
 ?>