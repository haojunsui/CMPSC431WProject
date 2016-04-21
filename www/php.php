<?php

$m = new MongoClient();
$db = $m->selectDB('cars');
$collection = new MongoCollection($db, 'collectionName?');
$searchKey = "";

// search for cars
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$searchKey = test_input($_POST["input"]);
}

$command = array('Make' => '$searchKey')
$result = $collection->find($command);
foreach ($result as $doc) {
    var_dump($doc);
}

?>



<?php

$m = new MongoClient();
$db = $m->selectDB("biglegcarry");
$maker_col = new MongoCollection($db, "maker");
$model_col = new MongoCollection($db, "model");
$year_col = new MongoCollection($db, "year");
$type_col = new MongoCollection($db, "type");
$cars_col = new MongoCollection($db,"car");
$makers = array();
array_push($makers, "Any");
$models = array();
array_push($models, "Any");
$year = array();
array_push($year, "Any");
$type = array();
array_push($type, "Any");
$cars = array();
array_push($car, "Any");

// Find makers from mongodb
$cursor = $maker_col->find();

foreach ($cursor as $obj) {
	array_push($makers, $obj["maker"]);
}

// Find models from mongodb
$cursor = $model_col->find();

foreach ($cursor as $obj) {
	array_push($modle, $obj["model"]);
}

// Find type from mongodb
$cursor = $type_col->find();

foreach ($cursor as $obj) {
	array_push($type, $obj["type"]);
}

// Find year from mongodb
$cursor = $year_col->find();

foreach ($cursor as $obj) {
	array_push($year, $obj["year"]);
}

// Find cars
$cursor = $cars_col->find();

foreach ($cursor as $obj) {
	array_push($cars, $obj["car"]);
}

//$search = array('Make' => 'XXXX','type' => 'XXXX','model' => 'XXXX','year' => 'XXXX');

?>
