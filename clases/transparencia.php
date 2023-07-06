<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of transparencia
 *
 * @author LUCHO
 */
class transparencia {
   public function lista_categorias($criterio){
       
         try {
             $conexion=new Conexion();
                $conectado=$conexion->conectar();
                $sql="select idcat_docs_gestion,nombre 
                        from cat_transparencia where idcat_docs_gestion like '$criterio';";
//                echo $sql;
                $result=$conectado->prepare($sql);
                $result->execute([]);
                foreach ($result as $filas) {
                    echo "<h3 class=\"section-header\" >$filas[1]</h3>";
                    echo '<table class="table_data display nowrap" style="width:100%">';
                        echo '<thead >';
                        echo '<tr>';
                            echo '<th scope="col">Nombre</th>';
                            echo '<th scope="col">Descripción</th>';
                            echo '<th scope="col">Fecha</th>';
                            echo '<th scope="col">Descarga</th>';
                        echo '</tr>';
                         echo '</thead >';
                         echo '<tbody>';
                        self::lista_docs_trans($filas[0]);
                        echo '</tbody>';
                    echo '</table>';
                }
                
         } catch (Exception $exc) {
             echo $exc->getTraceAsString();
         }
        }
        public function lista_docs_trans($idcat){
         try {
             $conexion=new Conexion();
                $conectado=$conexion->conectar();
                $sql="select idtransparencia,nombre_transparencia,descripcion_breve,concat('adminweb/docs_transparencia/',archivo_adjunto),create_time
                    from transparencia
                    where idcattrans=?
                    order by create_time desc";
                $result=$conectado->prepare($sql);
                $result->execute([$idcat]);
                
                foreach ($result as $filas) {
//                    
//                    echo '</thead>';
//                    echo '<tbody>';
                        echo '<tr>';
                          echo '<td>'.$filas[1].'</td>';
                          echo '<td>'.$filas[2].'</td>';
                          echo '<td>'.$filas[4].'</td>';
                          echo '<td class="center"><a href="'.$filas[3].'" target="_blank" data-toggle="tooltip" data-placement="right" title="Descargar Archivo"> <i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i></a></td>';
                        echo '</tr>';

                }
                
                        
                
         } catch (Exception $exc) {
             echo $exc->getTraceAsString();
         }
        }
        public function get_name_cat($idcat){
         try {
             $conexion=new Conexion();
                $conectado=$conexion->conectar();
                $sql="select idtransparencia,nombre_transparencia,descripcion_breve,concat('adminweb/docs_transparencia/',archivo_adjunto),date_format(create_time,'%d/%m/%y')
                    from transparencia
                    where idcattrans=?
                    order by create_time desc";
                $result=$conectado->prepare($sql);
                $result->execute([$idcat]);
                
                foreach ($result as $filas) {
                    
                    echo '</thead>';
                    echo '<tbody>';
                        echo '<tr>';
                          echo '<td>'.$filas[1].'</td>';
                          echo '<td>'.$filas[2].'</td>';
                          echo '<td>'.$filas[4].'</td>';
                          echo '<td class="center"><a href="'.$filas[3].'" target="_blank" data-toggle="tooltip" data-placement="right" title="Descargar Archivo"> <i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i></a></td>';
                        echo '</tr>';

                }
                
                        
                
         } catch (Exception $exc) {
             echo $exc->getTraceAsString();
         }
        }
        public function get_docs_gestion(){
            try {
        $conexion=new Conexion();
        $conectado=$conexion->conectar();
        $sql="select idcat_docs_gestion,nombre
from cat_transparencia";
        $result=$conectado->prepare($sql);
        $result->execute([]);
        foreach ($result as $filas) {
            echo '<li data-id="'.$filas[0].'"><a href="documentos_gestion.php?tipo='.$filas[0].'" >'.$filas[1].'</a></li>';
        }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        }
}
