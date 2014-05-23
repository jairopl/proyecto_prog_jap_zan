<!DOCTYPE html>
<html lang="<?php echo _get("webLang"); ?>">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title><?php echo $this->getTitle(); ?></title>
		
		<link href="<?php echo path("vendors/css/jquery-tables/demo_page.css", "zan"); ?>" rel="stylesheet">
    <link href="<?php echo path("vendors/css/jquery-tables/demo_table.css", "zan"); ?>" rel="stylesheet">
    <link href="<?php echo path("vendors/css/frameworks/bootstrap/bootstrap.min.css", "zan"); ?>" rel="stylesheet">
		<link href="<?php echo $this->themePath; ?>/css/style.css" rel="stylesheet">

    <script src="<?php echo path("vendors/js/jquery/jquery.js", "zan"); ?>" type="text/javascript"></script>
    <script src="<?php echo path("vendors/js/jquery/jquery-ui.min.js", "zan"); ?>" type="text/javascript"></script>
		
		<?php echo $this->getCSS(); ?>
		
		<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
			<!--[if lt IE 9]>
			  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<![endif]-->
		<!-- Le styles -->
	</head>

	<body>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button"class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active">
                <a href="http://zanphp.com">ZanPHP.com</a>
              </li>
              <li class="">
                <a href="<?php print _get("webBase"); ?>">Inicio</a>
              </li>
              <li class="">
                <a href="<?php print _get("webBase"); ?>/acceso">Accesos</a>
              </li>
              <li class="">
                <a href="<?php print _get("webBase"); ?>/visitante">Visitante</a>
              </li>
              <li class="">
                <a href="<?php print _get("webBase"); ?>/equipos">Equipos</a>
              </li>
              <li class="">
                <a href="<?php print _get("webBase"); ?>/usuarios">Usuario del sistema</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

		<div class="container">
			<div class="content">
				<div class="page-header">
          <br /><br />
					<h1>Accesos UNAD <small>Jairo Prieto</small></h1>
				</div>
				
				<div class="row">
