<?php
// Akses koneksi ke Database
require_once("dbConnection.php");

// mengambil data pada db users dengan urutan descending
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>

<html>
<head>	
	<title>Data Customer Ajus</title>
	<!-- BOOTSTRAP 5 -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">


	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</head>

<body>
	<h2>Homepage</h2>
	<p>
		<a href="add.php">
			<button type="button" class="btn btn-primary">Tambah Data</button>
		</a>
			
	</p>
	<!-- membuat tabel -->
	<table class="table">
		<tr bgcolor='#DDDDDD'>
			<th scope="col"><strong>Name</strong></th>
			<th scope="col"><strong>Age</strong></th>
			<th scope="col"><strong>Email</strong></th>
			<th scope="col"><strong>Action</strong></th>
		</tr>
		<?php
		while ($res = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>".$res['name']."</td>";
			echo "<td>".$res['age']."</td>";
			echo "<td>".$res['email']."</td>";	
			echo "<td><a href=\"edit.php?id=$res[id]\"><button type=\"button\" class=\"btn btn-warning\">Edit</button></a> | 
			<a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><button type=\"button\" class=\"btn btn-danger\">Hapus</button></a></td>";
		}
		?>
	</table>
</body>
</html>
