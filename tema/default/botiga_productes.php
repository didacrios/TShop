<div class=clearfix>
<?php
foreach ($articles as $article) {

	echo '
	<section class=item>
		<figure>
	';

	if (file_exists($article['thumb_url'])) {
		echo '
			<img src="'.$article['thumb_url'].'" alt="">
		';
	} else {
		//echo '<img src="img/producte-default-thumb.png" alt="">';
		echo '<img src="http://placehold.it/90x90" alt="">';
	}
	
	echo '
		</figure>

		<p class=titol>'.$article['def_nom'].'</p>
		<p class=preu>'.number_format($article['producte_preu_base'], 2, ',', '.').' €</p>

		<a href="producte.php?pid='.$article['producte_id'].'" class=comprar>Comprar</a>
		
	</section>
	';
}

?>
</div>
<?=$pagina->mostrar_links(5)?>
