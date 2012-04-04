<?php
include('inc/inc.cap.php');

if (ctype_digit($_GET['pid'])) {

	$_GET['pid'] = mysql_real_escape_string($_GET['pid']);

	// seleccionem article

	$art_def = mysql_query("SELECT * FROM ts_productes prod JOIN ts_productes_def pdef ON pdef.def_id_producte = prod.producte_id WHERE producte_id='".$_GET['pid']."' AND def_id_idioma='".$config['idioma_id']."'");
	// si no hi ha la definicio en l'idioma que toca, agafem la d'un altre idioma
	if (mysql_num_rows($idioma_nav) == 0) {		
		$art_def = mysql_query("SELECT * FROM ts_productes prod JOIN ts_productes_def pdef ON pdef.def_id_producte = prod.producte_id WHERE producte_id='".$_GET['pid']."'");
	}

	$article = mysql_fetch_array($art_def);

	// Les imatges de l'article

	$imatge_principal = mysql_fetch_array(mysql_query("SELECT * FROM ts_productes_imatges WHERE id_producte='".mysql_real_escape_string($_GET['pid'])."' AND principal='1'"));
	
	$thumbnails = mysql_query("SELECT * FROM ts_productes_imatges WHERE id_producte='".$_GET['pid']."'") or die(mysql_error());

	while ($cadaThumb = mysql_fetch_array($thumbnails)) {
		$thumbs[] =  $cadaThumb;
	}

	// atributs del article (ts_productes_atrb_combinacio)
	
	// seleccionem tots els tipus d'atributs que te aquest article (color emmagatzematge ...)

	$consulta_atribut = mysql_query("SELECT nom_atrb_tipus atribut, atrb_tipus id_tipus FROM ts_productes_atrb_combinacio combi JOIN ts_atrb atr ON atr.atrb_tipus = combi.id_atrb JOIN ts_atrb_tipus tipus ON atrb_tipus = tipus.id_tipus WHERE id_producte = '".$_GET['pid']."' AND tipus.id_idioma='".$config['idioma_id']."' GROUP BY id_tipus");

	while ($cadatrb = mysql_fetch_array($consulta_atribut)) {
		
		$prod_atribut[] = $cadatrb;

		// seleccionem les opcions de cada atribut que te aquest article
		$tot_opt = mysql_query("SELECT * FROM ts_productes_atrb_combinacio combi  JOIN ts_atrb atrb ON atrb.atrb_id = combi.id_atrb WHERE	atrb.atrb_tipus = '".$cadatrb['id_tipus']."' AND atrb.id_idioma = '".$config['idioma_id']."' AND combi.id_producte='".$_GET['pid']."'");
		
		while($opt = mysql_fetch_array($tot_opt)) {
			$option[$cadatrb['id_tipus']][] = array('name' => $opt['atrb_nom'], 'value' => $opt['atrb_id']);			
		}

	}

	// Inclou el tema
	require(_TEMA_.'producte.php');
	
} else {
echo 'mec:';
	header("Location: 404.html");
	exit();
	
}

include('inc/inc.peu.php');
?>
