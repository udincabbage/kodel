<?php
include "includes/conf.php"; 
if(isset($_POST['id'])) {
	$id = $_POST['id'];
	$mySql = "SELECT anggota.* FROM anggota WHERE id=? ORDER BY updated_at DESC ";
	$database = new Database();
	$db = $database->getConnection();
	$stmt = $db->prepare($mySql);
	$stmt->bindParam(1, $id);
	$stmt->execute();  
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	extract($row); 
	}
}
 $id_anggota = $id;

//cung

 // $no_anggota = $_POST['no_anggota'];
      // $tanggal_gabung = $_POST['tanggal_gabung'];
      // $nama = $_POST['nama']; 
      // // $id_pengguna = 2; 
      // $username = $_POST['username']; 
      // $password = $_POST['password']; 
      // $nik = $_POST['nik']; 
      // $jenis_kelamin = $_POST['jenis_kelamin']; 
      // $tempat_ = $_POST['tempat_lahir']; 
      // $tanggal_lahir = $_POST['tanggal_lahir']; 
      // $telepon = $_POST['telepon']; 
      // $email = $_POST['email']; 
      // $alamat = $_POST['alamat']; 
      // $desa = $_POST['desa']; 
      // $kecamatan = $_POST['kecamatan']; 
      // $kabupaten = $_POST['kabupaten']; 
      // $asal_kampus = $_POST['asal_kampus']; 
      // $fakultas = $_POST['fakultas']; 
      // $program_studi = $_POST['program_studi']; 
      // $bulan_mapaba = $_POST['bulan_mapaba']; 
      // $tahun_mapaba = $_POST['tahun_mapaba']; 
      // $motivasi = $_POST['motivasi']; 
	  
	  //cung end
?> 
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Anggota</h1> 
          </div>
 
          <div class="row">

            <div class="col-lg-6"> 

				<!-- Collapsable Card Example -->
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary">Profil Anggota</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample1">
                  <div class="card-body">
					 <div class="text-center">
						 <div id="gaya">
						 <div id="koyo"> 
						 <img id="my_image" class="card-img-top" src="uploads/avatar/<?php echo $foto ? $foto : 'default.jpg' ?>" style="width:40%">
						 </div> 
						 </div>
					</div> 
				   <table class="table table-hover">
					<tr>
					<td>Nama</td>
					<td>:</td>
					<td> <?php echo $nama; ?>  <small>(<?php echo $id; ?>)</small></td>
					</tr>
					<tr>
					<td>No Anggota</td>
					<td>:</td>
					<td>  <?php echo $no_anggota; ?></td>
					</tr>
					<tr>
					<td>NIK</td>
					<td>:</td>
					<td>  <?php echo $nik; ?></td>
					</tr>
					<tr>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td>  <?php echo $jenis_kelamin; ?></td>
					</tr>
					<tr>
					<td>Tempat, Tanggal Lahir</td>
					<td>:</td>
					<td>  <?php echo $tempat_lahir.", ".indonesiaTgl($tanggal_lahir); ?></td>
					</tr>
					<tr>
					<td>No Telepon</td>
					<td>:</td>
					<td>  <?php echo $telepon; ?></td>
					</tr>
					<tr>
					<td>Email</td>
					<td>:</td>
					<td>  <?php echo $email; ?></td>
					</tr>
					<tr>
					<td>NIK</td>
					<td>:</td>
					<td>  <?php echo $nik; ?></td>
					</tr>
					<tr>
					<td>Alamat</td>
					<td>:</td>
					<td>  <?php echo $alamat; ?>, <?php echo $desa.", ".$kecamatan.", ".$kabupaten; ?> </td>
					</tr>
                    </table>
					
					
                  </div>
                </div>
              </div>

            
				<!-- Collapsable Card Example -->
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary">Kesekretariatan</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample2">
                  <div class="card-body">
                    
					
					<table class="table table-hover">
					<tr>
					<td>Status Keaktifan</td>
					<td>:</td>
					<td>  <?php echo $status_anggota; ?></td>
					</tr>
					<tr>
					<td>Tanggal Bergabung</td>
					<td>:</td>
					<td>  <?php echo $tanggal_gabung; ?></td>
					</tr>
					<tr>
					<td>Komisariat/Kampus</td>
					<td>:</td>
					<td>  <?php echo $asal_kampus; ?></td>
					</tr>
					<tr>
					<td>Fakultas, Prodi</td>
					<td>:</td>
					<td>  <?php echo $fakultas.", ".$prodi; ?></td>
					</tr>
					<tr>
					<td>Mapaba</td>
					<td>:</td>
					<td>  <?php echo $bulan_mapaba." ".$tahun_mapaba; ?></td>
					</tr>
					<tr>
					<td>Motivasi</td>
					<td>:</td>
					<td>  <?php echo $motivasi; ?></td>
					</tr> 
					</table>
                  </div>
                </div>
              </div>

            </div>

            <div class="col-lg-6">
				
				<!-- Collapsable Card Example -->
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary">Hasi Tes & Wawancara</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample3">
                  <div class="card-body">
				  <table class="table table-hover">
				<?php 
				// echo $nik;
				$Sql1 = "SELECT tes_tertulis.nilai AS nilai_tertulis, tes_wawancara.nilai AS nilai_wawancara FROM tes_tertulis LEFT JOIN tes_wawancara ON tes_wawancara.nik=tes_tertulis.nik WHERE tes_tertulis.nik=? ";
				$database = new Database();
				$db = $database->getConnection();
				$stmt1 = $db->prepare($Sql1);
				$stmt1->bindParam(1, $nik);
				$stmt1->execute();  
				$num = $stmt1->rowCount();
				$no  = 1;
				if($num==0){
					?>
					<tr>
						<td colspan="3">Data Tidak Ada</td>
					</tr>
					<?php
				} else {
					while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
					extract($row1); 
					
				?> 
                    <tr>
					<td> Tes Tertulis </td>
					<td>:</td>
					<td><?php echo $nilai_tertulis; ?></td>
					</tr> 
                    <tr>
					<td> Tes Wawancara </td>
					<td>:</td>
					<td><?php echo $nilai_wawancara; ?></td>
					</tr> 
				<?php 
					} 
				} 
				?>
					</table>
                  </div>
                </div>
              </div>

              <!-- Collapsable Card Example -->
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample4" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary">Pendidikan</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample4">
                  <div class="card-body">
				  <table class="table table-hover">
				  <tr>
				  <th>Tempat Pendidikan</th>
				  <th>Jenjang</th>
				  <th>Tanggal Ijazah</th>
				  <th>File Bukti</th>
				  </tr>
				<?php 
				// echo $id;
				$Sql1 = "SELECT pendidikan.* FROM pendidikan WHERE id_anggota=? AND status=1 ORDER BY tanggal_ijazah DESC ";
				$database = new Database();
				$db = $database->getConnection();
				$stmt1 = $db->prepare($Sql1);
				$stmt1->bindParam(1, $id_anggota);
				$stmt1->execute();  
				$num = $stmt1->rowCount();
				$no  = 1;
				if($num==0){
					?>
					<tr>
						<td colspan="4">Data Tidak Ada</td>
					</tr>
					<?php
				} else {
					while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
					extract($row1); 
					
				?> 
                    <tr>
					<td><?php echo $nama_pendidikan; ?></td>  
					<td><?php echo $jenjang_pendidikan; ?></td>  
					<td><?php echo indonesiaTgl($tanggal_ijazah); ?></td>   
					<td align="center"><a href="uploads/dokumen/<?php echo $file_bukti; ?>" class="btn btn-link mt-n4 mb-n4" target="_blank"><i class="fas fa-file"></i></a></td> 
					</tr> 
				<?php					
					} 
				} 
				?>
					</table>
                  </div>
                </div>
              </div>

              <!-- Collapsable Card Example -->
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample5" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary">Keterampilan</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample5">
                  <div class="card-body">
				  <table class="table table-hover">
				  <tr>
				  <th>Keterampilan</th>
				  <th>Keterangan</th>
				  <th>Tanggal Bukti</th>
				  <th>File Bukti</th>
				  </tr>
				<?php 
				 // echo $id;
				$Sql2 = "SELECT keterampilan.* FROM keterampilan WHERE id_anggota=? AND status=1 ORDER BY tanggal_bukti DESC ";
				$database = new Database();
				$db = $database->getConnection();
				$stmt2 = $db->prepare($Sql2);
				$stmt2->bindParam(1, $id_anggota);
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
					
				?> 
                    <tr>
					<td><?php echo $nama_keterampilan; ?></td>  
					<td><?php echo $keterangan; ?></td>  
					<td><?php echo indonesiaTgl($tanggal_bukti); ?></td>  
					<td align="center"><a href="uploads/dokumen/<?php echo $file_bukti; ?>" target="_blank"><i class="fas fa-file"></i></a></td>  
					</tr> 
				<?php					
					} 
				} 
				?>
					</table>
                  </div>
                </div>
              </div>

              <!-- Collapsable Card Example -->
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample6" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary">Pengalaman</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample6">
                  <div class="card-body">
				  <table class="table table-hover">
				  <tr>
				  <th>Kegiatan</th>
				  <th>Keterangan</th>
				  <th>Tanggal Bukti</th>
				  <th>File Bukti</th>
				  </tr>
				<?php 
				 // echo $id;
				$Sql2 = "SELECT pengalaman.* FROM pengalaman WHERE id_anggota=? AND status=1 ORDER BY tanggal_bukti DESC ";
				$database = new Database();
				$db = $database->getConnection();
				$stmt2 = $db->prepare($Sql2);
				$stmt2->bindParam(1, $id_anggota);
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
					
				?> 
                    <tr>
					<td><?php echo $nama_kegiatan; ?></td>  
					<td><?php echo $keterangan; ?></td>  
					<td><?php echo indonesiaTgl($tanggal_bukti); ?></td>  
					<td align="center"><a href="uploads/dokumen/<?php echo $file_bukti; ?>" target="_blank"><i class="fas fa-file"></i></a></td>  
					</tr> 
				<?php					
					} 
				} 
				?>
					</table>
                  </div>
                </div>
              </div>

            </div>

          </div>
 