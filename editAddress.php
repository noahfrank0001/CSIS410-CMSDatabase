<?php include "dbConnect.php" ?>
<?php 

$phone = $_POST['phone'];
$street = $_POST['street'];
$city = $_POST['city'];

$query = "INSERT INTO address (phone, street, city)
		  VALUES('$phone', '$street', '$city')";
mysqli_query($dbc, $query);

echo "<script>location.href='contactus.php'</script>";
?>