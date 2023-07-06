<?php
//requirir sesionstar() para ejecutar lectura;
 require_once '../conexion/conexion.php';
 class menu_web{
public function lista_tablas(){
 try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
$sql="select idmenu_Web as idmenu,texto_menu,direccion_menu,(select texto_menu from menu_web where idmenu_Web=idmenu),dependencia from menu_web";
$result=$conectado->prepare($sql);
$result->execute([]);
foreach ($result as $filas) {
echo '<tr>';
echo '<td >'.$filas[0].'</td>';
echo '<td >'.$filas[1].'</td>';
echo '<td >'.$filas[2].'</td>';
echo '<td >'.$filas[3].'</td>';
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
public function lista_menu(){
         try {
             $conexion=new Conexion();
                $conectado=$conexion->conectar();
                $sql="select idmenu_Web,texto_menu from menu_web;";
                $result=$conectado->prepare($sql);
                $result->execute();
                foreach ($result as $filas) {
                    echo '<option value="'.$filas[0].'">'.$filas[1].'</option>';   
                }
         } catch (Exception $exc) {
             echo $exc->getTraceAsString();
         }
        }
public function insertar_datos($texto_menu,$direccion_menu,$dependencia){
try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
 $sql="insert into menu_web (texto_menu,direccion_menu,dependencia) values(?,?,?)";
$result=$conectado->prepare($sql);
$result->execute([$texto_menu,$direccion_menu,$dependencia]);
} catch (Exception $exc) {
echo $exc->getTraceAsString();
}
}
public function modificar_datos($idmenu_Web,$texto_menu,$direccion_menu,$dependencia){
    if (intval($dependencia)===0) {
        $dependencia=null;
    }
try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
$sql="update menu_web set  texto_menu=?, direccion_menu=?, dependencia=? where   idmenu_Web=?";
$result=$conectado->prepare($sql);
$result->execute([$texto_menu,$direccion_menu,$dependencia,$idmenu_Web]);
} catch (Exception $exc) {
 echo $exc->getTraceAsString();
}
}
public function eliminar_datos($idmenu_Web){
try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
$sql="DELETE FROM menu_web WHERE idmenu_Web=?;";
$result=$conectado->prepare($sql);
$result->execute([$idmenu_Web]);
} catch (Exception $exc) {
echo $exc->getTraceAsString();
}
}
public function lista_trans(){
   try {
        $conexion=new Conexion();
        $conectado=$conexion->conectar();
        $sql="select *
            from cat_transparencia;";
        $result=$conectado->prepare($sql);
        $result->execute();
        foreach ($result as $filas) {
           echo '<option value="'.$filas[0].'">'.$filas[1].'</option>'; 
        }
        } catch (Exception $exc) {
        echo $exc->getTraceAsString();
        } 
}
public function lista_publicaciones(){
   try {
        $conexion=new Conexion();
        $conectado=$conexion->conectar();
        $sql="select idpublicaciones,titulo_publicacion
                from publicaciones
                order by fecha desc";
        $result=$conectado->prepare($sql);
        $result->execute();
        foreach ($result as $filas) {
           echo '<option value="'.$filas[0].'">'.$filas[1].'</option>'; 
        }
        } catch (Exception $exc) {
        echo $exc->getTraceAsString();
        } 
}
public function lista_cat_publicaciones(){
   try {
        $conexion=new Conexion();
        $conectado=$conexion->conectar();
        $sql="select idcategoria_publicacion,nombre
from categoria_publicacion;";
        $result=$conectado->prepare($sql);
        $result->execute();
        foreach ($result as $filas) {
           echo '<option value="'.$filas[0].'">'.$filas[1].'</option>'; 
        }
        } catch (Exception $exc) {
        echo $exc->getTraceAsString();
        } 
}
}
$dml_menu_web=new menu_web();
if (isset($_POST["Insertar"])) {
$dml_menu_web->insertar_datos($_POST['texto_menu'], $_POST['dir_menu'], $_POST['dependecia']);
}
if (isset($_POST["Modificar"])) {
$dml_menu_web->modificar_datos($_POST['codigo'],$_POST['texto_menu'], $_POST['dir_menu'], $_POST['dependecia']);}
if (isset($_POST["Eliminar"])) {
$dml_menu_web->eliminar_datos($_POST["codigoe"]);
}
if (isset($_POST["pub"])) {
//$dml_menu_web->eliminar_datos($_POST["codigoe"]);
}
if (isset($_POST["docs"])) {
//$dml_menu_web->eliminar_datos($_POST["codigoe"]);
}
if (isset($_POST["tipo_menu"])) {
    switch ($_POST["tipo_menu"]) {
        case "docs":
            $dml_menu_web->lista_trans();
            break;
        case "pub":
            $dml_menu_web->lista_publicaciones();
            break;
        case "catpub":
            $dml_menu_web->lista_cat_publicaciones();
            break;
        default:
            break;
    }

}
                                                                                