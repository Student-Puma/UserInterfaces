<?php
    include_once '../Model/ESPACIO_Model.php';

    /**
     * Test validaciones ESPACIO
     */
    function ESPACIO_Validar()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // Plantilla

        $ESPACIO_array_error = array(
            "entidad"           => "ESPACIO",
            "metodo"            => "",
            "error"             => "",
            "error_esperado"    => "",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "COD"           => "",
            "EDIFICIO"      => "",
            "CENTRO"        => "",
            "TIPO"          => "",
            "SUPERFICIE"    => "",
            "NUMERO"        => ""
        );

        // Comprobaciones

        $ESPACIO = new ESPACIO_Model($datos["COD"],$datos["EDIFICIO"],$datos["CENTRO"],$datos["TIPO"],$datos["SUPERFICIE"],$datos["NUMERO"]);
        $resultado = $ESPACIO->comprobar_atributos();
        
        // Validamos campos vacíos

        $ESPACIO_array_error["error"] = "Campos vacíos";
        $ESPACIO_array_error["error_esperado"] = "Atributo vacío";

        foreach($ESPACIO->erroresdatos as $error)
        {
            if($error['codigo'] === "00001")
            {
                $ESPACIO_array_error['metodo'] = $error['atributo'];
                $ESPACIO_array_error["error_obtenido"] = $error['incidencia'];
                $ESPACIO_array_error['resultado'] = ($ESPACIO_array_error["error_esperado"] === $ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $ESPACIO_array_error);
            }
        }

        // Validamos campos no numericos cortos

        $ESPACIO_array_error["error"] = "Campos no numéricos cortos";
        $ESPACIO_array_error["error_esperado"] = "Valor de atributo no numérico demasiado corto";

        foreach($ESPACIO->erroresdatos as $error)
        {
            if($error['codigo'] === "00003")
            {
                $ESPACIO_array_error['metodo'] = $error['atributo'];
                $ESPACIO_array_error["error_obtenido"] = $error['incidencia'];
                $ESPACIO_array_error['resultado'] = ($ESPACIO_array_error["error_esperado"] === $ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $ESPACIO_array_error);
            }
        }

        // Validamos campos numericos cortos

        $ESPACIO_array_error["error"] = "Campos numéricos cortos";
        $ESPACIO_array_error["error_esperado"] = "Valor de atributo numérico demasiado corto";

        foreach($ESPACIO->erroresdatos as $error)
        {
            if($error['codigo'] === "00004")
            {
                $ESPACIO_array_error['metodo'] = $error['atributo'];
                $ESPACIO_array_error["error_obtenido"] = $error['incidencia'];
                $ESPACIO_array_error['resultado'] = ($ESPACIO_array_error["error_esperado"] === $ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $ESPACIO_array_error);
            }
        }

        // -----------------------------------------------------------

        // Datos usados

        $datos = array(
            "COD"           => "asdsadsfsadsadasdsda+++++sdad",
            "EDIFICIO"      => "asdsadsfsadsadasdsda+++++sdad",
            "CENTRO"        => "asdsadsfsadsadasdsda+++++sdad",
            "TIPO"          => "asdsadsfsadsadasdsda+++++sdad",
            "SUPERFICIE"    => "asdsadsfsadsadasdsda+++++sdad",
            "NUMERO"        => "asdsadsfsadsadasdsda+++++sdad"
        );

        // Comprobaciones

        $ESPACIO = new ESPACIO_Model($datos["COD"],$datos["EDIFICIO"],$datos["CENTRO"],$datos["TIPO"],$datos["SUPERFICIE"],$datos["NUMERO"]);
        $resultado = $ESPACIO->comprobar_atributos();

        // -----------------------------------------------------------

        // Atributo demasiado largo

        $ESPACIO_array_error["error"] = "Atributo demasiado largo";
        $ESPACIO_array_error["error_esperado"] = "Valor de atributo demasiado largo";

        foreach($ESPACIO->erroresdatos as $error)
        {
            if($error['codigo'] === "00002")
            {
                $ESPACIO_array_error['metodo'] = $error['atributo'];
                $ESPACIO_array_error["error_obtenido"] = $error['incidencia'];
                $ESPACIO_array_error['resultado'] = ($ESPACIO_array_error["error_esperado"] === $ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $ESPACIO_array_error);
            }
        }

        // Formato codigo incorrecto

        $ESPACIO_array_error["error"] = "Formato codigo incorrecto";
        $ESPACIO_array_error["error_esperado"] = "Solo están permitidas alfabéticos, números y el “-”";

        foreach($ESPACIO->erroresdatos as $error)
        {
            if($error['codigo'] === "00040")
            {
                $ESPACIO_array_error['metodo'] = $error['atributo'];
                $ESPACIO_array_error["error_obtenido"] = $error['incidencia'];
                $ESPACIO_array_error['resultado'] = ($ESPACIO_array_error["error_esperado"] === $ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $ESPACIO_array_error);
            }
        }

        // Solo se permiten alfabéticos

        $ESPACIO_array_error["error"] = "Solo alfabéticos";
        $ESPACIO_array_error["error_esperado"] = "Solo están permitidas alfabéticos";

        foreach($ESPACIO->erroresdatos as $error)
        {
            if($error['codigo'] === "00030")
            {
                $ESPACIO_array_error['metodo'] = $error['atributo'];
                $ESPACIO_array_error["error_obtenido"] = $error['incidencia'];
                $ESPACIO_array_error['resultado'] = ($ESPACIO_array_error["error_esperado"] === $ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $ESPACIO_array_error);
            }
        }

        // Solo números

        $ESPACIO_array_error["error"] = "Solo números";
        $ESPACIO_array_error["error_esperado"] = "Solo se permiten números";

        foreach($ESPACIO->erroresdatos as $error)
        {
            if($error['codigo'] === "00070")
            {
                $ESPACIO_array_error['metodo'] = $error['atributo'];
                $ESPACIO_array_error["error_obtenido"] = $error['incidencia'];
                $ESPACIO_array_error['resultado'] = ($ESPACIO_array_error["error_esperado"] === $ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $ESPACIO_array_error);
            }
        }

        // Tipo inesperado

        $ESPACIO_array_error["error"] = "Tipo inesperado";
        $ESPACIO_array_error["error_esperado"] = "Solo se permiten los valores 'DESPACHO', 'LABORATORIO', 'PAS'";

        foreach($ESPACIO->erroresdatos as $error)
        {
            if($error['codigo'] === "00080")
            {
                $ESPACIO_array_error['metodo'] = $error['atributo'];
                $ESPACIO_array_error["error_obtenido"] = $error['incidencia'];
                $ESPACIO_array_error['resultado'] = ($ESPACIO_array_error["error_esperado"] === $ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $ESPACIO_array_error);
            }
        }

        // -----------------------------------------------------------

        // Datos usados
        
        $datos = array(
            "COD"           => "22",
            "EDIFICIO"      => "22",
            "CENTRO"        => "22",
            "TIPO"          => "PAS",
            "SUPERFICIE"    => "10",
            "NUMERO"        => "10"
        );

        // Comprobaciones

        $ESPACIO = new ESPACIO_Model($datos["COD"],$datos["EDIFICIO"],$datos["CENTRO"],$datos["TIPO"],$datos["SUPERFICIE"],$datos["NUMERO"]);
        $resultado = $ESPACIO->comprobar_atributos();

        // -----------------------------------------------------------

        // Todo OK

        $atributos = array("codigo espacio","codigo edificio","codigo centro","tipo", "superficie", "numinventario");
        $ESPACIO_array_error["error"] = "Valor correcto";
        $ESPACIO_array_error["error_esperado"] = "true";
        foreach($atributos as $attr)
        {
            $ESPACIO_array_error['metodo'] = $attr;
            $ESPACIO_array_error["error_obtenido"] = empty($ESPACIO->erroresdatos) ? "true" : "false";
            $ESPACIO_array_error['resultado'] = ($ESPACIO_array_error["error_esperado"] === $ESPACIO_array_error["error_obtenido"]) ? "OK" : "FALSE";
            array_push($ERRORS_array_test, $ESPACIO_array_error);
        }
    }

    ESPACIO_Validar();
?>