<?php
//OFFLINE ONLY
$ippengguna=$_SERVER['REMOTE_ADDR'];
if(($ippengguna=="::1")||($ippengguna=="127.0.0.1")) {
  $konaksidb	= mysqli_connect("localhost","root","", "nkit_pmii");
}else{
  $konaksidb	= mysqli_connect("localhost","pmiibanj4r_kadir","salimbada h4bang", "pmiibanj4r_kad3r");
}
if (!$konaksidb) {
  echo 'Failed Connection !';}

  define("API_URL", "https://pmii.banjar.teknobara.co.id/api/");

  // $ippengguna=$_SERVER['REMOTE_ADDR'];
  // if(($ippengguna=="::1")||($ippengguna=="127.0.0.1")) {
    // // define("API_SINGKONG", "http://localhost/cabbagehirang/api/");
    // define("API_SINGKONG", "https://singkron.lldikti11.or.id/api/");
    // define("API_ALBERDO", "http://localhost/alberdo/api/");
  // }else{
    // define("API_SINGKONG", "https://singkron.lldikti11.or.id/api/");
    // define("API_ALBERDO", "https://sibeken.lldikti11.or.id/api/");
  // }
?>


<?php
//OFFLINE ONLY
class Database{

    private $host = "localhost";
    private $db_name = "api_db";
    private $username = "root";
    private $password = "";
    public $conn;

    function __construct() {
        $ippengguna=$_SERVER['REMOTE_ADDR'];
        if(($ippengguna=="::1")||($ippengguna=="127.0.0.1")) {
          $this->host     ='localhost';
          $this->username = 'root';
          $this->password = '';
          $this->db_name    = 'nkit_pmii';
        }else{
          $this->host     ='localhost';
          $this->username = 'pmiibanj4r_kadir';
          $this->password = 'salimbada h4bang';
          $this->db_name    = 'pmiibanj4r_kad3r';
        }
            // $this->host     ='mysql.hostinger.co.id';
            // $this->username = 'u713260332_yogy';
            // $this->password = 'kurniawan86';
            // $this->db_name    = 'u713260332_abk';
            // $this->host     = 'admin.sirintik.com';
            // $this->username = 'sirintik_banyu';
            // $this->password = 'jukung hir4ng';
            // $this->db_name	= 'sirintik_habang';
          // }
    }




    // get the database connection
    public function getConnection(){

        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>
