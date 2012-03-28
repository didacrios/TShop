<section class="fitxarticle">

	<div class="clearfix">
		<div class="media">
			<figure>
	<?php
		if (file_exists($imatge_principal['imatge_url'])) {
			echo '
				<img src="'.$imatge_principal['imatge_url'].'" alt="">
			';
		} else {
			echo '<img src="http://placehold.it/300x300" alt="">';
		}
	?>
				
			</figure>

			<nav>
				<ul class="thumbs">
				<?php
				foreach ($thumbs as $thumb) {
					echo '
					<li>
						<a href="javascript:void(0);" class="thumb"><img src="'.$thumb['thumb_url'].'" alt=""></a>
					</li>
					';
				}
				?>
				</ul>
			</nav>

			
		</div>
		
		<div class="specs">
				<h2><?=$article['def_nom']?></h2>

				<p><?=number_format($article['producte_preu_base'], 2, ',', '.')?> €</p>

				<div id=article-atributs>
				<?php
				
				foreach($prod_atribut as $atribut) {
					echo '
					<p> '.$atribut['atribut'].'
						<select>
					';
					foreach ($option[$atribut['id_tipus']] as $opcio) {
						echo '<option value="'.$opcion['value'].'">'.$opcio['name'].'</option>';
					}
					echo '
						</select>
					</p>
					';
				}
				?>

				</div>

				<p>
					<a href="javascript:void(0);">Afegir a cistella!</a>
				</p>
				
		</div>

	</div>
	
	<div class=descripcions><?=$article['def_descripcio']?></div>
	
</section>
