<?php
include('inc/inc.cap.php');

	
	include(_CLASS_.'paginador.class.php');
	
	$pagina = new ts_paginador('ts_productes prod JOIN ts_productes_def def ON def.def_id_producte = prod.producte_id');
	$pagina->ts_order('producte_id DESC');
	

	if (isset($_GET['cat']) && $_GET['cat']>0) {
	// categoria seleccionada
		
		$where[] = "producte_categoria='".mysql_real_escape_string($_GET['cat'])."'";
		$pagina->ts_where($where);

		
	} elseif (isset($_POST['q'])) {
		// buscador
			
		$where[] = "def_nom LIKE '%".$_POST['q']."%' OR def_descripcio LIKE '%".$_POST['q']."%'";
		$pagina->ts_where($where);
	} 

	$consulta = $pagina->fem_query();

	
	while ($cadarticle = mysql_fetch_array($consulta)) {

		$imatge_principal = mysql_fetch_array(mysql_query("SELECT * FROM ts_productes_imatges WHERE id_producte='".$cadarticle['producte_id']."' AND principal='1'"));
		if (!is_array($imatge_principal)) { $imatge_principal = array(); }

		$articles[] = array_merge($cadarticle, $imatge_principal);
		
	}

require(_TEMA_.'botiga_productes.php');

include('inc/inc.peu.php');
?>
