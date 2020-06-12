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
        
        $mySql = "INSERT INTO `pengalaman`(`status`, `id_anggota`, `tanggal_bukti`, `nama_kegiatan`, `keterangan`, `file_bukti`) VALUES ('0',?,?,?,?,?) ";
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
                      <th>Kegiatan</th>
                      <th>Keterangan</th>
                      <th>Tanggal Bukti</th>
                      <th>File Bukti</th>
                      <th>Status</th> 
                      </tr>
                    </tr>
                  </thead> 
                  <tbody>
                  
                  <?php 
				 // echo $id;
				$Sql2 = "SELECT pengalaman.*, anggota.id AS id_anggota, anggota.nama FROM pengalaman LEFT JOIN anggota ON anggota.id=pengalaman.id_anggota 
                            WHERE anggota.id_pengguna=?
                            ORDER BY updated_at DESC ";
				$database = new Database();
				$db = $database->getConnection();
				$stmt2 = $db->prepare($Sql2);
				$stmt2->bindParam(1, $idx);
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
					<td><?php echo $nama_kegiatan; ?></td>  
					<td><?php echo $keterangan; ?></td>  
					<td><?php echo indonesiaTgl($tanggal_bukti); ?></td>  
					<td align="center"><a href="uploads/pengalaman/<?php echo $file_bukti; ?>" target="_blank"><img src="uploads/pengalaman/<?php echo $file_bukti ? $file_bukti : 'noimage.png'; ?>" width="50px"></a></td> 
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
        <div class="modal-body"><p>Tambahkan data Pengalaman, validasi data pengalaman akan dilakukan oleh admin, dimohon untuk mengupload data dengan benar.</p>
           <form>
          <div class="form-group row">
           <div class="col-md-4">
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
          <div class="col-md-8">
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
            <label for="keterangan" class="col-form-label">Keterangan Kegiatan / Jenis Bukti</label>
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
        