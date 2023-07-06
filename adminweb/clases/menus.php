<?php
//requirir sesionstar() para ejecutar lectura;
 require_once '../conexion/conexion.php';
 class Menu{
     public function lista_datos(){
         try {
             $conexion=new Conexion();
                $conectado=$conexion->conectar();
                $sql="select idmenu,menu.nombre_menu,menu.direccion,menu.clase_llamar,menu.dependencia as dependencias,
                    (select menu.nombre_menu from menu where idmenu=dependencias) as menu_padre,menu.font_icon
                        from menu";
                $result=$conectado->prepare($sql);
                $result->execute();
                foreach ($result as $filas) {
                    echo '<tr>';
                        echo '<td class="hide">'.$filas[0].'</td>';
                        echo '<td>'.$filas[1].'</td>';
                        echo '<td >'.$filas[2].'</td>';
                        echo '<td >'.$filas[3].'</td>';
                        echo '<td >'.$filas[4].'</td>';
                        echo '<td >'.$filas[5].'</td>';
                        echo '<td >'.$filas[6].'</td>';
                        echo '<td>';
                            echo '<div class="action-buttons">';
//                                echo '<a class="blue" href="#">';
//                                    echo'<i class="ace-icon fa fa-search-plus bigger-130"></i>';
//                                echo '</a>';
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
        public function insertar_datos($nombre_menu,$direccion,$clase_llamar,$dependencia,$font_icon){
            
          try {
             $conexion=new Conexion();
                $conectado=$conexion->conectar();
                $sql="INSERT INTO menu(nombre_menu,direccion,clase_llamar,dependencia,font_icon)
                        VALUES(?,?,?,?,?);";
                $result=$conectado->prepare($sql);
                $result->execute([$nombre_menu,$direccion,$clase_llamar,$dependencia,$font_icon]);
         } catch (Exception $exc) {
             echo $exc->getTraceAsString();
         }  
        }
        public function modificar_datos($nombre_menu,$direccion,$clase_llamar,$dependencia,$font_icon,$codigo){
            
          try {
             $conexion=new Conexion();
                $conectado=$conexion->conectar();
                $sql="UPDATE menu
                        SET
                        nombre_menu = ?,
                        direccion = ?,
                        clase_llamar = ?,
                        dependencia = ?,
                        font_icon = ?
                        WHERE idmenu = ?;";
                $result=$conectado->prepare($sql);
                $result->execute([$nombre_menu,$direccion,$clase_llamar,$dependencia,$font_icon,$codigo]);
         } catch (Exception $exc) {
             echo $exc->getTraceAsString();
         }  
        }
        public function elimnar_datos($codigo){
            
          try {
             $conexion=new Conexion();
                $conectado=$conexion->conectar();
                $sql="DELETE FROM menu WHERE idmenu=?;";
                $result=$conectado->prepare($sql);
                $result->execute([$codigo]);
         } catch (Exception $exc) {
             echo $exc->getTraceAsString();
         }  
        }
        public function lista_menu(){
         try {
             $conexion=new Conexion();
                $conectado=$conexion->conectar();
                $sql="SELECT idmenu,nombre_menu FROM menu;";
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
 //cuerpo de las ejecuciones  
 
 $dml_menu=new Menu();
 if (isset($_POST["Eliminar"])) {
    $dml_menu->elimnar_datos($_POST["codigoe"]);
}
if (isset($_POST["Insertar"])) {
    if ($_POST["dependecia"]===""){
        $_POST["dependecia"]=null;
    }
    $dml_menu->insertar_datos($_POST["nombremenu"],$_POST["direccion"] ,$_POST["clase"] ,$_POST["dependecia"] ,$_POST["icono"]);
    
}
if (isset($_POST["Modificar"])) {
    if ($_POST["dependecia"]===""){
        $_POST["dependecia"]=null;
    }
    $dml_menu->modificar_datos( $_POST["nombremenu"], $_POST["direccion"], $_POST["clase"], $_POST["dependecia"], $_POST["icono"], $_POST["codigo"]);
}