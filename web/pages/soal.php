<?php include "includes/conf.php";

  if(isset($_POST['Simpan'])) {
      $id_kategori = $_POST['id_kategori'];
      $pertanyaan = $_POST['pertanyaan'];
      $a = $_POST['a'];
      $b = $_POST['b'];
      $c = $_POST['c'];
      $d = $_POST['d'];
      $e = $_POST['e'];
      $answer = $_POST['answer'];

      $mySql = "INSERT INTO `soal`(`status`, `id_kategori`, `pertanyaan`, `a`, `b`, `c`, `d`, `e`, `answer`) VALUES ('1',?,?,?,?,?,?,?,?) ";
      $database = new Database();
      $db = $database->getConnection();
      $stmt = $db->prepare($mySql);
      $stmt->bindParam(1, $id_kategori);
      $stmt->bindParam(2, $pertanyaan);
      $stmt->bindParam(3, $a);
      $stmt->bindParam(4, $b);
      $stmt->bindParam(5, $c);
      $stmt->bindParam(6, $d);
      $stmt->bindParam(7, $e);
      $stmt->bindParam(8, $answer);
      $stmt->execute();
      if($stmt) {
        ?>
      <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Tambah Data Soal Berhasil!</strong>
      </div>
<?php
      }else { echo "Gagal simpan!"; }
    }


        if(isset($_POST['Edit'])) {
        $id = $_POST['id'];
        $id_kategori = $_POST['id_kategori'];
        $pertanyaan = $_POST['pertanyaan'];
        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];
        $d = $_POST['d'];
        $e = $_POST['e'];
        $answer = $_POST['answer'];
        $status = $_POST['status'];

        $mySql = "UPDATE soal SET pertanyaan=?, a=?, b=?, c=?, d=?, e=?, answer=?, status=? WHERE id=? ";
        $database = new Database();
        $db = $database->getConnection();
        $stmt = $db->prepare($mySql);
        $stmt->bindParam(1, $pertanyaan);
        $stmt->bindParam(2, $a);
        $stmt->bindParam(3, $b);
        $stmt->bindParam(4, $c);
        $stmt->bindParam(5, $d);
        $stmt->bindParam(6, $e);
        $stmt->bindParam(7, $answer);
        $stmt->bindParam(8, $status);
        $stmt->bindParam(9, $id);
       $stmt->execute();

    if($stmt) {
   ?>
   <div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Edit Soal Berhasil! <?php echo $pertanyaan; ?></strong>
</div>
<?php
}else { echo "Gagal edit!"; }
  }

if(isset($_POST['Hapus'])) {
      $id = $_POST['id'];
      $id_kategori = $_POST['id_kategori'];
      $kategori = $_POST['kategori'];

      $mySql = "DELETE FROM soal WHERE id=? ";
        $database = new Database();
        $db = $database->getConnection();
        $stmt = $db->prepare($mySql);
        $stmt->bindParam(1, $id);
       $stmt->execute();

    ?>
   <div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Hapus Data Berhasil!</strong> Soal dengan ID = <?php echo $id; ?>, oleh kategori_soal  <?php echo $kategori; ?> telah dihapus!
</div>
<?php
    }


if(isset($_POST['Aktif'])) {
      $id = $_POST['id'];
      $id_kategori = $_POST['id_kategori'];
      $kategori = $_POST['kategori'];

      $mySql = "UPDATE soal SET status=1 WHERE id=? ";
        $database = new Database();
        $db = $database->getConnection();
        $stmt = $db->prepare($mySql);
        $stmt->bindParam(1, $id);
       $stmt->execute();
       if($stmt) {

    ?>
   <div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Ubah Status Berhasil!</strong> Soal oleh <?php echo $kategori; ?> telah di Aktifkan!
</div>
<?php
    }
    }

if(isset($_POST['Non-Aktif'])) {
      $id = $_POST['id'];
      $id_kategori = $_POST['id_kategori'];
      $kategori = $_POST['kategori'];

      $mySql = "UPDATE soal SET status=0 WHERE id=? ";
        $database = new Database();
        $db = $database->getConnection();
        $stmt = $db->prepare($mySql);
        $stmt->bindParam(1, $id);
       $stmt->execute();
       if($stmt) {

    ?>
   <div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Ubah Status Berhasil!</strong> Soal oleh <?php echo $kategori; ?> telah di Non-Aktifkan!
</div>
<?php
    }
    }
?>


          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Pertanyaan</h1>
      <div class="row">
        <div class="col-md-10">
         <p class="mb-4">Data Soal Pertanyaan merupakan data soal dari seluruh anggota / kader yang ada pada aplikasi ini. Data yang soalnya perlu proses verifikasi admin untuk pertanyaan peserta.</p>
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
                      <th>Kategori Pertanyaan</th>
                      <th>Pertanyaan </th>
                      <th>Answer</th>
                      <th>Status</th>
                      <th>Opsi</th>
                      </tr>
                    </tr>
                  </thead>
                  <tbody>

                  <?php
				 // echo $id;
				$Sql2 = "SELECT soal.*, kategori_soal.id AS id_kategori, kategori_soal.kategori FROM soal LEFT JOIN kategori_soal ON kategori_soal.id=soal.id_kategori ORDER BY updated_at DESC ";
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
					<td>
            <?php echo $kategori; ?>
            <!-- <form method="POST" action="kategori_soaldetail">
            <input type="hidden" name="id" value="<?php echo $id_kategori; ?>" >
              <button type="submit"  class="btn btn-link mt-n4 mb-n4 text-left"><?php echo $kategori; ?></a></button>
            </form> -->
          </td>
					<td><?php echo $pertanyaan; ?></td>
					<td><?php echo $answer; ?></td>
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
                    <h5 class="modal-title" id="kategori_soalModalLabel">Update Data Soal <?php echo $kategori; ?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <form role="form" action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="id_kategori" value="<?php echo $id_kategori; ?>">
                        <input type="hidden" name="kategori" value="<?php echo $kategori; ?>">
                  <div class="col-md-12">
                    <label for="pertanyaan" class="col-form-label">Pertanyaan</label>
                    <input type="text"  value="<?php echo $pertanyaan; ?>"  class="form-control" id="pertanyaan" name="pertanyaan">
                  </div>
                  <div class="col-md-12">
                    <label for="a" class="col-form-label">A.</label>
                    <input type="text"  value="<?php echo $a; ?>"  class="form-control" id="a" name="a">
                  </div>
                  <div class="col-md-12">
                    <label for="b" class="col-form-label">B.</label>
                    <input type="text"  value="<?php echo $b; ?>"  class="form-control" id="b" name="b">
                  </div>
                  <div class="col-md-12">
                    <label for="c" class="col-form-label">C.</label>
                    <input type="text"  value="<?php echo $c; ?>"  class="form-control" id="c" name="c">
                  </div>
                  <div class="col-md-12">
                    <label for="d" class="col-form-label">D.</label>
                    <input type="text"  value="<?php echo $d; ?>"  class="form-control" id="d" name="d">
                  </div>
                  <div class="col-md-12">
                    <label for="e" class="col-form-label">E.</label>
                    <input type="text"  value="<?php echo $e; ?>"  class="form-control" id="e" name="e">
                  </div> 
		 </div>	  
                  <div class="form-group"> 
                  <div class="col-md-12"> 
                      <label for="answer" class="col-form-label">Jawaban</label>
                      <textarea class="form-control" id="answer" name="answer"> <?php echo $answer; ?> </textarea>
                  </div>
                  <div class="col-md-6">
                    <label for="status" class="col-form-label">Status Verifikasi</label>
                    <select class="form-control" name="status">
                      <option value="1" <?php if($status==1) {echo "selected";}?> > Aktif</option>
                      <option value="0" <?php if($status==0) {echo "selected";}?> > Pending</option>
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
                    <h5 class="modal-title" id="kategori_soalModalLabel">Hapus Data Soal Pertanyaan <?php echo $kategori; ?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="id_kategori" value="<?php echo $id_kategori; ?>">
                        <input type="hidden" name="kategori" value="<?php echo $kategori; ?>">
                        <div class="form-group">
                          Yakin menghapus data ini? data Soal akan terhapus?
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
                    <h5 class="modal-title" id="anggotaModalLabel">Verifikasi Data Soal <?php echo $kategori; ?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="id_kategori" value="<?php echo $id_kategori; ?>">
                        <input type="hidden" name="kategori" value="<?php echo $kategori; ?>">
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
  <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="kategori_soalModalLabel" aria-hidden="true">
  <form method="post" action="" >
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="anggotaModalLabel">Tambah Soal Baru</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"><p>Tambahkan data soal , data soal  yang diinput pada form ini akan langsung berstatus aktif.</p>
        <form role="form" action="" method="post" enctype="multipart/form-data">
          <div class="form-group row">
          <div class="col-md-8">
            <label for="id_kategori" class="col-form-label">Kategori Soal</label>
           <select class="form-control selectpicker" name="id_kategori" data-live-search="true">
           <option value="">--Pilih Kategori Soal--</option>
           <?php
            $mySql = "SELECT kategori_soal.* FROM kategori_soal ORDER BY updated_at DESC ";
            $database = new Database();
            $db = $database->getConnection();
            $stmt = $db->prepare($mySql);
            $stmt->execute();
            while ($rowx = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($rowx);
            ?>
            <option data-tokens="<?php echo $id; ?>" value="<?php echo $id; ?>"><?php echo $kategori; ?></option>
            <?php } ?>
          </select>
          </div>
          <div class="col-md-12">
                    <label for="pertanyaan" class="col-form-label">Pertanyaan</label>
                    <input type="text"  value=""  class="form-control" id="pertanyaan" name="pertanyaan">
                  </div>
                  <div class="col-md-12">
                    <label for="a" class="col-form-label">A.</label>
                    <input type="text"  value=""  class="form-control" id="a" name="a">
                  </div>
                  <div class="col-md-12">
                    <label for="b" class="col-form-label">B.</label>
                    <input type="text"  value=""  class="form-control" id="b" name="b">
                  </div>
                  <div class="col-md-12">
                    <label for="c" class="col-form-label">C.</label>
                    <input type="text"  value=""  class="form-control" id="c" name="c">
                  </div>
                  <div class="col-md-12">
                    <label for="d" class="col-form-label">D.</label>
                    <input type="text"  value=""  class="form-control" id="d" name="d">
                  </div>
                  <div class="col-md-12">
                    <label for="e" class="col-form-label">E.</label>
                    <input type="text"  value=""  class="form-control" id="e" name="e">
                  </div>
                  </div>
                  <div class="form-group">
                      <label for="answer" class="col-form-label">Jawaban</label>
                      <textarea class="form-control" id="answer" name="answer"> </textarea>
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



<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 3000);
</script>
