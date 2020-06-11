<?php include "includes/conf.php";

  if(isset($_POST['Simpan'])) {
      $id_pendaftaran = $_POST['id_pendaftaran'];
      $nik = $_POST['nik'];
      $nilai = $_POST['nilai'];

        $mySql = "INSERT INTO `tes_wawancara`(`status`, `id_pendaftaran`, `nik`, `nilai`) VALUES ( '1',?,?,? ) ";
        $database = new Database();
        $db = $database->getConnection();
        $stmt = $db->prepare($mySql);
        $stmt->bindParam(1, $id_pendaftaran);
        $stmt->bindParam(2, $nik);
        $stmt->bindParam(3, $nilai);
        $stmt->execute();
        if($stmt) {
           ?>
        <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Tambah Data Wawancara Berhasil!</strong>
        </div>
<?php
        }
      } 
  

if(isset($_POST['Edit'])) {
      $id = $_POST['id'];
      $id_pendaftaran = $_POST['id_pendaftaran'];
      $nik = $_POST['nik'];
      $nilai = $_POST['nilai'];

        $mySql = "UPDATE  `tes_wawancara` SET `id_pendaftaran`=?, `nik`=?, `nilai`=?, status=? WHERE id=? ";
        $database = new Database();
        $db = $database->getConnection();
        $stmt = $db->prepare($mySql);
        $stmt->bindParam(1, $id_pendaftaran);
        $stmt->bindParam(2, $nik);
        $stmt->bindParam(3, $nilai);
        $stmt->bindParam(4, $status); 
        $stmt->bindParam(5, $id);
       $stmt->execute();

    if($stmt) {
   ?>
    <div class="alert alert-success" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Edit Data Wawancara  Berhasil!</strong>
    </div>
<?php
    }
  }

if(isset($_POST['Hapus'])) {
      $id = $_POST['id'];
      $id_pendaftaran = $_POST['id_pendaftaran'];
      $nama = $_POST['nama'];

      $Sql = "DELETE FROM tes_wawancara WHERE id=? ";
        $database = new Database();
        $db = $database->getConnection();
        $stmt = $db->prepare($Sql);
        $stmt->bindParam(1, $id);
       $stmt->execute();

    ?>
   <div class="alert alert-success" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Hapus Data Berhasil! </strong> Wawancara dengan ID = <?php echo $id; ?>, oleh anggota  <?php echo $nama; ?> telah dihapus!
    </div>
<?php
    }
  
  if(isset($_POST['Aktif'])) {
        $id = $_POST['id'];
        $id_pendaftaran = $_POST['id_pendaftaran'];
        $nama = $_POST['nama'];

        $mySql = "UPDATE tes_wawancara SET status=1 WHERE id=? ";
          $database = new Database();
          $db = $database->getConnection();
          $stmt = $db->prepare($mySql);
          $stmt->bindParam(1, $id);
         $stmt->execute();
         if($stmt) {

      ?>
     <div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Ubah Status Berhasil!</strong> Wawancara oleh <?php echo $nama; ?> telah di Aktifkan!
  </div>
  <?php
      }
      }

  if(isset($_POST['Non-Aktif'])) {
        $id = $_POST['id'];
        $id_pendaftaran = $_POST['id_pendaftaran'];
        $nama = $_POST['nama'];

        $mySql = "UPDATE tes_wawancara SET status=0 WHERE id=? ";
          $database = new Database();
          $db = $database->getConnection();
          $stmt = $db->prepare($mySql);
          $stmt->bindParam(1, $id);
         $stmt->execute();
         if($stmt) {

      ?>
     <div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Ubah Status Berhasil!</strong> wawancara oleh <?php echo $nama; ?> telah di Non-Aktifkan!
  </div>
  <?php
      }
      }
  ?>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Wawancara</h1>
    <div class="row">
      <div class="col-md-10">
       <p class="mb-4">Data Wawancara merupakan data Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
         <div class="col-md-2">
        <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#wawancaraModal">
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
                      <th>Nama Pendaftar</th>
                      <th>NIK</th>
                      <th>Nilai</th>
                      <th>Status</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
							$Sql2 = "SELECT tes_wawancara.*, pendaftaran.id AS id_pendaftaran, pendaftaran.nama FROM tes_wawancara LEFT JOIN pendaftaran ON pendaftaran.id=tes_wawancara.id_pendaftaran ORDER BY updated_at DESC";
							$database = new Database();
							$db = $database->getConnection();
							$stmt = $db->prepare($Sql2);
							// $stmt->bindParam(1, $id_pengguna);
							$stmt->execute();
							$num = $stmt->rowCount();
							$no  = 1;
							if($num==0){
								?>
    								<tr>
    									<td colspan="7">Data Tidak Ada</td>
    								</tr>
								<?php
      							} else {
      								while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      									extract($row);
                        if($status==1) { $statusx = 'Aktif';}
                                  else { $statusx ='Pending';}
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td>
                        <form method="POST" action="anggotadetail">
                        <input type="hidden" name="id" value="<?php echo $id_pendaftaran; ?>" >
                          <button type="submit"  class="btn btn-link mt-n2 mb-n4 text-left"><?php echo $nama; ?></a></button>
                        </form>
                      </td>
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
                            <h5 class="modal-title" id="pendidikanModalLabel">Update Data Wawancara <?php echo $nama; ?></h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form role="form" action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="hidden" name="id_pendaftaran" value="<?php echo $id_pendaftaran; ?>">
                                <input type="hidden" name="nama" value="<?php echo $nama; ?>">
                                <div class="form-group row">
                                  <div class="col-md-6">
                                    <label for="id_pendaftaran" class="col-form-label">Nama Pendaftar</label>
                                      <select class="form-control selectpicker" data-live-search="true" name="id_pendaftaran" id="id_pendaftaran">
                                        <?php
                                          $mySqlAnggota = "SELECT tes_wawancara.*, pendaftaran.id AS id_pendaftaran, pendaftaran.nama FROM tes_wawancara LEFT JOIN pendaftaran ON pendaftaran.id=tes_wawancara.id_pendaftaran ORDER BY updated_at DESC";
                                          $databaseAnggota = new Database();
                                          $dba = $databaseAnggota->getConnection();
                                          $stmtAnggota = $dba->prepare($mySqlAnggota);
                                          $stmtAnggota->execute();

                                          while ($rowa = $stmtAnggota->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <option value="<?php echo $rowa['id']; ?>" <?php if($id_pendaftaran==$rowa['id_pendaftaran']){echo "selected";} ?>><?php echo $rowa['nama']; ?></option>
                                      <?php } ?>
                                      </select>
                                  </div>
                                  <div class="col-md-12">
                                    <label for="nik" class="col-form-label">NIK</label>
                                    <input type="text"  value="<?php echo $nik; ?>"  class="form-control" id="nik" name="nik">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-md-12">
                                    <label for="nilai" class="col-form-label"></label>
                                    <input type="text" class="form-control" id="nilai" value="<?php echo $nilai; ?>"  name="nilai">
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
                      <h5 class="modal-title" id="wawancaraModalLabel">Hapus Data Wawancara <?php echo $nama; ?></h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form role="form" action="" method="post">
                          <input type="hidden" name="id" value="<?php echo $id; ?>">
                          <input type="hidden" name="id_pendaftaran" value="<?php echo $id_pendaftaran; ?>">
                          <input type="hidden" name="nama" value="<?php echo $nama; ?>">
                          <div class="form-group">
                            Yakin menghapus data ini? baik data wawancara dan data lain yang berkaitan dengan wawancara ini akan dihapus?
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
                      <h5 class="modal-title" id="anggotaModalLabel">Verifikasi Data wawancara <?php echo $nama; ?></h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form role="form" action="" method="post">
                          <input type="hidden" name="id" value="<?php echo $id; ?>">
                          <input type="hidden" name="id_pendaftaran" value="<?php echo $id_pendaftaran; ?>">
                          <input type="hidden" name="nama" value="<?php echo $nama; ?>">
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
              <!-- end verif modal -->
                    <?php  }
                            }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

<!-- batas -->
          <!-- Tambah wawancara Modal-->
          <div class="modal fade" id="wawancaraModal" tabindex="-1" role="dialog" aria-labelledby="anggotaModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="anggotaModalLabel">Tambah Data Wawancara Baru</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body"><p>Tambahkan data Wawancara, data wawancara akan langsung masuk dan dapat mengakses sesuai username dan password terinput.</p>
                <form role="form" action="" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="id_pendaftaran" class="col-form-label">Nama Pendaftar</label>
                      <select class="form-control selectpicker" data-live-search="true" name="id_pendaftaran" id="id_pendaftaran">
                        <option value="">--Pilih Nama Pendaftar--</option>
                        <?php
                          $mySqlAnggota = "SELECT pendaftaran.id, pendaftaran.nama, tes_wawancara.id_pendaftaran FROM pendaftaran LEFT JOIN tes_wawancara ON tes_wawancara.id_pendaftaran = pendaftaran.id";
                          $databaseAnggota = new Database();
                          $dba = $databaseAnggota->getConnection();
                          $stmtAnggota = $dba->prepare($mySqlAnggota);
                          $stmtAnggota->execute();

                          while ($rowa = $stmtAnggota->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <option value="<?php echo $rowa['id']; ?>"><?php echo $rowa['nama']; ?></option>
                      <?php } ?>
                      </select>
                  </div>
                  <div class="col-md-12">
                                    <label for="nik" class="col-form-label">NIK</label>
                                    <input type="text"  value="<?php echo $nik; ?>"  class="form-control" id="nik" name="nik">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-md-12">
                                    <label for="nilai" class="col-form-label"></label>
                                    <input type="text" class="form-control" id="nilai" value="<?php echo $nilai; ?>"  name="nilai">
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
