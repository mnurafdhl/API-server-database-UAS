<?php

include "../config/koneksi.php";

$nama_orang = @$_POST['nama_orang'];
$tanggal = @$_POST['tanggal'];
$jumlah_uang = @$_POST['jumlah_uang'];
$keterangan = @$_POST['keterangan'];

$data = [];

$query = mysqli_query($kon, "INSERT INTO `daftar_infak`
  ( `nama_orang`,`tanggal`,
    `jumlah_uang`,`keterangan`)
   VALUES
   ('". $nama_orang ."','". $tanggal ."',
    '". $jumlah_uang ."','". $keterangan ."')");

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