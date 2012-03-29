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


function valida_nif_cif_nie($cif) {
//Copyright ©2005-2011 David Vidal Serra. Bajo licencia GNU GPL.
//Este software viene SIN NINGUN TIPO DE GARANTIA; para saber mas detalles
//puede consultar la licencia en http://www.gnu.org/licenses/gpl.txt(1)
//Esto es software libre, y puede ser usado y redistribuirdo de acuerdo
//con la condicion de que el autor jamas sera responsable de su uso.
//Returns: 1 = NIF ok, 2 = CIF ok, 3 = NIE ok, -1 = NIF bad, -2 = CIF bad, -3 = NIE bad, 0 = ??? bad
         $cif = strtoupper($cif);
         for ($i = 0; $i < 9; $i ++)
         {
                  $num[$i] = substr($cif, $i, 1);
         }
//si no tiene un formato valido devuelve error
         if (!preg_match('/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/', $cif))
         {
                  return 0;
         }
//comprobacion de NIFs estandar
         if (preg_match('/(^[0-9]{8}[A-Z]{1}$)/', $cif))
         {
                  if ($num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr($cif, 0, 8) % 23, 1))
                  {
                           return 1;
                  }
                  else
                  {
                           return -1;
                  }
         }
//algoritmo para comprobacion de codigos tipo CIF
         $suma = $num[2] + $num[4] + $num[6];
         for ($i = 1; $i < 8; $i += 2)
         {
                  $suma += substr((2 * $num[$i]),0,1) + substr((2 * $num[$i]), 1, 1);
         }
         $n = 10 - substr($suma, strlen($suma) - 1, 1);
//comprobacion de NIFs especiales (se calculan como CIFs o como NIFs)
         if (preg_match('/^[KLM]{1}/', $cif))
         {
                  if ($num[8] == chr(64 + $n) || $num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr($cif, 1, 8) % 23, 1))
                  {
                           return 1;
                  }
                  else
                  {
                           return -1;
                  }
         }
//comprobacion de CIFs
         if (preg_match('/^[ABCDEFGHJNPQRSUVW]{1}/', $cif))
         {
                  if ($num[8] == chr(64 + $n) || $num[8] == substr($n, strlen($n) - 1, 1))
                  {
                           return 2;
                  }
                  else
                  {
                           return -2;
                  }
         }
//comprobacion de NIEs
//T
         if (preg_match('/^[T]{1}/', $cif))
         {
                  if ($num[8] == preg_match('/^[T]{1}[A-Z0-9]{8}$/', $cif))
                  {
                           return 3;
                  }
                  else
                  {
                           return -3;
                  }
         }
//XYZ
         if (preg_match('/^[XYZ]{1}/', $cif))
         {
                  if ($num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr(str_replace(array('X','Y','Z'), array('0','1','2'), $cif), 0, 8) % 23, 1))
                  {
                           return 3;
                  }
                  else
                  {
                           return -3;
                  }
         }
//si todavia no se ha verificado devuelve error
         return 0;
}
?>
