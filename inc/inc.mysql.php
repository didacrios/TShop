<?php
$conexio = mysql_connect($config['mysql_server'], $config['mysql_user'], $config['mysql_pw']) or die(mysql_error());
mysql_select_db($config['mysql_bdd'], $conexio) or die(mysql_error());
mysql_set_charset($config['mysql_charset']);
?>
