<?php
    include '../Model/TITULACION_Model.php';

    /**
     * Test unitario para la función de añadir TITULACION
     * 
     * Valida:
     *  Inserción realizada con éxito
     *  Error en la inserción
     */
    function TITULACION_ADD_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Inserción realizada con éxito

        // Plantilla

        $TITULACION_array_error = array(
            "entidad"           => "TITULACION",
            "metodo"            => "ADD",
            "error"             => "Inserción correcta",
            "error_esperado"    => "Inserción realizada con éxito",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "COD"           => "99",
            "CENTRO"        => "99",
            "NOMBRE"        => "NOMBRE",
            "RESPONSABLE"   => "RESPONSABLE"
        );

        // Lógica del test

        $TITULACION = new TITULACION_Model($datos["COD"],$datos["CENTRO"],$datos["NOMBRE"],$datos["RESPONSABLE"]);
        $TITULACION_array_error['error_obtenido'] = $TITULACION->ADD();
        $TITULACION_array_error['resultado'] = ($TITULACION_array_error["error_esperado"] === $TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $TITULACION_array_error);

        // -------- Error en la inserción

        // Plantilla

        $TITULACION_array_error = array(
            "entidad"           => "TITULACION",
            "metodo"            => "ADD",
            "error"             => "Elemento ya existente",
            "error_esperado"    => "Inserción fallida: el elemento ya existe",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Lógica del test

        $TITULACION = new TITULACION_Model($datos["COD"],$datos["CENTRO"],$datos["NOMBRE"],$datos["RESPONSABLE"]);
        $TITULACION_array_error['error_obtenido'] = $TITULACION->ADD();
        $TITULACION_array_error['resultado'] = ($TITULACION_array_error["error_esperado"] === $TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $TITULACION_array_error);
    }

    /**
     * Test unitario para la función de editar TITULACION
     * 
     * Valida:
     *  Actualización realizada con éxito
     */
    function TITULACION_EDIT_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Actualización realizada con éxito

        // Plantilla

        $TITULACION_array_error = array(
            "entidad"           => "TITULACION",
            "metodo"            => "EDIT",
            "error"             => "Actualización correcta",
            "error_esperado"    => "Actualización realizada con éxito",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "COD"           => "99",
            "CENTRO"        => "99",
            "NOMBRE"        => "NOMBRES",
            "RESPONSABLE"   => "RESPONSABLE"
        );

        // Lógica del test

        $TITULACION = new TITULACION_Model($datos["COD"],$datos["CENTRO"],$datos["NOMBRE"],$datos["RESPONSABLE"]);
        $TITULACION_array_error['error_obtenido'] = $TITULACION->EDIT();
        $TITULACION_array_error['resultado'] = ($TITULACION_array_error["error_esperado"] === $TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $TITULACION_array_error);
    }

    /**
     * Test unitario para la función de borrar TITULACION
     * 
     * Valida:
     *  Borrado realizado con éxito
     */
    function TITULACION_DELETE_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Borrado realizado con éxito

        // Plantilla

        $TITULACION_array_error = array(
            "entidad"           => "TITULACION",
            "metodo"            => "DELETE",
            "error"             => "Borrado correcto",
            "error_esperado"    => "Borrado realizado con éxito",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "COD" => "99"
        );

        // Lógica del test

        $TITULACION = new TITULACION_Model($datos["COD"],"","","");
        $TITULACION_array_error['error_obtenido'] = $TITULACION->DELETE();
        $TITULACION_array_error['resultado'] = ($TITULACION_array_error["error_esperado"] === $TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $TITULACION_array_error);
    }

    /**
     * Test unitario para la función de buscar TITULACION
     * 
     * Valida:
     *  recordset
     *  Error de gestor de base de datos
     */
    function TITULACION_SEARCH_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Búsqueda correcta

        // Plantilla

        $TITULACION_array_error = array(
            "entidad"           => "TITULACION",
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

        $TITULACION = new TITULACION_Model($datos["COD"],"","","");
        $resultado = $TITULACION->SEARCH();
        $TITULACION_array_error['error_obtenido'] = !is_string($resultado) ? "recordset" : $resultado;
        $TITULACION_array_error['resultado'] = ($TITULACION_array_error["error_esperado"] === $TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $TITULACION_array_error);

        // -------- Búsqueda fallida

        // Plantilla

        $TITULACION_array_error = array(
            "entidad"           => "TITULACION",
            "metodo"            => "SEARCH",
            "error"             => "Búsqueda incorrecta",
            "error_esperado"    => "Error de gestor de base de datos",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "COD"           => "99'#"
        );

        // Lógica del test

        $TITULACION = new TITULACION_Model($datos["COD"],"","","");
        $resultado = $TITULACION->SEARCH();
        $TITULACION_array_error['error_obtenido'] = !is_string($resultado) ? "recordset" : $resultado;
        $TITULACION_array_error['resultado'] = ($TITULACION_array_error["error_esperado"] === $TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $TITULACION_array_error);
    }

    /**
     * Test unitario para la función de rellenar datos de TITULACION
     * 
     * Valida:
     *  Tupla
     */
    function TITULACION_RellenaDatos_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Rellenar datos realizado con éxito

        // Plantilla

        $TITULACION_array_error = array(
            "entidad"           => "TITULACION",
            "metodo"            => "RellenaDatos",
            "error"             => "Relleno de datos correcto",
            "error_esperado"    => "Tupla",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "COD"           => "99"
        );

        // Lógica del test

        $TITULACION = new TITULACION_Model($datos["COD"],"","","");
        $resultado = $TITULACION->RellenaDatos();
        $TITULACION_array_error['error_obtenido'] = is_array($resultado) ? "Tupla" : $resultado;
        $TITULACION_array_error['resultado'] = ($TITULACION_array_error["error_esperado"] === $TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $TITULACION_array_error);
    }

    // REALIZAMOS LAS PRUEBAS

    TITULACION_ADD_test();
    TITULACION_EDIT_test();
    TITULACION_RellenaDatos_test();
    TITULACION_SEARCH_test();
    TITULACION_DELETE_test();
?>