<?php
include('inc/inc.cap.php');

// if algun error

// $notificacions['error formulari'] = '<div id=notificaicons error></div>';

//

if (isset($_POST['registre'])) {

	$_POST = array_map('mysql_real_escape_string', $_POST);

	$checkusuari = mysql_query("SELECT * FROM ts_clients WHERE correu = '".mysql_real_escape_string($_POST['ts_mail'])."'");

	if (mysql_num_rows($checkusuari) == 0) {
		// comprovem camps
				

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
					$ar_tipus_error = 'ts_ciutat';
					
				} else {

					/// fem registre insert blah blah blah
				}
		
	} else {
		// aquest usuari ja existeix!
		$ar_tipus_error = 'mail_exist';
	}

	// validem el usuari, si es fa el registre
	$tipus_error = implode(';', $ar_tipus_error);

	if ($tipus_error == '') {
		require(_TEMA_.'validar.php');
	} else {
		// si no es fa el registre agafem l'error i el marquem a $tipus_error
		header("Location: formulari-registre.php?error=".$tipus_error);
	}
	
} else {
	header("Location: 404.html");
	exit();
}



include('inc/inc.peu.php');

?>
