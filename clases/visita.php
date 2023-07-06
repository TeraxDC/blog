<?php

require_once './conexion/conexion.php';
class Visita {
public function listar_visitas(){
try {
$conexion=new Conexion();
$conectado=$conexion->conectar();
$sql="select * from visitas";
$result=$conectado->prepare($sql);
$result->execute([]);
echo '<h3>  Registro de Visitas a Funcionarios de la Municipalidad Provincial de Huaytará</h3>';
echo '<table id="visitas" class="table_data display nowrap" style="width:100%">';
            echo '<thead>';
            echo '<tr>';
            echo '<th scope="col">Fecha</th>';
            echo '<th scope="col">Nombre y Apellidos</th>';
            echo '<th scope="col">DNI</th>';
            echo '<th scope="col">Motivo de la Visita</th>';
            echo '<th scope="col">Oficina/Funcionario</th>';
            echo '<th scope="col">Lugar de Reunión</th>';
            echo '<th scope="col">Hora de Ingreso</th>';
            echo '<th scope="col">Hora de Salida</th>';
            echo '</tr>';
            echo '</thead>';

            echo '<tbody>';

foreach ($result as $cell) {
    echo '<tr>';
    echo '<td>' .$cell['fecha'].'</td>';
    echo '<td>'.$cell['nombre'].' </td>';
    echo '<td>'.$cell['dni'].'</td>';
    echo '<td>'.$cell['motivo'].'</td>';
    echo '<td>'.$cell['oficina'].'</td>';
    echo '<td>'.$cell['lugar'].'</td>';
    echo '<td>'.$cell['horaIngreso'].'</td>';
    echo '<td>'.$cell['horaSalida'].'</td>';
    echo '</tr>';
}

 echo '</tbody>';
            echo '</table>';

} catch (Exception $exc) {
echo $exc->getTraceAsString();
}
}

//

public function insertar_visita($fecha, $nombre, $dni, $motivo, $oficina, $lugar, $horaIngreso, $horaSalida)
    {

        try {
            $conexion=new Conexion();
            $conectado=$conexion->conectar();
            $sql = "insert into visitas (fecha,nombre,dni,motivo,oficina,lugar,horaIngreso,horaSalida) values(?,?,?,?,?,?,?,?)";
            $result = $conectado->prepare($sql);
            $result->execute([$fecha, $nombre, $dni, $motivo, $oficina, $lugar, $horaIngreso, $horaSalida]);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }


//
}