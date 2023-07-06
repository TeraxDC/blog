<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sub_categoria
 *
 * @author LUCHO
 */
require_once '../conexion/conexion.php';
class sub_categoria{
public function lista_tablas(){
 try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
$sql="SELECT idsub_categoria,categoria_publicacion.nombre,nombre_sub_cat,idcategoria FROM sub_categoria
inner join categoria_publicacion on categoria_publicacion.idcategoria_publicacion=sub_categoria.idcategoria;";
$result=$conectado->prepare($sql);
$result->execute([]);
foreach ($result as $filas) {
echo '<tr>';
echo '<td >'.$filas[0].'</td>';
echo '<td >'.$filas[1].'</td>';
echo '<td >'.$filas[2].'</td>';
echo '<td class="hidden">'.$filas[3].'</td>';
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
public function lista_categorias(){
 try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
$sql="select idcategoria_publicacion, nombre from categoria_publicacion;";
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
$idcategoria,$nombre_sub_cat){
try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
 $sql="insert into sub_categoria (idcategoria,nombre_sub_cat) values(?,?)";
$result=$conectado->prepare($sql);
$result->execute([$idcategoria,$nombre_sub_cat]);
} catch (Exception $exc) {
echo $exc->getTraceAsString();
}
}
public function modificar_datos($idsub_categoria,$idcategoria,$nombre_sub_cat){
try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
$sql="update sub_categoria set   idcategoria=?, nombre_sub_cat=? where   idsub_categoria=?";
$result=$conectado->prepare($sql);
$result->execute([$idcategoria,$nombre_sub_cat,$idsub_categoria]);
} catch (Exception $exc) {
 echo $exc->getTraceAsString();
}
}
public function eliminar_datos($idsub_categoria){
try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
$sql="DELETE FROM sub_categoria WHERE idsub_categoria=?;";
$result=$conectado->prepare($sql);
$result->execute([$idsub_categoria]);
} catch (Exception $exc) {
echo $exc->getTraceAsString();
}
}
}
$dml_sub_categoria=new sub_categoria();
if (isset($_POST["Insertar"])) {
$dml_sub_categoria->insertar_datos($_POST["idcategoria"],$_POST["nombre_sub_cat"]);}
if (isset($_POST["Modificar"])) {
$dml_sub_categoria->modificar_datos($_POST["idsub_categoria"],$_POST["idcategoria"],$_POST["nombre_sub_cat"]);}
if (isset($_POST["Eliminar"])) {
$dml_sub_categoria->eliminar_datos($_POST["codigoe"]);
}
                                                                                
