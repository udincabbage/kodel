<?php
include "includes/conf.php";

$id_pengguna = $_POST['id_pengguna'];
?>
<!-- <form role="form" action="guesttestertulisselesai" method="post">
  <input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna; ?>">
  <div class="form-group">
    Selesai tes tertulis ?
  </div>
  <div class="modal-footer">
    <button type="submit" name="selesai_tes_tertulis" class="btn btn-success">Ya</button>
    <button type="button" name="Hapus" class="btn btn-primary" data-dismiss="modal">Belum</button>
  </div>
</form> -->
<?php

if(isset($_POST['selesai_tes_tertulis'])){
  $database = new Database();
  $db = $database->getConnection();
  $mySql = "SELECT id_pengguna, hasil, COUNT(hasil) AS jumlah FROM `pengguna_soal` WHERE id_pengguna = ? GROUP BY hasil ORDER BY hasil";
  $stmt = $db->prepare($mySql);
  $stmt->bindParam(1, $id_pengguna);
  $stmt->execute();
  $num = $stmt->rowCount();
  $jumlah_benar = 0;
  $jumlah_salah = 0;
  $nilai;
  $no = 0;
  if($num!=0){
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      if($no==0){
        $jumlah_benar = $row['jumlah'];
      }else{
        $jumlah_salah = $row['jumlah'];
      }
      $no++;
    }
  }
  $nilai = round(($jumlah_benar / ($jumlah_benar + $jumlah_salah)) * 100,2);

  $mySql = "SELECT id, nik, id_pengguna FROM `pendaftaran` WHERE id_pengguna = ?";
  $stmt = $db->prepare($mySql);
  $stmt->bindParam(1, $id_pengguna);
  $stmt->execute();
  $num = $stmt->rowCount();
  $id_pendaftaran = 0;
  $nik = "0";
  if($num!=0){
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $id_pendaftaran = $row['id'];
    $nik = $row['nik'];
  }

  $mySql = "INSERT INTO tes_tertulis SET id_pendaftaran = ?, nik = ?, jumlah_benar = ?, jumlah_salah = ?, nilai = ?";
  $stmt = $db->prepare($mySql);
  $stmt->bindParam(1, $id_pendaftaran);
  $stmt->bindParam(2, $nik);
  $stmt->bindParam(3, $jumlah_benar);
  $stmt->bindParam(4, $jumlah_salah);
  $stmt->bindParam(5, $nilai);

}
?>
<div class="row">
  <h1 class="h3 text-gray-800">Selesai Test Tertulis <small><sub></sub></small></h1>
</div>
<div class="row">
  <div class="card shadow col-md-12 mb-4">
    <div class="card-body">
      <?php
        if ($stmt->execute()) {
          echo "<p>Penilaian Tes Tertulis Telah Selesai, Silahkan tunggu Tes Wawancara</p>";
        }else{
          echo "<p>Terjadi Kesalahan, Silahkan hubungi panitia</p>";

        }
      ?>
    </div>
  </div>
</div>

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
