<?php

    $respuesta = "";
    include("Conexion.php");
    $nombre = $_POST["nombre"];

    $sql = "SELECT cod_cliente, concat(nombresCliente, ' ',apellidosCliente) cliente FROM clientes where nombresCliente like '%".$nombre."%' union ".
            "SELECT cod_cliente, concat(nombresCliente, ' ',apellidosCliente) cliente FROM clientes where nombresCliente like '%".$nombre."%'";

    $rs = mysqli_query($conexion, $sql);
    while ($row = mysqli_fetch_array($rs)) {

        $respuesta = "<a href='#' class='list-group-item' cod_cliente='".$row['cod_cliente']."' value = '".$row['cliente']."' onclick=\"retornaDatosCliente(".$row['cod_cliente'].
            ",'".$row['cliente']."')\">".$row['cliente']."</a>";

    }

    echo $respuesta;