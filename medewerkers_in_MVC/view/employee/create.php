<h1>Voeg een medewerker toe</h1>
<form name="create" method="POST" action="<?php echo URL ?>employee/store">
	<div>
		<label>Naam</label>
		<input type="text" name="name" value="<?php echo $name ?>">
		<span class="error"><?php echo $errName ?></span>
	</div>

	<div>
		<label>Leeftijd</label>
		<input type="text" name="age" value="<?php echo $age ?>">
		<span class="error"><?php echo $errAge ?></span>
	</div>
	<button type="submit">Toevoegen</button>
</form>