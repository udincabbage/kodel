<?php include "includes/conf.php"; 

  if(isset($_POST['Simpan'])) { 
      $id_anggota = $_POST['id_anggota'];
      $tanggal_bukti = $_POST['tanggal_bukti'];  
      $nama_kegiatan = $_POST['nama_kegiatan'];  
      $keterangan = $_POST['keterangan']; 
      // $file_bukti = $_POST['file_bukti'];   
      
        $imgFile = $_FILES['file_bukti']['name'];
        $tmp_dir = $_FILES['file_bukti']['tmp_name'];
        $imgSize = $_FILES['file_bukti']['size'];
        
        if(empty($imgFile)){
           $errMSG = "Please Select Image File.";
          }
          else
          {
           $upload_dir = 'uploads/pengalaman/'; // upload directory
         
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
        if(!isset($errMSG))
        {
        
        $mySql = "INSERT INTO `pengalaman`(`status`, `id_anggota`, `tanggal_bukti`, `nama_kegiatan`, `keterangan`, `file_bukti`) VALUES ('1',?,?,?,?,?) ";
        $database = new Database();
        $db = $database->getConnection();
        $stmt = $db->prepare($mySql);
        $stmt->bindParam(1, $id_anggota);
        $stmt->bindParam(2, $tanggal_bukti);
        $stmt->bindParam(3, $nama_kegiatan);
        $stmt->bindParam(4, $keterangan);
        $stmt->bindParam(5, $userpic); 
        $stmt->execute();
        if($stmt) { 
           ?>
           <div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Tambah Data Berhasil!</strong> Pengalaman  <?php echo $nama_kegiatan; ?> telah ditambahkan!
</div>
<?php 
        } 
        } else { echo "Gagal simpan!"; }
  } 

if(isset($_POST['Edit'])) { 
      $id = $_POST['id'];
      $nama = $_POST['nama']; 
      $id_anggota = $_POST['id_anggota'];
      $tanggal_bukti = $_POST['tanggal_bukti'];  
      $nama_kegiatan = $_POST['nama_kegiatan'];  
      $keterangan = $_POST['keterangan']; 
      $file_bukti_lama = $_POST['file_bukti_lama']; 
      $userpic = $_POST['file_bukti_lama']; 
      $status = $_POST['status'];  
      
        $imgFile = $_FILES['file_bukti']['name'];
        $tmp_dir = $_FILES['file_bukti']['tmp_name'];
        $imgSize = $_FILES['file_bukti']['size'];
        
        if($imgFile){ 
           $upload_dir = 'uploads/pengalaman/'; // upload directory
         
           $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
          
           // valid image extensions
           $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
          
           // file lawas
           $file_nama_ja = explode(".",$file_bukti_lama);
           // rename uploading image
           $userpic = $file_nama_ja[0].".".$imgExt;
            
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
      
        $mySql = "UPDATE  pengalaman SET  tanggal_bukti=?, nama_kegiatan=?, keterangan=?, file_bukti=?, status=? WHERE id=? ";
        $database = new Database();
        $db = $database->getConnection();
        $stmt = $db->prepare($mySql);
        $stmt->bindParam(1, $tanggal_bukti);
        $stmt->bindParam(2, $nama_kegiatan); 
        $stmt->bindParam(3, $keterangan);
        $stmt->bindParam(4, $userpic);
        $stmt->bindParam(5, $status); 
        $stmt->bindParam(6, $id); 
       $stmt->execute();
   
    if($stmt) { 
   ?>
   <div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Edit Data Berhasil!</strong> Pengalaman dengan ID = <?php echo $id; ?>, oleh anggota  <?php echo $nama; ?> telah dirubah!
</div>
<?php 
    } 
  }

if(isset($_POST['Hapus'])) {  
      $id = $_POST['id']; 
      $id_anggota = $_POST['id_anggota']; 
      $nama = $_POST['nama'];  
      $userpic = $_POST['file_bukti_lama'];  
      
      $mySql = "DELETE FROM pengalaman WHERE id=? ";
        $database = new Database();
        $db = $database->getConnection();
        $stmt = $db->prepare($mySql);
        $stmt->bindParam(1, $id); 
       $stmt->execute();
       if($stmt) { 
      if(file_exists("uploads/pengalaman/".$userpic)) {
       unlink("uploads/pengalaman/".$userpic);
      }
    ?>
   <div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Hapus Data Berhasil! </strong> pengalaman dengan ID = <?php echo $id; ?>, oleh anggota  <?php echo $nama; ?> telah dihapus!
</div>
<?php 
    }
  }
  
if(isset($_POST['Aktif'])) {  
      $id = $_POST['id']; 
      $id_anggota = $_POST['id_anggota']; 
      $nama = $_POST['nama'];  
      
      $mySql = "UPDATE pengalaman SET status=1 WHERE id=? ";
        $database = new Database();
        $db = $database->getConnection();
        $stmt = $db->prepare($mySql);
        $stmt->bindParam(1, $id); 
       $stmt->execute();
       if($stmt) { 
      
    ?>
   <div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Ubah Status Berhasil!</strong> Pengalaman oleh <?php echo $nama; ?> telah di Aktifkan!
</div>
<?php 
    }  
    }  
    
if(isset($_POST['Non-Aktif'])) {  
      $id = $_POST['id']; 
      $id_anggota = $_POST['id_anggota']; 
      $nama = $_POST['nama'];  
      
      $mySql = "UPDATE pengalaman SET status=0 WHERE id=? ";
        $database = new Database();
        $db = $database->getConnection();
        $stmt = $db->prepare($mySql);
        $stmt->bindParam(1, $id); 
       $stmt->execute();
       if($stmt) { 
      
    ?>
   <div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Ubah Status Berhasil!</strong> Pengalaman oleh <?php echo $nama; ?> telah di Non-Aktifkan!
</div>
<?php 
    } 
    } 
?>
           

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Pengalaman</h1>
      <div class="row">
        <div class="col-md-10">
         <p class="mb-4">Data Pengalaman merupakan data pengalaman dari seluruh anggota / kader yang ada pada aplikasi ini. Data yang pengalaman perlu proses verifikasi admin untuk dapat diterima sebagai pengalaman.</p> 
         
         <p> 
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
                      <th>Anggota</th>
                      <th>Kegiatan</th>
                      <th>Keterangan</th>
                      <th>Tanggal Bukti</th>
                      <th>File Bukti</th>
                      <th>Status</th>
                      <th>Opsi</th>
                      </tr>
                    </tr>
                  </thead> 
                  <tbody>
                  
                  <?php 
				 // echo $id;
				$Sql2 = "SELECT pengalaman.*, anggota.id AS id_anggota, anggota.nama FROM pengalaman LEFT JOIN anggota ON anggota.id=pengalaman.id_anggota ORDER BY updated_at DESC ";
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
                      <form method="POST" action="anggotadetail">
                      <input type="hidden" name="id" value="<?php echo $id_anggota; ?>" >
                        <button type="submit"  class="btn btn-link mt-n2 mb-n4 text-left"><?php echo $nama; ?></a></button>
                      </form>
                    </td>  
					<td><?php echo $nama_kegiatan; ?></td>  
					<td><?php echo $keterangan; ?></td>  
					<td><?php echo indonesiaTgl($tanggal_bukti); ?></td>  
					<td align="center"><a href="uploads/pengalaman/<?php echo $file_bukti; ?>" target="_blank"><img src="uploads/pengalaman/<?php echo $file_bukti ? $file_bukti : 'noimage.png'; ?>" width="50px"></a></td> 
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
                    <h5 class="modal-title" id="anggotaModalLabel">Update Data Pengalaman <?php echo $nama; ?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div> 
                  <div class="modal-body">
                    <form role="form" action="" method="post"  enctype="multipart/form-data"> 
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="id_anggota" value="<?php echo $id_anggota; ?>"> 
                        <input type="hidden" name="nama" value="<?php echo $nama; ?>">
                        <input type="hidden" name="file_bukti_lama" value="<?php echo $file_bukti; ?>">
                          <div class="form-group row">
                          <div class="col-md-6">
                            <label for="nama_kegiatan" class="col-form-label">kegiatan</label>
                            <input type="text" class="form-control" id="nama_kegiatan" value="<?php echo $nama_kegiatan; ?>" name="nama_kegiatan">
                          </div>
                          <div class="col-md-6">
                            <label for="tanggal_bukti" class="col-form-label">Tanggal kegiatan</label>
                            <input type="date"  value="<?php echo $tanggal_bukti; ?>"  class="form-control" id="tanggal_bukti" name="tanggal_bukti">
                          </div>
                          </div>  
                          <div class="form-group row">
                          <div class="col-md-6">
                            <label for="file_bukti" class="col-form-label">File Bukti</label> 
                          <input type="file" class="form-control" id="image-source" name="file_bukti" onchange="previewImage();"/>
                          </div>
                          <div class="col-md-6">
                            <label for="status" class="col-form-label">Status Verifikasi</label>
                            <select class="form-control" name="status">
                            <option value="1" <?php if($status==1) {echo "selected";}?> > Aktif</option>
                            <option value="0" <?php if($status==0) {echo "selected";}?> > Pending</option>
                            </select>
                          </div>
                          </div>   
                          <div class="form-group">
                          <center>
                            <img id="image-preview" alt="image preview"/>
                          </center>  
                          </div> 
                          <div class="form-group">
                            <label for="keterangan" class="col-form-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" value="<?php echo $keterangan; ?>" name="keterangan">
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
                    <h5 class="modal-title" id="anggotaModalLabel">Hapus Data Pengalaman <?php echo $nama; ?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div> 
                  <div class="modal-body">
                    <form role="form" action="" method="post"> 
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="id_anggota" value="<?php echo $id_anggota; ?>">
                        <input type="hidden" name="nama" value="<?php echo $nama; ?>">
                        <input type="hidden" name="file_bukti_lama" value="<?php echo $file_bukti; ?>">
                        <div class="form-group">
                          Yakin menghapus data ini? data pengalaman beserta file bukti akan terhapus?      
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
                    <h5 class="modal-title" id="anggotaModalLabel">Verifikasi Data Pengalaman <?php echo $nama; ?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div> 
                  <div class="modal-body">
                    <form role="form" action="" method="post"> 
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="id_anggota" value="<?php echo $id_anggota; ?>">
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
            <!-- end delete modal -->
              
                    <?php  } 
                            }                    
                    ?> 
                  </tbody>
                </table>
              </div>
            </div>
          </div> 
          
          
        <?php  
            $now = strtotime(date("Y-m-d"));
            $minage = date('Y-m-d', strtotime('- 16 year', $now));
            $maxage = date('Y-m-d', strtotime('- 50 year', $now)); 
          ?>
  <!-- Tambah Anggota Modal-->
  <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="anggotaModalLabel" aria-hidden="true">
  <form method="post" action="" enctype="multipart/form-data">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="anggotaModalLabel">Tambah pengalaman Baru</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"><p>Tambahkan data Pengalaman, data pengalaman yang diinput pada form ini akan langsung berstatus aktif.</p>
           <form>
          <div class="form-group row">
          <div class="col-md-8">
            <label for="id_anggota" class="col-form-label">Anggota</label>
           <select class="form-control selectpicker" name="id_anggota" data-live-search="true">
           <?php 
            $mySql = "SELECT anggota.* FROM anggota ORDER BY updated_at DESC ";
            $database = new Database();
            $db = $database->getConnection();
            $stmt = $db->prepare($mySql); 
            $stmt->execute(); 
            while ($rowx = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($rowx);
            ?>                        
            <option data-tokens="<?php echo $id; ?>" value="<?php echo $id; ?>"><?php echo $nama; ?></option> 
            <?php } ?>
          </select>

          </div>
          <div class="col-md-4">
            <label for="tanggal_bukti" class="col-form-label">Tanggal Kegiatan</label>
            <input type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" id="tanggal_bukti" name="tanggal_bukti">
          </div>
          </div>
          <div class="form-group row">
          <div class="col-md-8">
            <label for="nama_kegiatan" class="col-form-label">Nama kegiatan</label>
            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan">
          </div> 
          <div class="col-md-4">
            <label for="file_bukti" class="col-form-label">File Bukti</label>  
            <input type="file" class="form-control" id="image-source" name="file_bukti" onchange="previewImage();"/> 
          </div> 
          </div> 
          <div class="form-group">
          <center>
            <img id="image-preview" alt="image preview"/>
          </center>  
          </div>  
          <div class="form-group"> 
            <label for="keterangan" class="col-form-label">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan">
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
        