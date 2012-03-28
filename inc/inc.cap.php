<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include('inc.config.php');

// carreguem tot

// @categories

// queda pendent # Dídac Rios # 22-03-2012 11:29:15 # 

// Primer Nivell

$llista = mysql_query("SELECT * FROM ts_productes_categories cat JOIN ts_productes_categories_noms noms ON cat.idcategoria = noms.idcategoria WHERE idpare='0' AND noms.id_idioma='".$config['idioma_id']."' ORDER BY ordenacio ASC");

if (mysql_num_rows($llista) == 0) {

	$les_categories = '<li>No hi ha categories</li>';
	
} else {

	$les_categories = '';

	while ($categoria = mysql_fetch_array($llista)) {

		$les_categories .= '<li>';
		
		$llista2level = mysql_query("SELECT * FROM ts_productes_categories cat JOIN ts_productes_categories_noms noms ON cat.idcategoria = noms.idcategoria WHERE idpare='".$categoria['idcategoria']."' AND noms.id_idioma='".$config['idioma_id']."' ORDER BY ordenacio ASC");

		$les_categories .= '<a href="index.php?cat='.$categoria['idcategoria'].'">'.$categoria['nom'].'</a>';
		
		if (mysql_num_rows($llista2level) > 0) {
			// mostrem el segon nivell
			$les_categories .= '<ul class="nivell2">';
			while ($categoria2 = mysql_fetch_array($llista2level)) {
				$les_categories .= '<li>';
				$les_categories .= '<a href="index.php?cat='.$categoria['idcategoria'].'">'.$categoria2['nom'].'</a>';

				$llista3level = mysql_query("SELECT * FROM ts_productes_categories cat JOIN ts_productes_categories_noms noms ON cat.idcategoria = noms.idcategoria WHERE idpare='".$categoria2['idcategoria']."' AND noms.id_idioma='".$config['idioma_id']."' ORDER BY ordenacio ASC");

				if (mysql_num_rows($llista3level) > 0) {
					$les_categories .= '<ul>';
					while ($categoria3 = mysql_fetch_array($llista3levellevel)) {
						$les_categories .= '<li><a href="index.php?cat='.$categoria['idcategoria'].'">'.$categoria3['nom'].'</a></li>';
					}
					$les_categories .='</ul>';
				}
				
				$les_categories .= '</li>';
			}
			$les_categories .= '</ul>';
		}
		
		$les_categories .= '</li>';
	}

}

require(_TEMA_.'inc/inc.cap.php');
?>

	

