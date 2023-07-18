<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gestion
 *
 * @author mph
 */
require_once '../conexion/conexion.php';
class gestion{
public function lista_tablas(){
 try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
$sql="SELECT id,inicio,fin,lema,logo FROM gestion;";
$result=$conectado->prepare($sql);
$result->execute([]);
foreach ($result as $filas) {
echo '<tr>';
echo '<td >'.$filas[0].'</td>';
echo '<td >'.$filas[1].'</td>';
echo '<td >'.$filas[2].'</td>';
echo '<td >'.$filas[3].'</td>';
echo '<td >'.$filas[4].'</td>';
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
public function insertar_datos($inicio,$fin,$lema,$logo){
    try {
    $conexion=new Conexion();
    $conectado=$conexion->conectar();
     $sql="insert into gestion (inicio,fin,lema,logo) values(?,?,?,?)";
    $result=$conectado->prepare($sql);
    $result->execute([$inicio,$fin,$lema,$logo]);
    } catch (Exception $exc) {
    echo $exc->getTraceAsString();
    }
    }
    public function modificar_datos($idgestion, $inicio, $fin, $lema, $logo){
    try {
    $conexion=new Conexion();
    $conectado=$conexion->conectar();
    $sql="update gestion set   inicio=?, fin=?, lema=?, logo=?  where   id=?";
    $result=$conectado->prepare($sql);
    $result->execute([$inicio, $fin, $lema, $logo, $idgestion]);
    } catch (Exception $exc) {
     echo $exc->getTraceAsString();
    }
    }
    public function eliminar_datos($idgestion){
    try {
    $conexion=new Conexion();
    $conectado=$conexion->conectar();
    $sql="DELETE FROM gestion WHERE id=?;";
    $result=$conectado->prepare($sql);
    $result->execute([$idgestion]);
    } catch (Exception $exc) {
    echo $exc->getTraceAsString();
    }
    }
    }
    $dml_gestion=new gestion();
    if (isset($_POST["Insertar"])) {
        $logo = "pronta implementación";
    $dml_gestion->insertar_datos($_POST["inicio"],$_POST["fin"],$_POST["lema"],$logo);}
    if (isset($_POST["Modificar"])) {
        $logo = "pronta implementación";
    $dml_gestion->modificar_datos($_POST["id_gestion"],$_POST["inicio"],$_POST["fin"],$_POST["lema"],$logo);}
    if (isset($_POST["Eliminar"])) {
    $dml_gestion->eliminar_datos($_POST["codigoe"]);
    }