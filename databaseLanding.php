<?php 
session_start();

if (!isset($_SESSION['username'])) {
	$_SESSION['username'] = $_POST['username'];
	$_SESSION['password'] = $_POST['password'];
}


$text = '';
?>

<!DOCTYPE html>
<html lang="en"> <!-- this specifies that the language in the document is english -->
<head>
	<!-- These are the meta tags so the webpage can be identified by a search engine -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- This links to the CSS stylesheet -->
	<link rel="stylesheet" type="text/css" href="css-styles.css">
	<!-- This is the webpages title -->
	<title>Thank you</title>
</head>
<body>
	<!-- This nav bar is for navigating between the home, about us, php configuration, and contact pages -->
	<?php include "cms_header.php"; ?>
	<?php include "dbConnect.php" ?>

	<?php  
	if (isset($_POST['uName'])) {
		$name = $_POST['uName'];
		$title = $_POST['uTitle'];
		$comment = $_POST['uComment'];

		$query = "INSERT INTO comments (commentId, name, title, comment, commentDate) 
				  VALUES(default, '$name', '$title', '$comment', default);";

		if ($result = mysqli_query($dbc, $query)) {
			echo "<h1>Thank you for your feedback!</h1>";
		} else {
			echo "<h1>There was an error.</h1>";
		}
		}
	?>

	
	<h1>Navigate to a page:</h1>
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="aboutus.php">About Us</a></li>
		<li><a href="contactus.php">Contact Us</a></li>
	</ul>

	<br>
	<br>
	<br>
	<footer id="footer">
		<?php include "footer.php" ?>
	</footer>
</body>
</html>