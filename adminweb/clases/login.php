<?php
require_once "../conexion/conexion.php";
$usuario=$_POST['usuario'];
$contrasena=$_POST['password'];
session_start();
try {
             $conexion=new Conexion();
                $conectado=$conexion->conectar();
                $sql="select id_ususario,Ap_paterno,ap_materno,Nombres,Imagen
                        from usuario
                        where id_ususario=? and contrasenia=?";
                $result=$conectado->prepare($sql);
                $result->execute([$usuario,$contrasena]);
                $count=$result->rowCount();
                if ($count !=1) {
                    header("Location: ". "../login.html");
                }else{
                    foreach ($result as $filas) {
                    $_SESSION['mwusuario']= $filas[0];
                    $_SESSION['mwnombres']=$filas[1]." ".$filas[2].", ".$filas[3];
                    if (is_null($filas[4])) {
                        $_SESSION['mwimagen']="../imagenes/usuarios/avatar nulo.png";
                    }else{
                        $_SESSION['imagen']=$filas[4];
                    }
                    
                }
                    header("Location: ". "../index.php");
                }
         } catch (Exception $exc) {
             echo $exc->getTraceAsString();
         }
        