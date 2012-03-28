<?php
	// fem include de tots els del directori

$directori  = 'inc/lang/'.$config['iso_lang'];
$directori  = 'inc/lang/ca';
$dh	=	opendir($directori);

while (false !== ($filename = readdir($dh))) {
	
	if ($filename != '.' && $filename != '..') {
		include($directori.'/'.$filename);
	}
	
}
	
?>
