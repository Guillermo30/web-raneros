<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Los Raneros</title>
	<!--  HEAD section --> <!-- add to the <head> of your page -->

	<link rel="stylesheet" type="text/css" href="engine0/style.css"></link>

	<script type="text/javascript" href="engine0/jquery.js"></script>
	
	<link rel"icon" type"image/png" src="css/img/favicon.png"></link>

	<!-- HEAD section -->
	
	<script type="text/javascript" src="scripts/jquery-2.1.1.js"></script>
	<script type="text/javascript" src="scripts/scrollJQuery.js"></script>
	

</head>

<body>
	<div id="contenido">
		<div id="cabecera">
			<img src="css/img/BannerVerde.jpg" id="fondoCabecera">
			<div id="titleHeader">
				<img src="css/img/rana-coloreada.gif" id="logo" width="140px" height="90px">
				<h1>Los Raneros</h1>
				<h3>Cafe Bar</h3>
			</div>
			<div id="redesSociales">
				<div id="redesTitle">
					<h3>Social Links</h3>
				</div>
				<div id="redesLinks">
					<a href="http://www.facebook.com"><img src="css/img/iconos/facebook.png" class="logoSocial"></a>
					<a href="http://www.twitter.com"><img src="css/img/iconos/twitter.png" class="logoSocial"></a>
				</div>
			</div>
		</div>
		<div id="menuID" class="menu">
			<?php 
				include ('php/menu.php');
				$menu = new menu();
				$menu->mostrar();
			?>
		</div>
		<br></br>
		<div id="contenedorCuerpo">	<!-- BODY section --> <!-- add to the <body> of your page -->
		<div id="wowslider-container0">

		<div class="ws_images"><ul>
			<li><img src="data0/images/20141017_09.38.40.jpg" alt="" title="" id="wows0_0"/></li>
			<li><img src="data0/images/20141017_09.38.44.jpg" alt="" title="" id="wows0_1"/></li>
			<li><img src="data0/images/20141017_09.39.14.jpg" alt="" title="" id="wows0_2"/></li>
			<li><img src="data0/images/20141017_09.41.51.jpg" alt="" title="" id="wows0_3"/></li>
			<li><img src="data0/images/20141017_09.42.02.jpg" alt="" title="" id="wows0_4"/></li>
			<li><img src="data0/images/20141017_09.42.33.jpg" alt="" title="" id="wows0_5"/></li>
			<li><img src="data0/images/20141017_09.45.10.jpg" alt="" title="" id="wows0_6"/></li>
			<li><img src="data0/images/20141017_09.45.16.jpg" alt="" title="" id="wows0_7"/></li>
			<li><img src="data0/images/20141017_10.09.09.jpg" alt="" title="" id="wows0_8"/></li>
			<li><img src="data0/images/20141017_10.10.07.jpg" alt="" title="" id="wows0_9"/></li>
			<li><img src="data0/images/20141017_10.10.11.jpg" alt="" title="" id="wows0_10"/></li>
			<li><a href="http://wowslider.com/vf"><img src="data0/images/20141017_10.10.29.jpg" alt="full screen slider" title="" id="wows0_11"/></a></li>
			<li><img src="data0/images/rana_coloreada.jpg" alt="" title="" id="wows0_12"/></li>
		</ul></div>
		<div class="ws_bullets"><div>
			<a href="#" title=""><img src="data0/tooltips/20141017_09.38.40.jpg" alt=""/>1</a>
			<a href="#" title=""><img src="data0/tooltips/20141017_09.38.44.jpg" alt=""/>2</a>
			<a href="#" title=""><img src="data0/tooltips/20141017_09.39.14.jpg" alt=""/>3</a>
			<a href="#" title=""><img src="data0/tooltips/20141017_09.41.51.jpg" alt=""/>4</a>
			<a href="#" title=""><img src="data0/tooltips/20141017_09.42.02.jpg" alt=""/>5</a>
			<a href="#" title=""><img src="data0/tooltips/20141017_09.42.33.jpg" alt=""/>6</a>
			<a href="#" title=""><img src="data0/tooltips/20141017_09.45.10.jpg" alt=""/>7</a>
			<a href="#" title=""><img src="data0/tooltips/20141017_09.45.16.jpg" alt=""/>8</a>
			<a href="#" title=""><img src="data0/tooltips/20141017_10.09.09.jpg" alt=""/>9</a>
			<a href="#" title=""><img src="data0/tooltips/20141017_10.10.07.jpg" alt=""/>10</a>
			<a href="#" title=""><img src="data0/tooltips/20141017_10.10.11.jpg" alt=""/>11</a>
			<a href="#" title=""><img src="data0/tooltips/20141017_10.10.29.jpg" alt=""/>12</a>
			<a href="#" title=""><img src="data0/tooltips/rana_coloreada.jpg" alt=""/>13</a>
		</div></div><span class="wsl"><a href="http://wowslider.com/vu">image carousel</a> by WOWSlider.com v7.2</span>

		<div class="ws_shadow"></div>

		</div>	

		<script type="text/javascript" src="engine0/wowslider.js"></script>

		<script type="text/javascript" src="engine0/script.js"></script>

		<!-- BODY section -->
			
		</div>
		<div id="pie">
			<div id="enlaces">
				<h3>Sitios Relacionados</h3>
				<hr/>
				<a href="http://www.museodeterque.com/" title="Museo de Terque">Museo de Terque</a>
			</div>
			<div id="contacta">
				<h3>Contacta con nosotros</h3>
				<hr/>
				<a>Telf: 622-112-446 </a>
				<br></br>
				<a>Direccion: Plaza del la Constituci&oacute;n Bentarique(Almer&iacute;a).</a>
			</div>
					
		</div>
	</div>
</body>
</html>
