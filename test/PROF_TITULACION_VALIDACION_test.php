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
    include_once '../Model/PROF_TITULACION_Model.php';

    /**
     * Test validaciones PROF_TITULACION
     */
    function PROF_TITULACION_Validar()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // Plantilla

        $PROF_TITULACION_array_error = array(
            "entidad"           => "PROF_TITULACION",
            "metodo"            => "",
            "error"             => "",
            "error_esperado"    => "",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "DNI"   => "",
            "COD"   => "",
            "ANHO"  => ""
        );

        // Comprobaciones

        $PROF_TITULACION = new PROF_TITULACION_Model($datos["DNI"],$datos["COD"],$datos["ANHO"]);
        $resultado = $PROF_TITULACION->comprobar_atributos();
        
        // Validamos campos vacíos

        $PROF_TITULACION_array_error["error"] = "Campos vacíos";
        $PROF_TITULACION_array_error["error_esperado"] = "Atributo vacío";

        foreach($PROF_TITULACION->erroresdatos as $error)
        {
            if($error['codigo'] === "00001")
            {
                $PROF_TITULACION_array_error['metodo'] = $error['atributo'];
                $PROF_TITULACION_array_error["error_obtenido"] = $error['incidencia'];
                $PROF_TITULACION_array_error['resultado'] = ($PROF_TITULACION_array_error["error_esperado"] === $PROF_TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $PROF_TITULACION_array_error);
            }
        }

        // Validamos campos no numericos cortos

        $PROF_TITULACION_array_error["error"] = "Campos no numéricos cortos";
        $PROF_TITULACION_array_error["error_esperado"] = "Valor de atributo no numérico demasiado corto";

        foreach($PROF_TITULACION->erroresdatos as $error)
        {
            if($error['codigo'] === "00003")
            {
                $PROF_TITULACION_array_error['metodo'] = $error['atributo'];
                $PROF_TITULACION_array_error["error_obtenido"] = $error['incidencia'];
                $PROF_TITULACION_array_error['resultado'] = ($PROF_TITULACION_array_error["error_esperado"] === $PROF_TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $PROF_TITULACION_array_error);
            }
        }

        // Validamos campos numericos cortos

        $PROF_TITULACION_array_error["error"] = "Campos numéricos cortos";
        $PROF_TITULACION_array_error["error_esperado"] = "Valor de atributo numérico demasiado corto";

        foreach($PROF_TITULACION->erroresdatos as $error)
        {
            if($error['codigo'] === "00004")
            {
                $PROF_TITULACION_array_error['metodo'] = $error['atributo'];
                $PROF_TITULACION_array_error["error_obtenido"] = $error['incidencia'];
                $PROF_TITULACION_array_error['resultado'] = ($PROF_TITULACION_array_error["error_esperado"] === $PROF_TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $PROF_TITULACION_array_error);
            }
        }

        // -----------------------------------------------------------

        // Datos usados

        $datos = array(
            "DNI"   => "asdasdasdasdasdasd..asdasdasdasdasdasdasdasdasdas..asdasdasdasdasdasdasdasdasdas",
            "COD"   => "asdasdasdasdasdasd..asdasdasdasdasdasdasdasdasdas..asdasdasdasdasdasdasdasdasdas",
            "ANHO"  => "asdasdasdasdasdasd..asdasdasdasdasdasdasdasdasdas..asdasdasdasdasdasdasdasdasdas"
        );

        // Comprobaciones

        $PROF_TITULACION = new PROF_TITULACION_Model($datos["DNI"],$datos["COD"],$datos["ANHO"]);
        $resultado = $PROF_TITULACION->comprobar_atributos();

        // -----------------------------------------------------------

        // Atributo demasiado largo

        $PROF_TITULACION_array_error["error"] = "Atributo demasiado largo";
        $PROF_TITULACION_array_error["error_esperado"] = "Valor de atributo demasiado largo";

        foreach($PROF_TITULACION->erroresdatos as $error)
        {
            if($error['codigo'] === "00002")
            {
                $PROF_TITULACION_array_error['metodo'] = $error['atributo'];
                $PROF_TITULACION_array_error["error_obtenido"] = $error['incidencia'];
                $PROF_TITULACION_array_error['resultado'] = ($PROF_TITULACION_array_error["error_esperado"] === $PROF_TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $PROF_TITULACION_array_error);
            }
        }

        // Formato codigo incorrecto

        $PROF_TITULACION_array_error["error"] = "Formato codigo incorrecto";
        $PROF_TITULACION_array_error["error_esperado"] = "Solo se permiten alfabéticos y números";

        foreach($PROF_TITULACION->erroresdatos as $error)
        {
            if($error['codigo'] === "00060")
            {
                $PROF_TITULACION_array_error['metodo'] = $error['atributo'];
                $PROF_TITULACION_array_error["error_obtenido"] = $error['incidencia'];
                $PROF_TITULACION_array_error['resultado'] = ($PROF_TITULACION_array_error["error_esperado"] === $PROF_TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $PROF_TITULACION_array_error);
            }
        }

        // Formato año incorrecto

        $PROF_TITULACION_array_error["error"] = "Formato año incorrecto";
        $PROF_TITULACION_array_error["error_esperado"] = "Solo se permiten dddd-dddd donde d es un dígito";

        foreach($PROF_TITULACION->erroresdatos as $error)
        {
            if($error['codigo'] === "00110")
            {
                $PROF_TITULACION_array_error['metodo'] = $error['atributo'];
                $PROF_TITULACION_array_error["error_obtenido"] = $error['incidencia'];
                $PROF_TITULACION_array_error['resultado'] = ($PROF_TITULACION_array_error["error_esperado"] === $PROF_TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $PROF_TITULACION_array_error);
            }
        }

        // Formato DNI incorrecto

        $PROF_TITULACION_array_error["error"] = "Formato DNI incorrecto";
        $PROF_TITULACION_array_error["error_esperado"] = "Formato dni erróneo";

        foreach($PROF_TITULACION->erroresdatos as $error)
        {
            if($error['codigo'] === "00010")
            {
                $PROF_TITULACION_array_error['metodo'] = $error['atributo'];
                $PROF_TITULACION_array_error["error_obtenido"] = $error['incidencia'];
                $PROF_TITULACION_array_error['resultado'] = ($PROF_TITULACION_array_error["error_esperado"] === $PROF_TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $PROF_TITULACION_array_error);
            }
        }

        // Dni no válido

        $PROF_TITULACION_array_error["error"] = "Dni no válido";
        $PROF_TITULACION_array_error["error_esperado"] = "Dni no válido";

        foreach($PROF_TITULACION->erroresdatos as $error)
        {
            if($error['codigo'] === "00011")
            {
                $PROF_TITULACION_array_error['metodo'] = $error['atributo'];
                $PROF_TITULACION_array_error["error_obtenido"] = $error['incidencia'];
                $PROF_TITULACION_array_error['resultado'] = ($PROF_TITULACION_array_error["error_esperado"] === $PROF_TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $PROF_TITULACION_array_error);
            }
        }

        // Atributos incorrectos (todos en uno)

        $PROF_TITULACION_array_error['metodo'] = "comprobar_atributos";
        $PROF_TITULACION_array_error["error"] = "Dos o más valores incorrectos";
        $PROF_TITULACION_array_error["error_esperado"] = "false";
        $PROF_TITULACION_array_error["error_obtenido"] = empty($PROF_TITULACION->erroresdatos) ? "true" : "false";
        $PROF_TITULACION_array_error['resultado'] = ($PROF_TITULACION_array_error["error_esperado"] === $PROF_TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";
        array_push($ERRORS_array_test, $PROF_TITULACION_array_error);

        // -----------------------------------------------------------

        // Datos usados
        
        $datos = array(
            "DNI"           => "22222222J",
            "COD"           => "22",
            "ANHO"          => "2019-2020"
        );

        // Comprobaciones

        $PROF_TITULACION = new PROF_TITULACION_Model($datos["DNI"],$datos["COD"],$datos["ANHO"]);
        $resultado = $PROF_TITULACION->comprobar_atributos();

        // -----------------------------------------------------------

        // Todo OK

        $atributos = array("dni","codigo","año académico");
        $PROF_TITULACION_array_error["error"] = "Valor correcto";
        $PROF_TITULACION_array_error["error_esperado"] = "true";
        foreach($atributos as $attr)
        {
            $PROF_TITULACION_array_error['metodo'] = $attr;
            $PROF_TITULACION_array_error["error_obtenido"] = empty($PROF_TITULACION->erroresdatos) ? "true" : "false";
            $PROF_TITULACION_array_error['resultado'] = ($PROF_TITULACION_array_error["error_esperado"] === $PROF_TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";
            array_push($ERRORS_array_test, $PROF_TITULACION_array_error);
        }

        // Atributos correctos (todos en uno)

        $PROF_TITULACION_array_error['metodo'] = "comprobar_atributos";
        $PROF_TITULACION_array_error["error"] = "Valor correcto";
        $PROF_TITULACION_array_error["error_esperado"] = "true";
        $PROF_TITULACION_array_error["error_obtenido"] = empty($PROF_TITULACION->erroresdatos) ? "true" : "false";
        $PROF_TITULACION_array_error['resultado'] = ($PROF_TITULACION_array_error["error_esperado"] === $PROF_TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";
        array_push($ERRORS_array_test, $PROF_TITULACION_array_error);
    }

    PROF_TITULACION_Validar();
?>