 <?php
include "includes/conf.php";
?>
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <?php echo $id; ?></h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          

<?php include "includes/badge1.php"; ?>

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Beranda Keanggotaan</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body"> 
                 <p>Selamat datang anggota yang terhormat, <?php echo $user; ?> di web Keanggotan PMII Kabupaten Banjar. Jika Anda telah memiliki kegiatan yang merupakan bagian dari PMII jangan lupa untuk mendokumentasikan pada bagian Kegiatan atau Button dibawah ini.</p>
                  <div class="row">
                  <div class="col-md-6"> 
                   <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/anggota-pmii-wide.jpg" alt="">
                  </div>
                  </div>
                  <div class="col-md-6">
                   <div class="text-center  mt-5 mb-4">
                    <a href="permohonan" class="btn btn-success btn-icon-split "  >
                      <span class="icon ">
                        <i class="fas fa-plus"></i>
                      </span>
                      <span class="text">Input Kegiatan Keanggotaan</span>
                    </a>
                  </div>
                  </div>
                  </div>
                  
                  
                  <p>Kontribusi atas segala kegiatan dan pengembangan diri Anda sangat kami apresiasi. Semoga kedepannya dapat dijadikan standar penilaian keaktifkan dan penghargaan dalam organisasi PMII.</p>
                  <a target="_blank" rel="nofollow" href="https://undraw.co/">Lihat Berita Kegiatan PMII &rarr;</a>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Progress Kaderisasi</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Direct
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Social
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Referral
                    </span>
                  </div>
                </div>
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

