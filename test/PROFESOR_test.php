<?php
    include '../Model/PROFESOR_Model.php';

    /**
     * Test unitario para la función de añadir PROFESOR
     * 
     * Valida:
     *  Inserción realizada con éxito
     *  Error en la inserción
     */
    function PROFESOR_ADD_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Inserción realizada con éxito

        // Plantilla

        $PROFESOR_array_error = array(
            "entidad"           => "PROFESOR",
            "metodo"            => "ADD",
            "error"             => "Inserción correcta",
            "error_esperado"    => "Inserción realizada con éxito",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "DNI"           => "22222222J",
            "NOMBRE"        => "Nombre",
            "APELLIDOS"     => "Apellido",
            "DEPARTAMENTO"  => "Departamento",
            "AREA"          => "Area",
            "CAMPUS"        => "Campus"
        );

        // Lógica del test

        $PROFESOR = new PROFESOR_Model($datos["DNI"],$datos["NOMBRE"],$datos["APELLIDOS"],$datos["DEPARTAMENTO"],$datos["CAMPUS"]);
        $PROFESOR_array_error['error_obtenido'] = $PROFESOR->ADD();
        $PROFESOR_array_error['resultado'] = ($PROFESOR_array_error["error_esperado"] === $PROFESOR_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $PROFESOR_array_error);

        // -------- Error en la inserción

        // Plantilla

        $PROFESOR_array_error = array(
            "entidad"           => "PROFESOR",
            "metodo"            => "ADD",
            "error"             => "Elemento ya existente",
            "error_esperado"    => "Inserción fallida: el elemento ya existe",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Lógica del test

        $PROFESOR = new PROFESOR_Model($datos["DNI"],$datos["NOMBRE"],$datos["APELLIDOS"],$datos["DEPARTAMENTO"],$datos["CAMPUS"]);
        $PROFESOR_array_error['error_obtenido'] = $PROFESOR->ADD();
        $PROFESOR_array_error['resultado'] = ($PROFESOR_array_error["error_esperado"] === $PROFESOR_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $PROFESOR_array_error);
    }

    /**
     * Test unitario para la función de editar PROFESOR
     * 
     * Valida:
     *  Actualización realizada con éxito
     */
    function PROFESOR_EDIT_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Actualización realizada con éxito

        // Plantilla

        $PROFESOR_array_error = array(
            "entidad"           => "PROFESOR",
            "metodo"            => "EDIT",
            "error"             => "Actualización correcta",
            "error_esperado"    => "Actualización realizada con éxito",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "DNI"           => "22222222J",
            "NOMBRE"        => "Nombre",
            "APELLIDOS"     => "Apellidos",
            "DEPARTAMENTO"  => "Departamento",
            "AREA"          => "Area",
            "CAMPUS"        => "Campus"
        );

        // Lógica del test

        $PROFESOR = new PROFESOR_Model($datos["DNI"],$datos["NOMBRE"],$datos["APELLIDOS"],$datos["DEPARTAMENTO"],$datos["CAMPUS"]);
        $PROFESOR_array_error['error_obtenido'] = $PROFESOR->EDIT();
        $PROFESOR_array_error['resultado'] = ($PROFESOR_array_error["error_esperado"] === $PROFESOR_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $PROFESOR_array_error);
    }

    /**
     * Test unitario para la función de borrar PROFESOR
     * 
     * Valida:
     *  Borrado realizado con éxito
     */
    function PROFESOR_DELETE_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Borrado realizado con éxito

        // Plantilla

        $PROFESOR_array_error = array(
            "entidad"           => "PROFESOR",
            "metodo"            => "DELETE",
            "error"             => "Borrado correcto",
            "error_esperado"    => "Borrado realizado con éxito",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "DNI"           => "22222222J"
        );

        // Lógica del test

        $PROFESOR = new PROFESOR_Model($datos["DNI"],"","","","");
        $PROFESOR_array_error['error_obtenido'] = $PROFESOR->DELETE();
        $PROFESOR_array_error['resultado'] = ($PROFESOR_array_error["error_esperado"] === $PROFESOR_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $PROFESOR_array_error);
    }

    /**
     * Test unitario para la función de buscar PROFESOR
     * 
     * Valida:
     *  recordset
     *  Error de gestor de base de datos
     */
    function PROFESOR_SEARCH_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Búsqueda correcta

        // Plantilla

        $PROFESOR_array_error = array(
            "entidad"           => "PROFESOR",
            "metodo"            => "SEARCH",
            "error"             => "Búsqueda correcta",
            "error_esperado"    => "recordset",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "DNI"           => "22J"
        );

        // Lógica del test

        $PROFESOR = new PROFESOR_Model($datos["DNI"],"","","","");
        $resultado = $PROFESOR->SEARCH();
        $PROFESOR_array_error['error_obtenido'] = !is_string($resultado) ? "recordset" : $resultado;
        $PROFESOR_array_error['resultado'] = ($PROFESOR_array_error["error_esperado"] === $PROFESOR_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $PROFESOR_array_error);

        // -------- Búsqueda fallida

        // Plantilla

        $PROFESOR_array_error = array(
            "entidad"           => "PROFESOR",
            "metodo"            => "SEARCH",
            "error"             => "Búsqueda incorrecta",
            "error_esperado"    => "Error de gestor de base de datos",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "DNI"           => "22222222J'#"
        );

        // Lógica del test

        $PROFESOR = new PROFESOR_Model($datos["DNI"],"","","","");
        $resultado = $PROFESOR->SEARCH();
        $PROFESOR_array_error['error_obtenido'] = !is_string($resultado) ? "recordset" : $resultado;
        $PROFESOR_array_error['resultado'] = ($PROFESOR_array_error["error_esperado"] === $PROFESOR_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $PROFESOR_array_error);
    }

    /**
     * Test unitario para la función de rellenar datos de PROFESOR
     * 
     * Valida:
     *  Tupla
     */
    function PROFESOR_RellenaDatos_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Rellenar datos realizado con éxito

        // Plantilla

        $PROFESOR_array_error = array(
            "entidad"           => "PROFESOR",
            "metodo"            => "RellenaDatos",
            "error"             => "Relleno de datos correcto",
            "error_esperado"    => "Tupla",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "DNI"           => "22222222J"
        );

        // Lógica del test

        $PROFESOR = new PROFESOR_Model($datos["DNI"],"","","","");
        $resultado = $PROFESOR->RellenaDatos();
        $PROFESOR_array_error['error_obtenido'] = is_array($resultado) ? "Tupla" : $resultado;
        $PROFESOR_array_error['resultado'] = ($PROFESOR_array_error["error_esperado"] === $PROFESOR_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $PROFESOR_array_error);
    }

    // REALIZAMOS LAS PRUEBAS

    PROFESOR_ADD_test();
    PROFESOR_EDIT_test();
    PROFESOR_RellenaDatos_test();
    PROFESOR_SEARCH_test();
    PROFESOR_DELETE_test();
?>