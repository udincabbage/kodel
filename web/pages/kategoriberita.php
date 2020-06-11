<?php include "includes/conf.php";

if(isset($_POST['Simpan'])) {
  // $id_pengguna = 2;
  $nama_kategori = $_POST['nama_kategori'];
  $keterangan = $_POST['keterangan'];
  $publish = $_POST['publish'];

  $errMSG = array();

  $checkQuery = "SELECT * FROM kategori_berita WHERE nama_kategori = ?";
  $database = new Database();
  $db = $database->getConnection();
  $stmt = $db->prepare($checkQuery);
  $stmt->bindParam(1, $nama_kategori);
  $stmt->execute();
  $numRow = $stmt->rowCount();
  if($numRow>0){
    $errMSG[] = "Kategori sama sudah ada";
  }

  if (count($errMSG)>0){
    $noPesan=0;
    foreach ($errMSG as $indeks=>$pesanTampil) {
      $noPesan++;
      ?>
      <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong><?php echo $pesanTampil ?></strong>
      </div>
      <?php
    }
  }else{
    $mySql = "INSERT INTO kategori_berita (nama_kategori,keterangan,publish) VALUES (?,?,?)";
    $database = new Database();
    $db = $database->getConnection();
    $stmt = $db->prepare($mySql);
    $stmt->bindParam(1, $nama_kategori);
    $stmt->bindParam(2, $keterangan);
    $stmt->bindParam(3, $publish);
    $stmt->execute();
    if($stmt) {
      ?>
      <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Tambah Data Kategori Berita Berhasil!</strong>
      </div>
      <?php
    }else{
      ?>
      <div class="alert alert-warning" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Gagal Simpan Data</strong>
      </div>
      <?php
    }
  }
}

if(isset($_POST['Edit'])) {
  $id = $_POST['id'];

  $nama_kategori = $_POST['nama_kategori'];
  $keterangan = $_POST['keterangan'];
  $publish = $_POST['publish'];

  $errMSG = array();

  $checkQuery = "SELECT * FROM kategori_berita WHERE nama_kategori = ? AND id != ?";
  $database = new Database();
  $db = $database->getConnection();
  $stmt = $db->prepare($checkQuery);
  $stmt->bindParam(1, $nama_kategori);
  $stmt->bindParam(2, $id);
  $stmt->execute();
  $numRow = $stmt->rowCount();
// print_r($_POST);
  if($numRow>0){
    $errMSG[] = "Kategori sama sudah ada";
  }

  if (count($errMSG)>0){
    $noPesan=0;
    foreach ($errMSG as $indeks=>$pesanTampil) {
      $noPesan++;
      ?>
      <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong><?php echo $pesanTampil ?></strong>
      </div>
      <?php
    }
  }else{
    $mySql = "UPDATE kategori_berita SET nama_kategori=?,keterangan=?,publish=? WHERE id=?";
    $database = new Database();
    $db = $database->getConnection();
    $stmt = $db->prepare($mySql);
    $stmt->bindParam(1, $nama_kategori);
    $stmt->bindParam(2, $keterangan);
    $stmt->bindParam(3, $publish);
    $stmt->bindParam(4, $id);
    $stmt->execute();
    if($stmt) {
      ?>
      <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Ubah Data Kategori Berita Berhasil!</strong>
      </div>
      <?php
    }else{
      ?>
      <div class="alert alert-warning" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Gagal Simpan Data</strong>
      </div>
      <?php
    }
  }
}

if(isset($_POST['Hapus'])) {
  $id = $_POST['id'];

  $Sql = "DELETE FROM kategori_berita WHERE id=? ";
  $database = new Database();
  $db = $database->getConnection();
  $stmt = $db->prepare($Sql);
  $stmt->bindParam(1, $id);
  $stmt->execute();

  if($stmt) {
    ?>
    <div class="alert alert-success" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Hapus Data Berhasil! </strong>
    </div>
    <?php
  }
}

?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Kategori Berita</h1>
<div class="row">
  <div class="col-md-10">
    <p class="mb-4">Data Kategori Berita.</p>
  </div>
  <div class="col-md-2">
    <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#createModal">
      <span class="icon ">
        <i class="fas fa-plus"></i>
      </span>
      <span class="text">Tambah Data</span>
    </a>
  </div>
</div>

<?php
include "includes/badge1.php";
?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Keterangan</th>
            <th>Publish</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $mySql = "SELECT * FROM kategori_berita";
          $database = new Database();
          $db = $database->getConnection();
          $stmt = $db->prepare($mySql);
          // $stmt->bindParam(1, $id_pengguna);
          $stmt->execute();
          $num = $stmt->rowCount();
          $no  = 1;
          if($num==0){
            ?>
            <tr>
              <td colspan="4">Data Tidak Ada</td>
            </tr>
            <?php
          } else {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
              extract($row);
              ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $nama_kategori ?></td>
                <td><?php echo $keterangan; ?></td>
                <td>
                  <?php
                    if ($publish==0) {
                      echo "Draft";
                    }
                    elseif ($publish==1) {
                      echo "Publish";
                    }
                    else {
                      echo "--";
                    }
                  ?>
                </td>
                <td>
                  <a href="#" type="button" class="btn btn-info btn-icon-split"  data-toggle="modal" data-target="#updateModal<?php echo $id; ?>">
                    <span class="icon "><i class="fas fa-edit"></i></span>
                  </a>
                  <a href="#" type="button" class="btn btn-danger btn-icon-split"  data-toggle="modal" data-target="#deleteModal<?php echo $id; ?>">
                    <span class="icon "><i class="fas fa-trash"></i></span>
                  </a>
                </td>
              </tr>

              <!-- spesial edition modal edit -->
              <div class="modal fade" id="updateModal<?php echo $id; ?>" role="dialog">
                <div class="modal-dialog modal-lg">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="pendidikanModalLabel">Update Kategori Berita</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form role="form" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="form-group row">
                          <div class="col-md-12">
                            <label for="nama_kategori" class="col-form-label">Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" value="<?php echo $nama_kategori ?>"  name="nama_kategori">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-12">
                          <label for="keterangan" class="col-form-label"> Keterangan </label>
                          <textarea class="form-control" id="keterangan" name="keterangan"><?php echo $keterangan ?></textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-12">
                          <label for="publish" class="col-form-label">Publish</label>
                          <select name="publish" class="form-control" id="publish">
                            <option value="">--Pilih publish Publish--</option>
                            <option value="0" <?php echo $publish=="0" ? " selected" : "" ?>>Draft</option>
                            <option value="1" <?php echo $publish=="1" ? " selected" : "" ?>>Publish</option>
                          </select>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                          <button type="submit" name="Edit" class="btn btn-success">Simpan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end edit modal -->

              <!-- delete modal -->
              <div class="modal fade" id="deleteModal<?php echo $id; ?>" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="deleteModalLabel">Hapus Data Kategori Berita</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form role="form" action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="form-group">
                          Yakin menghapus data ini?
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                          <button type="submit" name="Hapus" class="btn btn-success">Hapus</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end delete modal -->
            <?php  }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- batas -->
<!-- Tambah pendidikan Modal-->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="anggotaModalLabel" aria-hidden="true">
  <form role="form" action="" method="post" enctype="multipart/form-data">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="anggotaModalLabel">Tambah Kategori Berita</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"><p>Tambahkan data nama_kategori soal.</p>
          <div class="form-group row">
            <div class="col-md-12">
            <label for="nama_kategori" class="col-form-label">Kategori</label>
            <input type="text" class="form-control" id="nama_kategori" value=""  name="nama_kategori">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12">
            <label for="keterangan" class="col-form-label"> Keterangan </label>
            <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12">
            <label for="publish" class="col-form-label">Publish</label>
            <select class="form-control selectpicker" data-live-search="true" name="publish" id="publish">
              <option value="">--Pilih publish Publish--</option>
              <option value="0">Draft</option>
              <option value="1">Publish</option>
            </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" name="Simpan" class="btn btn-success">Simpan</button>
        </div>
      </div>
    </div>
  </form>
</div>
<!-- end pendidikan -->

<!-- Script -->
<script type='text/javascript'>
function previewImage() {
  document.getElementById("image-preview").style.display = "block";
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

  oFReader.onload = function(oFREvent) {
    document.getElementById("image-preview").src = oFREvent.target.result;
  };
};
</script>


<script>
window.setTimeout(function() {
  $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove();
  });
}, 3000);
</script>
