<?php 
//include "./config.php";
 
 class Conexion {
     public function conectar(){
    
     try{
     $conexion=new PDO('mysql:host=localhost;dbname=blog', 'root', '');
     //$conexion->exec("set names utf8;SET time_zone = 'America/Lima'");
     $conexion->exec("set names utf8;");
     } catch (PDOException $e){
         echo 'Error de conexion a la base de datos'.$e->getMessage().":::".$e->getTraceAsString();
     }
     return $conexion;
   }
  
 }