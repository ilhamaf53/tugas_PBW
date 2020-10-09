<?php
// koneksi
$koneksi = new mysqli("localhost", "root", "", "latihan_form");
?>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<title>Homepage Pribadi Saya</title>
</head>

<body>
	<div class="container">
		<div class="text-center">
			<b>Selamat Datang <br> di Halaman Guest Book</b>
		</div>
		<form id="form" name="form" method="post">
			<div class="form-group">
				<label>Nama </label>
				<input type="text" name="nama" class="form-control">
			</div>
			<div class="form-group">
				<label>Komentar</label>
				<textarea name="komentar" rows="10" class="form-control"></textarea>
			</div>
			<button class="btn btn-primary" name="kirim">Kirim</button>
		</form>
		<?php
		if (isset($_POST['kirim'])) {
			$nama = $_POST['nama'];
			$komen = $_POST['komentar'];

			$sql = "INSERT INTO form(nama, komentar) VALUES('$nama', '$komen')";
			$result = mysqli_query($koneksi, $sql);
		}
		$sql = "SELECT * FROM form ORDER BY id ASC";
		// ORDER BY id DESC is order result by ascending

		$result = mysqli_query($koneksi, $sql);
		?>

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama</th>
					<th>Komentar</th>
				</tr>
			</thead>
			<?php $nomor = 1; ?>
			<?php while ($rows = mysqli_fetch_assoc($result)) : ?>
				<tbody>
					<tr>
						<td><?= $nomor ?></td>
						<td><?= $rows['nama']; ?></td>
						<td><?= $rows['komentar']; ?></td>
					</tr>
				</tbody>
				<?php $nomor++; ?>
			<?php endwhile; ?>
		</table>
	</div>
</body>

</html>