<!DOCTYPE html>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/default.css">
	<script type="text/javascript">
		function pop_dobdrop() {
			var dobdaydrop = document.getElementById("dobday");
			var dobyeardrop = document.getElementById("dobyear");
			var cur_year = 2016;

			for (var i = 0; i < 31; i++) {
				opt = document.createElement('option');
				opt.text = i + 1;
				opt.value = i + 1;
				dobdaydrop.options.add(opt);
			}

			for (var i = 0; i < 82; i++) {
				opt = document.createElement('option');
				opt.text = cur_year - 18 - i;
				opt.value = cur_year - 18 - i;
				dobyeardrop.options.add(opt);
			}
		}
	</script>
</head>

<title>Sign up - BigLegCarry</title>

<body onload="pop_dobdrop();">
	<h1>BigLegCarry</h1>

	<div class="navigation_bar">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="cars.php?maker=Any&model=Any&color=Any">Cars</a></li>
			<li><a href="about.php">About Us</a></li>
			<li id="search">
				<input type="text" id="search_cars" placeholder="Type to search">
			</li>
			<li><a href="login.php">Log in / Sign up</a></li>
		</ul>
	</div>
	<br>
	<form style="text-align:center;">
		Create an account<br>
		<input type="text" id="firstname" placeholder="First name"><br>
		<input type="text" id="lastname" placeholder="Last name"><br>
		<input type="text" id="email" placeholder="Email address"><br>
		<input type="password" id="password" placeholder="Password"><br>
		<label>Date of Birth: </label>
		<select id="dobmonth">
			<option> - Month - </option>
			<option value="January">January</option>
			<option value="Febuary">Febuary</option>
			<option value="March">March</option>
			<option value="April">April</option>
			<option value="May">May</option>
			<option value="June">June</option>
			<option value="July">July</option>
			<option value="August">August</option>
			<option value="September">September</option>
			<option value="October">October</option>
			<option value="November">November</option>
			<option value="December">December</option>
		</select>
		<label> / </label>
		<select id="dobday">
			<option> - Day - </option>
		</select>
		<label> / </label>
		<select id="dobyear">
			<option> - Year - </option>
		</select><br>
		<input type="checkbox" id="terms"> I agree to <a href="terms.php">BigLegCarry</a> terms<br>
		<button type="button" id="signup">Sign up for free</button>
	</form>
	<br>
	<div class="footer">
		<p class="footer-links">
			<a href="index.php">Home</a>
			|
			<a href="cars.php?maker=Any&model=Any&color=Any">Cars</a>
			|
			<a href="about.php">About Us</a>
		</p>

		<p class="footer-company-name">BigLegCarry &copy; 2016</p>
	</div>
</body>

<script>
</script>

</html>
