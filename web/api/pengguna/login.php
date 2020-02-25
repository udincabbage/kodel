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
$pengguna->user = $data->user;
$pengguna->password = $data->password;
//
$stmt = $pengguna->login();
$num = $stmt->rowCount();
if($num>0){
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  extract($row);
  $id_pengguna = $id;

  $token = array(
    "iss" => $iss,
    "aud" => $aud,
    "iat" => $iat,
    "nbf" => $nbf,
    "data" => array(
      "id" => $id_pengguna,
      "level" => $level,
      "opsi" => $opsi,
      "user" => $user
    )
  );

  // set response code
  http_response_code(200);

  // generate jwt
  $jwt = JWT::encode($token, $key);
  echo json_encode(
    array(
      "message" => "Login berhasil",
      "jwt" => $jwt
    )
  );
}else{
  http_response_code(401);
  echo json_encode(array("message" => "Username/Password Salah"));
}


?>
