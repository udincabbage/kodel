<?php
$jwt = $_COOKIE['jwt'];

$jsonData = array(
  'jwt' => $jwt
);
$jsonDataEncoded = json_encode($jsonData);
$url = "https://pmii.banjar.teknobara.co.id/api/pengguna/validate-token.php";
$result_JSON = request_api($url,$jsonDataEncoded);
$id = $result_JSON["data"]["id"];
$idx = $result_JSON["data"]["id"];
$user = $result_JSON["data"]["user"];

$level = $result_JSON["data"]["level"];
if($level==1){
  $_SESSION["username"] = $result_JSON["data"]["user"];
  include("sidebar_admin.php");
}else if($level==3){
  include("sidebar_member.php");
  $_SESSION["username"] = $result_JSON["data"]["user"];
}else if($level==4){
  include("sidebar_guest.php");
  $_SESSION["username"] = $result_JSON["data"]["user"];
}else{
  echo  "<meta http-equiv='refresh' content='1; url=login.php'>  ";
}
?>
