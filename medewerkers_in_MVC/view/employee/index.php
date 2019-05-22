	<?php
		// maak een overzicht lijst van ALLE personen
	?>
	<h1>Overzicht van personen</h1>
	<ul>
		<?php foreach ($employees as $key => $value) { ?>
		<li>
			<span><?php echo $value["name"] ?> is <?php echo $value["age"] ?> jaar</span>
			<?php
			// de opbouw van de link bepaald welke method in welke controller aangeroepen wordt.
			// het woordje "employee" in de url betekent dat het framework moet zoeken naar een controller genaamd "EmployeeController".
			// Hij maakt van de eerste letter een hoofdletter en plakt er zelf "Controller" achter.
			// Het woordje "update" of "delete" betekent dat hij in deze controller moet zoeken naar een method met deze naam.
			?>
			<a href="/employee/update/<?php echo $value["id"] ?>">Wijzigen</a> <a href="/employee/delete/<?php echo $value["id"] ?>">Verwijderen</a>
		</li>
		<?php } ?>
	</ul>