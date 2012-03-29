<?php
include('inc/inc.cap.php');

// if algun error

if ($_SESSION['ts_usuari_id']>1) {
	// ja esta identificat, no té accès a aquesta pàgina
 header("Location: index.php");
 exit();
}

// $notificacions['error formulari'] = '<div id=notificaicons error></div>';

//

$vista['options municipis'] = '';
$vista['options provincies'] = '';

$query = mysql_query("SELECT * FROM ts_municipis ORDER BY nom_municipi ASC");
while ($poble = mysql_fetch_array($query)) {
	$vista['options municipis'] .= '<option value="'.$poble['nom_municipi'].'">'.$poble['nom_municipi'].'</option>';
}	

$query = mysql_query("SELECT * FROM ts_provincies ORDER BY nom_provincia ASC");
while ($provin = mysql_fetch_array($query)) {
	$vista['options provincies'] .= '<option value="'.$provin['nom_provincia'].'">'.$provin['nom_provincia'].'</option>';
}

// Control d'errors
if (isset($_GET['error'])) {
	$els_errors = explode(';', $_GET['error']);	
}

require(_TEMA_.'formulari-registre.php');



include('inc/inc.peu.php');
?>
