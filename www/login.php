<!DOCTYPE html>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/default.css">
</head>

<title>Log In - BigLegCarry</title>

<body>
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
		User name:<br>
		<input type="text" name="username"><br>
		User password:<br>
		<input type="password" name="psw"><br>
		<button type="button" name="login">Log in</button>
		<button type="button" name="signup" onclick="window.location.href='signup.php'">Sign up</button>
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
