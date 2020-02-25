<?php
include_once("../api-model/model_basic.php");
class Pengguna extends Model_Basic {
  public $nama_tabel="pengguna";
  public $user;
  public $password;
  public $level;
  public $opsi;
  private  $basic_query="SELECT * FROM pengguna";
  public function __construct($db){
    $this->conn = $db;
  }

  function login(){
    $query = $this->basic_query."  WHERE  user=? AND password=? ";
    $stmt = $this->conn->prepare($query);
    $this->password = md5($this->password);
    $stmt->bindParam(1, $this->user);
    $stmt->bindParam(2, $this->password);
    $stmt->execute();
    return $stmt;
  }

  function read(){
    $query = "SELECT * FROM " . $this->nama_tabel . " ORDER BY id ASC";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }

  function register(){

    $userCheckQuery = "SELECT * FROM pengguna WHERE user=?";
    $stmt2 = $this->conn->prepare($userCheckQuery);
    $this->user=htmlspecialchars(strip_tags($this->user));
    $stmt2->bindParam(1, $this->user);
    $stmt2->execute();
    $num = $stmt2->rowCount();

    if(!empty($num)){
      return 1;//user exist
    }else{
      $query = "INSERT INTO
      " . $this->nama_tabel . "
      SET
      user=:user, password=:password, level='2'";
      $stmt = $this->conn->prepare($query);

      $this->user=htmlspecialchars(strip_tags($this->user));
      $this->password=htmlspecialchars(strip_tags($this->password));

      $password = md5($this->password);

      $stmt->bindParam(":user", $this->user);
      $stmt->bindParam(":password", $password);

      if($stmt->execute()){
        return $this->conn->lastInsertId();
      }else{
        return 0;
      }
    }
  }

  //============================================================================

  function julak(){
    $query = $this->basic_query."  WHERE  user=?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->user);
    $stmt->execute();
    return $stmt;
  }

  function readPasswordLama(){
    $query = $this->basic_query."  WHERE  password=?";
    $stmt = $this->conn->prepare($query);
    $this->password = md5($this->password);
    $stmt->bindParam(1, $this->password);
    $stmt->execute();
    return $stmt;
  }

  function cekVerifikasi(){
    $query = $this->basic_query."  LEFT JOIN t_dosen ON t_pengguna.user = t_dosen.nidn WHERE  user=? AND t_dosen.status=1 ";
    $stmt = $this->conn->prepare($query);
    $this->password = md5($this->password);
    $stmt->bindParam(1, $this->user);
    $stmt->execute();
    return $stmt;
  }

  function registerOnly(){
    $query = "INSERT INTO
    " . $this->nama_tabel . "
    SET
    status =:status, user=:user, password=:password, nama_lengkap=:nama_lengkap, level=:level";
    $stmt = $this->conn->prepare($query);

    $this->status=htmlspecialchars(strip_tags($this->status));
    $this->user=htmlspecialchars(strip_tags($this->user));
    $this->password=htmlspecialchars(strip_tags($this->password));
    $this->nama_lengkap=htmlspecialchars(strip_tags($this->nama_lengkap));
    $this->level=htmlspecialchars(strip_tags($this->level));


    $stmt->bindParam(":status", $this->status);
    $stmt->bindParam(":user", $this->user);
    $stmt->bindParam(":password", $this->password);
    $stmt->bindParam(":nama_lengkap", $this->nama_lengkap);
    $stmt->bindParam(":level", $this->level);

    if($stmt->execute()){
      return $this->conn->lastInsertId();
    }else{
      return 0;
    }

  }

  function cekUsernameAda(){
    $query = $this->basic_query."  WHERE user = ?  LIMIT 0,1";
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $this->user);
    $stmt->execute();

    $num = $stmt->rowCount();
    if($num>0)
      return "ADA";
    else
      return "TIDAK";
  }

  function getPtOppt(){
    $query = "SELECT t_universitas.id FROM t_operator LEFT JOIN t_universitas ON t_operator.id_universitas = t_universitas.no_induk WHERE t_operator.id_pengguna=? ";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row['id'];
    // return $row;
  }

  function getIdVerifikator(){
    $query = "SELECT t_pengguna.id, t_pengguna.user, B.user user_verifikator, t_pengguna.password,t_pengguna.nama_lengkap,t_verifikator.id_pengguna, t_verifikator.id AS id_verifikator FROM `t_pengguna`
              LEFT JOIN t_dosen ON t_dosen.id_pengguna = t_pengguna.id
              INNER JOIN t_verifikator ON t_verifikator.id_dosen = t_dosen.id
              INNER JOIN t_pengguna B ON t_verifikator.id_pengguna = B.id
              WHERE t_pengguna.user =  ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->user);
    $stmt->execute();
    return $stmt;

    // return $row;
  }

  function getVerificator(){
    $query = "SELECT t_pengguna.id, t_pengguna.user, t_pengguna.nama_lengkap, t_pengguna.password, t_pengguna.level, t_pengguna.avatar FROM t_pengguna WHERE level=5 ";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }

  function readNotMe(){
    $query = "SELECT * FROM " . $this->nama_tabel . " WHERE id !=? ORDER BY id ASC";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->id);
    $stmt->execute();
    return $stmt;
  }

  function readFilterLevel(){
    $query = "SELECT * FROM " . $this->nama_tabel . " WHERE level=? ORDER BY id ASC";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->level);
    $stmt->execute();
    return $stmt;
  }

  function readFilterSelainLevel(){
    $query = "SELECT * FROM " . $this->nama_tabel . " WHERE level!=? ORDER BY id ASC";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->level);
    $stmt->execute();
    return $stmt;
  }

  function delete(){
    $query = "DELETE FROM " . $this->nama_tabel . " WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    $this->id=htmlspecialchars(strip_tags($this->id));
    $stmt->bindParam(1, $this->id);
    if($stmt->execute()){
      return true;
    }
    return false;

  }
  function search($keywords){
    $query = $this->basic_query."  WHERE  user LIKE ?  ORDER BY  user";
    $stmt = $this->conn->prepare($query);

    $keywords=htmlspecialchars(strip_tags($keywords));
    $keywords = "%{$keywords}%";

    $stmt->bindParam(1, $keywords);
    $stmt->execute();

    return $stmt;
  }

  public function count(){
    $query = "SELECT COUNT(id) as total_rows FROM " . $this->nama_tabel . "";

    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row['total_rows'];
  }

  function create(){
    $query = "INSERT INTO
    " . $this->nama_tabel . "
    SET
    status =:status, user=:user, password=:password, nama_lengkap=:nama_lengkap, no_kontak=:no_kontak, level=:level, avatar=:avatar";
    $stmt = $this->conn->prepare($query);

    $this->status=htmlspecialchars(strip_tags($this->status));
    $this->user=htmlspecialchars(strip_tags($this->user));
    $this->password=htmlspecialchars(strip_tags($this->password));
    $this->nama_lengkap=htmlspecialchars(strip_tags($this->nama_lengkap));
    $this->no_kontak=htmlspecialchars(strip_tags($this->no_kontak));
    $this->level=htmlspecialchars(strip_tags($this->level));
    $this->avatar=htmlspecialchars(strip_tags($this->avatar));


    $stmt->bindParam(":status", $this->status);
    $stmt->bindParam(":user", $this->user);
    $stmt->bindParam(":password", $this->password);
    $stmt->bindParam(":nama_lengkap", $this->nama_lengkap);
    $stmt->bindParam(":no_kontak", $this->no_kontak);
    $stmt->bindParam(":level", $this->level);
    $stmt->bindParam(":avatar", $this->avatar);

    if($stmt->execute()){
      return true;
    }

    return false;

  }

  function update(){
    $query = "UPDATE " . $this->nama_tabel . "
    SET
    status = :status, user=:user, password=:password, nama_lengkap=:nama_lengkap, no_kontak=:no_kontak, level=:level, avatar=:avatar
    WHERE
    id = :id";
    $stmt = $this->conn->prepare($query);

    $this->status=htmlspecialchars(strip_tags($this->status));
    $this->user=htmlspecialchars(strip_tags($this->user));
    $this->password=htmlspecialchars(strip_tags($this->password));
    $this->nama_lengkap=htmlspecialchars(strip_tags($this->nama_lengkap));
    $this->no_kontak=htmlspecialchars(strip_tags($this->no_kontak));
    $this->level=htmlspecialchars(strip_tags($this->level));
    $this->avatar=htmlspecialchars(strip_tags($this->avatar));
    $this->id=htmlspecialchars(strip_tags($this->id));

    $stmt->bindParam(':status', $this->status);
    $stmt->bindParam(":user", $this->user);
    $stmt->bindParam(":password", $this->password);
    $stmt->bindParam(":nama_lengkap", $this->nama_lengkap);
    $stmt->bindParam(":no_kontak", $this->no_kontak);
    $stmt->bindParam(":level", $this->level);
    $stmt->bindParam(":avatar", $this->avatar);
    $stmt->bindParam(':id', $this->id);

    if($stmt->execute()){
      return true;
    }

    return false;
  }

  function readOne(){
    $query = $this->basic_query."  WHERE id = ?  LIMIT 0,1";
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $this->id);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $this->id = $row['id'];
    $this->user = $row['user'];
    $this->password = $row['password'];
    $this->nama_lengkap = $row['nama_lengkap'];
    $this->level = $row['level'];
    $this->avatar = $row['avatar'];

  }

  function readPenggunaOperator(){
    $query = "SELECT t_universitas.nama_universitas, t_universitas.alamat, t_universitas.logo, t_universitas.id AS iduniv, t_operator.*, t_pengguna.* FROM t_pengguna
              LEFT JOIN t_operator ON t_pengguna.id = t_operator.id_pengguna
              LEFT JOIN t_universitas ON t_operator.id_universitas = t_universitas.no_induk
              WHERE t_pengguna.id =?";
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $this->id);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $this->id = $row['id'];
    $this->user = $row['user'];
    $this->password = $row['password'];
    $this->nama_lengkap = $row['nama_lengkap'];
    $this->email = $row['email'];
    $this->id_universitas = $row['iduniv'];
    $this->nama_universitas = $row['nama_universitas'];
    $this->alamat = $row['alamat'];
    $this->logo = $row['logo'];
  }

  function updatePassword(){
    $query = "UPDATE " . $this->nama_tabel . "
    SET
    password=:password
    WHERE
    id = :id";
    $stmt = $this->conn->prepare($query);

    $this->password=htmlspecialchars(strip_tags($this->password));
    $this->id=htmlspecialchars(strip_tags($this->id));

    $stmt->bindParam(":password", $this->password);
    $stmt->bindParam(':id', $this->id);

    if($stmt->execute()){
      return true;
    }

    return false;
  }

  function updateNamalengkap(){
    $query = "UPDATE " . $this->nama_tabel . "
    SET
    nama_lengkap=:nama_lengkap
    WHERE
    id = :id";
    $stmt = $this->conn->prepare($query);

    $this->nama_lengkap=htmlspecialchars(strip_tags($this->nama_lengkap));
    $this->id=htmlspecialchars(strip_tags($this->id));

    $stmt->bindParam(":nama_lengkap", $this->nama_lengkap);
    $stmt->bindParam(':id', $this->id);

    if($stmt->execute()){
      return true;
    }
    return false;
  }


}
?>
