<?php
$llpagines = mysql_query("SELECT * FROM ts_pagines WHERE id_idioma='".$config['idioma_id']."' AND estat='1' ORDER BY titol ASC");

$les_pagines = '';
	while ($lpag = mysql_fetch_array($llpagines)) {
		$les_pagines .= '
		<li>
			<a href="pagines.php?id_pagina='.$lpag['id_pagina'].'">'.url_neta($lpag['titol']).'</a>
		</li>
		';
	}

require(_TEMA_.'inc/inc.peu.php');

?>
