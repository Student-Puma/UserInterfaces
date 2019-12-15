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
    include '../Model/ESPACIO_Model.php';

    /**
     * Test unitario para la función de añadir ESPACIO
     * 
     * Valida:
     *  Inserción realizada con éxito
     *  Error en la inserción
     */
    function ESPACIO_ADD_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Inserción realizada con éxito

        // Plantilla

        $ESPACIO_array_error = array(
            "entidad"           => "ESPACIO",
            "metodo"            => "ADD",
            "error"             => "Inserción correcta",
            "error_esperado"    => "Inserción realizada con éxito",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "COD"           => "99",
            "EDIFICIO"      => "99",
            "CENTRO"        => "99",
            "TIPO"          => "PAS",
            "SUPERFICIE"    => "150",
            "NUMINVENTARIO" => "20014"
        );

        // Lógica del test

        $ESPACIO = new ESPACIO_Model($datos["COD"],$datos["EDIFICIO"],$datos["CENTRO"],$datos["TIPO"],$datos["SUPERFICIE"],$datos["NUMINVENTARIO"]);
        $ESPACIO_array_error['error_obtenido'] = $ESPACIO->ADD();
        $ESPACIO_array_error['resultado'] = ($ESPACIO_array_error["error_esperado"] === $ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $ESPACIO_array_error);

        // -------- Error en la inserción

        // Plantilla

        $ESPACIO_array_error = array(
            "entidad"           => "ESPACIO",
            "metodo"            => "ADD",
            "error"             => "Elemento ya existente",
            "error_esperado"    => "Inserción fallida: el elemento ya existe",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Lógica del test

        $ESPACIO = new ESPACIO_Model($datos["COD"],$datos["EDIFICIO"],$datos["CENTRO"],$datos["TIPO"],$datos["SUPERFICIE"],$datos["NUMINVENTARIO"]);
        $ESPACIO_array_error['error_obtenido'] = $ESPACIO->ADD();
        $ESPACIO_array_error['resultado'] = ($ESPACIO_array_error["error_esperado"] === $ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $ESPACIO_array_error);
    }

    /**
     * Test unitario para la función de editar ESPACIO
     * 
     * Valida:
     *  Actualización realizada con éxito
     */
    function ESPACIO_EDIT_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Actualización realizada con éxito

        // Plantilla

        $ESPACIO_array_error = array(
            "entidad"           => "ESPACIO",
            "metodo"            => "EDIT",
            "error"             => "Actualización correcta",
            "error_esperado"    => "Actualización realizada con éxito",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "COD"           => "99",
            "EDIFICIO"      => "99",
            "CENTRO"        => "99",
            "TIPO"          => "DESPACHO",
            "SUPERFICIE"    => "150",
            "NUMINVENTARIO" => "20014"
        );

        // Lógica del test

        $ESPACIO = new ESPACIO_Model($datos["COD"],$datos["EDIFICIO"],$datos["CENTRO"],$datos["TIPO"],$datos["SUPERFICIE"],$datos["NUMINVENTARIO"]);
        $ESPACIO_array_error['error_obtenido'] = $ESPACIO->EDIT();
        $ESPACIO_array_error['resultado'] = ($ESPACIO_array_error["error_esperado"] === $ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $ESPACIO_array_error);
    }

    /**
     * Test unitario para la función de borrar ESPACIO
     * 
     * Valida:
     *  Borrado realizado con éxito
     */
    function ESPACIO_DELETE_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Borrado realizado con éxito

        // Plantilla

        $ESPACIO_array_error = array(
            "entidad"           => "ESPACIO",
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

        $ESPACIO = new ESPACIO_Model($datos["COD"],"","","","","");
        $ESPACIO_array_error['error_obtenido'] = $ESPACIO->DELETE();
        $ESPACIO_array_error['resultado'] = ($ESPACIO_array_error["error_esperado"] === $ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $ESPACIO_array_error);
    }

    /**
     * Test unitario para la función de buscar ESPACIO
     * 
     * Valida:
     *  recordset
     *  Error de gestor de base de datos
     */
    function ESPACIO_SEARCH_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Búsqueda correcta

        // Plantilla

        $ESPACIO_array_error = array(
            "entidad"           => "ESPACIO",
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

        $ESPACIO = new ESPACIO_Model($datos["COD"],"","","","","");
        $resultado = $ESPACIO->SEARCH();
        $ESPACIO_array_error['error_obtenido'] = !is_string($resultado) ? "recordset" : $resultado;
        $ESPACIO_array_error['resultado'] = ($ESPACIO_array_error["error_esperado"] === $ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $ESPACIO_array_error);

        // -------- Búsqueda fallida

        // Plantilla

        $ESPACIO_array_error = array(
            "entidad"           => "ESPACIO",
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

        $ESPACIO = new ESPACIO_Model($datos["COD"],"","","","","");
        $resultado = $ESPACIO->SEARCH();
        $ESPACIO_array_error['error_obtenido'] = !is_string($resultado) ? "recordset" : $resultado;
        $ESPACIO_array_error['resultado'] = ($ESPACIO_array_error["error_esperado"] === $ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $ESPACIO_array_error);
    }

    /**
     * Test unitario para la función de rellenar datos de ESPACIO
     * 
     * Valida:
     *  Tupla
     */
    function ESPACIO_RellenaDatos_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Rellenar datos realizado con éxito

        // Plantilla

        $ESPACIO_array_error = array(
            "entidad"           => "ESPACIO",
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

        $ESPACIO = new ESPACIO_Model($datos["COD"],"","","","","");
        $resultado = $ESPACIO->RellenaDatos();
        $ESPACIO_array_error['error_obtenido'] = is_array($resultado) ? "Tupla" : $resultado;
        $ESPACIO_array_error['resultado'] = ($ESPACIO_array_error["error_esperado"] === $ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $ESPACIO_array_error);
    }

    // REALIZAMOS LAS PRUEBAS

    ESPACIO_ADD_test();
    ESPACIO_EDIT_test();
    ESPACIO_RellenaDatos_test();
    ESPACIO_SEARCH_test();
    ESPACIO_DELETE_test();
?>