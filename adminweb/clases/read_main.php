<?php

require_once '../conexion/conexion.php';

class Read_main{
    
    public function list_menu($usuario,$modulo,$complemento_direccion){
//        session_start();    
        try {
            $conexion=new Conexion();
            $conectar=$conexion->conectar();
            $sql="select menu.nombre_menu,menu.clase_llamar,menu.direccion,menu.dependencia,menu.font_icon,menu.idmenu
                    from accesos_usuario
                    inner join usuario on accesos_usuario.idusuario=usuario.id_ususario
                    inner join menu on accesos_usuario.idmenu=menu.idmenu
                    where usuario.id_ususario=? and accesos_usuario.access=true and menu.dependencia is null ";
            $result=$conectar->prepare($sql);
            $result->execute(array($usuario));
            foreach ($result as $list_main) {
                echo '<li class="'.$list_main[1].'" id="mm'.$list_main[5].'">';
                echo '<a href="#" class="dropdown-toggle">';
		echo	'<i class="'.$list_main[4].'"></i>';
		echo	'<span class="menu-text">';
                    echo    $list_main[0];
		echo	'</span>';
		echo	'<b class="arrow fa fa-angle-down"></b>';
                echo    '<b class="arrow"></b>';
                echo  '</a>';
                echo '<b class="arrow"></b>';
                //verificando dependencias
                $subsql="select menu.nombre_menu,menu.clase_llamar,menu.direccion,menu.dependencia,menu.font_icon,menu.idmenu
                    from accesos_usuario
                   inner join usuario on accesos_usuario.idusuario=usuario.id_ususario
                    inner join menu on accesos_usuario.idmenu=menu.idmenu
                    where usuario.id_ususario=? and accesos_usuario.access=true and menu.dependencia=?
                    order by menu.nombre_menu asc ";
                $subresult=$conectar->prepare($subsql);
                $subresult->execute([$usuario,$list_main[5]]);
                if ($subresult->rowCount()>0) {
                   echo '<ul class="submenu">';
                    foreach ($subresult as $list_submain) {
                        echo '<li class="" id="mm'.$list_submain[5].'">';
                            echo '<a href="'.$complemento_direccion.$list_submain[2].'" >';
                            echo '<i class="menu-icon fa fa-caret-right"></i>';
				echo $list_submain[0];
                            echo '<b class="arrow"></b>';
                            echo '</a>';
                            echo '<b class="arrow"></b>';
                        echo '</li>'; 
                    }
                   echo '</ul>';
                }
                echo '</li>';
            }
        } catch (Exception $exc) {
            header('location: read_main.php');
            echo $exc->getTraceAsString();
        }  
    }

}
