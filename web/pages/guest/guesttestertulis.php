<?php
include "includes/conf.php";

$id_pengguna = $_POST['id_pengguna'];

if(isset($_POST['Simpan'])){
  $database = new Database();
  $db = $database->getConnection();
  $mySql = "SELECT PS.*,S.pertanyaan,S.a,S.b,S.c,S.d,S.e,S.answer FROM pengguna_soal PS LEFT JOIN soal S ON PS.id_soal = S.id WHERE id_pengguna = ?";
  $stmt = $db->prepare($mySql);
  $stmt->bindParam(1, $id_pengguna);
  $stmt->execute();
  $num = $stmt->rowCount();
  $no  = 1;
  if($num!=0){
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      $j = "jawaban_".$row['id'];
      $i = "id_pengguna_soal_".$row['id'];
      $jawaban = $_POST[$j];
      $id = $_POST[$i];

      $hasil = ($jawaban == $row['answer']) ? "benar" : "salah";

      $mySql = "UPDATE pengguna_soal SET jawaban = ?, hasil = ? WHERE id = ?";
      $stmt2 = $db->prepare($mySql);
      $stmt2->bindParam(1, $jawaban);
      $stmt2->bindParam(2, $hasil);
      $stmt2->bindParam(3, $id);
      $stmt2->execute();
    }
  }
}

if(isset($_POST['insert_tes_tertulis'])){
  $mySql = "SELECT * FROM soal";
  $database = new Database();
  $db = $database->getConnection();
  $stmt = $db->prepare($mySql);
  $stmt->execute();
  $num = $stmt->rowCount();
  if($num!=0){
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      $mySql = "INSERT INTO pengguna_soal SET id_pengguna = ?, id_soal = ?";
      $stmt2 = $db->prepare($mySql);
      $stmt2->bindParam(1, $id_pengguna);
      $stmt2->bindParam(2, $row['id']);
      $stmt2->execute();
    }
  }
}
?>
<div class="row">
  <h1 class="h3 text-gray-800">Test Tertulis <small><sub></sub></small></h1>
</div>
<div class="row">
  <div class="card shadow col-md-12 mb-4">
    <div class="card-body">
      <form role="form" action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna ?>">
        <?php
        $mySql = "SELECT PS.*,S.pertanyaan,S.a,S.b,S.c,S.d,S.e,S.answer FROM pengguna_soal PS LEFT JOIN soal S ON PS.id_soal = S.id WHERE id_pengguna = ?";
        $database = new Database();
        $db = $database->getConnection();
        $stmt = $db->prepare($mySql);
        $stmt->bindParam(1, $id_pengguna);
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
                <input type="hidden" name="id_pengguna_soal_<?php echo $row['id'] ?>" value="<?php echo $row['id'] ?>">
                <input type="hidden" name="answer_<?php echo $row['id'] ?>" value="<?php echo $row['answer'] ?>">
                
                <div class="form-group row">
                <div class="col-md-4">
                <select  class="form-control float-right"  id='jawaban'  name='jawaban_<?php echo $row['id'] ?>' >
                  <option value='kosong' <?php if($row['jawaban']=='kosong') { echo 'Selected'; } ?>>  </option>
                  <option value='a' <?php if($row['jawaban']=='a') { echo 'Selected'; } ?>> A </option>
                  <option value='b' <?php if($row['jawaban']=='b') { echo 'Selected'; } ?>> B </option>
                  <option value='c' <?php if($row['jawaban']=='c') { echo 'Selected'; } ?>> C </option>
                  <option value='d' <?php if($row['jawaban']=='d') { echo 'Selected'; } ?>> D </option>
                  <option value='e' <?php if($row['jawaban']=='e') { echo 'Selected'; } ?>> E </option>
                </select>
                </div> 
                <div class="col-md-6">
                 <button type="submit" name="Simpan" id="Simpan" class="btn btn-success btn-icon-split float-left">
                  <span class="icon">
                    <i class="fas fa-save"></i>
                  </span>
                  <span class="text">Simpan</span>
                </button> 
                </div>
                </div> 
                <span class=>JAWABAN TERSIMPAN : <?php echo strtoupper($row['jawaban']) ?></span>
              </div>
            </div>
            <?php
          }
        }
        ?>
      </form>
    </div>
    <div class="card-footer">
      <button type="button" name="Selesai" id="Selesai" class="btn btn-success btn-block" data-toggle="modal" data-target="#konfirmModal">
        <span class="text">Selesai Tes Tertulis</span>
      </button>
    </div>
  </div>
</div>

<div class="modal fade" id="konfirmModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pendidikanModalLabel">Konfirmasi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="guesttestertulisselesai" method="post">
          <input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna; ?>">
          <div class="form-group">
            Selesai tes tertulis ?
          </div>
          <div class="modal-footer">
            <button type="submit" name="selesai_tes_tertulis" class="btn btn-success">Ya</button>
            <button type="button" name="Hapus" class="btn btn-primary" data-dismiss="modal">Belum</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
