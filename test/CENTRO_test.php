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
    include '../Model/CENTRO_Model.php';

    /**
     * Test unitario para la función de añadir CENTRO
     * 
     * Valida:
     *  Inserción realizada con éxito
     *  Error en la inserción
     */
    function CENTRO_ADD_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Inserción realizada con éxito

        // Plantilla

        $CENTRO_array_error = array(
            "entidad"           => "CENTRO",
            "metodo"            => "ADD",
            "error"             => "Inserción correcta",
            "error_esperado"    => "Inserción realizada con éxito",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "COD"           => "99",
            "EDIFICIO"       => "99",
            "NOMBRE"        => "NOMBRE",
            "DIRECCION"     => "DIRECCION",
            "RESPONSABLE"   => "RESPONSABLE"
        );

        // Lógica del test

        $CENTRO = new CENTRO_Model($datos["COD"],$datos["EDIFICIO"],$datos["NOMBRE"],$datos["DIRECCION"],$datos["RESPONSABLE"]);
        $CENTRO_array_error['error_obtenido'] = $CENTRO->ADD();
        $CENTRO_array_error['resultado'] = ($CENTRO_array_error["error_esperado"] === $CENTRO_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $CENTRO_array_error);

        // -------- Error en la inserción

        // Plantilla

        $CENTRO_array_error = array(
            "entidad"           => "CENTRO",
            "metodo"            => "ADD",
            "error"             => "Elemento ya existente",
            "error_esperado"    => "Inserción fallida: el elemento ya existe",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Lógica del test

        $CENTRO = new CENTRO_Model($datos["COD"],$datos["EDIFICIO"],$datos["NOMBRE"],$datos["DIRECCION"],$datos["RESPONSABLE"]);
        $CENTRO_array_error['error_obtenido'] = $CENTRO->ADD();
        $CENTRO_array_error['resultado'] = ($CENTRO_array_error["error_esperado"] === $CENTRO_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $CENTRO_array_error);
    }

    /**
     * Test unitario para la función de editar CENTRO
     * 
     * Valida:
     *  Actualización realizada con éxito
     */
    function CENTRO_EDIT_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Actualización realizada con éxito

        // Plantilla

        $CENTRO_array_error = array(
            "entidad"           => "CENTRO",
            "metodo"            => "EDIT",
            "error"             => "Actualización correcta",
            "error_esperado"    => "Actualización realizada con éxito",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "COD"           => "99",
            "EDIFICIO"       => "99",
            "NOMBRE"        => "NOMBRES",
            "DIRECCION"     => "DIRECCION",
            "RESPONSABLE"   => "RESPONSABLE"
        );

        // Lógica del test

        $CENTRO = new CENTRO_Model($datos["COD"],$datos["EDIFICIO"],$datos["NOMBRE"],$datos["DIRECCION"],$datos["RESPONSABLE"]);
        $CENTRO_array_error['error_obtenido'] = $CENTRO->EDIT();
        $CENTRO_array_error['resultado'] = ($CENTRO_array_error["error_esperado"] === $CENTRO_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $CENTRO_array_error);
    }

    /**
     * Test unitario para la función de borrar CENTRO
     * 
     * Valida:
     *  Borrado realizado con éxito
     */
    function CENTRO_DELETE_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Borrado realizado con éxito

        // Plantilla

        $CENTRO_array_error = array(
            "entidad"           => "CENTRO",
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

        $CENTRO = new CENTRO_Model($datos["COD"],"","","","");
        $CENTRO_array_error['error_obtenido'] = $CENTRO->DELETE();
        $CENTRO_array_error['resultado'] = ($CENTRO_array_error["error_esperado"] === $CENTRO_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $CENTRO_array_error);
    }

    /**
     * Test unitario para la función de buscar CENTRO
     * 
     * Valida:
     *  recordset
     *  Error de gestor de base de datos
     */
    function CENTRO_SEARCH_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Búsqueda correcta

        // Plantilla

        $CENTRO_array_error = array(
            "entidad"           => "CENTRO",
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

        $CENTRO = new CENTRO_Model($datos["COD"],"","","","");
        $resultado = $CENTRO->SEARCH();
        $CENTRO_array_error['error_obtenido'] = !is_string($resultado) ? "recordset" : $resultado;
        $CENTRO_array_error['resultado'] = ($CENTRO_array_error["error_esperado"] === $CENTRO_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $CENTRO_array_error);

        // -------- Búsqueda fallida

        // Plantilla

        $CENTRO_array_error = array(
            "entidad"           => "CENTRO",
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

        $CENTRO = new CENTRO_Model($datos["COD"],"","","","");
        $resultado = $CENTRO->SEARCH();
        $CENTRO_array_error['error_obtenido'] = !is_string($resultado) ? "recordset" : $resultado;
        $CENTRO_array_error['resultado'] = ($CENTRO_array_error["error_esperado"] === $CENTRO_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $CENTRO_array_error);
    }

    /**
     * Test unitario para la función de rellenar datos de CENTRO
     * 
     * Valida:
     *  Tupla
     */
    function CENTRO_RellenaDatos_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Rellenar datos realizado con éxito

        // Plantilla

        $CENTRO_array_error = array(
            "entidad"           => "CENTRO",
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

        $CENTRO = new CENTRO_Model($datos["COD"],"","","","");
        $resultado = $CENTRO->RellenaDatos();
        $CENTRO_array_error['error_obtenido'] = is_array($resultado) ? "Tupla" : $resultado;
        $CENTRO_array_error['resultado'] = ($CENTRO_array_error["error_esperado"] === $CENTRO_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $CENTRO_array_error);
    }

    // REALIZAMOS LAS PRUEBAS

    CENTRO_ADD_test();
    CENTRO_EDIT_test();
    CENTRO_RellenaDatos_test();
    CENTRO_SEARCH_test();
    CENTRO_DELETE_test();
?>