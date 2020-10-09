<html>

<head>
	<title>Homepage Pribadi Saya</title>
</head>

<body>
	<center><b>Selamat Datang <br> di Halaman Guest Book</b></center>
	<form id="form1" name="form1" method="post">
		Nama Anda: <input type="text" size="10" maxlength="40" name="nama">
		<br><br>
		komentar Anda: <textarea rows="5" cols="20" name="komentar"></textarea>
		<br><br>
		<input type="submit" name="Submit" value="kirim">
	</form>
	<?php

	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'latihan_form';
	$tbl_name = 'form';
	$link = mysqli_connect($host, $user, $pass, $db);

	if (isset($_POST['Submit'])) {
		$nama = $_POST['nama'];
		$komen = $_POST['komentar'];

		$sql = "INSERT INTO $tbl_name(nama, komentar)VALUES('$nama', '$komen')";
		$result = mysqli_query($link, $sql);
	}
	$sql = "SELECT * FROM $tbl_name ORDER BY id ASC";
	// ORDER BY id DESC is order result by ascending

	$result = mysqli_query($link, $sql);
	?>
	<table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
		<tr>
			<th width="20%" align="center" bgcolor="#E6E6E6"><strong>No.</strong></th>
			<th width="53%" align="center" bgcolor="#E6E6E6"><strong>Nama</strong></th>
			<th width="15%" align="center" bgcolor="#E6E6E6"><strong>Komentar</strong></th>
		</tr>

		<?php
		$nomor = 1;
		// Start looping table row
		while ($rows = mysqli_fetch_assoc($result)) :
		?>

			<tr>
				<td align="center" bgcolor="#FFFFFF"><?= $nomor ?></td>
				<td align="center" bgcolor="#FFFFFF"><?= $rows['nama']; ?></td>
				<td align="center" bgcolor="#FFFFFF"><?= $rows['komentar']; ?></td>
			</tr>
		<?php
			$nomor++;
		// Exit looping and close connection
		endwhile;
		mysqli_close($link);
		?>
	</table>
</body>

</html>