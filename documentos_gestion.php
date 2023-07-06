<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>MUNIHUAYTARA</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Munihuaytara, municipalidad de huaytara, wilmer cabrera" name="keywords">
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
          <h3 >Lo Último</h3>
          
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

        <div class="row transparencia">
             <div class="col-xs-12 col-lg-9">
                 
                 

             <?php 
                         require_once './clases/transparencia.php';
                         $tipo='';
                         if (isset($_GET['tipo'])) {
                             $tipo=$_GET['tipo'];
                            }
                         $transparencia=new transparencia();
                         $transparencia->lista_categorias($tipo);
              ?>
                 
                

             
            </div> 
            <div class="col-xs-12 col-lg-3 fb-section">
               
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Enlaces</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Facebook</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                          <div class="enlaces-relacionados">
                              <h5>Documentos de Gestión</h5>
                              <ul class="enlaces">
                                  <?php
                                  $transparencia->get_docs_gestion();
                                  ?>
                              </ul>
                              <h5>Más Visitados</h5>
                              <ul class="enlaces">
                                  <?php
                                   $publicaciones->get_mas_vistos();
                                  ?>
                              </ul>
                          </div>
                      </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="fb-content">
                                   <div class="fb-page" data-href="https://web.facebook.com/MuniHuaytara/" data-tabs="timeline" data-width="250" data-height="400;" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://web.facebook.com/MuniHuaytara/" class="fb-xfbml-parse-ignore"><a href="https://web.facebook.com/MuniHuaytara/">MUNICIPALIDAD PROVINCIAL DE HUAYTARÁ</a></blockquote></div>  
                                   </div>
                    </div>

                  </div>
           
            </div>
        </div>
      </div>
    </section><!-- #about -->

 
     <!--==========================
      Services Section
    ============================-->
    <section  class="section-notices">
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
<!--    <section id="why-us" class="wow fadeIn">
      <div class="container">
        <header class="section-header">
          <h3>Why choose us?</h3>
          <p>Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo abhorreant vituperatoribus.</p>
        </header>

        <div class="row row-eq-height justify-content-center">

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
                <i class="fa fa-diamond"></i>
              <div class="card-body">
                <h5 class="card-title">Corporis dolorem</h5>
                <p class="card-text">Deleniti optio et nisi dolorem debitis. Aliquam nobis est temporibus sunt ab inventore officiis aut voluptatibus.</p>
                <a href="#" class="readmore">Read more </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
                <i class="fa fa-language"></i>
              <div class="card-body">
                <h5 class="card-title">Voluptates dolores</h5>
                <p class="card-text">Voluptates nihil et quis omnis et eaque omnis sint aut. Ducimus dolorum aspernatur.</p>
                <a href="#" class="readmore">Read more </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
                <i class="fa fa-object-group"></i>
              <div class="card-body">
                <h5 class="card-title">Eum ut aspernatur</h5>
                <p class="card-text">Autem quod nesciunt eos ea aut amet laboriosam ab. Eos quis porro in non nemo ex. </p>
                <a href="#" class="readmore">Read more </a>
              </div>
            </div>
          </div>

        </div>

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">274</span>
            <p>Clients</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">421</span>
            <p>Projects</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">1,364</span>
            <p>Hours Of Support</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">18</span>
            <p>Hard Workers</p>
          </div>
  
        </div>

      </div>
    </section>-->

    <!--==========================
      Portfolio Section
    ============================-->
<!--    <section id="portfolio" class="clearfix">
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Our Portfolio</h3>
        </header>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="img/portfolio/app1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><a href="#">App 1</a></h4>
                <p>App</p>
                <div>
                  <a href="img/portfolio/app1.jpg" data-lightbox="portfolio" data-title="App 1" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <img src="img/VISTA PANORAMICA editado.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><a href="#">Web 3</a></h4>
                <p>Web</p>
                <div>
                  <a href="img/portfolio/web3.jpg" class="link-preview" data-lightbox="portfolio" data-title="Web 3" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <img src="img/portfolio/app2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><a href="#">App 2</a></h4>
                <p>App</p>
                <div>
                  <a href="img/portfolio/app2.jpg" class="link-preview" data-lightbox="portfolio" data-title="App 2" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="img/portfolio/card2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><a href="#">Card 2</a></h4>
                <p>Card</p>
                <div>
                  <a href="img/portfolio/card2.jpg" class="link-preview" data-lightbox="portfolio" data-title="Card 2" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <img src="img/portfolio/web2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><a href="#">Web 2</a></h4>
                <p>Web</p>
                <div>
                  <a href="img/portfolio/web2.jpg" class="link-preview" data-lightbox="portfolio" data-title="Web 2" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <img src="img/portfolio/app3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><a href="#">App 3</a></h4>
                <p>App</p>
                <div>
                  <a href="img/portfolio/app3.jpg" class="link-preview" data-lightbox="portfolio" data-title="App 3" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="img/portfolio/card1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><a href="#">Card 1</a></h4>
                <p>Card</p>
                <div>
                  <a href="img/portfolio/card1.jpg" class="link-preview" data-lightbox="portfolio" data-title="Card 1" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <img src="img/portfolio/card3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><a href="#">Card 3</a></h4>
                <p>Card</p>
                <div>
                  <a href="img/portfolio/card3.jpg" class="link-preview" data-lightbox="portfolio" data-title="Card 3" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <img src="img/portfolio/web1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><a href="#">Web 1</a></h4>
                <p>Web</p>
                <div>
                  <a href="img/portfolio/web1.jpg" class="link-preview" data-lightbox="portfolio" data-title="Web 1" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section> #portfolio -->

    <!--==========================
      Clients Section
    ============================-->
<!--    <section id="testimonials" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3>Testimonials</h3>
        </header>

        <div class="row justify-content-center">
          <div class="col-lg-8">

            <div class="owl-carousel testimonials-carousel wow fadeInUp">
    
              <div class="testimonial-item">
                <img src="img/testimonial-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
                <p>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                </p>
              </div>
    
              <div class="testimonial-item">
                  <img src="img/VISTA PANORAMICA editado.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
                <p>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                </p>
              </div>
    
              <div class="testimonial-item">
                <img src="img/testimonial-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
                <p>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                </p>
              </div>
    
              <div class="testimonial-item">
                <img src="img/testimonial-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
                <p>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                </p>
              </div>
    
              <div class="testimonial-item">
                <img src="img/testimonial-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
                <p>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                </p>
              </div>

            </div>

          </div>
        </div>


      </div>
    </section> #testimonials -->

    <!--==========================
      Team Section
    ============================-->
<!--    <section id="team">
      <div class="container">
        <div class="section-header">
          <h3>Team</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="member">
              <img src="img/team-1.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Walter White</h4>
                  <span>Chief Executive Officer</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="member">
              <img src="img/team-2.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Sarah Jhonson</h4>
                  <span>Product Manager</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="member">
              <img src="img/team-3.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>William Anderson</h4>
                  <span>CTO</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="member">
              <img src="img/team-4.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Amanda Jepson</h4>
                  <span>Accountant</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section> #team -->

   

    <!--==========================
      Contact Section
    ============================-->
<!--    <section id="contact">
      <div class="container-fluid">

        <div class="section-header">
          <h3>Contact Us</h3>
        </div>

        <div class="row wow fadeInUp">

          <div class="col-lg-6">
            <div class="map mb-4 mb-lg-0">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 312px;" allowfullscreen></iframe>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="row">
              <div class="col-md-5 info">
                <i class="ion-ios-location-outline"></i>
                <p>A108 Adam Street, NY 535022</p>
              </div>
              <div class="col-md-4 info">
                <i class="ion-ios-email-outline"></i>
                <p>info@example.com</p>
              </div>
              <div class="col-md-3 info">
                <i class="ion-ios-telephone-outline"></i>
                <p>+1 5589 55488 55</p>
              </div>
            </div>

            <div class="form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section> #contact -->

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
                <input type="email" name="email" placeholder="Email"><input type="submit"  value="Suscríbeme">
            </form>
          </div>

        </div>
      </div>
    </div>

     <div class="container">
      <div class="copyright">
        &copy; Municipalidad Provincial de  <strong>Huaytará</strong>. Todos Los derechos Reservados
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
  <script type="text/javascript" >
  
  $('document').ready(function() {
      var widthcontent=$('.conten_publish').width();
    $('.conten_publish img').each(function() {
        var posicion=$(this).position();
        var posx=posicion.left;
        var ancho_img=$(this).width();
//        console.log(posx+ancho_img);
        if (posx+ancho_img>widthcontent) {
            $(this).css('width','90%');
            $(this).css('float','left');
        }
        $(this).css('height','auto');
            $(this).css('border-radius','10px');
    
    });
    
    $('.table_data').DataTable({
        "language": {
            "lengthMenu": "Mostrando _MENU_ Filas por Página",
            "zeroRecords": "No existe datos - sorry",
            "info": "Pagína _PAGE_ de _PAGES_",
            "infoEmpty": "Sin Registros",
            "infoFiltered": "(Filtrado de _MAX_ Registros)",
            "sSearch": "Búscar"
        },
        "order": [[ 2, "desc" ]],
        "scrollX": true
    });
    //marcando
   var url="<?php echo $_GET['tipo']; ?>"
   $('li[data-id='+url+']').css('background','#13A456');
   $('li[data-id='+url+']').css('border-radius','5px');
   $('li[data-id='+url+'] a').css('color','#fff');
    });
</script>
  
  
</body>
</html>
