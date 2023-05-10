<?php include "dbConnect.php" ?>
<?php 

$query = "DELETE FROM address;";
mysqli_query($dbc, $query);

echo "<script>location.href='contactus.php'</script>";
?>