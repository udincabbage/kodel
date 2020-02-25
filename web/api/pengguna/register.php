<?php
// required headers
header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../includes/conf.php';
include_once '../api-config/core.php';
include_once 'pengguna.php';

$database = new Database();
$db = $database->getConnection();

$pengguna = new Pengguna($db);
$data = json_decode(file_get_contents("php://input"));

if(
  !empty($data->user) &
  !empty($data->password)
){

  $pengguna->user = $data->user;
  $pengguna->password = $data->password;

  $last_id =  $pengguna->register();

  if($last_id!=null){
    if($last_id!=1){
      http_response_code(201);
      echo json_encode(array("message" => "Pendaftaran berhasil"));
    }else{
      http_response_code(201);
      echo json_encode(array("message" => "User sudah ada"));
    }
  }
  else{
    http_response_code(503);
    echo json_encode(array("message" => "User gagal disimpan".$last_id));
  }
}else{

  http_response_code(400);
  echo json_encode(array("message" => "Lengkapi Data"));
} ?>
