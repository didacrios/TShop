<?php
include('inc/inc.cap.php');

// if algun error

// $notificacions['error formulari'] = '<div id=notificaicons error></div>';

//
$_POST = array_map('mysql_real_escape_string', $_POST);
$_GET = array_map('mysql_real_escape_string', $_GET);

if (isset($_POST['registre'])) {

	
	
	// mirem si existeix el correu
	$checkusuari = mysql_query("SELECT * FROM ts_clients WHERE correu = '".mysql_real_escape_string($_POST['ts_mail'])."'");

	if (mysql_num_rows($checkusuari) != 0) {		
		$ar_tipus_error[] = 'ts_mail';
	}

	// Comprovem que els camps s'hagin omplert (teoricament amb el required de html5 no caldria pero pe a navegadors obsolets ...
	
	if ($_POST['ts_mail'] == '') {

		$ar_tipus_error[] = 'ts_mail';

	} elseif (strlen($_POST['ts_pass']) <= 3) {

		$ar_tipus_error[] = 'ts_pass';
		
	} elseif ($_POST['ts_nom'] == '') {

		$ar_tipus_error[] = 'ts_nom';
		
	} elseif ($_POST['ts_cif'] == '') {

		$ar_tipus_error[] = 'ts_cif';
		
	} elseif ($_POST['ts_adr'] == '') {

		$ar_tipus_error[] = 'ts_adr';

	} elseif ($_POST['ts_tel'] == '') {

		$ar_tipus_error[] = 'ts_tel';
	
	} elseif ($_POST['ts_cp'] == '') {

		$ar_tipus_error[] = 'ts_cp';
							
	} elseif ($_POST['ts_ciutat'] == '') {
		$ar_tipus_error[] = 'ts_ciutat';
	}

	// comprovem el DNI/cif/nif, ha d'estar sense separadors, ni espais ni guions ni blah blah
	if (valida_nif_cif_nie($_POST['ts_cif']) <= 0) {
		$ar_tipus_error[] = 'ts_cif';
	}


	if (count($ar_tipus_error) == 0) {

		/// fem registre insert blah blah blah
		mysql_query("INSERT INTO ts_clients (id_grup,contrasenya,nom,cognoms,correu,data_registre,data_seen,id_idioma,codiactivacio,estat) VALUES ('1','".md5($_POST['ts_pass'])."','".$_POST['ts_nom'].",','".$_POST['ts_cognoms']."','".$_POST['ts_mail']."',NOW(),NOW(),'".$config['idioma_id']."','','0')"));

		$nou_id_usuari = mysql_insert_id();

		// carreguem plantilla mail

		$tpl = file_get_contents(_MAILS_.$config['locale'].'/registre.html');
			
		$tpl = str_replace('{nom_botiga}', $config['ts_titol'], $tpl);
		$tpl = str_replace('{web_url}', $config['ts_url'], $tpl);
		$tpl = str_replace('{ts_logo}', $config['tenda_logo'], $tpl);

		$tpl = str_replace('{nom}', $_POST['ts_nom'], $tpl);
		$tpl = str_replace('{cognom}', $_POST['ts_cognoms'], $tpl);
		$tpl = str_replace('{correu}', $_POST['ts_mail'], $tpl);
		$tpl = str_replace('{password}', $_POST['ts_pass'], $tpl);

		$adreça_mail = '
		'.$_POST['ts_nom'].' '.$_POST['ts_cognoms'].' <br>
		'.$_POST['ts_adr'].' <br>
		'.$_POST['ts_cp'].' - '.$_POST['ts_ciutat'].' ('.$_POST['ts_provincia'].') <br>
		Tel.: '.$_POST['ts_tel'].'
		';
		
		$tpl = str_replace('{dir_entrega}', $adreça_mail, $tpl);

		mail($_POST['ts_mail'], '['.$config['ts_titol'].'] '.$idioma['REMITENT REGISTRE'].' ', $tpl, $config['mail_headers']);
				
		require(_TEMA_.'validar.php');
		
		
	} else {

		// validem el usuari, si es fa el registre
		$tipus_error = implode(';', $ar_tipus_error);
		
		// si no es fa el registre agafem l'error i el marquem a $tipus_error
		header("Location: formulari-registre.php?error=".$tipus_error);
	}
	
} elseif (isset($_GET['tkn']) && isset($_GET['v'])) {

	// fem activacio del compte
	
	mysql_query("SELECT * FROM ts_clients WHERE correu='".$_GET['v']."'");
	
	require(_TEMA_.'validar.php');

	
} else {
	header("Location: 404.html");
	exit();
}



include('inc/inc.peu.php');

?>
