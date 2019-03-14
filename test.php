<?php


    $conectado = require 'conexion/conexion.php';

    /*
    $conexion = new mysqli('localhost', 'root', 'root', 'paquetes');


    // Check connection
    if ($conexion->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $consulta = "SELECT * FROM paquete";

    $res = $conexion->query($consulta);
    var_dump($res->fetch_all());

    */


    if($conectado[0] == 1){
        //echo "conectado <br>";

        $consulta = "SELECT * FROM paquete";

        $res = $conectado[1]->query($consulta);
        //print_r ($res->fetch_array());

        $arreglo = [];

        //recorrer todo el resultado y colocarlo en el arreglo
        while ($row = mysqli_fetch_assoc($res)) {
            array_push($arreglo, [
                'id'   => $row['id'],
                'nombre' => $row['nombre'],
                'precio' => $row['precio'],
                'stock' => $row['stock'],
                'stockMin' => $row['stockMin']
            ]);
        }

        $json = json_encode($arreglo);

        //echo (json_decode($json));
        //echo '<br><br>';
        echo $json;
    }
    else{
        echo "<h3>se produjo un error: $conectado[1]</h3>";
    }


?>