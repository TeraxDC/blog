<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>MUNIHUAYTARA | Visitas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Munihuaytara, municipalidad de huaytara, ricardo yauricasa" name="keywords">
    <meta content="Municipalidad provincial de huaytara, Capital Arqueológica de Huancavelica" name="description">

    <!-- Favicons -->
    <link href="img/logo/escudo1.png" rel="icon">
    <link href="img/logo/escudo1.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700"
        rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/datatables/datatables.min.css" rel="stylesheet">

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
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v5.0"></script>
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
                <a href="index.php" class="scrollto"><img src="img/logo/LOGO PRINCIPAL.png" alt=""
                        class="img-fluid"></a>
            </div>

            <nav class="main-nav float-right d-none d-lg-block">
                <ul>
                    <?php
            require_once './clases/Menuweb.php';
            $menuweb=new Menuweb();
            $menuweb->listar_menu_principal();
          ?>
                </ul>
            </nav><!-- .main-nav -->

        </div>
    </header><!-- #header -->

    <!--==========================
    Intro Section
  ============================-->

    <!--<div id="slider-intro" class="owl-carousel owl-theme ">-->
    <?php
//    require_once './conexion/conexion.php';
//    require_once './clases/sliders.php';
//    $slider=new Sliders();
//    $slider->listar_slider();
    ?>
    <!--</div>-->
    <script type="text/javascript">
//      document.addEventListener("DOMContentLoaded", function() {
//    alert(document.getElementById('slider-intro').offsetWidth);
//});

    </script>
    <!--==========================
      Why Us Section
    ============================-->
    <section id="why-us" class=" wow fadeIn">
        <div class="container">
            <header class="section-header header-loultimo">
                <h3>Lo Último</h3>

            </header>

            <div class="row row-eq-height justify-content-center">
                <div class="owl-carousel lo_ultimo owl-theme">
                    <?php
            require_once './clases/publicaciones.php';
                    $publicaciones=new publicaciones();
                    $publicaciones->lista_noticias_noticias();
            ?>
                    <div class="item more_notices">
                        <div class="row ">
                            <a href="publicaciones.php?idcat=2"><i class="fa fa-arrow-right "></i><br>
                                Click para Ver mas
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>


    <main id="main">

        <!--==========================
      About Us Section
    ============================-->
        <section id="about">
            <div class="container">

                <!--        <header class="section-header">
               <h3>ÚLTIMAS NOTICIAS</h3>
               </header>-->
                <h3>  Ingresar Visitas a Funcionarios de la Municipalidad</h3>
                
                <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                
                <form name="Insertar" action="adminVisitas.php" method="POST">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            Fecha de Ingreso:</label>
                        <div class="col-sm-3">
                            <input type="date" name="fecha" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Nombre de
                            Visitante:</label>
                        <div class="col-sm-10">
                            <input type="text" name="nombre" class="form-control"
                                placeholder="Ejemplo: Juan Perez Perez">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-2 col-form-label">DNI de
                            visitante:</label>
                        <div class="col-sm-10">
                            <input type="text" name="dni" class="form-control" placeholder="Ejemplo: 23145678">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Motivo de la
                            visita:</label>
                        <div class="col-sm-10">
                            <input type="text" name="motivo" class="form-control"
                                placeholder="Ejemplo: Cita con el alcalde">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Oficina de
                            Funcionario</label>
                        <div class="col-sm-10">
                            <input type="text" name="oficina" class="form-control" placeholder="Ejemplo: Alcaldía">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Lugar de
                            Reunión:</label>
                        <div class="col-sm-10">
                            <input type="text" name="lugar" class="form-control" placeholder="Ejemplo: Auditorio">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Hora de Ingreso:</label>
                        <div class="col-sm-3">
                            <input type="time" name="horaIngreso" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Hora de Salida:</label>
                        <div class="col-sm-3">
                            <input type="time" name="horaSalida" class="form-control">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Insertar Visita</button>
                </form>
            </div>
        </div>

                <div class="row transparencia">
                    <div class="col-xs-12 col-lg-12">

                        <?php 
                         require_once './clases/transparencia.php';
                         $tipo='';
                         if (isset($_GET['tipo'])) {
                             $tipo=$_GET['tipo'];
                            }
                         $transparencia=new transparencia();
                         $transparencia->lista_categorias($tipo);
                         
                         require_once './clases/visita.php';
                        $visita = new Visita();
                        $visita->listar_visitas();
                        
                        
                        //CREANDO VISITA
                        
                        if (isset($_POST["nombre"])) {

                        $visita->insertar_visita($_POST["fecha"], $_POST['nombre'], $_POST["dni"], $_POST["motivo"], $_POST["oficina"], $_POST["lugar"], $_POST['horaIngreso'], $_POST['horaSalida']);
                            }
                        
                          ?>




                    </div>

                </div>
            </div>

        </section><!-- #about -->


        <!--==========================
      Services Section
    ============================-->
        <section class="section-notices">
            <h3 class="title">Noticias Relacionadas</h3>
            <div class="container">

                <div class="owl-carousel notice-carousel owl-theme">
                    <?php 
              $publicaciones->noticias_recientes();
          ?>

                </div>
        </section><!-- #services -->
        <!--==========================
      Why Us Section
    ============================-->

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
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3877.8855003854896!2d-75.3549885857074!3d-13.603804626514506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9111bd9cf2cf6519%3A0xab36457a5222e558!2sHuaytar%C3%A1%2009600!5e0!3m2!1ses-419!2spe!4v1581716745574!5m2!1ses-419!2spe"
                            width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
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
                            <a href="https://web.facebook.com/MuniHuaytara" target="_blank" class="facebook"><i
                                    class="fa fa-facebook"></i></a>
                            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                        </div>

                    </div>

                    <div class="col-lg-3 col-md-6 footer-newsletter">
                        <h4>Suscripciones</h4>
                        <p>Suscríbite a Nuestra página para recibir las noticias más actuales.</p>
                        <form action="" method="post">
                            <input type="email" name="email" placeholder="Email"><input type="submit"
                                value="Suscríbeme">
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
                <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=NewBiz
        -->
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
    <script src="lib/datatables/datatables.min.js"></script>
    <!-- Contact Form JavaScript File -->
    <script src="contactform/contactform.js"></script>

    <!-- Template Main Javascript File -->
    <script src="js/main.js"></script>
    <script type="text/javascript">

        $('document').ready(function () {
            var widthcontent = $('.conten_publish').width();
            $('.conten_publish img').each(function () {
                var posicion = $(this).position();
                var posx = posicion.left;
                var ancho_img = $(this).width();
                //        console.log(posx+ancho_img);
                if (posx + ancho_img > widthcontent) {
                    $(this).css('width', '90%');
                    $(this).css('float', 'left');
                }
                $(this).css('height', 'auto');
                $(this).css('border-radius', '10px');

            });

            $('.table_data').DataTable({
                "language": {
                    "lengthMenu": "Mostrando _MENU_ Filas por Página",
                    "zeroRecords": "No se encontraron registros",
                    "info": "Págna _PAGE_ de _PAGES_",
                    "infoEmpty": "Sin Registros",
                    "infoFiltered": "(Filtrado de _MAX_ Registros)",
                    "sSearch": "Buscar"
                },
                "order": [[2, "desc"]],
                "scrollX": true
            });
            //marcando
            var url = "<?php echo $_GET['tipo']; ?>"
            $('li[data-id=' + url + ']').css('background', '#13A456');
            $('li[data-id=' + url + ']').css('border-radius', '5px');
            $('li[data-id=' + url + '] a').css('color', '#fff');
        });
    </script>


</body>

</html>