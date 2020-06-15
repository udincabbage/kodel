<?php
  if(isset($_POST["wawancara$id_pendaftaran"])){
    try {
      $database = new Database();
      $db = $database->getConnection();
      $db->beginTransaction();

      $mySql = "SELECT id, nik, id_pengguna FROM `pendaftaran` WHERE id_pengguna = ?";
      $stmt2 = $db->prepare($mySql);
      $stmt2->bindParam(1, $id_pengguna);
      $stmt2->execute();
      $num = $stmt2->rowCount();
      $id_pendaftaran = 0;
      $nik = "0";
      if($num!=0){
        $row = $stmt2->fetch(PDO::FETCH_ASSOC);
        $id_pendaftaran = $row['id'];
        $nik = $row['nik'];
      }

      $mySql = "SELECT * FROM `tes_wawancara` WHERE id_pendaftaran = ?";
      $stmt2 = $db->prepare($mySql);
      $stmt2->bindParam(1, $id_pendaftaran);
      $stmt2->execute();
      $num = $stmt2->rowCount();
      if($num==0){
        $mySql = "INSERT INTO tes_wawancara SET id_pendaftaran = ?, nik = ?, nilai = ?, opsi = ?";
        $stmt2 = $db->prepare($mySql);
        $stmt2->bindParam(1, $id_pendaftaran);
        $stmt2->bindParam(2, $nik);
        $stmt2->bindParam(3, $nilai);
        $stmt2->bindParam(4, $opsi);
        if($stmt2->execute()){
          $id_tes_wawancara = $db->lastInsertId();

          $jumlah_nilai_wawancara = 0;
          $mySql = "SELECT * FROM kategori_wawancara ";
          $stmt_kategori_wawancara = $db->prepare($mySql);
          $stmt_kategori_wawancara->execute();
          $num = $stmt_kategori_wawancara->rowCount();
          if($num!=0){
            while ($row = $stmt_kategori_wawancara->fetch(PDO::FETCH_ASSOC)){
              $nama_kategori = $row['nama_kategori'];
              $nilai_kategori = $_POST[$nama_kategori.$id_pendaftaran];
              $jumlah_nilai_wawancara = $jumlah_nilai_wawancara + $nilai_kategori;

              $mySql = "INSERT INTO tes_wawancara_detail SET id_tes_wawancara = ?, nama_kategori = ?, nilai = ?";
              $stmt3 = $db->prepare($mySql);
              $stmt3->bindParam(1, $id_tes_wawancara);
              $stmt3->bindParam(2, $nama_kategori);
              $stmt3->bindParam(3, $nilai_kategori);
              $stmt3->execute();
            }
          }

          $updateSql = "UPDATE tes_wawancara SET nilai = ? WHERE id = ?";
          $stmt4 = $db->prepare($updateSql);
          $stmt4->bindParam(1, $jumlah_nilai_wawancara);
          $stmt4->bindParam(2, $id_tes_wawancara);
          if($stmt4->execute()){
            ?>
               <div class="alert alert-success" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <strong>Input nilai wawancara sukses <?php echo $id_tes_wawancara ?></strong>
               </div>
            <?php
            $db->commit();
          }else{
            ?>
               <div class="alert alert-danger" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <strong>Input nilai wawancara gagal</strong>
               </div>
            <?php
          }
        }
      }

      echo "<meta http-equiv='refresh' content='1; url=valpenerimaanview'> ";
    }catch (Exception $e) {
      ?>
       <div class="alert alert-success" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <strong>Input nilai wawancara gagal</strong> <?php echo $e ?>
       </div>
       <?php
        $db->rollBack();
    }
  }
?>

<div class="modal fade" id="wawancaraModal<?php echo $id_pendaftaran; ?>" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="anggotaModalLabel">Isi Nilai Wawancara <?php echo $nama; ?></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="" method="post">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna; ?>">

          <div class="form-group">
            <label for="nama" class="col-form-label">Nama</label>
            <input type="text" class="form-control" id="nama" value="<?php echo $nama; ?>"  name="nama">
          </div>
          <?php
          $mySql = "SELECT * FROM kategori_wawancara ";
          $database = new Database();
          $db = $database->getConnection();
          $stmt_kategori_wawancara = $db->prepare($mySql);
          // $stmt_kategori_wawancara->bindParam(1, $id_pengguna);
          $stmt_kategori_wawancara->execute();
          $num = $stmt_kategori_wawancara->rowCount();
          if($num!=0){
            while ($row = $stmt_kategori_wawancara->fetch(PDO::FETCH_ASSOC)){
              ?>
              <div class="form-group">
                <label for="<?php echo $row['nama_kategori'].$id_pendaftaran ?>" class="col-form-label"><?php echo $row['nama_kategori'] ?></label>
                <input type="number" class="form-control" id="<?php echo $row['nama_kategori'].$id_pendaftaran ?>" name="<?php echo $row['nama_kategori'].$id_pendaftaran ?>"  value="" >
              </div>
              <?php
            }
          }

          ?>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" name="wawancara<?php echo $id_pendaftaran; ?>" class="btn btn-success">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
