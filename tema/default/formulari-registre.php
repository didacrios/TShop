<?php
	echo $notificacio['error formulari'];
?>

<form action="validar.php" method=post>

	<h3>1. <?=$idioma['TS_USUARI DADES PERSONALS']?></h3>

	<p class=clearfix>
		<label for=ts_mail><?=$idioma['TS_USUARI EMAIL']?></label>
		<input type=email name=ts_mail id=ts_mail required>
		<?php
		for ($rkeo=0;$rkeo<count($els_errors);$rkeo++) {
			if ($els_errors[$rkeo] == 'ts_mail') { echo '<span class=required>!</span>'; }
		}
		?>
	</p>

	<p class=clearfix>
		<label for=ts_pass><?=$idioma['TS_USUARI PW']?></label>
		<input type=password min=3 name=ts_pass id=ts_pass required>
		<?php
		for ($rkeo=0;$rkeo<count($els_errors);$rkeo++) {
			if ($els_errors[$rkeo] == 'ts_pass') { echo '<span class=required>!</span>'; }
		}
		?>		
	</p>

	<p class=clearfix>
		<label for=ts_nom><?=$idioma['TS_USUARI NOM']?></label>
		<input type=text name=ts_nom id=ts_nom required>
		<?php
		for ($rkeo=0;$rkeo<count($els_errors);$rkeo++) {
			if ($els_errors[$rkeo] == 'ts_nom') { echo '<span class=required>!</span>'; }
		}
		?>		
	</p>

	<p class=clearfix>
		<label for=ts_cognoms><?=$idioma['TS_USUARI COGNOMS']?></label>
		<input type=text name=ts_cognoms id=ts_cognoms required>
		<?php
		for ($rkeo=0;$rkeo<count($els_errors);$rkeo++) {
			if ($els_errors[$rkeo] == 'ts_cognoms') { echo '<span class=required>!</span>'; }
		}
		?>		
	</p>

	<p class=clearfix>
		<label for=ts_cif>DNI/NIE/CIF</label>
		<input type=text name=ts_cif id=ts_cif required>
		<?php
		for ($rkeo=0;$rkeo<count($els_errors);$rkeo++) {
			if ($els_errors[$rkeo] == 'ts_cif') { echo '<span class=required>!</span>'; }
		}
		?>		
	</p>


	<h3>2. <?=$idioma['ADREÇA ENTREGA']?></h3>

	<p class=clearfix>
		<label for=ts_adr><?=$idioma['TS_USUARI ADREÇA']?></label>
		<input type=text name=ts_adr id=ts_adr required>
		<?php
		for ($rkeo=0;$rkeo<count($els_errors);$rkeo++) {
			if ($els_errors[$rkeo] == 'ts_adr') { echo '<span class=required>!</span>'; }
		}
		?>		
	</p>

	<p class=clearfix>
		<label for=ts_cp><?=$idioma['TS_USUARI CP']?></label>
		<input type=text name=ts_cp id=ts_cp required>
		<?php
		for ($rkeo=0;$rkeo<count($els_errors);$rkeo++) {
			if ($els_errors[$rkeo] == 'ts_cp') { echo '<span class=required>!</span>'; }
		}
		?>		
	</p>

	<p class=clearfix>
		<label for=ts_ciutat><?=$idioma['TS_USUARI MUNICIPI']?></label>
		
		<select name=ts_ciutat id=ts_ciutat style="width:235px">
			<option value=>------</option>
			<?=$vista['options municipis']?>
		</select>
		<?php
		for ($rkeo=0;$rkeo<count($els_errors);$rkeo++) {
			if ($els_errors[$rkeo] == 'ts_ciutat') { echo '<span class=required>!</span>'; }
		}
		?>		
	</p>

	<p class=clearfix>
		<label for=ts_provincia><?=$idioma['TS_USUARI PROVINCIA']?></label>

		<select name=ts_provincia id=ts_provincia>
			<option value=>------</option>
			<?=$vista['options provincies']?>
		</select>
	</p>

	<p class=clearfix>
		<label for=ts_pais><?=$idioma['TS_USUARI PAIS']?></label>
		<input type=text name=ts_pais id=ts_pais>
	</p>

	<p class=clearfix>
		<label for=ts_tel><?=$idioma['TS_USUARI TLFN']?></label>
		<input type=text name=ts_tel id=ts_tel required>
		<?php
		for ($rkeo=0;$rkeo<count($els_errors);$rkeo++) {
			if ($els_errors[$rkeo] == 'ts_tel') { echo '<span class=required>!</span>'; }
		}
		?>		
	</p>

	<p>
		<input type="submit"  name=registre value="<?=$idioma['TS_USUARI REGISTRAR']?>">
	</p>

</form>
