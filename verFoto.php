<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript"> 
function abrir(dir) { 
	 var margen=100;
	 var width=screen.width-margen;
	 var height=screen.height-margen;
	 var left=margen/3;
	open(dir,'','left='+left+',height='+height+',width='+width+'') ; 

} 
</script> 

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Los Raneros</title>
	<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->

	<link rel="stylesheet" type="text/css" href="engine0/style.css" />

	<script type="text/javascript" src="engine0/jquery.js"></script>

	<!-- End WOWSlider.com HEAD section -->
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css">
	<script type="text/javascript" src="scripts/popup.js"></script>	
</head>
<body>
	<div id="contenido">
		  
		<div id="menuID" class="menu">
			 
		</div>
		<br></br>
		<div id="contenedorCuerpo">
			<div class="evento">
				<?php
					echo "<img width='760px;'src='".$_GET['url']."'/>";
				?>
			</div>
		</div>
		 <?php include('php/pie.php');?>
	</div>
	<?php include_once("php/analyticstracking.php") ?>
</body>
</html>