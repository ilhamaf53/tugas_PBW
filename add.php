<?php
	$host='localhost';
	$user='root';
    $pass='';
    $db='latihan_form';
    $tbl_name='form';
	$link=mysqli_connect($host,$user,$pass,$db)or die(mysqli_error());
	
	$nama=$_POST['nama'];
	$komen=$_POST['komentar'];

	$sql="INSERT INTO $tbl_name(nama, komentar)VALUES('$nama', '$komen')";
$result=mysqli_query($link,$sql);

if($result){
echo "Successful<BR>";
echo "<a href=form.php>lihat data</a>";
}
else {
echo "ERROR";
}
mysqli_close($link);
	