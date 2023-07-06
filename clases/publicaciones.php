<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of publicaciones
 *
 * @author LUCHO
 */

class publicaciones {
    public $titulo_publicacion="";
    public function obtener_titulo_Cat($categoria){
 try {
        $conexion=new Conexion();
        $conectado=$conexion->conectar();
        $sql="select nombre
from categoria_publicacion
where idcategoria_publicacion like '$categoria%';";
        $result=$conectado->prepare($sql);
        $result->execute([]);
        if ($result->rowCount()>1) {
            
        }else{
            foreach ($result as $filas) {
              echo '<h3 class="section-title">'.$filas[0].'</h3>  ';
            }
        }
        
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        }
    public function lista_subcategorias($categoria){
 try {
        $conexion=new Conexion();
        $conectado=$conexion->conectar();
        $sql="select sub_categoria.idsub_categoria, sub_categoria.nombre_sub_cat
        from publicaciones
        inner join sub_categoria on publicaciones.idsubcatgegoria=sub_categoria.idsub_categoria
        where publicaciones.idcategoria=?
        group by idsub_categoria";
        $result=$conectado->prepare($sql);
        $result->execute([$categoria]);
        foreach ($result as $filas) {
            echo "<li data-filter=\".f$filas[0]ff\">$filas[1]</li>";
            
              
        }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        }
        public function lista_publicaciones($categoria){
 try {
        $conexion=new Conexion();
        $conectado=$conexion->conectar();
        $sql="select publicaciones.idpublicaciones,publicaciones.imagen_logo,publicaciones.titulo_publicacion,
            date_format(fecha,'%i/%m/%Y'),publicaciones.idsubcatgegoria,sub_categoria.nombre_sub_cat
        from publicaciones
        inner join sub_categoria on publicaciones.idsubcatgegoria=sub_categoria.idsub_categoria
        where publicaciones.idcategoria=?";
        $result=$conectado->prepare($sql);
        $result->execute([$categoria]);
        foreach ($result as $filas) {
//            echo "<div class=\"col-lg-4 col-md-6 portfolio-item f$filas[4]ff wow fadeInUp\">";
//            echo '<div class="portfolio-wrap">';
//              echo "<figure>";
//                echo "<img src=\"adminweb/imagenes/publicaciones/$filas[1]\" class=\"img-fluid\" alt=\"\">";
//                echo "<a href=\"adminweb/imagenes/publicaciones/$filas[1]\" data-lightbox=\"portfolio\" data-title=\"$filas[2]\" class=\"link-preview\" title=\"Preview\"><i class=\"ion ion-eye\"></i></a>";
//                echo "<a href=\"publish_content?idpublish=$filas[0]\" class=\"link-details\" title=\"Mas Detalles\"><i class=\"ion ion-android-open\"></i></a>";
//              echo "</figure>";
//              echo"<div class=\"portfolio-info\">";
//                echo "<h5><a href=\"publish_content?idpublish=$filas[0]\">$filas[2]</a></h5>";
//                echo "<p>Fecha de Pub.:$filas[3]</p>";
//              echo '</div>';
//            echo '</div>';
//          echo '</div>';
            echo '<div class="col-lg-4 col-md-6 portfolio-item f'.$filas[4].'ff filter-app">';
            echo '<div class="portfolio-wrap">';
              echo '<img src="adminweb/imagenes/publicaciones/'.$filas[1].'" class="img-fluid" alt="">';
              echo '<div class="portfolio-info">';
                echo '<h4><a href="publish_content.php?idpublish='.$filas[0].'">'.$filas[2].'</a></h4>';
                echo '<p>'.$filas[5].'</p>';
                echo '<div>';
                  echo '<a href="adminweb/imagenes/publicaciones/'.$filas[1].'" data-lightbox="portfolio" data-title="'.$filas[2].'" class="link-preview" title="Ver"><i class="ion ion-eye"></i></a>';
                  echo '<a href="publish_content.php?idpublish='.$filas[0].'" class="link-details" title="Detalles"><i class="ion ion-android-open"></i></a>';
                echo '</div>';
              echo '</div>';
            echo '</div>';
          echo '</div>';
            
            
        }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        }
         public function obtener_publicacion($idpublicacion){
 try {
        $conexion=new Conexion();
        $conectado=$conexion->conectar();
        $sql="select publicaciones.idpublicaciones,publicaciones.titulo_publicacion,categoria_publicacion.nombre,
sub_categoria.nombre_sub_cat,publicaciones.fecha,publicaciones.imagen_logo,REPLACE(publicaciones.contenido_publicacion,'src=\"../imagenes','src=\"./adminweb/imagenes')
from publicaciones
inner join categoria_publicacion on categoria_publicacion.idcategoria_publicacion=publicaciones.idcategoria
left join sub_categoria on sub_categoria.idsub_categoria=publicaciones.idsubcatgegoria
where idpublicaciones=?";
        $result=$conectado->prepare($sql);
        $result->execute([$idpublicacion]);
        
            foreach ($result as $filas) {
         echo "<div class=\"container\">";
         echo "<header class=\"section-header\">";
          echo "<h3 class=\"section-title\">$filas[1]</h3>";
        echo "</header>";
          echo "<nav>";
              echo "<h6>Fecha de Publicación:</h6>";
          echo "</nav>";

        echo "<div class=\"row conten_publish\">";
                   echo $filas[6];
        echo "</div>";
        echo "</div>"; 
                
            }
        
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        }
        public function lista_noticias(){
            try {
        $conexion=new Conexion();
        $conectado=$conexion->conectar();
        $sql="select idpublicaciones,concat('./adminweb/imagenes/publicaciones/',imagen_logo) as imagen,titulo_publicacion,concat(mid(fnStripTags(contenido_publicacion),1,300),'...')
                from publicaciones
                where idcategoria='2'
                order by fecha desc limit 20;
                ";
        $result=$conectado->prepare($sql);
        $result->execute([]);
        foreach ($result as $filas) {
//            echo "<div class=\"card col-xs-12 col-md-3 col-lg-3\" style=\"width: 18rem;\">";
//                  echo "<img class=\"card-img-top\" src=\"$filas[1]\" alt=\"Card image cap\">";
//            echo '<div class="card-body">';
//              echo "<h5 class=\"card-title\">$filas[2]</h5>";
//              echo "<p class=\"card-text\">$filas[3]</p>";
//              echo '<a href="./publish_content.php?idpublish='.$filas[0].'" class="btn btn btn-primary cta-btn">Leer Más</a>';
//            echo "</div>";
//          echo "</div>";
                if ($filas[3]==="...") {
                   $filas[3]=""; 
                }
          echo '<div class="item">';
                        echo '<div class="row"> ';
                        echo '<div class="col-lg-6 icon-box content order-lg-1 order-2">';
                                echo '<div class="icon"><i class="fa fa-newspaper-o"></i></div>';
                                echo '<h5 class="title"><a href="./publish_content.php?idpublish='.$filas[0].'">'.$filas[2].'</a></h5>';
                              echo '<p>';
                                echo $filas[3];
                              echo '</p>';

                            echo '</div>';

                            echo '<div class="col-lg-6 background order-lg-2 order-1 wow fadeInUp">';
                                echo '<a href="./publish_content.php?idpublish='.$filas[0].'"><img src="'.$filas[1].'" class="img-fluid" alt=""></a>';
                                echo '<a href="./publish_content.php?idpublish='.$filas[0].'" class="btn-get-started ">Leer más</a>';
                            echo '</div>';
                         echo '</div> ';
                        echo '</div>';
          
        }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        }
         public function noticias_recientes(){
            try {
        $conexion=new Conexion();
        $conectado=$conexion->conectar();
        $sql="select idpublicaciones,concat('./adminweb/imagenes/publicaciones/',imagen_logo) as imagen,titulo_publicacion,concat(mid(fnStripTags(contenido_publicacion),1,300),'...')
                from publicaciones
                where idcategoria='2'
                order by fecha desc limit 20;
                ";
        $result=$conectado->prepare($sql);
        $result->execute([]);
        foreach ($result as $filas) {
//            echo "<div class=\"card col-xs-12 col-md-3 col-lg-3\" style=\"width: 18rem;\">";
//                  echo "<img class=\"card-img-top\" src=\"$filas[1]\" alt=\"Card image cap\">";
//            echo '<div class="card-body">';
//              echo "<h5 class=\"card-title\">$filas[2]</h5>";
//              echo "<p class=\"card-text\">$filas[3]</p>";
//              echo '<a href="./publish_content.php?idpublish='.$filas[0].'" class="btn btn btn-primary cta-btn">Leer Más</a>';
//            echo "</div>";
//          echo "</div>";
            echo '<div class="item  wow bounceInUp" data-wow-duration="1.4s">';
              echo '<div class="notice-item" >';
                  echo '<div class="notice-img" >';
                      echo '<img src="'.$filas[1].'" width="400" height="400" alt="complejo arqueologico"/>';
                  echo '</div>';
                  echo '<div class="notice-detail" >';
                  echo '<h3>'.$filas[2].'</h3>';
                  echo '<h5><a href="./publish_content.php?idpublish='.$filas[0].'" class="link_notice"  ><i class="fa fa-eye "></i></a> </h5>';
                  echo '</div>';
                echo '</div>';
            echo '</div>';
          
        }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        }
        public function vistas($id_publicacion){
            try {
        $conexion=new Conexion();
        $conectado=$conexion->conectar();
        $sql="set @cant=(select vistas+1 from publicaciones where idpublicaciones=?);
                update publicaciones
                set vistas=@cant
                where idpublicaciones=?;";
        $result=$conectado->prepare($sql);
        $result->execute([$id_publicacion,$id_publicacion]);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        }
        
         public function get_categorias(){
            try {
        $conexion=new Conexion();
        $conectado=$conexion->conectar();
        $sql="select * from categoria_publicacion";
        $result=$conectado->prepare($sql);
        $result->execute([]);
        foreach ($result as $filas) {
            echo '<li><a href="publicaciones.php?idcat='.$filas[0].'">'.$filas[1].'</a></li>';
        }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        }
        public function get_mas_vistos(){
            try {
        $conexion=new Conexion();
        $conectado=$conexion->conectar();
        $sql="select idpublicaciones,mid(titulo_publicacion,1,50),concat('adminweb/imagenes/publicaciones/',imagen_logo) from publicaciones
order by vistas desc limit 7";
        $result=$conectado->prepare($sql);
        $result->execute([]);
        foreach ($result as $filas) {
            echo '<li><a href="publish_content.php?idpublish='.$filas[0].'">'.$filas[1].'</a></li>';
        }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        }
        public function get_recientes(){
            try {
        $conexion=new Conexion();
        $conectado=$conexion->conectar();
        $sql="select idpublicaciones,mid(titulo_publicacion,1,50),concat('adminweb/imagenes/publicaciones/',imagen_logo) from publicaciones
order by fecha desc limit 7";
        $result=$conectado->prepare($sql);
        $result->execute([]);
        foreach ($result as $filas) {
            echo '<li><a href="publish_content.php?idpublish='.$filas[0].'">'.$filas[1].'</a></li>';
        }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        }
        public function lista_noticias_noticias(){
            try {
        $conexion=new Conexion();
        $conectado=$conexion->conectar();
        $sql="select idpublicaciones,concat('./adminweb/imagenes/publicaciones/',imagen_logo) as imagen,titulo_publicacion,concat(mid(fnStripTags(contenido_publicacion),1,120),'...')
                from publicaciones
                order by fecha desc limit 10;
                ";
        $result=$conectado->prepare($sql);
        $result->execute([]);
        foreach ($result as $filas) {
//            echo "<div class=\"card col-xs-12 col-md-3 col-lg-3\" style=\"width: 18rem;\">";
//                  echo "<img class=\"card-img-top\" src=\"$filas[1]\" alt=\"Card image cap\">";
//            echo '<div class="card-body">';
//              echo "<h5 class=\"card-title\">$filas[2]</h5>";
//              echo "<p class=\"card-text\">$filas[3]</p>";
//              echo '<a href="./publish_content.php?idpublish='.$filas[0].'" class="btn btn btn-primary cta-btn">Leer Más</a>';
//            echo "</div>";
//          echo "</div>";
                if ($filas[3]==="...") {
                   $filas[3]=""; 
                }
                if (strlen($filas[2])>30) {
                    $filas[2]=substr($filas[2], 0, 27).'...';
                }
        echo '<div class="item">';
        echo '<div >';
            echo '<div class="card wow bounceInUp">';
                echo '<div class="img-ultimo" style="background-image: url(\''.$filas[1].'\'); background-size: cover;">';
                echo '</div>';
              echo '<div class="card-body">';
                echo '<h5 class="card-title">'.$filas[2].'</h5>';
                echo '<p class="card-text">'.$filas[3].'</p>';
                echo '<a href="./publish_content.php?idpublish='.$filas[0].'" class="readmore">Ver Artículo</a>';
              echo '</div>';
            echo '</div>';
          echo '</div>';
          echo '</div>';
          
        }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        }
        
}
