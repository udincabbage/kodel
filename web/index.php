<script type="text/javascript">
function getCookie(cname){
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' '){
            c = c.substring(1);
        }

        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

var jwt = getCookie("jwt");
if(jwt==""){
  window.location.replace("beranda.php");
}
</script>

<!DOCTYPE html>
<html lang="en">
<?php include "includes/lib.php"; ?>
<?php include "includes/header.php"; ?>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">


<?php include "includes/sidebar.php"; ?>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


<?php include "includes/topbar.php"; ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">


<?php include "includes/files.php"; ?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; UNISKA 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->


<?php include "includes/footer.php"; ?>

</body>

</html>
