<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cat_transparencia
 *
 * @author LUCHO
 */
require_once '../conexion/conexion.php';
class cat_transparencia{
public function lista_tablas(){
 try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
$sql="select * from cat_transparencia";
$result=$conectado->prepare($sql);
$result->execute([]);
foreach ($result as $filas) {
echo '<tr>';
echo '<td >'.$filas[0].'</td>';
echo '<td >'.$filas[1].'</td>';
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
$nombre){
try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
 $sql="insert into cat_transparencia (nombre) values(?)";
$result=$conectado->prepare($sql);
$result->execute([$nombre]);
} catch (Exception $exc) {
echo $exc->getTraceAsString();
}
}
public function modificar_datos($idcat_docs_gestion,$nombre){
try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
$sql="update cat_transparencia set   nombre=?  where   idcat_docs_gestion=?";
$result=$conectado->prepare($sql);
$result->execute([$nombre,$idcat_docs_gestion]);
} catch (Exception $exc) {
 echo $exc->getTraceAsString();
}
}
public function eliminar_datos($idcat_docs_gestion){
try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
$sql="DELETE FROM cat_transparencia WHERE idcat_docs_gestion=?;";
$result=$conectado->prepare($sql);
$result->execute([$idcat_docs_gestion]);
} catch (Exception $exc) {
echo $exc->getTraceAsString();
}
}
}
$dml_cat_transparencia=new cat_transparencia();
if (isset($_POST["Insertar"])) {
$dml_cat_transparencia->insertar_datos($_POST["nombre"]);}
if (isset($_POST["Modificar"])) {
$dml_cat_transparencia->modificar_datos($_POST["idcat_docs_gestion"],$_POST["nombre"]);}
if (isset($_POST["Eliminar"])) {
$dml_cat_transparencia->eliminar_datos($_POST["codigoe"]);
}
                                                                                