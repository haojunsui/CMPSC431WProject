<?php
$connection = new MongoClient();
$db = $connection -> biglegcarry;
$col_bid = $connection -> bid;

$bid_user = $bid_vin = $bid_topprice = $bid_newprice = "";

//Make data from when user click bid button?
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$bid_user = $_GET['username'];
	$bid_vin = $_GET['vin'];
	//get top price
	$bid_topprice = $col_bid -> find('price', array('vin' => $bid_vin));
	
	$bid_newprice = $_GET['newprice']

	if ($bid_topprice >= $bid_newprice) {
		echo "Please enter a new price higher than current bidding price"
	}

	else {
		$col_bid -> update(array("username" => $bid_user, "price" => $bid_newprice));
		echo "Bid successfully"
	}
	//update topprice
	$bid_topprice = $col_bid -> find('price', array('vin' => $bid_vin));

}
?>