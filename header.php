    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand home" href="index.php" data-animate-hover="bounce">

                <a class="navbar-brand home" href="index.php" data-animate-hover="bounce">

                    <img src="img/logo.png" alt="Obaju logo" class="hidden-xs">
                    <img src="img/logo-small.png" alt="Obaju logo" class="visible-xs">
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                       
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li <?php if(@$_GET["sayfa"] == ""){echo "class='active'";}?> >
                        <a href="index.php">Ana Sayfa</a>
                    </li>
                 
                    <li <?php if(@$_GET["sayfa"] == "duyuru"){echo "class='active'";}?> >
                        <a href="index.php?sayfa=duyuru">Duyurular</a>
                    </li> 

                    <li <?php if(@$_GET["sayfa"] == "kayit_ol"){echo "class='active'";}?> >
                        <a href="index.php?sayfa=kayit_ol">Kayıt Ol</a>
                    </li> 
					
					<li <?php if(@$_GET["sayfa"] == "giris"){echo "class='active'";}?> >
                        <a href="index.php?sayfa=giris">Giriş</a>
                    </li> 
                </ul>

            </div>
            <!--/.nav-collapse -->

            <div class="navbar-buttons">
               
                <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </div>

            <div class="collapse clearfix" id="search">

                <form class="navbar-form" action="index.php?sayfa=duyuru&" role="search">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                        <span class="input-group-btn">

							<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

						</span>
                    </div>
                </form>

            </div>
        </div>
        
    </div>