<?php

session_start();

$_SESSION['token']=bin2hex(random_bytes(32));

?>
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>

    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>

</head>

<body>

<h2>Create Account</h2>

<form
name="registerForm"
action="register_process.php"
method="POST"
onsubmit="return validateRegistration()">
<input

type="hidden"

name="token"

value="<?php echo $_SESSION['token']; ?>">

<label>Full Name</label><br>

<input type="text" name="fullname" required>

<br><br>

<label>Email Address</label><br>

<input type="email" name="email" required>

<br><br>

<label>Password</label><br>

<input type="password" name="password" required>

<br><br>

<label>Confirm Password</label><br>

<input type="password" name="confirm_password" required>

<br><br>

<input type="submit" value="Register">

</form>

</body>

</html>