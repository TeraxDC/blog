<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Acces_users
 *
 * @author LUCHO
 */
require_once '../conexion/conexion.php';
class Acces_users {
   public function lista_datos($idusuario) {
        try {
             $conexion=new Conexion();
                $conectado=$conexion->conectar();
                $sql="select accesos_usuario.idaccesos_usuario,menu.idmenu,menu.dependencia as dependecias,menu.nombre_menu,
                        (select menu.nombre_menu from menu where menu.idmenu=dependecias) as depend, 
                       accesos_usuario.access
                        from accesos_usuario
                        RIGHT join menu on accesos_usuario.idmenu=menu.idmenu and accesos_usuario.idusuario=?
                        order by dependencia asc";
                $result=$conectado->prepare($sql);
                $result->execute([$idusuario]);
                foreach ($result as $filas) {
                    echo '<tr>';
                        echo '<td>'.$filas[0].'</td>';
                        echo '<td>'.$filas[1].'</td>';
                        echo '<td >'.$filas[2].'</td>';
                        echo '<td >'.$filas[3].'</td>';
                        echo '<td >'.$filas[4].'</td>';
                        
                        echo '<td class="center">';
                            echo '<div class="action-buttons">';

                            if (is_null($filas[0]) ) {
                                echo '<a class="green tooltip-success permitir" data-rel="tooltip" title="Permitir Acceso" href="#modal-form" role="button" data-toggle="modal">';
                                
                                    echo '<i class="ace-icon fa fa-check bigger-130"></i>';
                                echo '</a>';
                                }else{
                                echo '<a class="red eliminar tooltip-error" data-rel="tooltip" title="Eliminar Acceso" href="#">';
                                    echo '<i class="ace-icon fa fa-trash-o bigger-130"></i>';
                                echo '</a>';
                            echo '</div>';
                                echo '</td>';
                                echo '</tr>';}
                    
                }

         } catch (Exception $exc) {
             echo $exc->getTraceAsString();
         }
    }
    public function lista_usuarios() {
        try {
                     $conexion=new Conexion();
                        $conectado=$conexion->conectar();
                        $sql="select id_ususario,concat(Ap_paterno,' ',ap_materno,', ',Nombres,'=>',id_ususario) as nombres
                            from usuario";
                        $result=$conectado->prepare($sql);
                        $result->execute();
                        foreach ($result as $filas) {
                           echo '<option value="'.$filas[0].'"> '.$filas[1].' </option>';

                        }

                 } catch (Exception $exc) {
                     echo $exc->getTraceAsString();
                 }

}
    public function insertar_datos($idusuario,$idmenu){
            
          try {
             $conexion=new Conexion();
                $conectado=$conexion->conectar();
                $sql="INSERT INTO accesos_usuario(idmenu,idusuario,access)
                        VALUES(?,?,1);";
                $result=$conectado->prepare($sql);
                $result->execute([$idmenu,$idusuario]);
         } catch (Exception $exc) {
             echo $exc->getTraceAsString();
         }  
        }
         public function eliminar_datos($idacces){
            
          try {
             $conexion=new Conexion();
                $conectado=$conexion->conectar();
                $sql="DELETE FROM accesos_usuario WHERE idaccesos_usuario=?;";
                $result=$conectado->prepare($sql);
                $result->execute([$idacces]);
         } catch (Exception $exc) {
             echo $exc->getTraceAsString();
         }  
        }
    
    
}
$dml_acces_list=new Acces_users();
if (isset($_POST["Insertar"])) {
    $dml_acces_list->insertar_datos($_POST["idusuario"], $_POST["idmenu"]);
}
if (isset($_POST["Eliminar"])) {
    $dml_acces_list->eliminar_datos($_POST["codigoe"]);
}