<!DOCTYPE html>

<html>

<head>
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
		<br>
		<form>
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
	</div>
</body>

<script>
</script>

</html>
