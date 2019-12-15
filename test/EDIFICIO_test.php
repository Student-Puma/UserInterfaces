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
            "NOMBRE"    => "NOMBRE",
            "DIRECCION" => "DIRECCION",
            "CAMPUS"    => "CAMPUS"
        );

        // Lógica del test

        $EDIFICIO = new EDIFICIO_Model($datos["COD"],$datos["NOMBRE"],$datos["DIRECCION"],$datos["CAMPUS"]);
        $EDIFICIO_array_error['error_obtenido'] = $EDIFICIO->ADD();
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

        // Lógica del test

        $EDIFICIO = new EDIFICIO_Model($datos["COD"],$datos["NOMBRE"],$datos["DIRECCION"],$datos["CAMPUS"]);
        $EDIFICIO_array_error['error_obtenido'] = $EDIFICIO->ADD();
        $EDIFICIO_array_error['resultado'] = ($EDIFICIO_array_error["error_esperado"] === $EDIFICIO_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $EDIFICIO_array_error);
    }

    /**
     * Test unitario para la función de editar EDIFICIO
     * 
     * Valida:
     *  Actualización realizada con éxito
     */
    function EDIFICIO_EDIT_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Actualización realizada con éxito

        // Plantilla

        $EDIFICIO_array_error = array(
            "entidad"           => "EDIFICIO",
            "metodo"            => "EDIT",
            "error"             => "Actualización correcta",
            "error_esperado"    => "Actualización realizada con éxito",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "COD"       => "99",
            "NOMBRE"    => "NOMBRES",
            "DIRECCION" => "DIRECCION",
            "CAMPUS"    => "CAMPUS"
        );

        // Lógica del test

        $EDIFICIO = new EDIFICIO_Model($datos["COD"],$datos["NOMBRE"],$datos["DIRECCION"],$datos["CAMPUS"]);
        $EDIFICIO_array_error['error_obtenido'] = $EDIFICIO->EDIT();
        $EDIFICIO_array_error['resultado'] = ($EDIFICIO_array_error["error_esperado"] === $EDIFICIO_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $EDIFICIO_array_error);
    }

    /**
     * Test unitario para la función de borrar EDIFICIO
     * 
     * Valida:
     *  Borrado realizado con éxito
     */
    function EDIFICIO_DELETE_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Borrado realizado con éxito

        // Plantilla

        $EDIFICIO_array_error = array(
            "entidad"           => "EDIFICIO",
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

        $EDIFICIO = new EDIFICIO_Model($datos["COD"],"","","");
        $EDIFICIO_array_error['error_obtenido'] = $EDIFICIO->DELETE();
        $EDIFICIO_array_error['resultado'] = ($EDIFICIO_array_error["error_esperado"] === $EDIFICIO_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $EDIFICIO_array_error);
    }

    /**
     * Test unitario para la función de buscar EDIFICIO
     * 
     * Valida:
     *  recordset
     *  Error de gestor de base de datos
     */
    function EDIFICIO_SEARCH_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Búsqueda correcta

        // Plantilla

        $EDIFICIO_array_error = array(
            "entidad"           => "EDIFICIO",
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

        $EDIFICIO = new EDIFICIO_Model($datos["COD"],"","","");
        $resultado = $EDIFICIO->SEARCH();
        $EDIFICIO_array_error['error_obtenido'] = !is_string($resultado) ? "recordset" : $resultado;
        $EDIFICIO_array_error['resultado'] = ($EDIFICIO_array_error["error_esperado"] === $EDIFICIO_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $EDIFICIO_array_error);

        // -------- Búsqueda fallida

        // Plantilla

        $EDIFICIO_array_error = array(
            "entidad"           => "EDIFICIO",
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

        $EDIFICIO = new EDIFICIO_Model($datos["COD"],"","","");
        $resultado = $EDIFICIO->SEARCH();
        $EDIFICIO_array_error['error_obtenido'] = !is_string($resultado) ? "recordset" : $resultado;
        $EDIFICIO_array_error['resultado'] = ($EDIFICIO_array_error["error_esperado"] === $EDIFICIO_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $EDIFICIO_array_error);
    }

    /**
     * Test unitario para la función de rellenar datos de EDIFICIO
     * 
     * Valida:
     *  Tupla
     */
    function EDIFICIO_RellenaDatos_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Rellenar datos realizado con éxito

        // Plantilla

        $EDIFICIO_array_error = array(
            "entidad"           => "EDIFICIO",
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

        $EDIFICIO = new EDIFICIO_Model($datos["COD"],"","","");
        $resultado = $EDIFICIO->RellenaDatos();
        $EDIFICIO_array_error['error_obtenido'] = is_array($resultado) ? "Tupla" : $resultado;
        $EDIFICIO_array_error['resultado'] = ($EDIFICIO_array_error["error_esperado"] === $EDIFICIO_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $EDIFICIO_array_error);
    }

    // REALIZAMOS LAS PRUEBAS

    EDIFICIO_ADD_test();
    EDIFICIO_EDIT_test();
    EDIFICIO_RellenaDatos_test();
    EDIFICIO_SEARCH_test();
    EDIFICIO_DELETE_test();
?>