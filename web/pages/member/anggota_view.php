<!--
<script src="js/lib.js"></script>
<script src="js/cekJWT.js"></script>
KEINI BISA JUA GASAN CEK LEVEL TAPI KALO PANG KOLER JS
-->
<?php
include "includes/conf.php";

// KEINI BISA JUA GASAN CEK LEVEL TAPI SEMPAT MUNCUL HALAMANNYA 1 DETIK
// if(!cekLevel(API_URL."pengguna/validate-token.php",1)){
//   echo "<meta http-equiv='refresh' content='0; url=unauthorized'> ";
// }
 ?>
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Anggota</h1>
  <div class="row">
    <div class="col-md-10">
      <p class="mb-4">Data Anggota merupakan data seluruh anggota / kader yang ada pada aplikasi ini. Data yang dipublikasi pada halaman web masyarakat hanya data anggota yang memiliki status aktif dan pasif.</p>
    </div>
    <div class="col-md-2">
     <!--  <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#anggotaModal">
        <span class="icon ">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
      </a>  -->
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
              <th>No Anggota</th>
              <th>Nama</th>
              <th>No Telepon</th>
              <th>Komisariat</th>
              <th>Foto</th>
              <th>Status</th> 
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

                if($foto==NULL) { $fotox ='
                  <a href="#" type="button" class="btn btn-warning btn-icon-split text-center"  data-toggle="modal" data-target="#fotoModal'. $id.' ">
                  <button class="btn btn-link  ">! <i class="fas fa-user"></i></button>
                  </a>
                  ';} else {
                    $fotox ='
                    <form method="POST" action="anggotadetail">
                    <input type="hidden" name="id" value="'.$id.'" >
                    <button type="submit"  class="btn btn-link mt-n3 mb-n4 "><img src="uploads/avatar/'.$foto.' " width="50px"></a></button>
                    </form>
                    ';
                  }
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $no_anggota; ?></td>
                    <td>
                      <form method="POST" action="anggotadetail">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" >
                        <button type="submit"  class="btn btn-link mt-n1 mb-n4 text-left"><?php echo $nama; ?></a></button>
                      </form>
                    </td>
                    <td><?php echo $telepon; ?></td>
                    <td><?php echo $asal_kampus; ?></td>
                    <td align="center"><?php echo $fotox; ?></td>
                    <td><?php echo $status_anggota; ?></td>
                    
                </tr>
                  

              <?php  }
            }
            ?>
          </tbody>
        </table>
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
