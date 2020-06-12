<?php include "includes/conf.php";

  if(isset($_POST['Simpan'])) {
    // $id_pengguna = 2;
      $id_anggota = $_POST['id_anggota'];
      $nama_pendidikan = $_POST['nama_pendidikan'];
      $jenjang_pendidikan = $_POST['jenjang_pendidikan'];
      $tanggal_ijazah = $_POST['tanggal_ijazah'];
      $keterangan = $_POST['keterangan'];
        $imgFile = $_FILES['file_bukti']['name'];
        $tmp_dir = $_FILES['file_bukti']['tmp_name'];
        $imgSize = $_FILES['file_bukti']['size'];

        if(empty($imgFile)){
           $errMSG = "Please Select Image File.";
          }
          else
          {
           $upload_dir = 'uploads/pendidikan/'; // upload directory

           $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

           // valid image extensions
           $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

           // rename uploading image
           $userpic = $id_anggota."_".date('ymd')."_".generateRandomString(4).".".$imgExt;

           // allow valid image file formats
           if(in_array($imgExt, $valid_extensions)){
            // Check file size '5MB'
            if($imgSize < 5000000)    {
             move_uploaded_file($tmp_dir,$upload_dir.$userpic);
            }
            else{
             $errMSG = "Sorry, your file is too large.";
            }
           }
           else{
            $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
           }
          }

      // $level = 2;
      // $opsi = "pendidikan";

      if(!isset($errMSG))
      {
        $mySql = "INSERT INTO `pendidikan`(`status`, `id_anggota`, `tanggal_ijazah`, `nama_pendidikan`, `jenjang_pendidikan`, `keterangan`, `file_bukti`) VALUES ( '0',?,?,?,?,?,? ) ";
        $database = new Database();
        $db = $database->getConnection();
        $stmt = $db->prepare($mySql);
        $stmt->bindParam(1, $id_anggota);
        $stmt->bindParam(2, $tanggal_ijazah);
        $stmt->bindParam(3, $nama_pendidikan);
        $stmt->bindParam(4, $jenjang_pendidikan);
        $stmt->bindParam(5, $keterangan);
        $stmt->bindParam(6, $userpic);
        $stmt->execute();
        if($stmt) {
           ?>
        <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Tambah Data Pendidikan Berhasil!</strong>
        </div>
<?php
        }
      } else { echo "Gagal simpan!"; }
  }
    
  ?>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Pendidikan <sub>user <?php echo $idx;?></sub></h1>
    <div class="row">
      <div class="col-md-10">
       <p class="mb-4">Data Pendidikan merupakan data Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
         <div class="col-md-2">
        <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#pendidikanModal">
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
                      <th>Jenjang</th>
                      <th>Nama Pendidikan</th>
                      <th>File Bukti</th>
                      <th>Status</th> 
                    </tr>
                  </thead>
                  <tbody>
                  <?php
							$mySql = "SELECT pendidikan.*, anggota.id AS id_anggota, anggota.nama FROM pendidikan LEFT JOIN anggota ON anggota.id=pendidikan.id_anggota 
                            WHERE anggota.id_pengguna=?
                            ORDER BY updated_at DESC";
							$database = new Database();
							$db = $database->getConnection();
							$stmt = $db->prepare($mySql);
							 $stmt->bindParam(1, $id);
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
                      
                      <td><?php echo $jenjang_pendidikan; ?></td>
                      <td><?php echo $nama_pendidikan; ?></td>
                      <td align="center"><a href="uploads/pendidikan/<?php echo $file_bukti; ?>" target="_blank"><img src="uploads/pendidikan/<?php echo $file_bukti ? $file_bukti : 'noimage.png'; ?>" width="50px"></a></td>
                      <td><?php echo $statusx; ?></td>
                      
                    </tr> 
 
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
          <div class="modal fade" id="pendidikanModal" tabindex="-1" role="dialog" aria-labelledby="anggotaModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="anggotaModalLabel">Tambah Pendidikan Formal</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body"><p>Tambahkan data Pendidikan formal yang telah diselesaikan, validasi data pendidikan akan dilakukan oleh admin, dimohon untuk mengupload data dengan benar.</p>
                <form role="form" action="" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                  <div class="col-md-2">
                    <label for="id_anggota" class="col-form-label">Id Anggota <small>(<?php echo $idx; ?>)</small></label> 
                        <?php
                          $mySqlAnggota = "SELECT anggota.id AS id_anggota FROM anggota LEFT JOIN pengguna ON pengguna.id = anggota.id_pengguna WHERE pengguna.id=? ";
                          
							$database = new Database();
							$db = $database->getConnection();
							$stmtAnggota = $db->prepare($mySqlAnggota);
                           $stmtAnggota->bindParam(1, $idx);
							$stmtAnggota->execute();   
                          $rowa = $stmtAnggota->fetch(PDO::FETCH_ASSOC)
                        ?>  
                        <input type="text"  value="<?php echo $rowa['id_anggota'];?>"  class="form-control" id="id_anggota" name="id_anggota" readonly/>
                      
                  </div>
                  <div class="col-md-10">
                    <label for="nama_pendidikan" class="col-form-label">Nama Pendidikan / Sekolah</label>
                    <input type="text"  value=""  class="form-control" id="nama_pendidikan" name="nama_pendidikan">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-8">
                    <label for="jenjang_pendidikan" class="col-form-label">Jenjang Pendidikan</label>
                    <select class="form-control selectpicker" name="jenjang_pendidikan" data-live-search="true">
                <option value="">--Pilih Nama Jenjang--</option>
                <option value="SD">Sekolah Dasar (SD)</option>
                <option value="SMP">Sekolah Menengah Pertama (SMP)</option>
                <option value="SMA">Sekolah Menengah ATAS/Kejuruan (SMA)</option> 
                <option value="S1">Sekolah Tinggi Strata I (S1)</option> 
                <option value="S2">Sekolah Tinggi Strata II (S2)</option> 
                </select>
                  </div>
                  <div class="col-md-4">
                    <label for="tanggal_ijazah" class="col-form-label">Tanggal Ijazah</label>
                    <input type="date" class="form-control"  value="" id="tanggal_ijazah" name="tanggal_ijazah">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="file_bukti" class="col-form-label">File Bukti (<i>Ijazah</i>)</label>
                    <input type="file" class="form-control" id="image-source" name="file_bukti" onchange="previewImage();"/>
                  </div>
                </div>
                <div class="form-group-row">
                  <div class="col-md-12">
                    <center>
                      <img id="image-preview" alt="image preview"/>
                    </center>
                  </div>
                </div>

                <div class="form-group">
                  <label for="keterangan" class="col-form-label"> Keterangan (<i>Jurusan/Program Studi atau keterangan lainnya</i>)</label>
                  <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
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
