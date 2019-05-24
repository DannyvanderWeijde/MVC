	
	<h1>Persoon wijzigen</h1>
	<form name="update" method="post" action="<?=URL?>employee/update/<?php echo $employee["id"] ?>">
	    <input type="hidden" name="id" value="<?=$employee["id"] ?>"/>
	    <!--  Bouw hier de rest van je formulier   -->
	    <div>
			<label>Naam</label>
			<input type="text" name="name" value="<?php echo $employee["name"] ?>">
			<span class="error"><?php echo $errName ?></span>
		</div>

		<div>
			<label>Leeftijd</label>
			<input type="text" name="age" value="<?php echo $employee["age"] ?>">
			<span class="error"><?php echo $errAge ?></span>
		</div>
		<button type="submit">Bevestigen</button>
	</form>