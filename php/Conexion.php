<?php

    $servidor = "localhost";
    $base_datos = "facturacion";
    $usuario = "root";
    $clave = "";

    $conexion = new mysqli($servidor, $usuario, $clave);
    mysqli_select_db($conexion, $base_datos);
