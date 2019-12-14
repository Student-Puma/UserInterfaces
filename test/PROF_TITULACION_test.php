<?php
    include '../Model/PROF_TITULACION_Model.php';

    /**
     * Test unitario para la función de añadir PROF_TITULACION
     * 
     * Valida:
     *  Inserción realizada con éxito
     *  Error en la inserción
     */
    function PROF_TITULACION_ADD_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Inserción realizada con éxito

        // Plantilla

        $PROF_TITULACION_array_error = array(
            "entidad"           => "PROF_TITULACION",
            "metodo"            => "ADD",
            "error"             => "Inserción correcta",
            "error_esperado"    => "Inserción realizada con éxito",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "DNI"       => "22222222J",
            "COD"       => "99",
            "ANHO"      => "2019-2020"
        );

        // Lógica del test

        $PROF_TITULACION = new PROF_TITULACION_Model($datos['DNI'],$datos["COD"],$datos["ANHO"]);
        $PROF_TITULACION_array_error['error_obtenido'] = $PROF_TITULACION->ADD();
        $PROF_TITULACION_array_error['resultado'] = ($PROF_TITULACION_array_error["error_esperado"] === $PROF_TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $PROF_TITULACION_array_error);

        // -------- Error en la inserción

        // Plantilla

        $PROF_TITULACION_array_error = array(
            "entidad"           => "PROF_TITULACION",
            "metodo"            => "ADD",
            "error"             => "Elemento ya existente",
            "error_esperado"    => "Inserción fallida: el elemento ya existe",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Lógica del test

        $PROF_TITULACION = new PROF_TITULACION_Model($datos['DNI'],$datos["COD"],$datos["ANHO"]);
        $PROF_TITULACION_array_error['error_obtenido'] = $PROF_TITULACION->ADD();
        $PROF_TITULACION_array_error['resultado'] = ($PROF_TITULACION_array_error["error_esperado"] === $PROF_TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $PROF_TITULACION_array_error);
    }

    /**
     * Test unitario para la función de editar PROF_TITULACION
     * 
     * Valida:
     *  Actualización realizada con éxito
     */
    function PROF_TITULACION_EDIT_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Actualización realizada con éxito

        // Plantilla

        $PROF_TITULACION_array_error = array(
            "entidad"           => "PROF_TITULACION",
            "metodo"            => "EDIT",
            "error"             => "Actualización correcta",
            "error_esperado"    => "Actualización realizada con éxito",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "DNI"       => "22222222J",
            "COD"       => "99",
            "ANHO"      => "2018-2019"
        );

        // Lógica del test

        $PROF_TITULACION = new PROF_TITULACION_Model($datos['DNI'],$datos["COD"],$datos["ANHO"]);
        $PROF_TITULACION_array_error['error_obtenido'] = $PROF_TITULACION->EDIT();
        $PROF_TITULACION_array_error['resultado'] = ($PROF_TITULACION_array_error["error_esperado"] === $PROF_TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $PROF_TITULACION_array_error);
    }

    /**
     * Test unitario para la función de borrar PROF_TITULACION
     * 
     * Valida:
     *  Borrado realizado con éxito
     */
    function PROF_TITULACION_DELETE_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Borrado realizado con éxito

        // Plantilla

        $PROF_TITULACION_array_error = array(
            "entidad"           => "PROF_TITULACION",
            "metodo"            => "DELETE",
            "error"             => "Borrado correcto",
            "error_esperado"    => "Borrado realizado con éxito",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "DNI"       => "22222222J",
            "COD"       => "99"
        );

        // Lógica del test

        $PROF_TITULACION = new PROF_TITULACION_Model($datos['DNI'],$datos["COD"],"");
        $PROF_TITULACION_array_error['error_obtenido'] = $PROF_TITULACION->DELETE();
        $PROF_TITULACION_array_error['resultado'] = ($PROF_TITULACION_array_error["error_esperado"] === $PROF_TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $PROF_TITULACION_array_error);
    }

    /**
     * Test unitario para la función de buscar PROF_TITULACION
     * 
     * Valida:
     *  recordset
     *  Error de gestor de base de datos
     */
    function PROF_TITULACION_SEARCH_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Búsqueda correcta

        // Plantilla

        $PROF_TITULACION_array_error = array(
            "entidad"           => "PROF_TITULACION",
            "metodo"            => "SEARCH",
            "error"             => "Búsqueda correcta",
            "error_esperado"    => "recordset",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "COD"           => "99"
        );

        // Lógica del test

        $PROF_TITULACION = new PROF_TITULACION_Model("",$datos["COD"],"");
        $resultado = $PROF_TITULACION->SEARCH();
        $PROF_TITULACION_array_error['error_obtenido'] = !is_string($resultado) ? "recordset" : $resultado;
        $PROF_TITULACION_array_error['resultado'] = ($PROF_TITULACION_array_error["error_esperado"] === $PROF_TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $PROF_TITULACION_array_error);

        // -------- Búsqueda fallida

        // Plantilla

        $PROF_TITULACION_array_error = array(
            "entidad"           => "PROF_TITULACION",
            "metodo"            => "SEARCH",
            "error"             => "Búsqueda incorrecta",
            "error_esperado"    => "Error de gestor de base de datos",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "COD"           => "' order by 200 #"
        );

        // Lógica del test

        $PROF_TITULACION = new PROF_TITULACION_Model("",$datos["COD"],"");
        $resultado = $PROF_TITULACION->SEARCH();
        $PROF_TITULACION_array_error['error_obtenido'] = !is_string($resultado) ? "recordset" : $resultado;
        $PROF_TITULACION_array_error['resultado'] = ($PROF_TITULACION_array_error["error_esperado"] === $PROF_TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $PROF_TITULACION_array_error);
    }

    /**
     * Test unitario para la función de rellenar datos de PROF_TITULACION
     * 
     * Valida:
     *  Tupla
     */
    function PROF_TITULACION_RellenaDatos_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Rellenar datos realizado con éxito

        // Plantilla

        $PROF_TITULACION_array_error = array(
            "entidad"           => "PROF_TITULACION",
            "metodo"            => "RellenaDatos",
            "error"             => "Relleno de datos correcto",
            "error_esperado"    => "Tupla",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "DNI"           => "22222222J",
            "COD"           => "99"
        );

        // Lógica del test

        $PROF_TITULACION = new PROF_TITULACION_Model($datos["DNI"],$datos["COD"],"");
        $resultado = $PROF_TITULACION->RellenaDatos();
        $PROF_TITULACION_array_error['error_obtenido'] = is_array($resultado) ? "Tupla" : $resultado;
        $PROF_TITULACION_array_error['resultado'] = ($PROF_TITULACION_array_error["error_esperado"] === $PROF_TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $PROF_TITULACION_array_error);
    }

    // REALIZAMOS LAS PRUEBAS

    PROF_TITULACION_ADD_test();
    PROF_TITULACION_EDIT_test();
    PROF_TITULACION_RellenaDatos_test();
    PROF_TITULACION_SEARCH_test();
    PROF_TITULACION_DELETE_test();
?>