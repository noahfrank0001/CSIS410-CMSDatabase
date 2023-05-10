<?php include "dbConnect.php" ?>
<?php 

$pgID = $_POST['pgID'];

$query = "DELETE FROM text
		  WHERE pageID = $pgID";
mysqli_query($dbc, $query);

echo "<script>location.href='databaseLanding.php'</script>";
?>