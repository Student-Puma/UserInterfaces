<?php
    include '../Model/EDIFICIO_Model.php';

    /**
     * Test unitario para la función de añadir edificio
     * 
     * Valida:
     *  Inserción realizada con éxito
     *  Error en la inserción
     */
    function EDIFICIO_ADD_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Inserción realizada con éxito

        // Plantilla

        $EDIFICIO_array_error = array(
            "entidad"           => "EDIFICIO",
            "metodo"            => "ADD",
            "error"             => "Inserción correcta",
            "error_esperado"    => "Inserción realizada con éxito",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "COD"       => "99",
            "NOMBRE"    => "UVIGO",
            "DIRECCION" => "OURENSE",
            "CAMPUS"    => "NUEVO"
        );

        // Lógica del test

        $edificio = new EDIFICIO_Model($datos["COD"],$datos["NOMBRE"],$datos["DIRECCION"],$datos["CAMPUS"]);
        $EDIFICIO_array_error['error_obtenido'] = $edificio->ADD();
        $EDIFICIO_array_error['resultado'] = ($EDIFICIO_array_error["error_esperado"] === $EDIFICIO_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $EDIFICIO_array_error);

        // -------- Error en la inserción

        // Plantilla

        $EDIFICIO_array_error = array(
            "entidad"           => "EDIFICIO",
            "metodo"            => "ADD",
            "error"             => "Elemento ya existente",
            "error_esperado"    => "Inserción fallida: el elemento ya existe",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "COD"       => "99",
            "NOMBRE"    => "UVIGO",
            "DIRECCION" => "OURENSE",
            "CAMPUS"    => "NUEVO"
        );

        // Lógica del test

        $edificio = new EDIFICIO_Model($datos["COD"],$datos["NOMBRE"],$datos["DIRECCION"],$datos["CAMPUS"]);
        $EDIFICIO_array_error['error_obtenido'] = $edificio->ADD();
        $EDIFICIO_array_error['resultado'] = ($EDIFICIO_array_error["error_esperado"] === $EDIFICIO_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $EDIFICIO_array_error);
    }

    // REALIZAMOS LAS PRUEBAS

    EDIFICIO_ADD_test();
?>