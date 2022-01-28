<?php

include "../config/koneksi.php";

$id = @$_POST['id'];
$nama_orang = @$_POST['nama_orang'];
$tanggal = @$_POST['tanggal'];
$jumlah_uang = @$_POST['jumlah_uang'];
$keterangan = @$_POST['keterangan'];

$data = [];

$query = mysqli_query($kon, "UPDATE `daftar_infak` SET
`id`='". $id."',
`nama_orang` = '". $nama_orang."',
`tanggal` = '". $tanggal."',
`jumlah_uang` = '". $jumlah_uang."',
`keterangan` = '". $keterangan."',
WHERE  `id` = '". $id ."'");

if($query){
    $status = true;
       $pesan = "request success";
       $data[]= $query;
}else{
    $status = false;
    $pesan = "request failed";
}

$json = [
   "status" => $status,
   "pesan" => $pesan,
   "data" => $data,
];

header("Content-Type: application/json");
echo json_encode($json);

?>