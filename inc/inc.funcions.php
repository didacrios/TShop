<?php
// http://cubiq.org/the-perfect-php-clean-url-generator/
// modificada # Dídac Rios # 23-03-2012 12:53:56 #
function url_neta($str, $replace=array(), $delimiter='-') {

	if( !empty($replace) ) {
		$str = str_replace((array)$replace, ' ', $str);
	}

	$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
	//$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
	$clean = preg_replace("%[^-/+|\w ]%", '', $clean);
	$clean = strtolower(trim($clean, '-'));
	$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

	return $clean;

}

function CanDebug() {
 global $DEBUG;
 //$ips_permeses = array ('');
 if (in_array ($_SERVER['REMOTE_ADDR'], $ips_permeses)) return $DEBUG;
 else return 0;
}
function Debug($str) {
  //if (!CanDebug()) return;
  echo '<div style="background:#F7D2D2; color:black; border: 1px solid #AA060B; padding: 5px; margin: 5px; white-space: pre;">';
  if (is_string ($str)) echo $str;
  else var_dump ($str);
  echo '</div>';
}
?>
