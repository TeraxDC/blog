<?php 
//include "./config.php";
 
 class Conexion {
     public function conectar(){
    
     try{
     $conexion=new PDO('mysql:host=localhost;dbname=xyltrylx_blog_huaytara', 'xyltrylx_blog_huaytara', 'bl0gHu4yt4r42023');
     $conexion->exec("set names utf8;SET time_zone = 'America/Lima'");
     } catch (PDOException $e){
         echo 'Error de conexion a la base de datos'.$e->getMessage().":::".$e->getTraceAsString();
     }
     return $conexion;
   }
  
 }