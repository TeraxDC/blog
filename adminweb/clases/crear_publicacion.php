<?php
require_once '../conexion/conexion.php';
class publicaciones{
public function lista_tablas(){
 try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
$sql="select publicaciones.idpublicaciones,categoria_publicacion.idcategoria_publicacion,categoria_publicacion.nombre,publicaciones.titulo_publicacion,
fecha
from publicaciones
inner join categoria_publicacion on publicaciones.idcategoria=categoria_publicacion.idcategoria_publicacion
order by fecha desc";
$result=$conectado->prepare($sql);
$result->execute([]);
foreach ($result as $filas) {
echo '<tr>';

echo '<td ><a href="./v_crear_publicacion.php?publicacion='.$filas[0].'">'.$filas[3].'</a></td>';
echo '<td >'.$filas[2].'</td>';
echo '<td >'.$filas[4].'</td>';
echo '<td class="center">';
echo '<div class="action-buttons">';
echo '<a class="red eliminar tooltip-error" data-rel="tooltip" title="Eliminar" href="#" data-id="'.$filas[0].'">';
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
$sql="select idcategoria_publicacion,nombre from categoria_publicacion";
$result=$conectado->prepare($sql);
$result->execute([]);
foreach ($result as $filas) {
echo "<option value=\"$filas[0]\">$filas[1]</option>";
}
} catch (Exception $exc) {
echo $exc->getTraceAsString();
}
}
public function lista_subcategorias(){
 try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
$sql="select idsub_categoria,nombre_sub_cat from sub_categoria";
$result=$conectado->prepare($sql);
$result->execute([]);
foreach ($result as $filas) {
    echo "<option value=\"$filas[0]\">$filas[1]</option>";
}
} catch (Exception $exc) {
echo $exc->getTraceAsString();
}
}
public function obtener_data_publicacion($idpublicacion){
 try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
$sql="select * from publicaciones where idpublicaciones=?";
$result=$conectado->prepare($sql);
$result->execute([$idpublicacion]);
echo json_encode($result->fetchAll());
} catch (Exception $exc) {
echo $exc->getTraceAsString();
}
}
public function insertar_datos($idcategoria,$idusuario,$titulo_publicacion,$contenido_publicacion,$estado,$comentarios,$imagen_logo,$subcategoria){
    
try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
 $sql="insert into publicaciones (idcategoria,idusuario,titulo_publicacion,contenido_publicacion,estado,comentarios,imagen_logo,idsubcatgegoria) values(?,?,?,?,?,?,?,?)";
$result=$conectado->prepare($sql);
$result->execute([$idcategoria,$idusuario,$titulo_publicacion,$contenido_publicacion,$estado,$comentarios,$imagen_logo,$subcategoria]);
$stmt=$conectado->prepare("SELECT LAST_INSERT_ID()");
$stmt->execute();
$lastId = $stmt->fetchColumn();
echo $lastId;
} catch (Exception $exc) {
echo $exc->getTraceAsString();
}
}
public function modificar_datos($idpublicaciones,$idcategoria,$idusuario,$contenido_publicacion,$titulo_publicacion,$estado,$comentarios,$idsubcatgegoria){
try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
$sql="update publicaciones set  idcategoria=?, idusuario=?,   contenido_publicacion=?, titulo_publicacion=?, estado=?, comentarios=?, idsubcatgegoria=? where   idpublicaciones=?";
$result=$conectado->prepare($sql);
$result->execute([$idcategoria,$idusuario,$contenido_publicacion,$titulo_publicacion,$estado,$comentarios,$idsubcatgegoria,$idpublicaciones]);
} catch (Exception $exc) {
 echo $exc->getTraceAsString();
}
}
public function eliminar_datos($idpublicaciones){
try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
$sql="DELETE FROM publicaciones WHERE idpublicaciones=?;";
$result=$conectado->prepare($sql);
$result->execute([$idpublicaciones]);
} catch (Exception $exc) {
echo $exc->getTraceAsString();
}
}
public function list_imagenes(){
    $ruta='../imagenes/publicaciones';
    $directorio=opendir($ruta);
    $resultado="";
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    if (is_dir($archivo))//verificamos si es o no un directorio
    {
//        echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
    }
    else
    {
            $resultado.="<li>";
            $resultado.="<div>";
            $resultado.='<img width="117" height="117" alt="150x150" src="'.$ruta.'/'.$archivo.'" />';
            $resultado.='<div class="text">';
            $resultado.='<div class="inner">';
            $resultado.='<br />';
            $resultado.='<a href="'.$ruta.'/'.$archivo.'" data-rel="colorbox">';
            $resultado.='<i class="ace-icon fa fa-search-plus"></i>';
            $resultado.='</a>';
            $resultado.='<a href="#" class="copy_data"  id="'.$archivo.'">';
            $resultado.='<i class="ace-icon fa fa-files-o"></i>';
            $resultado.='</a>';
            $resultado.='<input type="text" class="dir_imagen" value="'.$ruta.'/'.$archivo.'" style="opacity: 0;" />';
            $resultado.='</div>';
            $resultado.='</div>';
            $resultado.='</div>';
            $resultado.='</li>';
    }
}
echo $resultado;
   
}

}
$dml_publicaciones=new publicaciones();
if (isset($_POST["Insertar"])) {
    $nombre_fichero=null;
if(isset($_FILES['fichero'])){
if(is_uploaded_file($_FILES['fichero']['tmp_name'])) {
    $nombre_fichero= md5($_FILES['fichero']['name']).$_FILES['fichero']['name'];
    $ruta = "../imagenes/publicaciones/"; 
    $upload= $ruta . $nombre_fichero;
    if(!move_uploaded_file($_FILES['fichero']['tmp_name'], $upload)) { //movemos el archivo a su ubicacion      
          echo "ARCHIVO DEMASIADO GRANDE PARA SUBIR"  ;
          return;
        }
}
}else{
    echo "no hay archivo";
}  
if (!isset($_SESSION)) {
    session_start();
}
$dml_publicaciones->insertar_datos($_POST["idcategoria"],$_SESSION['mwusuario'],$_POST["titulo_publicacion"],$_POST["contenido_publicacion"],$_POST["estado"],$_POST["comentarios"]   ,$nombre_fichero,$_POST['idsubcatgegoria']);
}
if (isset($_POST["Modificar"])) {
if (!isset($_SESSION)) {
    session_start();
}
$dml_publicaciones->modificar_datos(    
    $_POST["idpublicaciones"],$_POST["idcategoria"],$_SESSION['mwusuario'],$_POST["contenido_publicacion"],$_POST["titulo_publicacion"],$_POST["estado"],$_POST["comentarios"],$_POST["idsubcatgegoria"]);
}
if (isset($_POST["Eliminar"])) {
$dml_publicaciones->eliminar_datos($_POST["codigoe"]);
}
if (isset($_POST["Obtener_data"])) {
$dml_publicaciones->obtener_data_publicacion($_POST['idpublicacion']);
}
if (isset($_POST["subir_imagen"])) {
$nombre_fichero=null;
$resultado="";
if(isset($_FILES['fichero'])){
    if(is_uploaded_file($_FILES['fichero']['tmp_name'])) {
        $nombre_fichero= md5($_FILES['fichero']['name']).$_FILES['fichero']['name'];
        $ruta = "../imagenes/publicaciones/"; 
        $upload= $ruta . $nombre_fichero;
        if(!move_uploaded_file($_FILES['fichero']['tmp_name'], $upload)) { //movemos el archivo a su ubicacion      
                  echo "ARCHIVO DEMASIADO GRANDE PARA SUBIR"  ;
                  return;
                }
           $resultado.="<li>";
            $resultado.="<div>";
            $resultado.='<img width="117" height="117" alt="150x150" src="'.$ruta . $nombre_fichero.'" />';
            $resultado.='<div class="text">';
            $resultado.='<div class="inner">';
            $resultado.='<br />';
            $resultado.='<a href="'.$ruta . $nombre_fichero.'" data-rel="colorbox">';
            $resultado.='<i class="ace-icon fa fa-search-plus"></i>';
            $resultado.='</a>';
            $resultado.='<a href="#" class="copy_data"  id="'.$nombre_fichero.'">';
            $resultado.='<i class="ace-icon fa fa-files-o"></i>';
            $resultado.='</a>';
            $resultado.='<input type="text" class="dir_imagen" value="'.$ruta . $nombre_fichero.'" style="opacity: 0;" />';
            $resultado.='</div>';
            $resultado.='</div>';
            $resultado.='</div>';
            $resultado.='</li>';
            echo $resultado;
        }
        }else{
            echo "no hay archivo";
            return;
        }
}

                                                                                