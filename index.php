<?php
session_start();

session_unset(); 

session_destroy(); 
?>

<html>
<head>
	<title>Health Care SL</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/font.css">
	<link rel="stylesheet" href="css/font1.css">

		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body>

    <div class="container">
        <h2>Health Care</h2>
<form action="logsub.php" method="post"><br>
<input name="unm" type="text" class="name" placeholder="Username" required><br>
<input name="pw" type="password" class="password" placeholder="Password" required><br>
<ul>
				<li>
					<input type="checkbox" id="brand1" value="">
					<label for="brand1"><span></span>Remember me</label>
				</li>
			</ul>
            <a href="#">Forgot Password?</a><br>
<input name="log" type="submit" value="Login"/>
</form>
</div>
</body>
</html>