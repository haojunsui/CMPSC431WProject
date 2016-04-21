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
$makers = array();
array_push($makers, "Any");
$models = array();
array_push($models, "Any");
$year = array();
array_push($year, "Any");
$type = array();
array_push($type, "Any");

// Find makers from mongodb
$cursor = $maker_col->find();

foreach ($cursor as $obj) {
	array_push($makers, $obj["maker"]);
}

//model
$cursor = $model_col->find();

foreach ($cursor as $obj) {
	array_push($modle, $obj["model"]);
}
$cursor = $type_col->find();

foreach ($cursor as $obj) {
	array_push($type, $obj["type"]);
}
$cursor = $year_col->find();

foreach ($cursor as $obj) {
	array_push($year, $obj["year"]);
}

//$search = array('Make' => 'XXXX','type' => 'XXXX','model' => 'XXXX','year' => 'XXXX');

?>
