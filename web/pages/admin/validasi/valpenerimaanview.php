<?php
include "includes/conf.php";

if(
  cekLevel(API_URL."pengguna/validate-token.php",1) ||
  cekLevel(API_URL."pengguna/validate-token.php",2)
){
  if(isset($_POST['Simpan'])) {
    $id = $_POST['id'];
    $no_anggota = $_POST['no_anggota'];
    $tanggal_gabung = $_POST['tanggal_gabung'];
    $nama = $_POST['nama'];
    $id_pengguna = $_POST['id_pengguna'];
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
    $motivasi = $_POST['motivasi'];
    $status_anggota = "Aktif"; 
      $foto = $_POST['foto'];

      try {
        $database = new Database();
        $db = $database->getConnection();
        $db->beginTransaction();

        $sql = "UPDATE  `pengguna` SET level='3' WHERE id=? ";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(1, $id_pengguna);
        $stmt->execute();

        $sql2 = "UPDATE  `pendaftaran` SET status='1' WHERE id=? ";
        $stmt = $db->prepare($sql2);
        $stmt->bindParam(1, $id);
        $stmt->execute();

        $mySql = "INSERT INTO `anggota` SET `status` = 1, `no_anggota` =?, `tanggal_gabung` =?, `id_pengguna`=?, `nik`=?, `nama`=?,
         `email`=?, `jenis_kelamin`=?, `tempat_lahir`=?, `tanggal_lahir`=?, `telepon`=?, `alamat`=?, `desa`=?, `kecamatan`=?, `kabupaten`=?,
         `asal_kampus`=?, `fakultas`=?, `prodi`=?, `motivasi`=?, `foto`=?, `status_anggota`='Aktif'";
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
        $stmt->bindParam(18, $motivasi);
        $stmt->bindParam(19, $foto);



        if($stmt->execute()) {
          ?>
          <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Tambah Data Berhasil!</strong> Pengguna baru dengan ID = <?php echo $id_pengguna; ?>, dengan nama  <?php echo $nama; ?> telah ditambahkan!
          </div>
          <?php
        }else{
          ?>
           <div class="alert alert-success" role="alert">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             <strong>Penerimaan anggota gagal</strong> <?php echo $e ?>
           </div>
           <?php
        }
        $db->commit();
      }catch (Exception $e) {
        print_r($e);
        ?>
         <div class="alert alert-success" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <strong>Penerimaan anggota gagal</strong> <?php echo $e ?>
         </div>
         <?php
          $db->rollBack();
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
  <h1 class="h3 mb-2 text-gray-800">Penerimaan Permohonan</h1>
  <div class="row">
    <div class="col-md-12">
      <p class="mb-4">Data yang ditampilkan merupakan data anggota baru sementara yang sudah ikut tes tertulis, untuk kemudian diisikan nilai wawancaranya.</p>
    </div>
    <!-- <div class="col-md-2">
      <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#anggotaModal">
        <span class="icon ">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
      </a>
    </div> -->
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
              <!-- <th>No Anggota</th> -->
              <th>Nama</th>
              <th>No Telepon</th>
              <th>Komisariat</th>
              <!-- <th>Foto</th> -->
              <th>Status</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php
           $mySql = "SELECT P.* FROM pendaftaran P  WHERE P.status=0
            ORDER BY updated_at DESC ";
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
                $id_pendaftaran = $id;

                $cekTesTertulis = "SELECT T.* FROM tes_tertulis T WHERE id_pendaftaran = ?";
                $database = new Database();
                $db = $database->getConnection();
                $stmtCekTertulis = $db->prepare($cekTesTertulis);
                $stmtCekTertulis->bindParam(1, $id);
                $stmtCekTertulis->execute();
                $numTertulis = $stmtCekTertulis->rowCount();
                if($numTertulis==0){
                  $status_anggota = 'Belum Tes Tertulis';
                }else{
                  $cekTesWawancara = "SELECT W.* FROM tes_wawancara W WHERE id_pendaftaran = ?";
                  $database = new Database();
                  $db = $database->getConnection();
                  $stmtCekWawancara = $db->prepare($cekTesWawancara);
                  $stmtCekWawancara->bindParam(1, $id);
                  $stmtCekWawancara->execute();
                  $numWawancara = $stmtCekWawancara->rowCount();
                  if($numWawancara==0){
                    $status_anggota = 'Belum Tes Wawancara';
                  }else{
                    $status_anggota = "Selesai Tes";
                  }
                }

                // if($foto==NULL) { $fotox ='
                //   <a href="#" type="button" class="btn btn-warning btn-icon-split text-center"  data-toggle="modal" data-target="#fotoModal'. $id.' ">
                //   <button class="btn btn-link  ">! <i class="fas fa-user"></i></button>
                //   </a>
                //   ';} else {
                //     $fotox ='
                //     <form method="POST" action="anggotadetail">
                //     <input type="hidden" name="id" value="'.$id.'" >
                //     <button type="submit"  class="btn btn-link mt-n3 mb-n4 "><img src="uploads/avatar/'.$foto.' " width="50px"></a></button>
                //     </form>
                //     ';
                //   }
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <!-- <td><?php //echo $no_anggota; ?></td> -->
                    <td>
                      <form method="POST" action="anggotadetail">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" >
                        <button type="submit"  class="btn btn-link mt-n1 mb-n4 text-left"><?php echo $nama; ?></a></button>
                      </form>
                    </td>
                    <td><?php echo $telepon; ?></td>
                    <td><?php echo $asal_kampus; ?></td>
                    <!-- <td align="center"><?php //echo $fotox; ?></td> -->
                    <td><?php echo $status_anggota; ?></td>
                    <td>
                      <?php
                      if($status_anggota == 'Belum Tes Wawancara'){
                        echo "
                      <a href=\"#\" type=\"button\" class=\"btn btn-info btn-icon-split\"  data-toggle=\"modal\" data-target=\"#wawancaraModal$id_pendaftaran\">
                        <span class=\"icon \"><i class=\"fas fa-comments\"></i></span>
                      </a>";

                      }
                      if($status_anggota == 'Selesai Tes'){
                      ?>
                      <a href="#" type="button" class="btn btn-success btn-icon-split"  data-toggle="modal" data-target="#terimaModal<?php echo $id; ?>">
                        <span class="icon "><i class="fas fa-check-double"></i></span>
                      </a>
                      <?php } ?>
                      <a href="#" type="button" class="btn btn-danger btn-icon-split"  data-toggle="modal" data-target="#deleteModal<?php echo $id; ?>">
                        <span class="icon "><i class="fas fa-trash"></i></span>
                      </a>
                  </td>
                </tr>
                <!-- spesial edition modal edit -->
                <div class="modal fade" id="terimaModal<?php echo $id; ?>" role="dialog">
                  <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="anggotaModalLabel">Form Terima Anggota <?php echo $nama; ?></h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form role="form" action="" method="post">
                          <input type="hidden" name="id" value="<?php echo $id; ?>">
                          <input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna; ?>">

                          <div class="form-group row d-flex justify-content-center">
                          <img src="uploads/avatar/<?php echo $foto; ?>" height="100">
                           </div>
                          <input type="hidden" class="form-control"  value="<?php echo $foto; ?>" id="foto" name="foto">
                          
                          <div class="form-group row">
                            <div class="col-md-6">
                              <label for="no_anggota" class="col-form-label">No Anggota</label>
                              <?php
                              $yy = substr(date('Y'),2,2);
                              $yy_cari = "630305.".$yy."%";


                              $no_anggota_baru = $yy.".0001";

                              $mySql = "SELECT A.no_anggota FROM anggota A WHERE  no_anggota like ? ORDER BY no_anggota DESC";
                              $stmt_cek_no_anggota = $db->prepare($mySql);
                              $stmt_cek_no_anggota->bindParam(1, $yy_cari);
                              $stmt_cek_no_anggota->execute();
                              $num_cek_no_anggota = $stmt_cek_no_anggota->rowCount();
                              if($num_cek_no_anggota!=0){
                                $row_cek_anggota = $stmt_cek_no_anggota->fetch(PDO::FETCH_ASSOC);
                                $no_anggota_terakhir = $row_cek_anggota['no_anggota'];
                                $no_anggota_terakhir_dipotong = substr($no_anggota_terakhir,4,4);
                                $no_anggota_baru_int = intval($no_anggota_terakhir_dipotong)+1;
                                $no_anggota_baru = $yy.".".str_pad($no_anggota_baru_int, 4, '0', STR_PAD_LEFT);;
                              }
                              ?>
                              <input type="text" class="form-control" id="no_anggota" value="630305.<?php echo $no_anggota_baru ?>" name="no_anggota" required/>
                            </div>
                            <div class="col-md-6">
                              <label for="tanggal_gabung" class="col-form-label">Tanggal Bergabung</label>
                              <input type="date"  value="<?php echo date('Y-m-d'); ?>"  class="form-control" id="tanggal_gabung" name="tanggal_gabung">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-md-8">
                              <label for="nama" class="col-form-label">Nama</label>
                              <input type="text" class="form-control" id="nama" value="<?php echo $nama; ?>"  name="nama">
                              <input type="hidden" class="form-control" id="foto" value="<?php echo $foto; ?>"  name="foto">
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
                              <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>" >
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
                          <!-- <div class="form-group row">
                            <div class="col-md-6">
                              <label for="bulan_mapaba" class="col-form-label">Bulan Mapaba</label>
                              <input type="text" class="form-control" id="bulan_mapaba" value="<?php echo $bulan_mapaba; ?>"  name="bulan_mapaba">
                            </div>
                            <div class="col-md-6">
                              <label for="tahun_mapaba" class="col-form-label">Tahun Mapaba</label>
                              <input type="number" class="form-control"  value="<?php echo $tahun_mapaba; ?>" id="tahun_mapaba" name="tahun_mapaba">
                            </div>
                          </div> -->
                          <div class="form-group">
                            <label for="motivasi" class="col-form-label"> Motivasi </label>
                            <textarea class="form-control" id="motivasi" name="motivasi"> <?php echo $motivasi; ?> </textarea>
                          </div> 
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" name="Simpan" class="btn btn-success">Simpan</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end edit modal -->
                <!-- spesial edition modal wawancara -->
                <?php include "valpenerimaanwawancara.php"; ?>
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
                          <input type="hidden" name="foto" value="<?php echo $foto; ?>">
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
<?php
}else{
  echo "<meta http-equiv='refresh' content='0; url=unauthorized'> ";
}
?>
