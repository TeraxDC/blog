<?php


require_once '../conexion/conexion.php';
 function obtener_publicacion($idpublicacion){
 try {
        $conexion=new Conexion();
        $conectado=$conexion->conectar();
        $sql="select publicaciones.idpublicaciones,publicaciones.titulo_publicacion,categoria_publicacion.nombre,
sub_categoria.nombre_sub_cat,publicaciones.fecha,publicaciones.imagen_logo,publicaciones.contenido_publicacion
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

        echo "<div class=\"row\">";
                    echo substr ($filas[6], 1,900000) ;
        echo "</div>";
        echo "</div>";
            }
        
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        }
        obtener_publicacion("18");