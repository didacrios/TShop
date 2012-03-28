<?php
include('inc/inc.cap.php');

	if (ctype_digit($_GET['id_pagina'])) {

		$infoidioma = mysql_fetch_array(mysql_query("SELECT * FROM ts_idiomes WHERE iso = '".$config['iso_lang']."'"));
		
		$la_pagina = mysql_fetch_array(mysql_query("SELECT * FROM ts_pagines WHERE id_pagina = '".$_GET['id_pagina']."' AND id_idioma='".$config['idioma_id']."'"));

		require(_TEMA_.'pagines.php');
		
	} else {

		header("Location: 404.html");
		exit();

	}


include('inc/inc.peu.php');
?>
