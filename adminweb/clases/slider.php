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
require_once '../conexion/conexion.php';
                                                                                    class slider{
public function lista_tablas(){
 try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
$sql="select idslider, imagen,titulo,descripcion,texto_boton,direccion_boton,f_inicio,f_fin
from slider";
$result=$conectado->prepare($sql);
$result->execute([]);
foreach ($result as $filas) {
echo '<tr>';
echo '<td >'.$filas[0].'</td>';
echo '<td >'.$filas[1].'</td>';
echo '<td >'.$filas[2].'</td>';
echo '<td >'.$filas[3].'</td>';
echo '<td >'.$filas[4].'</td>';
echo '<td >'.$filas[5].'</td>';
echo '<td >'.$filas[6].'</td>';
echo '<td >'.$filas[7].'</td>';
echo '<td class="center">';
echo '<div class="action-buttons">';
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
public function insertar_datos(
$imagen,$titulo,$descripcion,$texto_boton,$direccion_boton,$f_inicio,$f_fin){
try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
 $sql="insert into slider (imagen,titulo,descripcion,texto_boton,direccion_boton,f_inicio,f_fin) values(?,?,?,?,?,?,?)";
$result=$conectado->prepare($sql);
$result->execute([$imagen,$titulo,$descripcion,$texto_boton,$direccion_boton,$f_inicio,$f_fin]);
} catch (Exception $exc) {
echo $exc->getTraceAsString();
}
}
public function modificar_datos($idslider,$imagen,$titulo,$descripcion,$texto_boton,$direccion_boton,$f_inicio,$f_fin){
try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
$sql="update slider set  idslider=?, imagen=?, titulo=?, descripcion=?, texto_boton=?, direccion_boton=?, f_inicio=?, f_fin=? where   idslider=?";
$result=$conectado->prepare($sql);
$result->execute([$idslider,$imagen,$titulo,$descripcion,$texto_boton,$direccion_boton,$f_inicio,$f_fin]);
} catch (Exception $exc) {
 echo $exc->getTraceAsString();
}
}
public function eliminar_datos($idslider){
try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
$sql="DELETE FROM slider WHERE idslider=?;";
$result=$conectado->prepare($sql);
$result->execute([$idslider]);
} catch (Exception $exc) {
echo $exc->getTraceAsString();
}
}
}
$dml_slider=new slider();

if (isset($_POST["Insertar"])) {
    $nombre_fichero=null;
if(isset($_FILES['fichero'])){
if(is_uploaded_file($_FILES['fichero']['tmp_name'])) {
    $nombre_fichero= md5($_FILES['fichero']['name']).$_FILES['fichero']['name'];
    $ruta = "../../img/intro-carousel/"; 
    $upload= $ruta . $nombre_fichero;
    if(!move_uploaded_file($_FILES['fichero']['tmp_name'], $upload)) { //movemos el archivo a su ubicacion      
          echo "ARCHIVO DEMASIADO GRANDE PARA SUBIR"  ;
          return;
        }
}
}else{
    echo "no hay archivo";
}

$dml_slider->insertar_datos($nombre_fichero,$_POST["titulo"],$_POST["descripcion"],$_POST["texto_boton"],$_POST["direccion_boton"],$_POST["f_inicio"],$_POST["f_fin"]);

}
if (isset($_POST["Modificar"])) {
$dml_slider->modificar_datos(
$_POST["idslider"],$_POST["imagen"],$_POST["titulo"],$_POST["descripcion"],$_POST["texto_boton"],$_POST["direccion_boton"],$_POST["f_inicio"],$_POST["f_fin"]);}
if (isset($_POST["Eliminar"])) {
$dml_slider->eliminar_datos($_POST["codigoe"]);
}
                                                                                





//$dml_transparencia=new transparencia();

//if (isset($_POST["Modificar"])) {
//    $idcategoria= intval($_POST["idcattrans"]);
//    $nombre_doc=$_POST["nombre_transparencia"];
//    $descripcion=$_POST["descripcion_breve"];
//    $nombre_fichero=null;
//if(isset($_FILES['fichero'])){
//if(is_uploaded_file($_FILES['fichero']['tmp_name'])) {
//    $nombre_fichero= md5($_FILES['fichero']['name']).$_FILES['fichero']['name'];
//    $ruta = "../docs_transparencia/"; 
//    $upload= $ruta . $nombre_fichero;
//    if(!move_uploaded_file($_FILES['fichero']['tmp_name'], $upload)) { //movemos el archivo a su ubicacion      
//          echo "ARCHIVO DEMASIADO GRANDE PARA SUBIR"  ;
//          return;
//        }
//}
//}else{
//    echo "no hay archivo";
//}  
//$dml_transparencia->modificar_datos($_POST["idtransparencia"],$_POST["idcattrans"],$_POST["nombre_transparencia"],$_POST["descripcion_breve"],$_POST["archivo_adjunto"]);}
//if (isset($_POST["Eliminar"])) {
//$dml_transparencia->eliminar_datos($_POST["codigoe"]);
//}
//                                                                                