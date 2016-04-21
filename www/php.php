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
$Make = $type = $model = $year = "";

$general = $collection->find();
foreach ($general as $doc){
	var_dump($doc);
}
$Make_all = $collection->find()->fields(array("Make"=>true));
$type_all = $collection->find()->fields(array("type"=>true));
$model_all = $collection->find()->fields(array("model"=>true));
$year_all = $collection->find()->fields(array("year"=>true));

$search = array('Make' => 'XXXX','type' => 'XXXX','model' => 'XXXX','year' => 'XXXX');

?>


