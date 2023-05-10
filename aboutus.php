<?php 
session_start();

error_reporting(0);

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
	
	<h1>
		<b> <?php echo "Greetings from Gaming Hardware Plus!" ?> </b>
	</h1>

	<?php 
	
	$query = "SELECT textBody
			  FROM text
			  WHERE pageID = 1
			  ORDER BY textID";
	if ($result = mysqli_query($dbc, $query)) {
		while ($comment = mysqli_fetch_array($result)) {
			$text = $comment['textBody'];
		}
	}
	if ($_SESSION['username'] == 'admin' && $_SESSION['password'] == 'admin') {
		echo "<p>$text</p>";
		echo "- The Gaming Hardware Plus Team.";
		echo "
				<form method='post' action='editText.php'>
					<input type='hidden' name='pgID' value='1'>
					<input type='hidden' name='returnPage' value='aboutus'>
					<textarea cols='15' rows='8' placeholder='Edit Content' name='newText'></textarea>
					<input type='submit' value='Edit'>
				</form>
				<form method='post' action='deleteText.php'>
					<input type='hidden' name='pgID' value='1'>
					<input type='submit' value='Delete'>
				</form>
			";
	} elseif ($_SESSION['username'] == 'publisher' && $_SESSION['password'] == 'publisher') {
		echo "<p>$text</p>";
		echo "- The Gaming Hardware Plus Team.";
		echo "
				<form method='post' action='editText.php'>
					<input type='hidden' name='pgID' value='1'>
					<input type='hidden' name='returnPage' value='aboutus'>
					<textarea cols='15' rows='8' placeholder='Edit Content' name='newText'></textarea>
					<input type='submit' value='Edit'>
				</form>
			";
	} else {
		echo "<p>$text</p>";
		echo "- The Gaming Hardware Plus Team.";
	}
	?>

	<br>
	<br>
	<br>
	<footer id="footer">
		<?php include "footer.php" ?>
	</footer>
</body>
</html>