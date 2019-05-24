	<?php
	// maak een bevestig pagina voor het verwijderen van een mededwerker
	?>
	<h1>Verwijderen</h1>
	<p>Weet u zeker dat u <?php echo $employee["name"]; ?> wilt verwijderen?</p>
	<a href="<?php echo URL ?>employee/destroy/<?php echo $employee["id"] ?>">Ja</a>
	<a href="<?php echo URL ?>employee/index">Nee</a>