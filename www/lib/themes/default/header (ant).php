<?php 
	if(!defined("ACCESS")) {
		die("Error: You don't have permission to access here..."); 
	}
	
	if(isMobile()) {
		include "mobile/header.php";
	} else {
?>
<!DOCTYPE html>
<html lang="<?php print get("webLang"); ?>">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title><?php print $this->getTitle(); ?></title>
		
		<link href="<?php print path("vendors/css/frameworks/bootstrap/bootstrap.min.css", "zan"); ?>" rel="stylesheet">
		<link href="<?php print $this->themePath; ?>/css/style.css" rel="stylesheet">
		<?php print $this->getCSS(); ?>
		
		<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
			<!--[if lt IE 9]>
			  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<![endif]-->
		<!-- Le styles -->
	</head>

	<body>
		<div class="topbar">
			<div class="fill">
				<div class="container">
					<a class="brand" href="#">JAPL</a>
					
					<?php 
					$enlaces = array(
						'default' => 'Inicio',
						'visitante' => 'Visitantes',
						'equipos' => 'Equipos',
						'usuarios' => 'Usuarios del sistema',
					);
					$lista = array();
					//____(whichApplication());
					global $ZP;
					$url_base = getDomain() . '/index.php/';
					foreach ($enlaces as $link => $nombre) {
						$tmp = array(
							'item' => a($nombre, $url_base . $link),
						);
						if (whichApplication() == $link) {
							$tmp['class'] = 'active';
						}
						$lista[] = $tmp;
					}
					echo ul($lista, NULL, 'nav');
					?>
          
					<form action="#" class="pull-right">
						<input class="input-small" type="text" placeholder="Usuario">
						<input class="input-small" type="password" placeholder="Contraseña">
						<button class="btn" type="submit">Ingresar</button>
					</form>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="content">
				<div class="page-header">
					<h1>Control de acceso <small>JAPL</small></h1>
				</div>
				
				<div class="row">
<?php } ?>