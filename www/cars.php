<!DOCTYPE html>

<html>

<head>
	<?php
		$m = new MongoClient();
		$db = $m->selectDB("biglegcarry");
		$maker_col = new MongoCollection($db, "maker");
		$model_col = new MongoCollection($db, "model");
		$makers = array();
		array_push($makers, "Any");
		$models = array();
		array_push($models, "Any");

		$maker = $_GET["maker"];
		$model = $_GET["model"];

		$cursor = $maker_col->find();

		foreach ($cursor as $obj) {
			array_push($makers, $obj["maker"]);
		}

		if ($maker != "Any") {
			$cursor = $model_col->find(array("maker" => $maker));

			foreach ($cursor as $obj) {
				foreach ($obj["model"] as $t) {
					array_push($models, $t);
				}
			}
		}
	?>

	<script type="text/javascript">
		function changed() {
			var maker_sel = document.getElementById("maker");
			maker_sel = maker_sel.options[maker_sel.selectedIndex].value;
			var model_sel = document.getElementById("model");
			model_sel = model_sel.options[model_sel.selectedIndex].value;

			location.href = "cars.php?maker=" + maker_sel + "&model=" + model_sel;
		}

		function pop_dropdown() {
			var makers = <?php echo json_encode($makers);?>;
			var models = <?php echo json_encode($models);?>;

			var maker_drop = document.getElementById("maker");

			for (var i = 0; i < makers.length; i++) {
				opt = document.createElement('option');
				opt.text = makers[i];
				opt.value = makers[i];
				maker_drop.options.add(opt);
				if (maker_drop.options[i].value == <?php echo json_encode($maker);?>)
					maker_drop.options[i].selected = true;
			}

			var model_drop = document.getElementById("model");

			for (var i = 0; i < models.length; i++) {
				opt = document.createElement('option');
				opt.text = models[i];
				opt.value = models[i];
				model_drop.options.add(opt);
			}
		}
	</script>
</head>

<title>Our Cars - BigLegCarry</title>

<body onLoad="pop_dropdown();">
	<div style="text-align:center">
		<header>
			<h1>BigLegCarry</h1>
			<table border="1" align="center" width="100%">
				<tr>
					<td><a href="index.php">Home</a></td>
					<td><a href="cars.php?maker=Any&model=Any">Cars</a></td>
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
					Maker:
					<select id="maker" onchange="changed();"></select>
				</td>
				<td>
					Model:
					<select id="model" onchange="changed();"></select>
				</td>
			</tr>
		</table>
	</div>
</body>

</html>
