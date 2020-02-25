<?php
// required headers
header("Access-Control-Allow-Origin:*");
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


// $data = json_decode(file_get_contents("php://input"));
// $jwt=isset($data->jwt) ? $data->jwt : "";
// if($jwt){
//   try {
    // $decoded = JWT::decode($jwt, $key, array('HS256'));

    $database = new Database();
    $db = $database->getConnection();

    $pengguna = new Pengguna($db);

    $stmt = $pengguna->read();
    $num = $stmt->rowCount();

    if($num>0){
      $penggunas_arr=array();
      $penggunas_arr["records"]=array();

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $pengguna_item=array(
          "id" => $id,
          "created_at" => $created_at,
          "updated_at" => $updated_at,
          "user" => $status,
          "level" => $level);

          array_push($penggunas_arr["records"], $pengguna_item);
        }

        http_response_code(200);
        echo json_encode($penggunas_arr);
      }
      else{

        http_response_code(404);
        echo json_encode(
          array("message" => "data masih kosong.")
        );
      }
    // }

    // catch (Exception $e){
    //   http_response_code(401);
    //   echo json_encode(array(
    //     "message" => "Access denied.",
    //     "error" => $e->getMessage()
    //   ));
    // }
  // }// show error message if jwt is empty
  // else{
  //   http_response_code(401);
  //   echo json_encode(array("message" => "Access denied empty."));
  // }
  ?>
