
<?php

$koneksi = mysqli_connect("localhost","root","","spk_dosenstiper");

// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

//fungsi untuk mengkonversi size file


date_default_timezone_set('Asia/Jakarta');
 
$sekarang = new DateTime();
$menit = $sekarang -> getOffset() / 60;
 
$tanda = ($menit < 0 ? -1 : 1);
$menit = abs($menit);
$jam = floor($menit / 60);
$menit -= $jam * 60;
 
$offset = sprintf('%+d:%02d', $tanda * $jam, $menit);


mysqli_query($koneksi,"SET time_zone = '$offset'")
?>