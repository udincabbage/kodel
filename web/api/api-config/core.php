<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$ippengguna=$_SERVER['REMOTE_ADDR'];
if($ippengguna=="::1")
  $home_url="https://localhost/kodel/api/";
else {
  $home_url="https://pmii.banjar.teknobara.co.id/api/";
}

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$records_per_page = 5;
//$from_record_num = ($records_per_page * $page) - $records_per_page;

// show error reporting
error_reporting(E_ALL);

// set your default time-zone
date_default_timezone_set('Asia/Manila');

// variables used for jwt
$key = "example_key";
$iss = "http://example.org";
$aud = "http://example.com";
$iat = 1356999524;
$nbf = 1357000000;

?>
