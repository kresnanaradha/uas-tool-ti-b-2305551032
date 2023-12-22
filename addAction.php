<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
// Akses Database
require_once("dbConnection.php");

if (isset($_POST['submit'])) {
	// Escape special characters in string for use in SQL statement	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
		
	// Cek field yg kosong
	if (empty($name) || empty($age) || empty($email)) {
		if (empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if (empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if (empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {
		// Input ke database
		$result = mysqli_query($mysqli, "INSERT INTO users (`name`, `age`, `email`) VALUES ('$name', '$age', '$email')");
		
		// Munculkan pesan sukses
		echo "<p><font color='green'>Data berhasil ditambah!</p>";
		echo "<a href='index.php'>Lihat Hasil</a>";
	}
}
?>
</body>
</html>
