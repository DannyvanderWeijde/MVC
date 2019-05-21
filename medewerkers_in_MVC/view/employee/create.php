<?php 
$errors = 0;
$errName = "";
$errAge = "";
$name = "";
$age = "";
$data = [];

if ($_SERVER["REQUEST_METHOD"] == "POST"){
		if (empty($_POST["Name"])){
			$errName = "Je moet iets invullen";
			$errors++;
		}else{
			$name = test_input($_POST["Name"]);
			if(!preg_match("/^[a-zA-Z -]*?$/",$name)){
				    $errName = "Je mag alleen letters en witruimte gebruiken.";
				    $errors++;
			}
		}
		if (empty($_POST["Age"])){
			$errAge = "Je moet iets invullen";
			$errors++;
		}else{
			$age = test_input($_POST["Age"]);
			if(!preg_match("/^[0-9]*?$/",$age)){
				    $errAge = "Je mag alleen cijfers invullen.";
				    $errors++;
			}
		}
		if ($errors == 0) {
			$data[0] = $name;
			$data[1] = $age;
		}
}

function test_input($data) {
	  $data = trim($data); //Zorgt ervoor dat onnodige space, tab, newline worden weggehaald.
	  $data = stripslashes($data); //verwijderd backslashes (\).
	  $data = htmlspecialchars($data); //Dit zorgt ervoor dat speciale karakters naar html veranderd waardoor je niet gehackt kan worden.
	  return $data;
}

?>
<h1>Voeg een medewerker toe</h1>
<form name="create" method="POST" action="create">
	<div>
		<label>Naam</label>
		<input type="text" name="Name" value="<?php echo $name ?>">
		<span class="error"><?php echo $errName ?></span>
	</div>

	<div>
		<label>Leeftijd</label>
		<input type="text" name="Age" value="<?php echo $age ?>">
		<span class="error"><?php echo $errAge ?></span>
	</div>
	<button type="submit">Toevoegen</button>
</form>