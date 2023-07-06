<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categoria_publicacion
 *
 * @author LUCHO
 */
require_once '../conexion/conexion.php';
class categoria_publicacion{
public function lista_tablas(){
 try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
$sql="select * from categoria_publicacion ";
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
public function insertar_datos($nombre){
try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
 $sql="insert into categoria_publicacion (nombre) values(?)";
$result=$conectado->prepare($sql);
$result->execute([$nombre]);
} catch (Exception $exc) {
echo $exc->getTraceAsString();
}
}
public function modificar_datos($idcategoria_publicacion,$nombre){
try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
$sql="update categoria_publicacion set   nombre=? where   idcategoria_publicacion=?";
$result=$conectado->prepare($sql);
$result->execute([$nombre,$idcategoria_publicacion]);
} catch (Exception $exc) {
 echo $exc->getTraceAsString();
}
}
public function eliminar_datos($idcategoria_publicacion){
try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
$sql="DELETE FROM categoria_publicacion WHERE idcategoria_publicacion=?;";
$result=$conectado->prepare($sql);
$result->execute([$idcategoria_publicacion]);
} catch (Exception $exc) {
echo $exc->getTraceAsString();
}
}
}
$dml_categoria_publicacion=new categoria_publicacion();
if (isset($_POST["Insertar"])) {
$dml_categoria_publicacion->insertar_datos($_POST["nombre"]);}
if (isset($_POST["Modificar"])) {
$dml_categoria_publicacion->modificar_datos(
$_POST["idcategoria_publicacion"],$_POST["nombre"]);}
if (isset($_POST["Eliminar"])) {
$dml_categoria_publicacion->eliminar_datos($_POST["codigoe"]);
}
                                                                                
