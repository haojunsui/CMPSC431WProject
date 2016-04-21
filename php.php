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
$db = $m->selectDB('cars');
$collection = new MongoCollection($db, 'collectionName?');
$make = $type = $model = $year = "";

$general = $collection->find();
foreach ($general as $doc){
	var_dump($doc);
}

$make_all = $collection->find({}, {_id:0, Make:1});
$type_all = $collection->find({}, {_id:0, type:1});
$model_all = $collection->find({}, {_id:0, model:1});
$year_all = $collection->find({}, {_id:0, year:1});
if()


?>
