<?php 
session_start();

error_reporting(0);

if (!isset($_SESSION['username'])) {
	$_SESSION['username'] = $_POST['username'];
	$_SESSION['password'] = $_POST['password'];
}


$phone = '';
$street = '';
$city = '';
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
	
	<h1>Contact</h1>

	<?php 
	
	$query = "SELECT phone, street, city
			  FROM address
			  ORDER BY addressId";
	if ($result = mysqli_query($dbc, $query)) {
		while ($comment = mysqli_fetch_array($result)) {
			$phone = $comment['phone'];
			$street = $comment['street'];
			$city = $comment['city'];
		}
	}
	if ($_SESSION['username'] == 'admin' && $_SESSION['password'] == 'admin') {
		echo "$phone <br>";
		echo "$street <br>";
		echo "$city <br>";
		echo "
				<br>
				<hr>
				<br>
				Edit:
				<br>
				<br>
				<form method='post' action='editAddress.php'>
					<label for='phone'>Phone</label>
					<input type='text' name='phone' placeholder='(000) 000-0000'><br>
					<label for='street'>Street</label>
					<input type='text' name='street' placeholder='0000 Random Rd.'><br>
					<label for='city'>City</label>
					<input type='text' name=city placeholder='City, ST, 12345'><br>
					<input type='submit' value='Edit'>
				</form>
				<br>
				<form method='post' action='deleteAddress.php'>
					<input type='submit' value='Delete'>
				</form>
			";
	} elseif ($_SESSION['username'] == 'publisher' && $_SESSION['password'] == 'publisher') {
		echo "$phone <br>";
		echo "$street <br>";
		echo "$city <br>";
		echo "
				<form method='post' action='editAddress.php'>
					<label for='phone'>Phone</label>
					<input type='text' name='phone' placeholder='(000) 000-0000'>
					<label for='street'>Street</label>
					<input type='text' name='street' placeholder='0000 Random Rd.'>
					<label for='city'>City</label>
					<input type='text' name=city placeholder='City, ST, 12345'>
					<input type='submit' value='Edit'>
				</form>
			";
	} else {
		echo "$phone <br>";
		echo "$street <br>";
		echo "$city <br>";
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