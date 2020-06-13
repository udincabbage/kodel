
<div class="row">
  <h1 class="h3 text-gray-800">Test Tertulis <small><sub>(<?php echo $id; ?>)</sub></small></h1>
</div>
<div class="row">
  <form role="form" action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_kinerja" value="<?php echo $data1['id'] ?>">
    <?php
    if(isset($data1['kinerja1'])){
      $kinerja1 = $data1['kinerja1'];
      $simpan1 = "<button type=\"button\" name=\"Simpan1\" id=\"Simpan1\" class=\"btn btn-secondary btn-icon-split\"><span class=\"icon\">";
      $edit1 = "<button type=\"button\" name=\"Edit1\" id=\"Edit1\" class=\"btn btn-primary  btn-icon-split\" onClick=\"edit(1);\">";
    }else{
      $kinerja1 = "";
      $simpan1 = "<button type=\"submit\" name=\"Simpan1\" id=\"Simpan1\" class=\"btn btn-success btn-icon-split\"><span class=\"icon\">";
      $edit1 = "<button type=\"button\" name=\"Edit1\" id=\"Edit1\"  class=\"btn btn-secondary  btn-icon-split\">";
    }
    if(isset($data1['kinerja2'])){
      $kinerja2 = $data1['kinerja2'];
      $simpan2 = "<button type=\"button\" name=\"Simpan2\" id=\"Simpan2\" class=\"btn btn-secondary btn-icon-split\"><span class=\"icon\">";
      $edit2 = "<button type=\"submit\" name=\"Edit2\" id=\"Edit2\" class=\"btn btn-primary  btn-icon-split\" onClick=\"edit(2);\">";
    }else{
      $kinerja2 = "";
      $simpan2 = "<button type=\"submit\" name=\"Simpan2\" id=\"Simpan2\" class=\"btn btn-success btn-icon-split\"><span class=\"icon\">";
      $edit2 = "<button type=\"button\" name=\"Edit2\" id=\"Edit2\"  class=\"btn btn-secondary  btn-icon-split\">";
    }
    if(isset($data1['kinerja3'])){
      $kinerja3 = $data1['kinerja3'];
      $simpan3 = "<button type=\"button\" name=\"Simpan3\" id=\"Simpan3\" class=\"btn btn-secondary btn-icon-split\"><span class=\"icon\">";
      $edit3 = "<button type=\"submit\" name=\"Edit3\" id=\"Edit3\" class=\"btn btn-primary  btn-icon-split\" onClick=\"edit(3);\">";
    }else{
      $kinerja3 = "";
      $simpan3 = "<button type=\"submit\" name=\"Simpan3\" id=\"Simpan3\" class=\"btn btn-success btn-icon-split\"><span class=\"icon\">";
      $edit3 = "<button type=\"button\" name=\"Edit3\" id=\"Edit3\"  class=\"btn btn-secondary  btn-icon-split\">";
    }
    if(isset($data1['kinerja4'])){
      $kinerja4 = $data1['kinerja4'];
      $simpan4 = "<button type=\"button\" name=\"Simpan4\" id=\"Simpan4\" class=\"btn btn-secondary btn-icon-split\"><span class=\"icon\">";
      $edit4 = "<button type=\"submit\" name=\"Edit4\" id=\"Edit4\" class=\"btn btn-primary  btn-icon-split\" onClick=\"edit(4);\">";
    }else{
      $kinerja4 = "";
      $simpan4 = "<button type=\"submit\" name=\"Simpan4\" id=\"Simpan4\" class=\"btn btn-success btn-icon-split\"><span class=\"icon\">";
      $edit4 = "<button type=\"button\" name=\"Edit4\" id=\"Edit4\"  class=\"btn btn-secondary  btn-icon-split\">";
    }

    ?>
    <div class="form-group row">
      <div class="col-md-10">
        <label for="kinerja1" class="col-form-label">Periode 1  (10:00 WITA)</label>
        <input type="text" class="form-control" id="kinerja1" value="<?php echo $kinerja1 ?>"  name="kinerja1"
        <?php if(isset($data1['kinerja1']))  echo 'disabled'; ?> >
      </div>
      <div class="col-md-2 text-left">
        <?php echo $simpan1 ?>
        <i class="fas fa-save"></i>
      </span>
      <span class="text">Simpan</span>
    </button>
    <?php echo $edit1 ?>
    <span class="icon">
      <i class="fas fa-edit"></i>
    </span>
    <span class="text">Edit</span>
  </button>
</div>
</div>

<!-- Divider -->
<hr class="sidebar-divider my-0">
<div class="my-2"></div>
<?php
$kinerja2 = isset($data1['kinerja2'])?$data1['kinerja2']:"";
?>
<div class="form-group row">
  <div class="col-md-10">
    <label for="kinerja2" class="col-form-label">Periode 2  (12:00 WITA)</label>
    <input type="text" class="form-control" id="kinerja2" value="<?php echo $kinerja2 ?>"  name="kinerja2"
    <?php if(isset($data1['kinerja2']))  echo 'disabled'; ?> >
  </div>
  <div class="col-md-2 text-left">
    <?php echo $simpan2 ?>
    <i class="fas fa-save"></i>
  </span>
  <span class="text">Simpan</span></button>
  <?php echo $edit2 ?>
  <span class="icon">
    <i class="fas fa-edit"></i>
  </span>
  <span class="text">Edit</span>
</button>
</div>
</div>

<!-- Divider -->
<hr class="sidebar-divider my-0">
<div class="my-2"></div>
<?php
$kinerja3 = isset($data1['kinerja3'])?$data1['kinerja3']:"";
?>
<div class="form-group row">
  <div class="col-md-10">
    <label for="kinerja3" class="col-form-label">Periode 3  <?php if(strftime("%a")=="Fri") echo"(15:30 WITA)"; else echo "(15:00 WITA)";  ?></label>
      <input type="text" class="form-control" id="kinerja3" value="<?php echo $kinerja3 ?>"  name="kinerja3"
      <?php if(isset($data1['kinerja3']))  echo 'disabled'; ?> >
    </div>
    <div class="col-md-2 text-left">
      <?php echo $simpan3 ?>
      <i class="fas fa-save"></i>
    </span>
    <span class="text">Simpan</span></button>
    <?php echo $edit3 ?>
    <span class="icon">
      <i class="fas fa-edit"></i>
    </span>
    <span class="text">Edit</span>
  </button>
</div>
</div>

<!-- Divider -->
<!-- Libur Kinerja Ramadhan   -->
<hr class="sidebar-divider my-0">
<div class="my-2"></div>
<?php
$kinerja4 = isset($data1['kinerja4'])?$data1['kinerja4']:"";
?>
<div class="form-group row">
  <div class="col-md-10">
    <label for="kinerja4" class="col-form-label">Periode 4  (16:30 WITA)</label>
    <input type="text" class="form-control" id="kinerja4" value="<?php echo $kinerja4 ?>"  name="kinerja4"
    <?php if(isset($data1['kinerja4']))  echo 'disabled'; ?> >
  </div>
  <div class="col-md-2 text-left">
    <?php echo $simpan4 ?>
    <i class="fas fa-save"></i>
  </span>
  <span class="text">Simpan</span></button>
  <?php echo $edit4 ?>
  <span class="icon">
    <i class="fas fa-edit"></i>
  </span>
  <span class="text">Edit</span>
</button>
</div>
</div>
</form>
</div>
