
<div class="row">
  <h1 class="h3 text-gray-800">Test Tertulis <small><sub>(<?php echo $id; ?>)</sub></small></h1>
</div>
<div class="row">
  <div class="card shadow col-md-12 mb-4">
    <div class="card-body">
      <form role="form" action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_kinerja" value="<?php echo $data1['id'] ?>">
        <?php
        include "includes/conf.php";

        $id_pengguna = $_POST['id_pengguna'];
        if(isset($_POST['insert_tes_tertulis'])){
          $mySql = "SELECT * FROM soal";
          $database = new Database();
          $db = $database->getConnection();
          $stmt = $db->prepare($mySql);
          $stmt->execute();
          $num = $stmt->rowCount();
          print_r($num);
          if($num!=0){
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
              $mySql = "INSERT INTO pengguna_soal SET id_pengguna = ?, id_soal = ?";
              $database = new Database();
              $db = $database->getConnection();
              $stmt = $db->prepare($mySql);
              $stmt->bindParam(1, $id_pengguna);
              $stmt->bindParam(2, $row['id']);
              $stmt->execute();
            }
            // print_r($row);
          }
        }
        // print_r($_POST);
        $mySql = "SELECT * FROM soal";
        $database = new Database();
        $db = $database->getConnection();
        $stmt = $db->prepare($mySql);
        // $stmt->bindParam(1, $id_pengguna);
        $stmt->execute();
        $num = $stmt->rowCount();
        $no  = 1;
        if($num==0){
          echo "Data Kosong";
        } else {
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
            <div class="form-group row">
              <div class="col-md-12">
                <span>SOAL : </span><br>
                <label for="kinerja1" class="col-form-label"><?php echo $row['pertanyaan'] ?></label><br>
                <span> A. <?php echo $row['a'] ?></span><br>
                <span> B. <?php echo $row['b'] ?></span><br>
                <span> C. <?php echo $row['c'] ?></span><br>
                <span> D. <?php echo $row['d'] ?></span><br>
                <span> E. <?php echo $row['e'] ?></span><br>
                <span>JAWABAN : </span>
                <select  class="form-control float-right"  id='status_anggota'  name='status_anggota' >
                  <option value='a' <?php if($status_anggota=='Aktif') { echo 'Selected'; } ?>> A </option>
                  <option value='b' <?php if($status_anggota=='Pasif') { echo 'Selected'; } ?>> B </option>
                  <option value='c' <?php if($status_anggota=='Suspend') { echo 'Selected'; } ?>> C </option>
                  <option value='d' <?php if($status_anggota=='Suspend') { echo 'Selected'; } ?>> D </option>
                  <option value='e' <?php if($status_anggota=='Suspend') { echo 'Selected'; } ?>> E </option>
                </select><br>
                <button type="button" name="Simpan1" id="Simpan1" class="btn btn-success btn-icon-split float-right">
                  <span class="icon">
                    <i class="fas fa-save"></i>
                  </span>
                  <span class="text">Simpan</span>
                </button>
                <span class=>JAWABAN TERSIMPAN : Belum Ada</span>
              </div>
            </div>
            <?php
          }
        }
        ?>
      </form>
    </div>
    <div class="card-footer">
      <button type="button" name="Simpan1" id="Simpan1" class="btn btn-success btn-block">
        <span class="text">Selesai Tes Tertulis</span>
      </button>
    </div>
  </div>
</div>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
