<?php
    /**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 15/12/2019
	 */

    /**
     * Test unitario
     */

    // Incluímos el modelo
    include '../Model/PROF_ESPACIO_Model.php';

    /**
     * Test unitario para la función de añadir PROF_ESPACIO
     * 
     * Valida:
     *  Inserción realizada con éxito
     *  Error en la inserción
     */
    function PROF_ESPACIO_ADD_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Inserción realizada con éxito

        // Plantilla

        $PROF_ESPACIO_array_error = array(
            "entidad"           => "PROF_ESPACIO",
            "metodo"            => "ADD",
            "error"             => "Inserción correcta",
            "error_esperado"    => "Inserción realizada con éxito",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "DNI"       => "22222222J",
            "COD"       => "99"
        );

        // Lógica del test

        $PROF_ESPACIO = new PROF_ESPACIO_Model($datos['DNI'],$datos["COD"]);
        $PROF_ESPACIO_array_error['error_obtenido'] = $PROF_ESPACIO->ADD();
        $PROF_ESPACIO_array_error['resultado'] = ($PROF_ESPACIO_array_error["error_esperado"] === $PROF_ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $PROF_ESPACIO_array_error);

        // -------- Error en la inserción

        // Plantilla

        $PROF_ESPACIO_array_error = array(
            "entidad"           => "PROF_ESPACIO",
            "metodo"            => "ADD",
            "error"             => "Elemento ya existente",
            "error_esperado"    => "Inserción fallida: el elemento ya existe",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Lógica del test

        $PROF_ESPACIO = new PROF_ESPACIO_Model($datos['DNI'],$datos["COD"]);
        $PROF_ESPACIO_array_error['error_obtenido'] = $PROF_ESPACIO->ADD();
        $PROF_ESPACIO_array_error['resultado'] = ($PROF_ESPACIO_array_error["error_esperado"] === $PROF_ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $PROF_ESPACIO_array_error);
    }

    /**
     * Test unitario para la función de editar PROF_ESPACIO
     * 
     * Valida:
     *  Actualización realizada con éxito
     */
    function PROF_ESPACIO_EDIT_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Actualización realizada con éxito

        // Plantilla

        $PROF_ESPACIO_array_error = array(
            "entidad"           => "PROF_ESPACIO",
            "metodo"            => "EDIT",
            "error"             => "Actualización correcta",
            "error_esperado"    => "Actualización realizada con éxito",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "DNI"       => "22222222J",
            "COD"       => "99"
        );

        // Lógica del test

        $PROF_ESPACIO = new PROF_ESPACIO_Model($datos['DNI'],$datos["COD"]);
        $PROF_ESPACIO_array_error['error_obtenido'] = $PROF_ESPACIO->EDIT();
        $PROF_ESPACIO_array_error['resultado'] = ($PROF_ESPACIO_array_error["error_esperado"] === $PROF_ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $PROF_ESPACIO_array_error);
    }

    /**
     * Test unitario para la función de borrar PROF_ESPACIO
     * 
     * Valida:
     *  Borrado realizado con éxito
     */
    function PROF_ESPACIO_DELETE_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Borrado realizado con éxito

        // Plantilla

        $PROF_ESPACIO_array_error = array(
            "entidad"           => "PROF_ESPACIO",
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

        $PROF_ESPACIO = new PROF_ESPACIO_Model($datos['DNI'],$datos["COD"]);
        $PROF_ESPACIO_array_error['error_obtenido'] = $PROF_ESPACIO->DELETE();
        $PROF_ESPACIO_array_error['resultado'] = ($PROF_ESPACIO_array_error["error_esperado"] === $PROF_ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $PROF_ESPACIO_array_error);
    }

    /**
     * Test unitario para la función de buscar PROF_ESPACIO
     * 
     * Valida:
     *  recordset
     *  Error de gestor de base de datos
     */
    function PROF_ESPACIO_SEARCH_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Búsqueda correcta

        // Plantilla

        $PROF_ESPACIO_array_error = array(
            "entidad"           => "PROF_ESPACIO",
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

        $PROF_ESPACIO = new PROF_ESPACIO_Model("",$datos["COD"]);
        $resultado = $PROF_ESPACIO->SEARCH();
        $PROF_ESPACIO_array_error['error_obtenido'] = !is_string($resultado) ? "recordset" : $resultado;
        $PROF_ESPACIO_array_error['resultado'] = ($PROF_ESPACIO_array_error["error_esperado"] === $PROF_ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $PROF_ESPACIO_array_error);

        // -------- Búsqueda fallida

        // Plantilla

        $PROF_ESPACIO_array_error = array(
            "entidad"           => "PROF_ESPACIO",
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

        $PROF_ESPACIO = new PROF_ESPACIO_Model("",$datos["COD"]);
        $resultado = $PROF_ESPACIO->SEARCH();
        $PROF_ESPACIO_array_error['error_obtenido'] = !is_string($resultado) ? "recordset" : $resultado;
        $PROF_ESPACIO_array_error['resultado'] = ($PROF_ESPACIO_array_error["error_esperado"] === $PROF_ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $PROF_ESPACIO_array_error);
    }

    /**
     * Test unitario para la función de rellenar datos de PROF_ESPACIO
     * 
     * Valida:
     *  Tupla
     */
    function PROF_ESPACIO_RellenaDatos_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Rellenar datos realizado con éxito

        // Plantilla

        $PROF_ESPACIO_array_error = array(
            "entidad"           => "PROF_ESPACIO",
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

        $PROF_ESPACIO = new PROF_ESPACIO_Model($datos["DNI"],$datos["COD"]);
        $resultado = $PROF_ESPACIO->RellenaDatos();
        $PROF_ESPACIO_array_error['error_obtenido'] = is_array($resultado) ? "Tupla" : $resultado;
        $PROF_ESPACIO_array_error['resultado'] = ($PROF_ESPACIO_array_error["error_esperado"] === $PROF_ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $PROF_ESPACIO_array_error);
    }

    // REALIZAMOS LAS PRUEBAS

    PROF_ESPACIO_ADD_test();
    PROF_ESPACIO_EDIT_test();
    PROF_ESPACIO_RellenaDatos_test();
    PROF_ESPACIO_SEARCH_test();
    PROF_ESPACIO_DELETE_test();
?>