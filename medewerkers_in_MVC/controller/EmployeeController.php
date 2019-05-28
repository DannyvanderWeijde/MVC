<?php
require(ROOT . "model/EmployeeModel.php");


function index(){
    //1. Haal alle medewerkers op uit de database (via de model) en sla deze op in een variable
    $employees = getAllEmployees();
    //2. Geef een view weer en geef de variable met medewerkers hieraan mee
    render('employee/index', array('employees' => $employees));
}

function create(){
    //1. Geef een view weer waarin een formulier staat voor het aanmaken van een medewerker
    render('employee/create');
}

function store(){
    //1. Maak een nieuwe medewerker aan met de data uit het formulier en sla deze op in de database
    $errors = 0;
    $errName = "";
    $errAge = "";
    $name = "";
    $age = "";
    $data = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (empty($_POST["name"])){
                $errName = "Je moet iets invullen";
                $errors++;
            }else{
                $name = test_input($_POST["name"]);
                if(!preg_match("/^[a-zA-Z -]*?$/",$name)){
                        $errName = "Je mag alleen letters en witruimte gebruiken.";
                        $errors++;
                }
            }
            if (empty($_POST["age"])){
                $errAge = "Je moet iets invullen";
                $errors++;
            }else{
                $age = test_input($_POST["age"]);
                if(!preg_match("/^[0-9]*?$/",$age)){
                        $errAge = "Je mag alleen cijfers invullen.";
                        $errors++;
                }
            }
            if ($errors == 0){
                $data[0] = $name;
                $data[1] = $age;
                createEmployee($data);
                 //2. Bouw een url op en redirect hierheen
                header('location:' . URL . '/employee/index');
            }else{
                render('employee/create', array("errName" => $errName, "errAge" => $errAge, "name" => $name, "age" => $age));
            }
    }
}

function edit($id){
    //1. Haal een medewerker op met een specifiek id en sla deze op in een variable
    $employee = getEmployee($id);
    //2. Geef een view weer voor het updaten en geef de variable met medewerker hieraan mee
    render('employee/update', array("employee" => $employee));
}

function update($id){
    //1. Update een bestaand persoon met de data uit het formulier en sla deze op in de database
    $errors = 0;
    $errName = "";
    $errAge = "";
    $data = [];
    $employee = [];
    $employee['id'] = $id;

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (empty($_POST["name"])){
                $errName = "Je moet iets invullen";
                $errors++;
            }else{
                $employee['name'] = test_input($_POST["name"]);
                if(!preg_match("/^[a-zA-Z -]*?$/",$employee['name'])){
                        $errName = "Je mag alleen letters en witruimte gebruiken.";
                        $errors++;
                }
            }
            if (empty($_POST["age"])){
                $errAge = "Je moet iets invullen";
                $errors++;
            }else{
                $employee['age'] = test_input($_POST["age"]);
                if(!preg_match("/^[0-9]*?$/",$employee['age'])){
                        $errAge = "Je mag alleen cijfers invullen.";
                        $errors++;
                }
            }
            if ($errors == 0){
                $data[0] = $employee['name'];
                $data[1] = $employee['age'];
                $data[2] = $_POST["id"];
                updateEmployee($data);
                //2. Bouw een url en redirect hierheen
                header('location:' . URL . 'employee/index');
            }else{
                render('employee/update', array("employee" => $employee, "errName" => $errName, "errAge" => $errAge));
            }
    }
}

function delete($id){
    //1. Haal een medewerker op met een specifiek id en sla deze op in een variable
    $employee = getEmployee($id);
    //2. Geef een view weer voor het verwijderen en geef de variable met medewerker hieraan mee
    render("employee/delete", array("employee" => $employee));
}

function destroy($id){
    //1. Delete een medewerker uit de database
    deleteEmployee($id);
	//2. Bouw een url en redirect hierheen
    header('location:' . URL . '/employee/index');
}

function test_input($data) {
    $data = trim($data); //Zorgt ervoor dat onnodige space, tab, newline worden weggehaald.
    $data = stripslashes($data); //verwijderd backslashes (\).
    $data = htmlspecialchars($data); //Dit zorgt ervoor dat speciale karakters naar html veranderd waardoor je niet gehackt kan worden.
    return $data;
}
?>