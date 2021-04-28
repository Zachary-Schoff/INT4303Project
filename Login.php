<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link href = "Style.css" rel = "stylesheet">
</head>

<body>
	<h1>LTU Resource</h1>
	<div class="topnav">
		<a class="dash" href="Dashboard.php">Dashboard</a>
		<a class="dash" href="News.php">News</a>
		<a class="dash" href="Profile.html">Profile</a>
		<a class="dash" href="About.php">About</a>
		<a class="dash" href="Login.php">Login</a>
		<a>
			<form class="dash" action = "SearchAction.php">
				<input class="form-control me-2"  id = "input" name = "input" type="text" placeholder="Search" aria-label="Search" style = "width: 100%; text-align: right">
				<input class="btn btn-outline-success" type="submit">
			</form>
		</a>
	</div>
	<form method="post" action="LoginAction.php">
		<label for="username">Email</label><br>
		<input type="text" id="Email" name="Email"><br>
		<label for="password">Password</label><br>
		<input type="text" id="password" name="password">
		<input type="submit" value="Login">
	</form>
	
	<a href="CreateUser.php">Create Account</a>
</body>
</html>