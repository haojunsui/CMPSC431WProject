<!DOCTYPE html>

<html>

<head>
	<?php
		$m = new MongoClient();
		$db = $m->selectDB("biglegcarry");
		$collection = new MongoCollection($db, "maker");

		$cursor = $collection->find();

		$makers = array();

		foreach ($cursor as $obj) {
			array_push($makers, $obj["maker"]);
		}
	?>

	<script type="text/javascript">
		function pop_makers() {
			var makers = <?php echo json_encode($makers);?>;

			var maker_drop = document.getElementById("maker");

			for(var i = 0; i < makers.length; i++) {
				var opt = document.createElement('option');
				opt.text = makers[i];
				opt.value = makers[i];
				maker_drop.options.add(opt);
			}
		}
	</script>
</head>

<title>Our Cars - BigLegCarry</title>

<body onLoad="pop_makers();">
	<div style="text-align:center">
		<header>
			<h1>BigLegCarry</h1>
			<table border="1" align="center" width="100%">
				<tr>
					<td><a href="index.php">Home</a></td>
					<td><a href="cars.php">Cars</a></td>
					<td><a href="dealers.php">Dealers</a></td>
					<td><a href="about.php">About Us</a></td>
					<td>
						<input type="text" size="7" id="search_cars" placeholder="Type to search" style="width: 100%;box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;">
					</td>
					<td><a href="sign.php">Sign in</a></td>
				</tr>
			</table>
		</header>
	</div>
	<br>
	<div>
		<table border="0" width="100%">
			<tr>
				<td>
					Model:
					<select>
						<option value="any">Any</option>
					</select>
				</td>
				<td>
					Maker:
					<select id="maker">
						<option value="any">Any</option>
					</select>
				</td>
			</tr>
		</table>
	</div>
</body>

</html>
