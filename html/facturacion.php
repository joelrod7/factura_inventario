<?php
    include("../php/Conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap-4.6.0/dist/css/bootstrap.css">
    <title>Facturacion</title>
</head>
<body onload="fecha()">
    <div class="container">
        <form action="" method="post">
            FACTURACION
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="">Cliente:</label>
                    <input type="text" name="cod_cliente" id="cod_cliente" class="form-control">
                </div>
                <div>
                    <label for="">Nombre:</label>
                    <input type="text" name="nom_cliente" id="nom_cliente" class="form-control" onkeyup="buscaCliente()">
                    <div id="sugerencias" class ="list-group"></div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="">Fecha:</label>
                    <input type="text" name="fecha" id="fecha" class="form-control">
                </div>
                <div class="form-group col-md-2">
                    <label for="">Subtotal</label>
                    <input type="text" name="subtotal" id="subtotal" class="form-control">
                </div>
                <div class="form-group col-md-2">
                    <label for="">Iva:</label>
                    <input type="text" name="iva" id="iva" class="form-control">
                </div>
                <div class="form-group col-md-2">
                    <label for="">Total</label>
                    <input type="text" name="total" id="total" class="form-control">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-1">
                    <label for="">IdProd</label>
                    <input type="text" name="IdProducto" id="IdProducto" class="form-control">
                </div>
                <div class="form-group col-md-5">
                    <label for="">Desc. Producto</label>
                    <input type="text" name="nombreProducto" id="nombreProducto" class="form-control">
                </div>
                <div class="form-group col-md-2">
                    <label for="">PVP</label>
                    <input type="text" name="pvp" id="pvp" class="form-control">
                </div>
                <div class="form-group col-md-2">
                    <label for="">Cant</label>
                    <input type="text" name="cantidad" id="cantidad" class="form-control">
                </div>
                <div class="form-group col-md-1">
                    <label for="">Registrar</label>
                    <input type="button" value="Add" class="form-control">
                </div>
            </div>

            <table id="detalle" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>IdProducto</th>
                        <th>Desc. Producto</th>
                        <th>PVP</th>
                        <th>Cant.</th>
                        <th>Total</th>
                    </tr>
                </thead>
            </table>
        </form>
    </div>
</body>

<script>

    function buscaCliente() {
        
        var criterio = document.getElementById("nom_cliente").value;
        var lista;
        if (criterio.length > 3) {
            
            // Ajax
            if (window.XMLHttpRequest) {
                xhr = new XMLHttpRequest();
            }
            else if(window.ActiveXObject){
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xhr.onreadystatechange = confirmar;
            xhr.open('POST','../php/retornaDatos.php', false);
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            // xhr.send("nombre= "+document.getElementById("nom_cliente").value);
            xhr.send("nombre= "+criterio);

            function confirmar() {

                if (xhr.readyState == 4) {
                    if (xhr.status = 200) {
                        respuesta = this.responseText;
                        if (respuesta = 0) {
                            alert("No existe");
                        }else{
                            lista = document.getElementById("sugerencias");
                            lista.innerHTML = respuesta;
                        }
                    }
                }
            }
        }
    }

    function fecha() {

        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();

        if (dd < 10) {
            dd '0'+ dd;
        }
        if (mm < 10) {
            mm = "0" + mm;
        }
        today = dd + '/' + mm + '/' + yyyy;
        document.getElementById("fecha").value = today;
    }


</script>
</html>