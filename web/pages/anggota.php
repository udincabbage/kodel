<?php include "includes/conf.php"; 

  if(isset($_POST['Simpan'])) {
      $no_anggota = $_POST['no_anggota'];
      $tanggal_gabung = $_POST['tanggal_gabung'];
      $nama = $_POST['nama']; 
      // $id_pengguna = 2; 
      $username = $_POST['username']; 
      $password = $_POST['password']; 
      $nik = $_POST['nik']; 
      $jenis_kelamin = $_POST['jenis_kelamin']; 
      $tempat_ = $_POST['tempat_lahir']; 
      $tanggal_lahir = $_POST['tanggal_lahir']; 
      $telepon = $_POST['telepon']; 
      $email = $_POST['email']; 
      $alamat = $_POST['alamat']; 
      $desa = $_POST['desa']; 
      $kecamatan = $_POST['kecamatan']; 
      $kabupaten = $_POST['kabupaten']; 
      $asal_kampus = $_POST['asal_kampus']; 
      $fakultas = $_POST['fakultas']; 
      $program_studi = $_POST['program_studi']; 
      $bulan_mapaba = $_POST['bulan_mapaba']; 
      $tahun_mapaba = $_POST['tahun_mapaba']; 
      $motivasi = $_POST['motivasi']; 
      $level = 2;
      $opsi = "Anggota";
      
        $Sql = "INSERT INTO `pengguna`(status, user, password, level, opsi) VALUES ( '1',?,?,?,? ) ";
        $database = new Database();
        $db = $database->getConnection();
        $stmt = $db->prepare($Sql);
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $password);
        $stmt->bindParam(3, $level);
        $stmt->bindParam(4, $opsi); 
        $stmt->execute();
        
        $id_pengguna = $db->lastInsertId();
        
        $mySql = "INSERT INTO `anggota`(`status`, `no_anggota`, `tanggal_gabung`, `id_pengguna`, `nik`, `nama`, `email`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `telepon`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `asal_kampus`, `fakultas`, `prodi`, `bulan_mapaba`, `tahun_mapaba`, `motivasi`, `status_anggota`) VALUES ( '1',?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,'Aktif' ) ";
        $database = new Database();
        $db = $database->getConnection();
        $stmt = $db->prepare($mySql);
        $stmt->bindParam(1, $no_anggota);
        $stmt->bindParam(2, $tanggal_gabung);
        $stmt->bindParam(3, $id_pengguna);
        $stmt->bindParam(4, $nik);
        $stmt->bindParam(5, $nama);
        $stmt->bindParam(6, $email);
        $stmt->bindParam(7, $jenis_kelamin);
        $stmt->bindParam(8, $tempat_lahir);
        $stmt->bindParam(9, $tanggal_lahir);
        $stmt->bindParam(10, $telepon);
        $stmt->bindParam(11, $alamat);
        $stmt->bindParam(12, $desa);
        $stmt->bindParam(13, $kecamatan);
        $stmt->bindParam(14, $kabupaten);
        $stmt->bindParam(15, $asal_kampus);
        $stmt->bindParam(16, $fakultas);
        $stmt->bindParam(17, $program_studi);
        $stmt->bindParam(18, $bulan_mapaba);
        $stmt->bindParam(19, $tahun_mapaba);
        $stmt->bindParam(20, $motivasi);
        $stmt->execute();
        if($stmt) { 
           ?>
           <div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Tambah Data Berhasil!</strong> Pengguna baru dengan ID = <?php echo $id_pengguna; ?>, dengan nama  <?php echo $nama; ?> telah ditambahkan!
</div>
<?php 
        } 
  } 

if(isset($_POST['Edit'])) { 
      $id = $_POST['id'];
      $no_anggota = $_POST['no_anggota'];
      $tanggal_gabung = $_POST['tanggal_gabung'];
      $nama = $_POST['nama']; 
      $id_pengguna = $_POST['id_pengguna'];
      // $username = $_POST['username']; 
      // $password = $_POST['password']; 
      $nik = $_POST['nik']; 
      $jenis_kelamin = $_POST['jenis_kelamin']; 
      $tempat_ = $_POST['tempat_lahir']; 
      $tempat_lahir = $_POST['tempat_lahir']; 
      $tanggal_lahir = $_POST['tanggal_lahir']; 
      $telepon = $_POST['telepon']; 
      $email = $_POST['email']; 
      $alamat = $_POST['alamat']; 
      $desa = $_POST['desa']; 
      $kecamatan = $_POST['kecamatan']; 
      $kabupaten = $_POST['kabupaten']; 
      $asal_kampus = $_POST['asal_kampus']; 
      $fakultas = $_POST['fakultas']; 
      $program_studi = $_POST['program_studi']; 
      $bulan_mapaba = $_POST['bulan_mapaba']; 
      $tahun_mapaba = $_POST['tahun_mapaba']; 
      $motivasi = $_POST['motivasi']; 
      $status_anggota = $_POST['status_anggota']; 
      
      
        $mySql = "UPDATE  `anggota` SET `no_anggota`=?, `tanggal_gabung`=?, `nik`=?, `nama`=?, `email`=?, `jenis_kelamin`=?, `tempat_lahir`=?, `tanggal_lahir`=?, `telepon`=?, `alamat`=?, `desa`=?, `kecamatan`=?, `kabupaten`=?, `asal_kampus`=?, `fakultas`=?, `prodi`=?, `bulan_mapaba`=?, `tahun_mapaba`=?, `motivasi`=?, `status_anggota`=? WHERE id=? ";
        $database = new Database();
        $db = $database->getConnection();
        $stmt = $db->prepare($mySql);
        $stmt->bindParam(1, $no_anggota);
        $stmt->bindParam(2, $tanggal_gabung); 
        $stmt->bindParam(3, $nik);
        $stmt->bindParam(4, $nama);
        $stmt->bindParam(5, $email);
        $stmt->bindParam(6, $jenis_kelamin);
        $stmt->bindParam(7, $tempat_lahir);
        $stmt->bindParam(8, $tanggal_lahir);
        $stmt->bindParam(9, $telepon);
        $stmt->bindParam(10, $alamat);
        $stmt->bindParam(11, $desa);
        $stmt->bindParam(12, $kecamatan);
        $stmt->bindParam(13, $kabupaten);
        $stmt->bindParam(14, $asal_kampus);
        $stmt->bindParam(15, $fakultas);
        $stmt->bindParam(16, $program_studi);
        $stmt->bindParam(17, $bulan_mapaba);
        $stmt->bindParam(18, $tahun_mapaba);
        $stmt->bindParam(19, $motivasi);
        $stmt->bindParam(20, $status_anggota);
        $stmt->bindParam(21, $id);
       $stmt->execute();
   
    if($stmt) { 
   ?>
   <div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Edit Data Berhasil!</strong> Pengguna baru dengan ID = <?php echo $id_pengguna; ?>, dengan nama  <?php echo $nama; ?> telah dirubah!
</div>
<?php 
    }
  }

if(isset($_POST['Hapus'])) {  
      $id = $_POST['id']; 
      $id_pengguna = $_POST['id_pengguna']; 
      $nama = $_POST['nama']; 
      
      $Sql = "DELETE FROM anggota WHERE id=? ";
        $database = new Database();
        $db = $database->getConnection();
        $stmt = $db->prepare($Sql);
        $stmt->bindParam(1, $id); 
       $stmt->execute();
      
      $mySql = "DELETE FROM pengguna WHERE id=? ";
        $database = new Database();
        $db = $database->getConnection();
        $stmt = $db->prepare($mySql);
        $stmt->bindParam(1, $id_pengguna); 
       $stmt->execute();
       if($stmt) { 
    ?>
   <div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Hapus Data Berhasil!</strong> Pengguna dengan ID = <?php echo $id_pengguna; ?>, dengan nama  <?php echo $nama; ?> telah dihapus!
</div>
<?php 
    }
  }
  
if(isset($_POST['Foto'])) {  
      $id = $_POST['id']; 
      $id_pengguna = $_POST['id_pengguna']; 
      $nama = $_POST['nama']; 
      $foto = $_FILES['file']['name']; 
      
      
    ?>
   <div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Tambah Foto Berhasil!</strong> Pengguna dengan ID = <?php echo $id_pengguna; ?>, dengan nama  <?php echo $nama; ?> telah ditambahkan foto dengan file <?php echo $foto; ?>!
</div>
<?php 
    } 
?>
           

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Anggota</h1>
      <div class="row">
        <div class="col-md-10">
         <p class="mb-4">Data Anggota merupakan data seluruh anggota / kader yang ada pada aplikasi ini. Data yang dipublikasi pada halaman web masyarakat hanya data anggota yang memiliki status aktif dan pasif.</p> 
          </div>
           <div class="col-md-2">
          <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#anggotaModal">
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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>No Anggota</th> 
                      <th>Nama</th>
                      <th>No Telepon</th>
                      <th>Komisariat</th>
                      <th>Foto</th>
                      <th>Status</th>
                      <th>Opsi</th>
                    </tr>
                  </thead> 
                  <tbody>
                  <?php
							$mySql = "SELECT anggota.* FROM anggota ORDER BY updated_at DESC ";
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
									<td colspan="7">Data Tidak Ada</td>
								</tr>
								<?php
							} else {
								while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
									extract($row);
                                    
                                    if($foto==NULL) { $foto ='
                                    <a href="#" type="button" class="btn btn-warning btn-icon-split"  data-toggle="modal" data-target="#fotoModal'. $id.' ">
						  <span class="icon ">! <i class="fas fa-user"></i></span> 
							</a> 
                            ';}
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $no_anggota; ?></td> 
                      <td><?php echo $nama; ?></td>
                      <td><?php echo $telepon; ?></td>
                      <td><?php echo $asal_kampus; ?></td>
                      <td><?php echo $foto; ?></td>
                      <td><?php echo $status_anggota; ?></td>
                      <td>	<a href="#" type="button" class="btn btn-info btn-icon-split"  data-toggle="modal" data-target="#editModal<?php echo $id; ?>">
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
                    <h5 class="modal-title" id="anggotaModalLabel">Update Data Anggota <?php echo $nama; ?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div> 
                  <div class="modal-body">
                    <form role="form" action="" method="post"> 
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna; ?>">
                       
          <div class="form-group row">
          <div class="col-md-6">
            <label for="no_anggota" class="col-form-label">No Anggota</label>
            <input type="text" class="form-control" id="no_anggota" value="<?php echo $no_anggota; ?>" name="no_anggota">
          </div>
          <div class="col-md-6">
            <label for="tanggal_gabung" class="col-form-label">Tanggal Bergabung</label>
            <input type="date"  value="<?php echo $tanggal_gabung; ?>"  class="form-control" id="tanggal_gabung" name="tanggal_gabung">
          </div>
          </div>
          <div class="form-group row">
          <div class="col-md-8">
            <label for="nama" class="col-form-label">Nama</label>
            <input type="text" class="form-control" id="nama" value="<?php echo $nama; ?>"  name="nama">
          </div> 
          <div class="col-md-4">
            <label for="status_anggota" class="col-form-label"> Status Keanggotaan </label>
            <select  class="form-control"  id='status_anggota'  name='status_anggota' >
			<option value='Aktif' <?php if($status_anggota=='Aktif') { echo 'Selected'; } ?>> Aktif </option>
			<option value='Pasif' <?php if($status_anggota=='Pasif') { echo 'Selected'; } ?>> Pasif </option>
			<option value='Suspend' <?php if($status_anggota=='Suspend') { echo 'Selected'; } ?>> Suspend </option>
            </select>
          </div> 
          </div> 
		  
          <div class="form-group row">
          <div class="col-md-6">
            <label for="nik" class="col-form-label">Nomor Induk Kependudukan (KTP)</label>
            <input type="text" class="form-control" id="nik" name="nik" value="<?php echo $nik; ?>" >
          </div>
          <div class="col-md-6">
            <label for="jenis_kelamin" class="col-form-label">Jenis Kelamin</label>
            <div class="radio">
              <label class="radio-inline"><input type="radio" name="jenis_kelamin" value="Laki-laki" <?php if($jenis_kelamin=='Laki-laki') { echo "checked"; } ?> > Laki-laki </label>&nbsp;&nbsp;&nbsp;
              <label class="radio-inline"><input type="radio" value="Perempuan" name="jenis_kelamin" <?php if($jenis_kelamin=='Perempuan') { echo "checked"; } ?> > Perempuan</label>
            </div>
          </div> 
          </div> 
          <div class="form-group row">
          <div class="col-md-6">
            <label for="tempat_lahir" class="col-form-label">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $tempat_lahir; ?>" >
          </div> 
          <div class="col-md-6">
            <label for="tanggal_lahir" class="col-form-label">Tanggal Lahir</label>
            <input type="date" class="form-control"  min="<?php echo $maxage;?>" max="<?php echo $minage;?>"  id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>" >
          </div>  
          </div>  
          <div class="form-group row">
          <div class="col-md-6">
            <label for="telepon" class="col-form-label">Telepon</label>
            <input type="text" class="form-control" id="telepon" name="telepon" value="<?php echo $telepon; ?>" >
          </div>
          <div class="col-md-6">
            <label for="email" class="col-form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" >
          </div>
          </div>
          <div class="form-group">
            <label for="alamat" class="col-form-label">Alamat </label>
            <textarea class="form-control" id="alamat" name="alamat" ><?php echo $alamat; ?></textarea>
          </div>
          <div class="form-group row">
          <div class="col-md-4">
            <label for="desa" class="col-form-label">Desa/Kelurahan</label>
            <input type="text" class="form-control" id="desa" name="desa" value="<?php echo $desa; ?>" >
          </div>
          <div class="col-md-4">
            <label for="kecamatan" class="col-form-label">Kecamatan</label>
            <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?php echo $kecamatan; ?>" >
          </div>
          <div class="col-md-4">
            <label for="kabupaten" class="col-form-label">Kabupaten</label>
            <input type="text" class="form-control" id="kabupaten" name="kabupaten" value="<?php echo $kabupaten; ?>" >
          </div>
          </div>
          <div class="form-group">
            <label for="asal_kampus" class="col-form-label">Asal Komisariat / Kampus</label>
            <input type="text" class="form-control" id="asal_kampus" name="asal_kampus"  value="<?php echo $asal_kampus; ?>" >
          </div>
          <div class="form-group row">
          <div class="col-md-6">
            <label for="fakultas" class="col-form-label">Fakultas</label>
            <input type="text" class="form-control" id="fakultas" value="<?php echo $fakultas; ?>"  name="fakultas">
          </div>
          <div class="col-md-6">
            <label for="program_studi" class="col-form-label">Program Studi</label>
            <input type="text" class="form-control" id="program_studi"  value="<?php echo $prodi; ?>" name="program_studi">
          </div>
          </div>
          <div class="form-group row">
          <div class="col-md-6">
            <label for="bulan_mapaba" class="col-form-label">Bulan Mapaba</label>
            <input type="text" class="form-control" id="bulan_mapaba" value="<?php echo $bulan_mapaba; ?>"  name="bulan_mapaba">
          </div> 
          <div class="col-md-6">
            <label for="tahun_mapaba" class="col-form-label">Tahun Mapaba</label>
            <input type="number" class="form-control"  value="<?php echo $tahun_mapaba; ?>" id="tahun_mapaba" name="tahun_mapaba">
          </div>
          </div> 
          <div class="form-group">
            <label for="motivasi" class="col-form-label"> Motivasi </label>
            <textarea class="form-control" id="motivasi" name="motivasi"> <?php echo $motivasi; ?> </textarea>
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
                    <h5 class="modal-title" id="anggotaModalLabel">Hapus Data Anggota <?php echo $nama; ?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div> 
                  <div class="modal-body">
                    <form role="form" action="" method="post"> 
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna; ?>">
                        <input type="hidden" name="nama" value="<?php echo $nama; ?>">
                        <div class="form-group">
                          Yakin menghapus data ini? baik data pengguna maupun data anggota dan data lain yang berkaitan dengan anggota ini akan dihapus?      
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
             <!-- foto modal -->
            <div class="modal fade" id="fotoModal<?php echo $id; ?>" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content"> 
                  <div class="modal-header">
                    <h5 class="modal-title" id="fotoModalLabel">Upload Foto Anggota <?php echo $nama; ?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div> 
                  <div class="modal-body">
                    <form method='post' action='' enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna; ?>">
                        <input type="hidden" name="nama" value="<?php echo $nama; ?>">
                         <!-- Form -->
                        Select file : <input type='file' name='file' id='file' class='form-control' ><br>
                        <input type='button' class='btn btn-info' value='Upload' id='btn_upload'>

                    <!-- Preview-->
                    <div id='preview'></div>
                        
                        <div class="modal-footer">  
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                           <button type="submit" name="Foto" class="btn btn-success">Simpan</button>  
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
  <div class="modal fade" id="anggotaModal" tabindex="-1" role="dialog" aria-labelledby="anggotaModalLabel" aria-hidden="true">
  <form method="post" action="" >
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="anggotaModalLabel">Register Anggota Baru</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"><p>Tambahkan data Anggota, data anggota akan langsung aktif dan dapat mengakses sesuai username dan password terinput.</p>
           <form>
          <div class="form-group row">
          <div class="col-md-6">
            <label for="no_anggota" class="col-form-label">No Anggota</label>
            <input type="text" class="form-control" id="no_anggota" name="no_anggota">
          </div>
          <div class="col-md-6">
            <label for="tanggal_gabung" class="col-form-label">Tanggal Bergabung</label>
            <input type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" id="tanggal_gabung" name="tanggal_gabung">
          </div>
          </div>
          <div class="form-group">
            <label for="nama" class="col-form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama">
          </div> 
          <div class="form-group row">
          <div class="col-md-6">
            <label for="username" class="col-form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username">
          </div>
          <div class="col-md-6">
            <label for="password" class="col-form-label">Password</label>
            <input type="text" class="form-control" id="password" name="password">
          </div>
          </div> 
          <div class="form-group row">
          <div class="col-md-6">
            <label for="nik" class="col-form-label">Nomor Induk Kependudukan (KTP)</label>
            <input type="text" class="form-control" id="nik" name="nik">
          </div>
          <div class="col-md-6">
            <label for="jenis_kelamin" class="col-form-label">Jenis Kelamin</label>
            <div class="radio">
              <label class="radio-inline"><input type="radio" name="jenis_kelamin" value="Laki-laki" checked> Laki-laki </label>&nbsp;&nbsp;&nbsp;
              <label class="radio-inline"><input type="radio" value="Perempuan" name="jenis_kelamin"> Perempuan</label>
            </div>
          </div> 
          </div> 
          <div class="form-group row">
          <div class="col-md-6">
            <label for="tempat_lahir" class="col-form-label">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
          </div> 
          <div class="col-md-6">
            <label for="tanggal_lahir" class="col-form-label">Tanggal Lahir</label>
            <input type="date" class="form-control"  value="<?php echo $minage;?>"  min="<?php echo $maxage;?>" max="<?php echo $minage;?>"  id="tanggal_lahir" name="tanggal_lahir">
          </div>  
          </div>  
          <div class="form-group row">
          <div class="col-md-6">
            <label for="telepon" class="col-form-label">Telepon</label>
            <input type="text" class="form-control" id="telepon" name="telepon">
          </div>
          <div class="col-md-6">
            <label for="email" class="col-form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          </div>
          <div class="form-group">
            <label for="alamat" class="col-form-label">Alamat </label>
            <textarea class="form-control" id="alamat" name="alamat"></textarea>
          </div>
          <div class="form-group row">
          <div class="col-md-4">
            <label for="desa" class="col-form-label">Desa/Kelurahan</label>
            <input type="text" class="form-control" id="desa" name="desa">
          </div>
          <div class="col-md-4">
            <label for="kecamatan" class="col-form-label">Kecamatan</label>
            <input type="text" class="form-control" id="kecamatan" name="kecamatan">
          </div>
          <div class="col-md-4">
            <label for="kabupaten" class="col-form-label">Kabupaten</label>
            <input type="text" class="form-control" id="kabupaten" name="kabupaten">
          </div>
          </div>
          <div class="form-group">
            <label for="asal_kampus" class="col-form-label">Asal Komisariat / Kampus</label>
            <input type="text" class="form-control" id="asal_kampus" name="asal_kampus">
          </div>
          <div class="form-group row">
          <div class="col-md-6">
            <label for="fakultas" class="col-form-label">Fakultas</label>
            <input type="text" class="form-control" id="fakultas" name="fakultas">
          </div>
          <div class="col-md-6">
            <label for="program_studi" class="col-form-label">Program Studi</label>
            <input type="text" class="form-control" id="program_studi" name="program_studi">
          </div>
          </div>
          <div class="form-group row">
          <div class="col-md-6">
            <label for="bulan_mapaba" class="col-form-label">Bulan Mapaba</label>
            <input type="text" class="form-control" id="bulan_mapaba" name="bulan_mapaba">
          </div> 
          <div class="col-md-6">
            <label for="tahun_mapaba" class="col-form-label">Tahun Mapaba</label>
            <input type="number" class="form-control" value="<?php echo date('Y'); ?>" id="tahun_mapaba" name="tahun_mapaba">
          </div>
          </div> 
          <div class="form-group">
            <label for="motivasi" class="col-form-label"> Motivasi </label>
            <textarea class="form-control" id="motivasi" name="motivasi"></textarea>
          </div>
        </form>
        
        
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
$(document).ready(function(){
    $('#btn_upload').click(function(){

        var fd = new FormData();
        var files = $('#file')[0].files[0];
        fd.append('file',files);

        // AJAX request
        $.ajax({
            url: 'pages/ajaxfile.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                if(response != 0){
                    // Show image preview
                    $('#preview').append("<img src='"+response+"' width='160' height='160' style='display: inline-block;'>");
                }else{
                    alert('file not uploaded');
                }
            }
        });
    });
});
</script>


<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);
</script>
        