<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PMII Kabupaten Banjar</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap css -->
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- vendorraries CSS Files -->
  <link href="vendor/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="vendor/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/font-awesome.min.css" rel="stylesheet">
  <link href="vendor/animate/animate.min.css" rel="stylesheet">
  <link href="vendor/modal-video/css/modal-video.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/custom.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: eStartup
    Theme URL: https://bootstrapmade.com/estartup-bootstrap-landing-page-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <header id="header" class="header header-hide">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="./" class="scrollto"><span>Banjarkab</span>PMII</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">beranda</a></li>
          <li><a href="#register">Gabung</a></li>
          <li><a href="#about-us">Tentang Kami</a></li>
          <li><a href="#afiliasi">Afiliasi</a></li>
          <li><a href="#team">Panitia</a></li>
          <!-- <li class="menu-has-children"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li> -->
          <li><a href="#blog">Berita</a></li>
          <li><a href="#contact">Hubungi Kami</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero" class="wow fadeIn">
    <div class="hero-container">
      <h1>Selamat Datang Pemuda Indonesia</h1>
      <h2>Mari bergerak memajukan tanah banjar dengan nilai islami</h2>
      <img src="img/layar-pmii.png" alt="PMII Layar">
      <a href="#register" class="btn-get-started scrollto">Bergabung Segera!</a>
     <!-- <div class="btns">
        <a href="#"><i class="fa fa-apple fa-3x"></i> App Store</a>
        <a href="#"><i class="fa fa-play fa-3x"></i> Google Play</a>
        <a href="#"><i class="fa fa-windows fa-3x"></i> windows</a>
      </div>  -->
    </div>
  </section><!-- #hero -->

  <!--==========================
    Get Started Section
  ============================-->
  <section id="register" class="padd-section text-center wow fadeInUp">

    <div class="container">
      <div class="section-title text-center">

        <h2>Bergabung bersama kami </h2>
        <p class="separator">Komunitas Pemuda Islam Kabupaten Banjar</p>

      </div>
    </div>

    <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Registerasi & Buat Akun Anda</h1>
                <p>Dengan melakukan registerasi berarti Anda mengajukan diri untuk bergabung dalam keanggotaan PMII kab. Banjar</p>
              </div>
              <form class="user" id="sign_up" method="POST">
                <div class="form-group">
                  <input type="text" name="user" class="form-control form-control-user" id="user" placeholder="Email Address" required>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="repeatPassword" class="form-control form-control-user" id="repeatPassword" placeholder="Repeat Password" required>
                  </div>
                </div>
                <hr>
                <p align="center" id="jumlahan"></p>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="hasil" name="hasil" placeholder="Captcha">
                </div>
                <hr>
                <button type="submit" class="btn btn-primary btn-user btn-block" name="button">Register Account</button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="#">Lupa Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.php">Sudah memiliki akun? Login disini!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  </section>

  <!--==========================
    About Us Section
  ============================-->
  <section id="about-us" class="about-us padd-section wow fadeInUp">
    <div class="container">
      <div class="row justify-content-center">

        <div class="col-md-5 col-lg-5">
          <img src="img/anggota-pmii.jpg" alt="About">
        </div>

        <div class="col-md-7 col-lg-5">
          <div class="about-content">

            <h2><span>PMII</span>Kab. Banjar </h2>
            <p>Organisasi Pergerakan Mahasiswa Islam Indonesia Kabupaten Banjar.
            </p>

            <ul class="list-unstyled">
              <li><i class="fas fa-angle-right"></i>Pemuda Islami</li>
              <li><i class="fas fa-angle-right"></i>Penyampai Aspirasi Masyarakat Banua</li>
              <li><i class="fas fa-angle-right"></i>Perkumpulan syariah Islam</li>
              <li><i class="fas fa-angle-right"></i>Membangun Silaturahmi</li>
              <li><i class="fas fa-angle-right"></i>Membangun empati</li>
            </ul>

          </div>
        </div>

      </div>
    </div>
  </section>

  <!--==========================
    afiliasi Section
  ============================-->

  <section id="afiliasi" class="padd-section text-center wow fadeInUp">

    <div class="container">
      <div class="section-title text-center">
        <h2>Afiliasi PMII Kab Banjar</h2>
        <p class="separator">Kami terhubung dan saling mendukung dengan berbagai elemen daerah</p>
      </div>
    </div>

    <div class="container">
      <div class="row">

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="img/afiliasi/nu.png" alt="img" class="img-fluid">
            <h4>Nahdatul Ulama</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="img/afiliasi/banjar.png" alt="img" class="img-fluid">
            <h4>Pemkab Kab. Banjar</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="img/afiliasi/ansor.png" alt="img" class="img-fluid">
            <h4>GP Ansor</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="img/afiliasi/teknobara.png" alt="img" class="img-fluid">
            <h4>Teknobara</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!--==========================
    Video Section
  ============================-->

  <section id="video" class="text-center wow fadeInUp">
    <div class="overlay">
      <div class="container-fluid container-full">

        <div class="row">
          <a href="#" class="js-modal-btn play-btn" data-video-id="s22ViV7tBKE"></a>
        </div>

      </div>
    </div>
  </section>

  <!--==========================
    Team Section
  ============================-->
  <section id="team" class="padd-section text-center wow flip">

    <div class="container">
      <div class="section-title text-center">

        <h2>Panitia PMII 2019/2020</h2>
        <p class="separator">Kepanitian tahun 2019/2020 pada PMII Kab. Banjar</p>

      </div>
    </div>

    <div class="container">
      <div class="row">

        <div class="col-md-6 col-md-4 col-lg-3">
          <div class="team-block bottom">
            <img src="img/team/1.jpg" class="img-responsive" alt="img">
            <div class="team-content">
              <ul class="list-unstyled">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              </ul>
              <span>Penasehat</span>
              <h4>Kimberly Tran</h4>
            </div>
          </div>
        </div>

       <div class="col-md-6 col-md-4 col-lg-3">
          <div class="team-block bottom">
            <img src="img/team/2.jpg" class="img-responsive" alt="img">
            <div class="team-content">
              <ul class="list-unstyled">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              </ul>
              <span>Ketua</span>
              <h4>Kimberly Tran</h4>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-md-4 col-lg-3">
          <div class="team-block bottom">
            <img src="img/team/3.jpg" class="img-responsive" alt="img">
            <div class="team-content">
              <ul class="list-unstyled">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              </ul>
              <span>Wakil Ketua</span>
              <h4>Kimberly Tran</h4>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-md-4 col-lg-3">
          <div class="team-block bottom">
            <img src="img/team/4.jpg" class="img-responsive" alt="img">
            <div class="team-content">
              <ul class="list-unstyled">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              </ul>
              <span>Sekretaris</span>
              <h4>Kimberly Tran</h4>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>


  <!--==========================
    Blog Section
  ============================-->
  <section id="blog" class="padd-section wow jackInTheBox">

    <div class="container">
      <div class="section-title text-center">

        <h2>Berita Terkini</h2>
        <p class="separator">Informasi kegiatan terkini dari PMII Kab. Banjar</p>

      </div>
    </div>

    <div class="container">
      <div class="row">

        <div class="col-md-6 col-lg-4">
          <div class="block-blog text-left">
            <a href="#"><img src="img/blog/blog-image-1.jpg" alt="img"></a>
            <div class="content-blog">
              <h4><a href="#">whats isthe difference between good and bat typography</a></h4>
              <span>05, juin 2017</span>
              <a class="pull-right readmore" href="#">read more</a>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="block-blog text-left">
            <a href="#"><img src="img/blog/blog-image-2.jpg" class="img-responsive" alt="img"></a>
            <div class="content-blog">
              <h4><a href="#">whats isthe difference between good and bat typography</a></h4>
              <span>05, juin 2017</span>
              <a class="pull-right readmore" href="#">read more</a>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="block-blog text-left">
            <a href="#"><img src="img/blog/blog-image-3.jpg" class="img-responsive" alt="img"></a>
            <div class="content-blog">
              <h4><a href="#">whats isthe difference between good and bat typography</a></h4>
              <span>05, juin 2017</span>
              <a class="pull-right readmore" href="#">read more</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!--==========================
    Contact Section
  ============================-->
  <section id="contact" class="padd-section wow fadeInUp">

    <div class="container">
      <div class="section-title text-center">
        <h2>Hubungi Kami</h2>
        <p class="separator">Hubungi kami pada informasi berikut:</p>
      </div>
    </div>

    <div class="container">
      <div class="row justify-content-center">

        <div class="col-lg-3 col-md-4">

          <div class="info">
            <div>
              <i class="fa fa-map-marker"></i>
              <p>A. Yani Km.45 Gedung PMII Kab. Banjar<br>Martapura, Kalimantan Selatan</p>
            </div>

            <div class="email">
              <i class="fa fa-envelope"></i>
              <p>pmii@example.com</p>
            </div>

            <div>
              <i class="fa fa-phone"></i>
              <p>+86253 7899 7799</p>
            </div>
          </div>

          <div class="social-links">
            <a href="#" class="twitter"><i class="fas fa-twitter"></i></a>
            <a href="#" class="facebook"><i class="fas fa-facebook"></i></a>
            <a href="#" class="instagram"><i class="fas fa-instagram"></i></a>
            <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
          </div>

        </div>

        <div class="col-lg-5 col-md-8">
          <div class="form">
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <form action="" method="post" role="form" class="contactForm">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validation"></div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section><!-- #contact -->

  <!--==========================
    Footer
  ============================-->
  <footer class="footer">
    <div class="container">

    <!--
      <div class="row">

        <div class="col-md-12 col-lg-4">
          <div class="footer-logo">

            <a class="navbar-brand" href="#">PMII Kab. Banjar</a>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the.</p>

          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-2">
          <div class="list-menu">

            <h4>Abou Us</h4>

            <ul class="list-unstyled">
              <li><a href="#">About us</a></li>
              <li><a href="#">afiliasi item</a></li>
              <li><a href="#">Live streaming</a></li>
              <li><a href="#">Privacy Policy</a></li>
            </ul>

          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-2">
          <div class="list-menu">

            <h4>Abou Us</h4>

            <ul class="list-unstyled">
              <li><a href="#">About us</a></li>
              <li><a href="#">afiliasi item</a></li>
              <li><a href="#">Live streaming</a></li>
              <li><a href="#">Privacy Policy</a></li>
            </ul>

          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-2">
          <div class="list-menu">

            <h4>Support</h4>

            <ul class="list-unstyled">
              <li><a href="#">faq</a></li>
              <li><a href="#">Editor help</a></li>
              <li><a href="#">Contact us</a></li>
              <li><a href="#">Privacy Policy</a></li>
            </ul>

          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-2">
          <div class="list-menu">

            <h4>Abou Us</h4>

            <ul class="list-unstyled">
              <li><a href="#">About us</a></li>
              <li><a href="#">afiliasi item</a></li>
              <li><a href="#">Live streaming</a></li>
              <li><a href="#">Privacy Policy</a></li>
            </ul>

          </div>
        </div>

      </div>

      -->
    </div>

    <div class="copyrights">
      <div class="container">
        <p>2020 &copy; Universitas Islam Kalimantan Muhammad Arsyad Al Banjari</p>
        <div class="credits">
          Redesigned by <a href="https://teknobara.co.id/">nKIT</a>
        </div>
      </div>
    </div>

  </footer>



  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/jquery/jquery-migrate.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/superfish/hoverIntent.js"></script>
  <script src="vendor/superfish/superfish.min.js"></script>
  <script src="vendor/easing/easing.min.js"></script>
  <script src="vendor/modal-video/js/modal-video.js"></script>
  <script src="vendor/owlcarousel/owl.carousel.min.js"></script>
  <script src="vendor/wow/wow.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
  <script src="vendor/bootbox/bootbox.min.js"></script>
  <script src="js/lib.js"></script>
  <script src="js/pages/register.js"></script>

</body>
</html>
