<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>MUNIHUAYTARA</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Munihuaytara, municipalidad de huaytara" name="keywords">
  <meta content="Municipalidad provincial de huaytara, Capital Arqueológica de Huancavelica" name="description">

  <!-- Favicons -->
  <link href="img/logo/escudo1.png" rel="icon">
  <link href="img/logo/escudo1.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <!-- =======================================================
    Theme Name: NewBiz
    Theme URL: https://bootstrapmade.com/newbiz-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v5.0"></script>
  <!--==========================
  Header
  ============================-->
  <header id="header" class="fixed-top">

    <div class="info_contact">

      <div class="container">

        <div class="row">

          <div class="col-lg-6  d-none d-sm-block float-left contact">
            <i class="fa fa-phone"></i> Central Telefónica: 973 015 142 - -
            <i class="fa fa-whatsapp"></i> +51 973 015 142
          </div>
          <div class="col-lg-6 contact-icons ">
            <a href="#"><i class="fa fa-facebook-square"></i></a>
            <a href="#"><i class="fa fa-whatsapp"></i></a>
            <a href="#"><i class="fa fa-twitter-square"></i></a>
            <a href="#"><i class="fa fa-youtube-square"></i></a>

          </div>
        </div>
      </div>
    </div>

    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <h1 class="text-light"><a href="#header"><span>Municipalidad Huaytará</span></a></h1> -->
        <a href="index.php" class="scrollto"><img src="img/logo/LOGO PRINCIPAL.png" alt="" class="img-fluid"></a>
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <?php
          require_once './clases/Menuweb.php';
          $menuweb = new Menuweb();
          $menuweb->listar_menu_principal();
          ?>
        </ul>
      </nav><!-- .main-nav -->

    </div>
  </header><!-- #header -->


  <div class=" header-container">
  <div class="row center">
    <h2>.</h2> 
  </div>
  </div>
  .
  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="about" class="p-3 mt-3 ml-3">
    <div class="col-8">    
      <h1 class="d-inline"><b>BARRIDO DE </b> </h1>
      <h1 class="text-info d-inline"><b>CALLES</b> </h1>
      <hr class= "text-info mt-0" width=10%  align="left" style="border-top: 10px solid"/>
      <div>
        <div>
          
            <h5 class="mt-3"><b>LIMPIEZA DE LAS CALLES</b></h5>
            <hr class="text-info"  />
            <p class="text-justify">La Municipalidad Provincial de Huaytará, viene realizando actividades de barrido de calles,
            que comprende la limpieza y recolección manual de los residuos de las calles, avenidas,
            parques, jardines y plaza pública, el cual se efectúa principalmente en las superficies
            pavimentadas, donde se recolecta papeles y plásticos. Así mismo el equipamiento del
            personal de banido está compuesto por escobas y recogedores. El personal de barrido
            tiene sus uniformes para realízar diferentes actividades en campo: pantalón, camisa, botas,
            guantes, mascarillas, sombreros.</p>
          
        </div>
        
        
        <h1 class="d-inline"><b>RECOJO DE </b> </h1>
      <h1 class="text-info d-inline"><b>RESIDUOS SÓLIDOS</b> </h1>
      <hr class= "text-info mt-0" width=10%  align="left" style="border-top: 10px solid"/>
        <div>
        <div>
          <div>
            <h5 class="mt-3"><b> OBJETIVOS</b></h5>
            <hr class="text-info"  />
            <p class="text-justify">
                
                <ol type="a"> 
                <li>Crear y consolidar el hábito de la lectura en los niños desde los primeros años.
                <li>Prestar apoyo a la educación, individual y autodidacta, y a la educación formal de todos los niveles.
                <li>Brindar posibilidades para un desarrollo personal creativo.
                <li>Estimular la imaginación y creatividad de niños y jóvenes.
                <li>Fomentar el conocimiento del patrimonio cultural y la valoración de las artes y de las innovaciones y logros científicos.
                <li>Facilitar el acceso a las experiencias culturales de todas las manifestaciones artísticas.
                </ol>
  
            </p>
          </div>
        </div>
        
        
        <h3 class="d-inline"><b>Documentos de Interés:</b> </h3>
        <a href="./docs-interes/BARRIDO DE CALLES.pdf" target="_blank"> <i class="fa fa-eye"></i>  Informe de limpieza de calles y recojo de residuos municipales</a>

      </div>
      
      
      
      </div>
      
      
      
    </section><!-- #about -->


    <!--==========================
      Services Section
    ============================-->
    <section class="section-notices">
      <h3 class="title">Noticias Recientes</h3>
      <div class="container">

        <div class="owl-carousel notice-carousel owl-theme">
          <?php
          require_once './conexion/conexion.php';
          require_once './clases/publicaciones.php';
          $publicaciones = new publicaciones();
          $publicaciones->noticias_recientes();
          ?>

        </div>
      </div>
    </section>
    </div>
  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 map footer-info">
            <h3>Huaytará</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3877.8855003854896!2d-75.3549885857074!3d-13.603804626514506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9111bd9cf2cf6519%3A0xab36457a5222e558!2sHuaytar%C3%A1%2009600!5e0!3m2!1ses-419!2spe!4v1581716745574!5m2!1ses-419!2spe" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Accesos Directos</h4>
            <ul>
              <li><a href="">Inicio</a></li>
              <li><a href="#about">Nosotros</a></li>
              <li><a href="#services">Categorías</a></li>
              <li><a href="#clients">Enlaces</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contanctos:</h4>
            <p>
              Calle Municipal N° 100 <br>
              Plaza Principal<br>
              Huancavelica <br>
              <strong>Tel:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> contacto@munihuaytara.gob.pe mesadepartes@munihuaytara.gob.pe<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="https://web.facebook.com/MuniHuaytara" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Suscripciones</h4>
            <p>Suscríbite a Nuestra página para recibir las noticias más actuales.</p>
            <form action="" method="post">
              <input type="email" name="email" placeholder="Email"><input type="submit" value="Suscríbeme">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Municipalidad Provincial de <strong>Huaytará</strong>. Todos Los derechos Reservados
      </div>
      <div class="credits">

      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/mobile-nav/mobile-nav.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>
<style>
  .img {
    width: 65%;
    height: 70%;
    margin: auto;
    display: block;
    padding-top: 3px;
    padding-bottom: 3px;
  }

  h5 {
    color: #007BFF;
  }

  .cer {
    margin-top: 13px;
  }
</style>

</html>