<!DOCTYPE html>

<html>

<head>
	<?php
		// Make mongodb connection
		$m = new MongoClient();
		$db = $m->selectDB("biglegcarry");
		$car_col = new MongoCollection($db, "car");
		$makers = array();
		array_push($makers, "Any");
		$models = array();
		array_push($models, "Any");
		$colors = array();
		array_push($colors, "Any");
		$cars = array();

		// Get maker and model from url
		$maker = $_GET["maker"];
		$model = $_GET["model"];
		$color = $_GET["color"];

		// Find makers from mongodb
		$cursor = $car_col->distinct("maker");

		foreach ($cursor as $obj)
			array_push($makers, $obj);

		if ($maker != "Any") {
			// Find models from mongodb
			$cursor = $car_col->distinct("model", array("maker" => $maker));

			foreach ($cursor as $obj)
				array_push($models, $obj);
		}

		if ($maker != "Any") {
			if ($model != "Any") {
				$cursor = $car_col->distinct("color", array("maker" => $maker, "model" => $model));

				foreach ($cursor as $obj)
					array_push($colors, $obj);
			} else {
				$cursor = $car_col->distinct("color", array("maker" => $maker));

				foreach ($cursor as $obj)
					array_push($colors, $obj);
			}
		} else {
			$cursor = $car_col->distinct("color");

			foreach ($cursor as $obj)
				array_push($colors, $obj);
		}

		if ($maker == "Any") {
			if ($color == "Any")
				$cursor = $car_col->find();
			else
				$cursor = $car_col->find(array("color" => $color));
		} else {
			if ($model == "Any") {
				if ($color == "Any")
					$cursor = $car_col->find(array("maker" => $maker));
				else
					$cursor = $car_col->find(array("maker" => $maker, "color" => $color));
			} else {
				if ($color == "Any")
					$cursor = $car_col->find(array("maker" => $maker, "model" => $model));
				else
					$cursor = $car_col->find(array("maker" => $maker, "model" => $model, "color" => $color));
			}
		}
		foreach ($cursor as $obj)
			array_push($cars, $obj);
	?>

	<script type="text/javascript">
		function maker_changed() {
			// Refresh page with new maker
			var maker_sel = document.getElementById("maker");
			maker_sel = maker_sel.options[maker_sel.selectedIndex].value;

			location.href = "cars.php?maker=" + maker_sel + "&model=Any" + "&color=Any";
		}

		function model_changed() {
			// Refresh page with new maker
			var maker_sel = document.getElementById("maker");
			maker_sel = maker_sel.options[maker_sel.selectedIndex].value;
			var model_sel = document.getElementById("model");
			model_sel = model_sel.options[model_sel.selectedIndex].value;

			location.href = "cars.php?maker=" + maker_sel + "&model=" + model_sel + "&color=Any";
		}

		function search() {
			// Refresh page with new model
			var maker_sel = document.getElementById("maker");
			maker_sel = maker_sel.options[maker_sel.selectedIndex].value;
			var model_sel = document.getElementById("model");
			model_sel = model_sel.options[model_sel.selectedIndex].value;
			var color_sel = document.getElementById("color");
			color_sel = color_sel.options[color_sel.selectedIndex].value;

			location.href = "cars.php?maker=" + maker_sel + "&model=" + model_sel + "&color=" + color_sel;
		}

		function pop_dropdown() {
			// Get makers array and models array from php
			var makers = <?php echo json_encode($makers);?>;
			var models = <?php echo json_encode($models);?>;
			var colors = <?php echo json_encode($colors);?>;

			var maker_drop = document.getElementById("maker");

			// Populate makers dropdown list
			for (var i = 0; i < makers.length; i++) {
				opt = document.createElement('option');
				opt.text = makers[i];
				opt.value = makers[i];
				maker_drop.options.add(opt);
				// Set makers dropdown currently selected
				if (maker_drop.options[i].value == <?php echo json_encode($maker);?>)
					maker_drop.options[i].selected = true;
			}

			var model_drop = document.getElementById("model");

			// Populate models dropdown list
			for (var i = 0; i < models.length; i++) {
				opt = document.createElement('option');
				opt.text = models[i];
				opt.value = models[i];
				model_drop.options.add(opt);
				// Set models dropdown currently selected
				if (model_drop.options[i].value == <?php echo json_encode($model);?>)
					model_drop.options[i].selected = true;
			}

			var color_drop = document.getElementById("color");

			// Populate models dropdown list
			for (var i = 0; i < colors.length; i++) {
				opt = document.createElement('option');
				opt.text = colors[i];
				opt.value = colors[i];
				color_drop.options.add(opt);
				// Set models dropdown currently selected
				if (color_drop.options[i].value == <?php echo json_encode($color);?>)
					color_drop.options[i].selected = true;
			}
		}

		function pop_table() {
			var cars = <?php echo json_encode($cars);?>;

			var car_table_div = document.getElementById("car_table_div");
			var car_table = document.createElement("table");
			var car_table_body = document.createElement("tbody");
			var tr = document.createElement('tr');
			var col = 4;

			car_table.border = '1';
			car_table.width = "100%";
			car_table.appendChild(car_table_body);

			for (var i = 0; i < cars.length; i++) {
				if (i % col == 0) {
					car_table_body.appendChild(tr);
					tr = document.createElement('tr');
				}

				var td = document.createElement('td');
				td.appendChild(document.createTextNode("Maker: " + cars[i]["maker"]));
				td.appendChild(document.createElement('br'));
				td.appendChild(document.createTextNode("Model: " + cars[i]["model"]));
				td.appendChild(document.createElement('br'));
				td.appendChild(document.createTextNode("Dealer: " + cars[i]["dealer"]));
				td.appendChild(document.createElement('br'));
				td.appendChild(document.createTextNode("Mileage: " + cars[i]["mileage"]));
				td.appendChild(document.createElement('br'));
				td.appendChild(document.createTextNode("Price: " + cars[i]["price"]));
				td.appendChild(document.createElement('br'));
				td.appendChild(document.createTextNode("Color: " + cars[i]["color"]));
				td.appendChild(document.createElement('br'));
				td.appendChild(document.createTextNode("N/U: " + cars[i]["newuse"]));
				tr.appendChild(td);
			}

			car_table_body.appendChild(tr);

			car_table_div.appendChild(car_table);
		}
	</script>
</head>

<title>Our Cars - BigLegCarry</title>

<body onLoad="pop_dropdown();pop_table();">
	<div style="text-align:center">
		<header>
			<h1>BigLegCarry</h1>
			<table border="1" align="center" width="100%">
				<tr>
					<td><a href="index.php">Home</a></td>
					<td><a href="cars.php?maker=Any&model=Any&color=Any">Cars</a></td>
					<td><a href="dealers.php">Dealers</a></td>
					<td><a href="about.php">About Us</a></td>
					<td>
						<input type="text" size="7" id="search_cars" placeholder="Type to search" style="width: 100%;box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;">
					</td>
					<td><a href="login.php">Log in / Sign up</a></td>
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
					<select id="maker" onchange="maker_changed();"></select>
				</td>
				<td>
					Model:
					<select id="model" onchange="model_changed();"></select>
				</td>
				<td>
					Color:
					<select id="color" onchange="search();"></select>
				</td>
				<td>
					<input type="radio" id="new" checked>New
					<input type="radio" id="used">Used
				</td>
				<td>
					Year: <input type="text" id="year" placeholder="YYYY" size="1" maxlength="4">
				</td>
				<td>
					Price ($): <input type="text" id="lprice" placeholder="0" size="1"> - <input type="text" id="rprice" placeholder=&infin; size="1">
				</td>
				<td>
					Mileage (mi): <input type="text" id="lmileage" placeholder="0" size="1"> - <input type="text" id="rmileage" placeholder=&infin; size="1">
				</td>
				<td>
					<button type="button" id="search" onclick="search();">Search</button>
				</td>
			</tr>
		</table>
	</div>
	<br>
	<div id="car_table_div"></div>
</body>

</html>
