<?php include "dbConnect.php" ?>
<?php 

$pgID = $_POST['pgID'];
$pageText = $_POST['newText'];
$returnPage = $_POST['returnPage'];

$query = "INSERT INTO text (pageID, textBody)
		  VALUES($pgID, '$pageText')";
mysqli_query($dbc, $query);

echo "<script>location.href='$returnPage.php'</script>";
?>