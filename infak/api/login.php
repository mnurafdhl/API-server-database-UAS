<?php

include "../config/koneksi.php";


$username = @$_POST['username'];
$password = @$_POST['password'];

$data = [];

$query = mysqli_query($kon, "SELECT * FROM `admin` WHERE  `username` = '".$username."' && `password` = '".$password."'");
// var_dump($query); exit;


   if($query){
    $status = true;
       $pesan = "request success";
       $data[]= mysqli_fetch_assoc($query);
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