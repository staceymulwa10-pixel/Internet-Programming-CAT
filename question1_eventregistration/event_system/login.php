<!DOCTYPE html>
<html>

<head>

<title>User Login</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<h2>Login</h2>

<form action="login_process.php" method="POST">

<label>Email</label><br>

<input type="email" name="email" required>

<br><br>

<label>Password</label><br>

<input type="password" name="password" required>

<br><br>

<input type="submit" value="Login">

</form>

<p>
Don't have an account?
<a href="register.php">Register Here</a>
</p>

</body>

</html>