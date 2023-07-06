<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuarios
 *
 * @author LUCHO
 */
require_once '../conexion/conexion.php';
class Usuarios {
    public function lista_datos() {
        try {
             $conexion=new Conexion();
                $conectado=$conexion->conectar();
                $sql="SELECT id_ususario,dni,Ap_paterno,ap_materno,Nombres,Telefono,if(Imagen is null,'../imagenes/usuarios/avatar nulo.png',concat('../imagenes/usuarios/',Imagen))  as imagen,contrasenia FROM usuario;";
                $result=$conectado->prepare($sql);
                $result->execute();
                foreach ($result as $filas) {
                    echo '<tr>';
                        echo '<td>'.$filas[0].'</td>';
                        echo '<td>'.$filas[1].'</td>';
                        echo '<td >'.$filas[2].'</td>';
                        echo '<td >'.$filas[3].'</td>';
                        echo '<td >'.$filas[4].'</td>';
                        echo '<td >'.$filas[5].'</td>';
                        echo '<td class="center"><img src="'.$filas[6].'" width="50" height="60" alt="avatar"/></td>';
                        echo '<td >'.$filas[7].'</td>';
                        echo '<td>';
                            echo '<div class="action-buttons">';
//                                echo '<a class="blue" href="#">';
//                                    echo'<i class="ace-icon fa fa-search-plus bigger-130"></i>';
//                                echo '</a>';
                                echo '<a class="green tooltip-success editar" data-rel="tooltip" title="Editar" href="#modal-form" role="button" data-toggle="modal">';
                                
                                    echo '<i class="ace-icon fa fa-pencil bigger-130"></i>';
                                echo '</a>';
                                echo '<a class="red eliminar tooltip-error" data-rel="tooltip" title="Eliminar" href="#">';
                                    echo '<i class="ace-icon fa fa-trash-o bigger-130"></i>';
                                echo '</a>';
                            echo '</div>';
                                echo '</td>';
                            echo '</tr>';
                    
                }

         } catch (Exception $exc) {
             echo $exc->getTraceAsString();
         }
    }
    public function insertar_datos($idusuario,$dni,$appaterno,$apmaterno,$nombres,$telefono,$contrasena) {
       try {
             $conexion=new Conexion();
                $conectado=$conexion->conectar();
                $sql="INSERT INTO usuario
            (id_ususario,DNI,Ap_paterno,ap_materno,Nombres,Telefono,contrasenia)
            VALUES(?,?,?,?,?,?,?);";
                $result=$conectado->prepare($sql);
                $result->execute([$idusuario,$dni,$appaterno,$apmaterno,$nombres,$telefono,$contrasena]);
         } catch (Exception $exc) {
             echo $exc->getTraceAsString();
         }  
    }
    public function modificar_datos($dni,$appaterno,$apmaterno,$nombres,$telefono,$contrasena,$codigo) {
       try {
             $conexion=new Conexion();
                $conectado=$conexion->conectar();
                $sql="UPDATE usuario
                SET
                DNI = ?,
                Ap_paterno = ?,
                ap_materno = ?,
                Nombres = ?,
                Telefono = ?,
                contrasenia=?
                WHERE id_ususario = ?;";
                $result=$conectado->prepare($sql);
                $result->execute([$dni,$appaterno,$apmaterno,$nombres,$telefono,$contrasena,$codigo]);
         } catch (Exception $exc) {
             echo $exc->getTraceAsString();
         }  
    }
     public function eliminar_datos($codigo){
            
          try {
             $conexion=new Conexion();
                $conectado=$conexion->conectar();
                $sql="DELETE FROM usuario
                    WHERE id_ususario=?;";
                $result=$conectado->prepare($sql);
                $result->execute([$codigo]);
         } catch (Exception $exc) {
             echo $exc->getTraceAsString();
         }  
        }
}
$dml_usuarios =new Usuarios();
if (isset($_POST["Eliminar"])) {
    $dml_usuarios->eliminar_datos($_POST["codigoe"]);
}
if (isset($_POST["Insertar"])) {
    $dml_usuarios->insertar_datos($_POST['usuario'], $_POST['dni'], $_POST['appaterno'], $_POST['apmaterno'], $_POST['nombres'], $_POST['telefono'],$_POST["contrasena"]);
}
if (isset($_POST["Modificar"])) {
    $dml_usuarios->modificar_datos($_POST["dni"], $_POST["appaterno"], $_POST["apmaterno"], $_POST["nombres"], $_POST["telefono"], $_POST["contrasena"], $_POST["usuario"]);
}