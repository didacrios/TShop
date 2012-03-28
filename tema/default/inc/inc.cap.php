<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?=$config['iso_lang']?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="<?=$config['iso_lang']?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="<?=$config['iso_lang']?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?=$config['iso_lang']?>"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?=$config['ts_titol']?></title>
	<meta name="description" content="<?=$config['ts_descripcio']?>">
	<meta name="keywords" content="<?=$config['ts_keywords']?>">

	<meta name="viewport" content="width=device-width">

	<link rel="stylesheet" href="css/tshop.css">
	<link rel="stylesheet" href="<?=_TEMA_?>css/default.css">
	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<script>window.html5 || document.write('<script src="js/libs/html5.js"><\/script>')</script>
	<![endif]-->
</head>
<body>
<header>
	<h1><?php
			if (is_file(_IMATGES_.$config['ts_logo'])) echo '<img src="'._IMATGES_.$config['ts_logo'].'" alt="'.$config['ts_titol'].'">';
			else echo $config['ts_titol'];
		?></h1>
</header>

<div class="clearfix">

	<aside class="sidebar" role="sidebar">

		<section class=modul>

			<header>
				<h2><?=$idioma['CATEGORIES']?></h2>
			</header>
		
			<nav class="ts_categories">
				<ul class="nivell1">
				<?=$les_categories?>
				</ul>
			</nav>
		</section>

		<!-- modul registre / identificacio -->
		<section class="modul">
			<header>
				<h2><?=$idioma['USUARI_HEADER']?></h2>
			</header>

			<div class="main">
				<form action=inc/usuari/login.php method=post>
					<p>
						<label for=login_user><?=$idioma['USUARI_USUARI']?>:</label>
						<input type=text name=login_user id=login_user required>
					</p>

					<p>
						<label for=login_password><?=$idioma['USUARI_PASS']?>:</label>
						<input type=text name=login_password id=login_password required>
					</p>

					<p>
						<input type=submit name="" id="" value="<?=$idioma['USUARI_LOGIN']?>">
					</p>

					<p>
						<a href="recuperar"><?=$idioma['USUARI_RECORDAR']?></a>
					</p>

					<p>
						<a href="registre"><?=$idioma['USUARI_REGISTRE']?></a>
					</p>
					
				</form>
			</div>
			
		</section>

		<!-- cistella de compra -->
		<section class="modul">
			<header>
				<h2>Carrito</h2>
			</header>
		
			<ul id="list-items-carrito">
			<?php
				if (count($_SESSION['cistella']) <= 0) {
					echo '<li>Carrito vacio</li>';
				} else {
					echo '<li>carrito items</li>';
				}
			?>					
			</ul>

			<p>
				<a href="javascript:void(0);">Checkout</a>
			</p>

			
		</section>
				
	</aside>

	<div role="main">
