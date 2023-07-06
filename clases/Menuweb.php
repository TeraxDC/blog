<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Menuweb
 *
 * @author LUCHO
 */
require_once  './conexion/conexion.php';
class Menuweb {
    public function listar_menu_principal(){
         try {
             $conexion=new Conexion();
                $conectado=$conexion->conectar();
                $sql="select idmenu_Web,texto_menu,direccion_menu
                        from menu_web
                        where dependencia is null or dependencia=0";
                $result=$conectado->prepare($sql);
                $result->execute([]);
                
                foreach ($result as $filas) {
                    $menus_dependientes= self::listar_dependientes($filas[0]);
                    if ($menus_dependientes!=="<ul></ul>") {
//                        echo '<li class="menu-has-children"><a href="'.$filas[2].'">'.$filas[1].'</a>';
                        echo '<li class="drop-down"><a href="'.$filas[2].'">'.$filas[1].'</a>';
                        echo $menus_dependientes;
                    }else{
                       //echo '<li><a href="'.$filas[2].'" >'.$filas[1].'</a>';
                       echo '<li ><a href="'.$filas[2].'">'.$filas[1].'</a></li>';
                    }
                    echo  '</li> ';
                }
                
         } catch (Exception $exc) {
             echo $exc->getTraceAsString();
         }
        }
    public function listar_dependientes($idmenu){
         try {
             $conexion=new Conexion();
                $conectado=$conexion->conectar();
                $sql="select idmenu_Web,texto_menu,direccion_menu
                        from menu_web
                        where dependencia=?";
                $result=$conectado->prepare($sql);
                $result->execute([$idmenu]);
                $menus_hijos= '<ul>';
                foreach ($result as $filas) {
                    $menu_depend1= self::listar_dependientes1($filas[0]);
                    if ($menu_depend1!=="<ul></ul>") {
//                        $menus_hijos.= '<li class="menu-has-children"><a href="'.$filas[2].'">'.$filas[1].'</a>';
                        $menus_hijos.= '<li class="drop-down"><a href="'.$filas[2].'">'.$filas[1].'</a>';
                        $menus_hijos.= $menu_depend1;
                    }else{
//                       $menus_hijos.= '<li><a href="'.$filas[2].'">'.$filas[1].'</a></li>';
                        $menus_hijos.='<li><a href="'.$filas[2].'">'.$filas[1].'</a></li>';
                    }
                    
                }
                    $menus_hijos.= '</ul>';
                return $menus_hijos;
         } catch (Exception $exc) {
             echo $exc->getTraceAsString();
         }
        }
         public function listar_dependientes1($idmenu){
         try {
             $conexion=new Conexion();
                $conectado=$conexion->conectar();
                $sql="select idmenu_Web,texto_menu,direccion_menu
                        from menu_web
                        where dependencia=?";
                $result=$conectado->prepare($sql);
                $result->execute([$idmenu]);
                $menus_hijos= '<ul>';
                foreach ($result as $filas) {
                        $menu_depend2= self::listar_dependientes2($filas[0]);
                    if ($menu_depend2!=="<ul></ul>") {
//                        $menus_hijos.= '<li class="menu-has-children"><a href="'.$filas[2].'">'.$filas[1].'</a>';
                        $menus_hijos.= '<li class="drop-down"><a href="'.$filas[2].'">'.$filas[1].'</a>';
                        $menus_hijos.= $menu_depend2;
                    }else{
//                       $menus_hijos.= '<li><a href="'.$filas[2].'">'.$filas[1].'</a></li>';
                        $menus_hijos.='<li><a href="'.$filas[2].'">'.$filas[1].'</a></li>';
                    }
                }
                $menus_hijos.= '</ul>';
                return $menus_hijos;
         } catch (Exception $exc) {
             echo $exc->getTraceAsString();
         }
        }
            public function listar_dependientes2($idmenu){
         try {
             $conexion=new Conexion();
                $conectado=$conexion->conectar();
                $sql="select idmenu_Web,texto_menu,direccion_menu
                        from menu_web
                        where dependencia=?";
                $result=$conectado->prepare($sql);
                $result->execute([$idmenu]);
                $menus_hijos= '<ul>';
                foreach ($result as $filas) {
                        $menus_hijos.= '<li><a href="'.$filas[2].'">'.$filas[1].'</a></li>';     
                }
                $menus_hijos.= '</ul>';
                return $menus_hijos;
         } catch (Exception $exc) {
             echo $exc->getTraceAsString();
         }
        }
}
