<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sliders
 *
 * @author LUCHO
 */

class Sliders {
public function listar_slider(){
         try {
             $conexion=new Conexion();
                $conectado=$conexion->conectar();
                $sql="select concat('./img/intro-carousel/',imagen),titulo,descripcion,direccion_boton,texto_boton
                from slider
                where f_fin>=date(now());";
                $result=$conectado->prepare($sql);
                $result->execute([]);
                $count=0;
                foreach ($result as $filas) {
//                    if ($count===1) {
//                       echo '<div class="carousel-item active">';
//                    }else{
//                        echo '<div class="carousel-item">';
//                    }
//                    
//                       echo '<div class="carousel-background"><img src="'.$filas[0].'" alt=""></div>';
//                        echo '<div class="carousel-container">';
//                        echo '<div class="carousel-content">';
//                         echo '<h2>'.$filas[1].'</h2>';
//                          echo '<p>'.$filas[2].'</p>';
//                          echo '<a href="'.$filas[3].'" class="btn-get-started scrollto">'.$filas[4].'</a>';
//                        echo '</div>';
//                      echo '</div>';
//                    echo '</div>';
//                    $count++;
                    echo '<div class="item" >';
                    echo '<div class="row content-slider " >';
                    echo '<div class="imagen" >';
                        echo '<img src="'.$filas[0].'"  /></div>';

                           echo '<div class="info-slider ">';
                               echo '<h3>'.$filas[1].'</h3>';
                               echo '<p>';
                                   echo $filas[2];
                               echo '</p>';
                               echo '<a href="'.$filas[3].'" class="btn-a">'.$filas[4].'</a>';

                           echo '</div>';
                   echo '</div>';

                   echo '</div>';
                    
                    
                }
                
         } catch (Exception $exc) {
             echo $exc->getTraceAsString();
         }
        }
}


