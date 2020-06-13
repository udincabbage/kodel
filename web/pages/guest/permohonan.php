<?php
include "includes/conf.php";

define("TAMBAH", 1);
define("UBAH", 2);
define("TERDAFTAR", 3);
define("SUDAH_TES_TERTULIS", 4);

$jwt = $_COOKIE['jwt'];
$jsonData = array(
  'jwt' => $jwt
);
$jsonDataEncoded = json_encode($jsonData);
$result_JSON = request_api($url,$jsonDataEncoded);
// print_r($result_JSON);

if(
  cekLevel(API_URL."pengguna/validate-token.php",4)
){
  if(isset($_POST['Simpan'])) {
    $nama = $_POST['nama'];
    $id_pengguna = $_POST['id_pengguna'];
    $nik = $_POST['nik'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
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

    $mySql = "INSERT INTO `pendaftaran` SET status = 0, tanggal_daftar = CURDATE(),
    id_pengguna = ?, nik = ?, nama = ?, email = ?,
    jenis_kelamin = ?, tempat_lahir = ?, tanggal_lahir = ?, telepon = ?,
    alamat = ?, desa = ?, kecamatan = ?, kabupaten = ?,
    asal_kampus = ?, fakultas = ?, prodi = ?, motivasi = ?";
    // $mySql = "INSERT INTO `anggota` SET (`status`, `no_anggota`, `tanggal_gabung`, `id_pengguna`, `nik`, `nama`, `email`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `telepon`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `asal_kampus`, `fakultas`, `prodi`, `bulan_mapaba`, `tahun_mapaba`, `motivasi`, `status_anggota`) VALUES ( '0',?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,'Daftar' ) ";
    $database = new Database();
    $db = $database->getConnection();
    $stmt = $db->prepare($mySql);
    $stmt->bindParam(1, $id_pengguna);
    $stmt->bindParam(2, $nik);
    $stmt->bindParam(3, $nama);
    $stmt->bindParam(4, $email);
    $stmt->bindParam(5, $jenis_kelamin);
    $stmt->bindParam(6, $tempat_lahir);
    $stmt->bindParam(7, $tanggal_lahir);
    $stmt->bindParam(8, $telepon);
    $stmt->bindParam(9, $alamat);
    $stmt->bindParam(10, $desa);
    $stmt->bindParam(11, $kecamatan);
    $stmt->bindParam(12, $kabupaten);
    $stmt->bindParam(13, $asal_kampus);
    $stmt->bindParam(14, $fakultas);
    $stmt->bindParam(15, $program_studi);
    $stmt->bindParam(16, $motivasi);

    if($stmt->execute()) {
      ?>
      <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Tambah Data Berhasil!</strong> Permohonan anggota dengan nama  <?php echo $nama; ?> telah disimpan
      </div>
      <?php
    }else{
      ?>
      <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Tambah Data Gagal!</strong> Permohonan anggota dengan nama  <?php echo $nama; ?> gagal disimpan
      </div>
      <?php
    }
  }

  if(isset($_POST['resetz'])) {
    $id_pengguna = $_POST['id_pengguna'];
    $mySql = "DELETE FROM pengguna_soal WHERE id_pengguna = ?";
    $database = new Database();
    $db = $database->getConnection();
    $stmt = $db->prepare($mySql);
    $stmt->bindParam(1, $id_pengguna);
    if($stmt->execute()) {

    }

  }
  if(isset($_POST['Edit'])) {
    $nama = $_POST['nama'];
    $id_pengguna = $_POST['id_pengguna'];
    $nik = $_POST['nik'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
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

    $mySql = "UPDATE  `pendaftaran` SET status = 0, tanggal_daftar = CURDATE(),
    id_pengguna = ?, nik = ?, nama = ?, email = ?,
    jenis_kelamin = ?, tempat_lahir = ?, tanggal_lahir = ?, telepon = ?,
    alamat = ?, desa = ?, kecamatan = ?, kabupaten = ?,
    asal_kampus = ?, fakultas = ?, prodi = ?, motivasi = ? WHERE id_pengguna = ?";
    // $mySql = "INSERT INTO `anggota` SET (`status`, `no_anggota`, `tanggal_gabung`, `id_pengguna`, `nik`, `nama`, `email`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `telepon`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `asal_kampus`, `fakultas`, `prodi`, `bulan_mapaba`, `tahun_mapaba`, `motivasi`, `status_anggota`) VALUES ( '0',?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,'Daftar' ) ";
    $database = new Database();
    $db = $database->getConnection();
    $stmt = $db->prepare($mySql);
    $stmt->bindParam(1, $id_pengguna);
    $stmt->bindParam(2, $nik);
    $stmt->bindParam(3, $nama);
    $stmt->bindParam(4, $email);
    $stmt->bindParam(5, $jenis_kelamin);
    $stmt->bindParam(6, $tempat_lahir);
    $stmt->bindParam(7, $tanggal_lahir);
    $stmt->bindParam(8, $telepon);
    $stmt->bindParam(9, $alamat);
    $stmt->bindParam(10, $desa);
    $stmt->bindParam(11, $kecamatan);
    $stmt->bindParam(12, $kabupaten);
    $stmt->bindParam(13, $asal_kampus);
    $stmt->bindParam(14, $fakultas);
    $stmt->bindParam(15, $program_studi);
    $stmt->bindParam(16, $motivasi);
    $stmt->bindParam(17, $id_pengguna);

    if($stmt->execute()) {
      ?>
      <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Ubah Data Berhasil!</strong> Permohonan anggota dengan nama  <?php echo $nama; ?> telah disimpan
      </div>
      <?php
    }else{
      ?>
      <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Ubah Data Gagal!</strong> Permohonan anggota dengan nama  <?php echo $nama; ?> gagal disimpan
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
  // print_r($result_JSON);
  $id_pengguna = $result_JSON['data']['id'];


  $status_form = TAMBAH;
  $mySql = "SELECT A.* FROM pendaftaran A WHERE id_pengguna = ?";
  $database = new Database();
  $db = $database->getConnection();
  $stmt = $db->prepare($mySql);
  $stmt->bindParam(1, $id_pengguna);
  $stmt->execute();
  $num = $stmt->rowCount();
  if($num>0){
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $status_form = ($row['status']==1) ? TERDAFTAR : UBAH;

    $mySql = "SELECT A.* FROM pengguna_soal A WHERE id_pengguna = ?";
    $database = new Database();
    $db = $database->getConnection();
    $stmt = $db->prepare($mySql);
    $stmt->bindParam(1, $id_pengguna);
    $stmt->execute();
    $num = $stmt->rowCount();
    if($num>0){
      $status_form = SUDAH_TES_TERTULIS;
    }
  }

  if($status_form == TERDAFTAR){
    echo "<meta http-equiv='refresh' content='0; url=unauthorized'> ";
  }

  $nama = isset($_POST['nama']) ? $_POST['nama'] : '' ;
  // $id_pengguna = isset($_POST['id_pengguna']) ? $_POST['id_pengguna'] : '';
  $nik = isset($_POST['nik']) ? $_POST['nik'] : '';
  $jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';
  $tempat_lahir = isset($_POST['tempat_lahir']) ? $_POST['tempat_lahir'] : '';
  $tanggal_lahir = isset($_POST['tanggal_lahir']) ? $_POST['tanggal_lahir'] : '';
  $telepon = isset($_POST['telepon']) ? $_POST['telepon'] : '';
  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
  $desa = isset($_POST['desa']) ? $_POST['desa'] : '';
  $kecamatan = isset($_POST['kecamatan']) ? $_POST['kecamatan'] : '';
  $kabupaten = isset($_POST['kabupaten']) ? $_POST['kabupaten'] : '';
  $asal_kampus = isset($_POST['asal_kampus']) ? $_POST['asal_kampus'] : '';
  $fakultas = isset($_POST['fakultas']) ? $_POST['fakultas'] : '';
  $program_studi = isset($_POST['program_studi']) ? $_POST['program_studi'] : '';
  $motivasi = isset($_POST['motivasi']) ? $_POST['motivasi'] : '';

  if($status_form == UBAH || $status_form == SUDAH_TES_TERTULIS){
    $nama = $row['nama'];
    $nik = $row['nik'];
    $jenis_kelamin = $row['jenis_kelamin'];
    $tempat_lahir = $row['tempat_lahir'];
    $tanggal_lahir = $row['tanggal_lahir'];
    $telepon = $row['telepon'];
    $email = $row['email'];
    $alamat = $row['alamat'];
    $desa = $row['desa'];
    $kecamatan = $row['kecamatan'];
    $kabupaten = $row['kabupaten'];
    $asal_kampus = $row['asal_kampus'];
    $fakultas = $row['fakultas'];
    $program_studi = $row['prodi'];
    $motivasi = $row['motivasi'];
  }

  ?>
  <?php
  $now = strtotime(date("Y-m-d"));
  $minage = date('Y-m-d', strtotime('- 16 year', $now));
  $maxage = date('Y-m-d', strtotime('- 50 year', $now));
  ?>

  <!-- Page Heading -->

  <div class="row">
    <h1 class="h3 text-gray-800">Permohonan Anggota <small><sub>(<?php echo $id; ?>)</sub></small></h1>
    <?php if($status_form == UBAH) {
      ?>
      <button type="submit"  class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#konfirmModal">
        <span class="icon ">
          <i class="fas fa-list"></i>
        </span>
        <span class="text">
          Tes Tertulis
        </span>
      </button>
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
              <form role="form" action="guesttestertulis" method="post">
                <input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna; ?>">
                <div class="form-group">
                  Sudah siap mengambil tes tertulis ?
                </div>

                <div class="modal-footer">
                  <button type="submit" name="insert_tes_tertulis" class="btn btn-success">Siap</button>
                  <button type="button" name="Hapus" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php
    }else if($status_form == SUDAH_TES_TERTULIS){
      ?>
      <button type="reset"  class="btn btn-success btn-icon-split">
        <span class="text">
          Anda Sudah Tes Tertulis, Tunggu Informasi Tes Wawancara
        </span>
      </button>
      <!-- <form role="form" action="" method="post">
        <input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna; ?>">
          <button type="submit" name="resetz" class="btn btn-danger">resetz</button>
        </div>
      </form> -->
      <?php
    }

    ?>
  </div>
  <div class="row">
    <div class="card shadow col-md-12 mb-4">
      <div class="card-body">
        <form method="post" action="" >
          <div class="form-group row">
            <div class="col-md-12">
              <label for="nama" class="col-form-label">Nama</label>
              <input type="hidden" class="form-control" id="id_pengguna" name="id_pengguna" value="<?php echo $id_pengguna ?>">
              <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <label for="nik" class="col-form-label">Nomor Induk Kependudukan (KTP)</label>
              <input type="text" class="form-control" id="nik" name="nik" value="<?php echo $nik ?>">
            </div>
            <div class="col-md-6">
              <label for="jenis_kelamin" class="col-form-label">Jenis Kelamin</label>
              <div class="radio">
                <label class="radio-inline"><input type="radio" name="jenis_kelamin" value="Laki-laki" <?php if($jenis_kelamin=="Laki-laki") echo " checked" ?>> Laki-laki </label>&nbsp;&nbsp;&nbsp;
                <label class="radio-inline"><input type="radio" value="Perempuan" name="jenis_kelamin"  <?php if($jenis_kelamin=="Perempuan") echo " checked" ?>> Perempuan</label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <label for="tempat_lahir" class="col-form-label">Tempat Lahir</label>
              <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $tempat_lahir ?>">
            </div>
            <div class="col-md-6">
              <label for="tanggal_lahir" class="col-form-label">Tanggal Lahir</label>
              <input type="date" class="form-control"  value="<?php echo $minage;?>"  min="<?php echo $maxage;?>" max="<?php echo $minage;?>"  id="tanggal_lahir" name="tanggal_lahir">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <label for="telepon" class="col-form-label">Telepon</label>
              <input type="text" class="form-control" id="telepon" name="telepon"  value="<?php echo $telepon ?>">
            </div>
            <div class="col-md-6">
              <label for="email" class="col-form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email"  value="<?php echo $email ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="alamat" class="col-form-label">Alamat </label>
            <textarea class="form-control" id="alamat" name="alamat"> <?php echo $alamat ?></textarea>
          </div>
          <div class="form-group row">
            <div class="col-md-4">
              <label for="desa" class="col-form-label">Desa/Kelurahan</label>
              <input type="text" class="form-control" id="desa" name="desa"  value="<?php echo $desa ?>">
            </div>
            <div class="col-md-4">
              <label for="kecamatan" class="col-form-label">Kecamatan</label>
              <input type="text" class="form-control" id="kecamatan" name="kecamatan"  value="<?php echo $kecamatan ?>">
            </div>
            <div class="col-md-4">
              <label for="kabupaten" class="col-form-label">Kabupaten</label>
              <input type="text" class="form-control" id="kabupaten" name="kabupaten"  value="<?php echo $kabupaten ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="asal_kampus" class="col-form-label">Asal Komisariat / Kampus</label>
            <input type="text" class="form-control" id="asal_kampus" name="asal_kampus" value="<?php echo $asal_kampus ?>">
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <label for="fakultas" class="col-form-label">Fakultas</label>
              <input type="text" class="form-control" id="fakultas" name="fakultas"  value="<?php echo $fakultas ?>">
            </div>
            <div class="col-md-6">
              <label for="program_studi" class="col-form-label">Program Studi</label>
              <input type="text" class="form-control" id="program_studi" name="program_studi"  value="<?php echo $program_studi ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="motivasi" class="col-form-label"> Motivasi </label>
            <textarea class="form-control" id="motivasi" name="motivasi"><?php echo $motivasi ?></textarea>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            <?php
            if($status_form == TAMBAH){
              echo  "<button class=\"btn btn-success\" name=\"Simpan\" type=\"submit\" >Simpan</button>";
            }else if ($status_form == UBAH){
              echo  "<button class=\"btn btn-success\" name=\"Edit\" type=\"submit\" >Simpan Edit</button>";
            }else{
              echo  "<button class=\"btn btn-secondary\" type=\"reset\" >Sudah Tes Tertulis</button>";
            }
            ?>
          </div>
        </form>
      </div>
    </div>
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

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<?php
}else{
  echo "<meta http-equiv='refresh' content='0; url=unauthorized'> ";
}
?>
