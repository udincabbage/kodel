<?php include "includes/conf.php";

  if(isset($_POST['Simpan'])) {
      $id_pendaftaran = $_POST['id_pendaftaran'];
      $nik = $_POST['nik'];
      $jumlah_benar = $_POST['jumlah_benar'];
      $jumlah_salah = $_POST['jumlah_salah'];
      $nilai = $_POST['nilai'];

      $mySql = "INSERT INTO `tes_tertulis`(`status`, `id_pendaftaran`, `nik`, `jumlah_benar`, `jumlah_salah`, `nilai`) VALUES ('1',?,?,?,?,?) ";
      $database = new Database();
      $db = $database->getConnection();
      $stmt = $db->prepare($mySql);
      $stmt->bindParam(1, $id_pendaftaran);
      $stmt->bindParam(2, $nik);
      $stmt->bindParam(3, $jumlah_benar);
      $stmt->bindParam(4, $jumlah_salah);
      $stmt->bindParam(5, $nilai);
      $stmt->execute();
      if($stmt) {
        ?>
      <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Tambah Data tertulis Berhasil!</strong>
      </div>
<?php
      }else { echo "Gagal simpan!"; }
    }


        if(isset($_POST['Edit'])) {
        $id = $_POST['id'];
        $id_pendaftaran = $_POST['id_pendaftaran'];
        $nik = $_POST['nik'];
        $jumlah_benar = $_POST['jumlah_benar'];
        $jumlah_salah = $_POST['jumlah_salah'];
        $nilai = $_POST['nilai'];

        $mySql = "UPDATE tes_tertulis SET id_pendaftaran=?, nik=?, jumlah_benar=?, jumlah_salah=?, nilai=? WHERE id=? ";
        $database = new Database();
        $db = $database->getConnection();
        $stmt = $db->prepare($mySql);
        $stmt->bindParam(1, $id_pendaftaran);
        $stmt->bindParam(2, $nik);
        $stmt->bindParam(3, $jumlah_benar);
        $stmt->bindParam(4, $jumlah_salah);
        $stmt->bindParam(5, $nilai);
        $stmt->bindParam(6, $id);
       $stmt->execute();

    if($stmt) {
   ?>
   <div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Edit tertulis Berhasil! <?php echo $nik; ?></strong>
</div>
<?php
}else { echo "Gagal edit!"; }
  }

if(isset($_POST['Hapus'])) {
      $id = $_POST['id'];
      $id_pendaftaran = $_POST['id_pendaftaran'];

      $mySql = "DELETE FROM tertulis WHERE id=? ";
        $database = new Database();
        $db = $database->getConnection();
        $stmt = $db->prepare($mySql);
        $stmt->bindParam(1, $id);
       $stmt->execute();

    ?>
   <div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Hapus Data Berhasil!</strong>
</div>
<?php
    }


if(isset($_POST['Aktif'])) {
      $id = $_POST['id'];
      $id_pendaftaran = $_POST['id_pendaftaran'];

      $mySql = "UPDATE tertulis SET status=1 WHERE id=? ";
        $database = new Database();
        $db = $database->getConnection();
        $stmt = $db->prepare($mySql);
        $stmt->bindParam(1, $id);
       $stmt->execute();
       if($stmt) {

    ?>
   <div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Ubah Status Berhasil!</strong>
</div>
<?php
    }
    }

if(isset($_POST['Non-Aktif'])) {
      $id = $_POST['id'];
      $id_pendaftaran = $_POST['id_pendaftaran'];

      $mySql = "UPDATE tertulis SET status=0 WHERE id=? ";
        $database = new Database();
        $db = $database->getConnection();
        $stmt = $db->prepare($mySql);
        $stmt->bindParam(1, $id);
       $stmt->execute();
       if($stmt) {

    ?>
   <div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Ubah Status Berhasil!</strong>
</div>
<?php
    }
    }
?>


      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Data nik</h1>
      <div class="row">
        <div class="col-md-10">
         <p class="mb-4">Data tertulis nik merupakan data tertulis dari seluruh anggota / kader yang ada pada aplikasi ini. Data yang tertulisnya perlu proses verifikasi admin untuk nik peserta.</p>
          </div>
           <div class="col-md-2">
          <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#tambahModal">
            <span class="icon ">
              <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Data</span>
          </a>
        </div>
      </div>

<?php include "includes/badge1.php"; ?>


          <!-- DataTales Example -->
          <div class="card shadow mb-4">

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Id Pendaftaran</th>
                      <th>NIK </th>
                      <th>Nilai</th>
                      <th>Status</th>
                      <th>Opsi</th>
                      </tr>
                    </tr>
                  </thead>
                  <tbody>

                  <?php
				 // echo $id;
				$Sql2 = "SELECT * FROM tes_tertulis";
				$database = new Database();
				$db = $database->getConnection();
				$stmt2 = $db->prepare($Sql2);
				// $stmt2->bindParam(1, $id);
				$stmt2->execute();
				$num = $stmt2->rowCount();
				$no  = 1;
				if($num==0){
					?>
					<tr>
						<td colspan="4">Data Tidak Ada</td>
					</tr>
					<?php
				} else {
					while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
					extract($row2);
					if($status==1) { $statusx = 'Aktif';}
                    else { $statusx ='Pending';}
				?>
                    <tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $id_pendaftaran; ?></td>
					<td><?php echo $nik; ?></td>
					<td><?php echo $nilai; ?></td>
          <td><?php echo $statusx; ?></td>
                <td>
                <?php if($status==1) { ?>
                         <a href="#" type="button" class="btn btn-warning btn-icon-split"  data-toggle="modal" data-target="#verifModal<?php echo $id; ?>">
              						  <span class="icon "><i class="fas fa-times"></i></span>
            						 </a>
                      <?php } else { ?>
                          <a href="#" type="button" class="btn btn-success btn-icon-split"  data-toggle="modal" data-target="#verifModal<?php echo $id; ?>">
            						          <span class="icon "><i class="fas fa-check"></i></span>
            							</a>
                      <?php } ?>
                          <a href="#" type="button" class="btn btn-info btn-icon-split"  data-toggle="modal" data-target="#editModal<?php echo $id; ?>">
            						          <span class="icon "><i class="fas fa-edit"></i></span>
            							</a>
            							<a href="#" type="button" class="btn btn-danger btn-icon-split"  data-toggle="modal" data-target="#deleteModal<?php echo $id; ?>">
            						  <span class="icon "><i class="fas fa-trash"></i></span>
            							</a>
                      </td>
                    </tr>
            <!-- spesial edition modal edit -->
            <div class="modal fade" id="editModal<?php echo $id; ?>" role="dialog">
              <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="kategori_tertulisModalLabel">Update Data tertulis</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <form role="form" action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="id_pendaftaran" value="<?php echo $id_pendaftaran; ?>">
                  <div class="col-md-12">
                    <label for="nik" class="col-form-label">nik</label>
                    <input type="number"  value="<?php echo $nik; ?>"  class="form-control" id="nik" name="nik">
                  </div>
                  <div class="col-md-12">
                    <label for="jumlah_benar" class="col-form-label">Jumlah Benar</label>
                    <input type="number"  value="<?php echo $jumlah_benar; ?>"  class="form-control" id="jumlah_benar" name="jumlah_benar">
                  </div>
                  <div class="col-md-12">
                    <label for="jumlah_salah" class="col-form-label">Jumlah Salah</label>
                    <input type="number"  value="<?php echo $jumlah_salah; ?>"  class="form-control" id="jumlah_salah" name="jumlah_salah">
                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <label for="nilai" class="col-form-label">Nilai</label>
                      <input type="number" id="nilai" name="nilai" class="form-control" value="<?php echo $nilai; ?>">
                    </div>
                  </div>
                          </div>
                          <div class="col-md-6">
                            <label for="status" class="col-form-label">Status Verifikasi</label>
                            <select class="form-control" name="status">
                            <option value="1" <?php if($status==1) {echo "selected";}?> > Aktif</option>
                            <option value="0" <?php if($status==0) {echo "selected";}?> > Pending</option>
                            </select>
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
                    <h5 class="modal-title" id="kategori_tertulisModalLabel">Hapus Data tertulis nik</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="id_pendaftaran" value="<?php echo $id_pendaftaran; ?>">
                        <div class="form-group">
                          Yakin menghapus data ini? data tertulis akan terhapus?
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
            <!-- verif modal -->
            <div class="modal fade" id="verifModal<?php echo $id; ?>" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="anggotaModalLabel">Verifikasi Data tertulis</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="id_pendaftaran" value="<?php echo $id_pendaftaran; ?>">
                        <div class="form-group">
                          yakin merubah Status Verifikasi menjadi <?php  if($status==1) { echo "Tidak "; } ?>Aktif?
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <?php  if($status==0) {
                            ?>
                            <button type="submit" name="Aktif" class="btn btn-success">Aktifkan</button>
                           <?php
                            } else { ?>
                            <button type="submit" name="Non-Aktif" class="btn btn-success">Bekukan</button>
                            <?php } ?>
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

  <!-- Tambah Anggota Modal-->
  <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="kategori_tertulisModalLabel" aria-hidden="true">
  <form method="post" action="" >
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="anggotaModalLabel">Tambah tertulis Baru</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"><p>Tambahkan data tertulis , data tertulis  yang diinput pada form ini akan langsung berstatus aktif.</p>
        <form role="form" action="" method="post" enctype="multipart/form-data">
          <div class="form-group row">
          <div class="col-md-8">
            <label for="id_pendaftaran" class="col-form-label">Id Pendaftaran</label>
           <select class="form-control selectpicker" name="id_pendaftaran" id="id_pendaftaran" data-live-search="true">
           <option value="">--Pilih Id Pendaftaran--</option>
           <?php
            $mySql = "SELECT pendaftaran.* FROM pendaftaran ORDER BY updated_at DESC ";
            $database = new Database();
            $db = $database->getConnection();
            $stmt = $db->prepare($mySql);
            $stmt->execute();
            while ($rowx = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($rowx);
            ?>
            <option data-tokens="<?php echo $id; ?>" value="<?php echo $id; ?>">(<?php echo $id; ?>)-<small class="text-muted"><?php echo $nik; ?></small></option>
            <?php } ?>
          </select>
          </div>
                  <div class="col-md-12">
                    <label for="nik" class="col-form-label">nik</label>
                    <input type="text" value="" class="form-control" id="nik" name="nik">
                  </div>
                  <div class="col-md-12">
                    <label for="jumlah_benar" class="col-form-label">Jumlah Benar</label>
                    <input type="number" value="" class="form-control" id="jumlah_benar" name="jumlah_benar">
                  </div>
                  <div class="col-md-12">
                    <label for="jumlah_salah" class="col-form-label">Jumlah Salah</label>
                    <input type="number" value="" class="form-control" id="jumlah_salah" name="jumlah_salah">
                  </div>
                  <div class="col-md-12">
                      <label for="nilai" class="col-form-label">Nilai</label>
                      <input type="number"  id="nilai" name="nilai" class="form-control" value="">
                  </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <button class="btn btn-success" name="Simpan" type="submit" >Simpan</button>
        </div>
      </div>
    </div>
    </form>
  </div>


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

<!-- cek akan knp kd mau js nya?? -->
<script>
$(document).ready(function () {
    $('#id_pendaftaran').change(function () {
      $('#nik').val(this.value);
    });
});
</script>
<!-- !!! -->

<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 3000);
</script>
