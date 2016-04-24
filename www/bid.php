<?php
$connection = new MongoClient();
$db = $connection -> biglegcarry;
$col_bid = $connection -> bid;

$bid_user = $bid_vin = $bid_topprice = $bid_newprice = "";

//get data from when user click bid button?
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$bid_user = $_POST['username'];
	$bid_vin = $_POST['vin'];
	$bid_topprice = $_POST['price showed on page'];
	$bid_newprice = $_POST['user entered price']

	if ($bid_topprice > $bid_newprice) {
		echo "Please enter a new price higher than current bidding price"
	}

	else {
		$col_bid -> update(array("username" => $bid_user, "price" => $bid_newprice));
		echo "Bid successfully"
	}
}
?>