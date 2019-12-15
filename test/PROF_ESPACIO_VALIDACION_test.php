<?php
    include_once '../Model/PROF_ESPACIO_Model.php';

    /**
     * Test validaciones PROF_ESPACIO
     */
    function PROF_ESPACIO_Validar()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // Plantilla

        $PROF_ESPACIO_array_error = array(
            "entidad"           => "PROF_ESPACIO",
            "metodo"            => "",
            "error"             => "",
            "error_esperado"    => "",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "DNI"   => "",
            "COD"   => ""
        );

        // Comprobaciones

        $PROF_ESPACIO = new PROF_ESPACIO_Model($datos["DNI"],$datos["COD"]);
        $resultado = $PROF_ESPACIO->comprobar_atributos();
        
        // Validamos campos vacíos

        $PROF_ESPACIO_array_error["error"] = "Campos vacíos";
        $PROF_ESPACIO_array_error["error_esperado"] = "Atributo vacío";

        foreach($PROF_ESPACIO->erroresdatos as $error)
        {
            if($error['codigo'] === "00001")
            {
                $PROF_ESPACIO_array_error['metodo'] = $error['atributo'];
                $PROF_ESPACIO_array_error["error_obtenido"] = $error['incidencia'];
                $PROF_ESPACIO_array_error['resultado'] = ($PROF_ESPACIO_array_error["error_esperado"] === $PROF_ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $PROF_ESPACIO_array_error);
            }
        }

        // Validamos campos no numericos cortos

        $PROF_ESPACIO_array_error["error"] = "Campos no numéricos cortos";
        $PROF_ESPACIO_array_error["error_esperado"] = "Valor de atributo no numérico demasiado corto";

        foreach($PROF_ESPACIO->erroresdatos as $error)
        {
            if($error['codigo'] === "00003")
            {
                $PROF_ESPACIO_array_error['metodo'] = $error['atributo'];
                $PROF_ESPACIO_array_error["error_obtenido"] = $error['incidencia'];
                $PROF_ESPACIO_array_error['resultado'] = ($PROF_ESPACIO_array_error["error_esperado"] === $PROF_ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $PROF_ESPACIO_array_error);
            }
        }

        // Validamos campos numericos cortos

        $PROF_ESPACIO_array_error["error"] = "Campos numéricos cortos";
        $PROF_ESPACIO_array_error["error_esperado"] = "Valor de atributo numérico demasiado corto";

        foreach($PROF_ESPACIO->erroresdatos as $error)
        {
            if($error['codigo'] === "00004")
            {
                $PROF_ESPACIO_array_error['metodo'] = $error['atributo'];
                $PROF_ESPACIO_array_error["error_obtenido"] = $error['incidencia'];
                $PROF_ESPACIO_array_error['resultado'] = ($PROF_ESPACIO_array_error["error_esperado"] === $PROF_ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $PROF_ESPACIO_array_error);
            }
        }

        // -----------------------------------------------------------

        // Datos usados

        $datos = array(
            "DNI"   => "asdasdasdasdasdasd..asdasdasdasdasdasdasdasdasdas..asdasdasdasdasdasdasdasdasdas",
            "COD"   => "asdasdasdasdasdasd..asdasdasdasdasdasdasdasdasdas..asdasdasdasdasdasdasdasdasdas"
        );

        // Comprobaciones

        $PROF_ESPACIO = new PROF_ESPACIO_Model($datos["DNI"],$datos["COD"]);
        $resultado = $PROF_ESPACIO->comprobar_atributos();

        // -----------------------------------------------------------

        // Atributo demasiado largo

        $PROF_ESPACIO_array_error["error"] = "Atributo demasiado largo";
        $PROF_ESPACIO_array_error["error_esperado"] = "Valor de atributo demasiado largo";

        foreach($PROF_ESPACIO->erroresdatos as $error)
        {
            if($error['codigo'] === "00002")
            {
                $PROF_ESPACIO_array_error['metodo'] = $error['atributo'];
                $PROF_ESPACIO_array_error["error_obtenido"] = $error['incidencia'];
                $PROF_ESPACIO_array_error['resultado'] = ($PROF_ESPACIO_array_error["error_esperado"] === $PROF_ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $PROF_ESPACIO_array_error);
            }
        }

        // Formato codigo incorrecto

        $PROF_ESPACIO_array_error["error"] = "Formato codigo incorrecto";
        $PROF_ESPACIO_array_error["error_esperado"] = "Solo están permitidas alfabéticos, números y el “-”";

        foreach($PROF_ESPACIO->erroresdatos as $error)
        {
            if($error['codigo'] === "00040")
            {
                $PROF_ESPACIO_array_error['metodo'] = $error['atributo'];
                $PROF_ESPACIO_array_error["error_obtenido"] = $error['incidencia'];
                $PROF_ESPACIO_array_error['resultado'] = ($PROF_ESPACIO_array_error["error_esperado"] === $PROF_ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $PROF_ESPACIO_array_error);
            }
        }

        // Formato DNI incorrecto

        $PROF_ESPACIO_array_error["error"] = "Formato DNI incorrecto";
        $PROF_ESPACIO_array_error["error_esperado"] = "Formato dni erróneo";

        foreach($PROF_ESPACIO->erroresdatos as $error)
        {
            if($error['codigo'] === "00010")
            {
                $PROF_ESPACIO_array_error['metodo'] = $error['atributo'];
                $PROF_ESPACIO_array_error["error_obtenido"] = $error['incidencia'];
                $PROF_ESPACIO_array_error['resultado'] = ($PROF_ESPACIO_array_error["error_esperado"] === $PROF_ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $PROF_ESPACIO_array_error);
            }
        }

        // Dni no válido

        $PROF_ESPACIO_array_error["error"] = "Dni no válido";
        $PROF_ESPACIO_array_error["error_esperado"] = "Dni no válido";

        foreach($PROF_ESPACIO->erroresdatos as $error)
        {
            if($error['codigo'] === "00011")
            {
                $PROF_ESPACIO_array_error['metodo'] = $error['atributo'];
                $PROF_ESPACIO_array_error["error_obtenido"] = $error['incidencia'];
                $PROF_ESPACIO_array_error['resultado'] = ($PROF_ESPACIO_array_error["error_esperado"] === $PROF_ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $PROF_ESPACIO_array_error);
            }
        }

        // Atributos incorrectos (todos en uno)

        $PROF_ESPACIO_array_error['metodo'] = "comprobar_atributos";
        $PROF_ESPACIO_array_error["error"] = "Dos o más valores incorrectos";
        $PROF_ESPACIO_array_error["error_esperado"] = "false";
        $PROF_ESPACIO_array_error["error_obtenido"] = empty($PROF_ESPACIO->erroresdatos) ? "true" : "false";
        $PROF_ESPACIO_array_error['resultado'] = ($PROF_ESPACIO_array_error["error_esperado"] === $PROF_ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";
        array_push($ERRORS_array_test, $PROF_ESPACIO_array_error);

        // -----------------------------------------------------------

        // Datos usados
        
        $datos = array(
            "DNI"           => "22222222J",
            "COD"           => "22"
        );

        // Comprobaciones

        $PROF_ESPACIO = new PROF_ESPACIO_Model($datos["DNI"],$datos["COD"]);
        $resultado = $PROF_ESPACIO->comprobar_atributos();

        // -----------------------------------------------------------

        // Todo OK

        $atributos = array("dni","codigo");
        $PROF_ESPACIO_array_error["error"] = "Valor correcto";
        $PROF_ESPACIO_array_error["error_esperado"] = "true";
        foreach($atributos as $attr)
        {
            $PROF_ESPACIO_array_error['metodo'] = $attr;
            $PROF_ESPACIO_array_error["error_obtenido"] = empty($PROF_ESPACIO->erroresdatos) ? "true" : "false";
            $PROF_ESPACIO_array_error['resultado'] = ($PROF_ESPACIO_array_error["error_esperado"] === $PROF_ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";
            array_push($ERRORS_array_test, $PROF_ESPACIO_array_error);
        }

        // Atributos correctos (todos en uno)

        $PROF_ESPACIO_array_error['metodo'] = "comprobar_atributos";
        $PROF_ESPACIO_array_error["error"] = "Valor correcto";
        $PROF_ESPACIO_array_error["error_esperado"] = "true";
        $PROF_ESPACIO_array_error["error_obtenido"] = empty($PROF_ESPACIO->erroresdatos) ? "true" : "false";
        $PROF_ESPACIO_array_error['resultado'] = ($PROF_ESPACIO_array_error["error_esperado"] === $PROF_ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";
        array_push($ERRORS_array_test, $PROF_ESPACIO_array_error);
    }

    PROF_ESPACIO_Validar();
?>