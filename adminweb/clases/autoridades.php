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
class transparencia{
public function lista_tablas(){
 try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
$sql="SELECT a.id, a.cargo idcargo, a.nombre, a.correo, a.descripcion, c.nombre cargo, concat(g.inicio, " - ",g.fin) gestion, a.foto from autoridad a 
INNER JOIN cargo c on a.cargo = c.id INNER join gestion g on a.gestion = g.id; ";
$result=$conectado->prepare($sql);
$result->execute([]);
foreach ($result as $filas) {
echo '<tr>';
echo '<td >'.$filas[0].'</td>';
echo '<td class="hide">'.$filas[1].'</td>';
echo '<td >'.$filas[2].'</td>';
echo '<td >'.$filas[3].'</td>';
echo '<td >'.$filas[4].'</td>';
echo '<td >'.$filas[5].'</td>';
echo '<td >'.$filas[6].'</td>';
echo '<td class="center">';
echo '<div class="action-buttons">';
echo '<a class="info tooltip-info" data-rel="tooltip" title="Verificar Adjunto" href="'.$filas[7].'" role="button" data-toggle="modal">';
echo '<i class="ace-icon fa fa-eye bigger-130"></i>';
echo '</a>';
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


public function lista_categorias(){
 try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
$sql="select idcat_docs_gestion,nombre
from cat_transparencia;";
$result=$conectado->prepare($sql);
$result->execute([]);
foreach ($result as $filas) {
 echo '<option value="'.$filas[0].'">'.$filas[1].'</option>';
}
} catch (Exception $exc) {
echo $exc->getTraceAsString();
}
}


public function insertar_datos(
$idcattrans,$nombre_transparencia,$descripcion_breve,$archivo_adjunto){
try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
 $sql="insert into transparencia (idcattrans,nombre_transparencia,descripcion_breve,archivo_adjunto) values(?,?,?,?)";
$result=$conectado->prepare($sql);
$result->execute([$idcattrans,$nombre_transparencia,$descripcion_breve,$archivo_adjunto]);
} catch (Exception $exc) {
echo $exc->getTraceAsString();
}
}
public function modificar_datos($idtransparencia,$idcattrans,$nombre_transparencia,$descripcion_breve,$archivo_adjunto){
try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
$sql="update transparencia set   idcattrans=?, nombre_transparencia=?, descripcion_breve=?, archivo_adjunto=?  where   idtransparencia=?";
$result=$conectado->prepare($sql);
$result->execute([$idcattrans,$nombre_transparencia,$descripcion_breve,$archivo_adjunto,$idtransparencia]);
} catch (Exception $exc) {
 echo $exc->getTraceAsString();
}
}
public function eliminar_datos($idtransparencia){
try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
$sql="DELETE FROM transparencia WHERE idtransparencia=?;";
$result=$conectado->prepare($sql);
$result->execute([$idtransparencia]);
} catch (Exception $exc) {
echo $exc->getTraceAsString();
}
}
}



$dml_transparencia=new transparencia();
if (isset($_POST["Insertar"])) {
    $idcategoria= intval($_POST["idcattrans"]);
    $nombre_doc=$_POST["nombre_transparencia"];
    $descripcion=$_POST["descripcion_breve"];
    $nombre_fichero=null;
if(isset($_FILES['fichero'])){
if(is_uploaded_file($_FILES['fichero']['tmp_name'])) {
    $nombre_fichero= md5($_FILES['fichero']['name']).$_FILES['fichero']['name'];
    $ruta = "../docs_transparencia/"; 
    $upload= $ruta . $nombre_fichero;
    
    if(!move_uploaded_file($_FILES['fichero']['tmp_name'], $upload)) { //movemos el archivo a su ubicacion      
          echo "ARCHIVO DEMASIADO GRANDE PARA SUBIR"  ;
//          return;
        }
}
}else{
    echo "no hay archivo";
}  
$dml_transparencia->insertar_datos($_POST["idcattrans"],$_POST["nombre_transparencia"],$_POST["descripcion_breve"],$nombre_fichero);
}
if (isset($_POST["Modificar"])) {
    $idcategoria= intval($_POST["idcattrans"]);
    $nombre_doc=$_POST["nombre_transparencia"];
    $descripcion=$_POST["descripcion_breve"];
    $nombre_fichero=null;
if(isset($_FILES['fichero'])){
if(is_uploaded_file($_FILES['fichero']['tmp_name'])) {
    $nombre_fichero= md5($_FILES['fichero']['name']).$_FILES['fichero']['name'];
    $ruta = "../docs_transparencia/"; 
    $upload= $ruta . $nombre_fichero;
    if(!move_uploaded_file($_FILES['fichero']['tmp_name'], $upload)) { //movemos el archivo a su ubicacion      
          echo "ARCHIVO DEMASIADO GRANDE PARA SUBIR"  ;
          return;
        }
}
}else{
    echo "no hay archivo";
}  
$dml_transparencia->modificar_datos($_POST["idtransparencia"],$_POST["idcattrans"],$_POST["nombre_transparencia"],$_POST["descripcion_breve"],$_POST["archivo_adjunto"]);}
if (isset($_POST["Eliminar"])) {
$dml_transparencia->eliminar_datos($_POST["codigoe"]);
}
                                                                                