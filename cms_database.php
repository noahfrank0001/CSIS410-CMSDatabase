<?php 
session_start();
 ?>


<!DOCTYPE html>
<html lang="en"> <!-- this specifies that the language in the document is english -->
<head>
	<!-- These are the meta tags so the webpage can be identified by a search engine -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- This links to the CSS stylesheet -->
	<link rel="stylesheet" type="text/css" href="css-styles.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<!-- This is the webpages title -->
	<title>Login</title>
</head>
<body>
	<?php include "cms_header.php" ?>

	<form method="post" action="databaseLanding.php">
		<label for="username">Username:</label>
		<input type="text" name="username" id="password" required><br><br>
		<label for="password">Password:</label>
		<input type="password" name="password" id="password" required><br><br>	

		<input type="submit" name="submit" value="Login">
	</form>
	
	<br>
	<footer id="footer">
		<?php include "footer.php" ?>
	</footer>
</body>
</html>