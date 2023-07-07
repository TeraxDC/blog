<?php
require_once  './conexion/conexion.php';
class Autoridad {
    public function listar_autoridades(){
         try {
             $conexion=new Conexion();
                $conectado=$conexion->conectar();
                $sql="select * from autoridad";
                $result=$conectado->prepare($sql);
                $result->execute([]);
                
                foreach ($result as $filas) {
                   echo '<div class="col-lg-4 mb-4">';
                    echo '<div class="card">';
                      echo '<img src="'.$filas[4].'" alt="" class="card-img-top">';
                      echo '<div class="card-body">';
                        echo '<h5 class="card-title font-weight-bold">'.$filas[1].'</h5>';
                        echo '<h6 class="card-text font-weight-bold">'.$filas[2].'</h6>';
                        echo '<p class="card-text">'.$filas[3].'</p>';
                      echo '</div>';
                    echo '</div>';
                    echo '</div>';
                
                }
                
         } catch (Exception $exc) {
             echo $exc->getTraceAsString();
         }
        }
}
