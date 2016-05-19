<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> </title>
    <!-- Login -->
    	<?php if(@$_GET["sayfa"] !="" || @$_GET["search"] !="")
    	{
    		?>
    	    <link href="css/loginstyle.css" type="text/css" rel="stylesheet" />
            <link href="css/uyari.css" type="text/css" rel="stylesheet" />
        <?php } ?> 
    <!-- -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>
        
    </title>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
  <!--  <link href="css/animate.min.css" rel="stylesheet">-->

    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script src="js/respond.min.js"></script>

</head>

<body>
	<?php
        require_once("include/config.php");
		require_once("include/function.php");
		require_once("include/config.php");
		require_once("header.php");
	?>
    <div id="all">

        <div id="content">

           

        	<?php sayfa_getir(); ?>
  

 			<?php require_once("footer.php"); ?>
    	</div>
</div>

    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>
    
    
    <script src="js/ajax.js"></script>
</body>

</html>
<?php ob_end_flush();?>