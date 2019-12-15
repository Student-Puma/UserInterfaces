<?php
    include_once '../Model/CENTRO_Model.php';

    /**
     * Test validaciones CENTRO
     */
    function CENTRO_Validar()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // Plantilla

        $CENTRO_array_error = array(
            "entidad"           => "CENTRO",
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
            "NOMBRE"        => "",
            "DIRECCION"     => "",
            "RESPONSABLE"   => ""
        );

        // Comprobaciones

        $CENTRO = new CENTRO_Model($datos["COD"],$datos["EDIFICIO"],$datos["NOMBRE"],$datos["DIRECCION"],$datos["RESPONSABLE"]);
        $resultado = $CENTRO->comprobar_atributos();
        
        // Validamos campos vacíos

        $CENTRO_array_error["error"] = "Campos vacíos";
        $CENTRO_array_error["error_esperado"] = "Atributo vacío";

        foreach($CENTRO->erroresdatos as $error)
        {
            if($error['codigo'] === "00001")
            {
                $CENTRO_array_error['metodo'] = $error['atributo'];
                $CENTRO_array_error["error_obtenido"] = $error['incidencia'];
                $CENTRO_array_error['resultado'] = ($CENTRO_array_error["error_esperado"] === $CENTRO_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $CENTRO_array_error);
            }
        }

        // Validamos campos no numericos cortos

        $CENTRO_array_error["error"] = "Campos no numéricos cortos";
        $CENTRO_array_error["error_esperado"] = "Valor de atributo no numérico demasiado corto";

        foreach($CENTRO->erroresdatos as $error)
        {
            if($error['codigo'] === "00003")
            {
                $CENTRO_array_error['metodo'] = $error['atributo'];
                $CENTRO_array_error["error_obtenido"] = $error['incidencia'];
                $CENTRO_array_error['resultado'] = ($CENTRO_array_error["error_esperado"] === $CENTRO_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $CENTRO_array_error);
            }
        }

        // Validamos campos numericos cortos

        $CENTRO_array_error["error"] = "Campos numéricos cortos";
        $CENTRO_array_error["error_esperado"] = "Valor de atributo numérico demasiado corto";

        foreach($CENTRO->erroresdatos as $error)
        {
            if($error['codigo'] === "00004")
            {
                $CENTRO_array_error['metodo'] = $error['atributo'];
                $CENTRO_array_error["error_obtenido"] = $error['incidencia'];
                $CENTRO_array_error['resultado'] = ($CENTRO_array_error["error_esperado"] === $CENTRO_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $CENTRO_array_error);
            }
        }

        // -----------------------------------------------------------

        // Datos usados

        $datos = array(
            "COD"           => "asdasdasdasdasdasd..asdasdasdasdasdasdasdasdasdas..asdasdasdasdasdasdasdasdasdas",
            "EDIFICIO"        => "asdasdasdasdasdasd..asdasdasdasdasdasdasdasdasdas..asdasdasdasdasdasdasdasdasdas",
            "NOMBRE"        => "asdasdasdasdasdasd..asdasdasdasdasdasdasdasdasdas..asdasdasdasdasdasdasdasdasdas",
            "DIRECCION"     => "asdasdasdasdasdasd**..asdasdasdasdasdasdasdasdasdas..asdasdasdasdasdasdasdasdasdasasdasdasdasdasdasd..asdasdasdasdasdasdasdasdasdas..asdasdasdasdasdasdasdasdasdasasdasdasdasdasdasd..asdasdasdasdasdasdasdasdasdas..asdasdasdasdasdasdasdasdasdas",
            "RESPONSABLE"   => "asdasdasdasdasdasd..asdasdasdasdasdasdasdasdasdas..asdasdasdasdasdasdasdasdasdas",
        );

        // Comprobaciones

        $CENTRO = new CENTRO_Model($datos["COD"],$datos["EDIFICIO"],$datos["NOMBRE"],$datos["DIRECCION"],$datos["RESPONSABLE"]);
        $resultado = $CENTRO->comprobar_atributos();

        // -----------------------------------------------------------

        // Atributo demasiado largo

        $CENTRO_array_error["error"] = "Atributo demasiado largo";
        $CENTRO_array_error["error_esperado"] = "Valor de atributo demasiado largo";

        foreach($CENTRO->erroresdatos as $error)
        {
            if($error['codigo'] === "00002")
            {
                $CENTRO_array_error['metodo'] = $error['atributo'];
                $CENTRO_array_error["error_obtenido"] = $error['incidencia'];
                $CENTRO_array_error['resultado'] = ($CENTRO_array_error["error_esperado"] === $CENTRO_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $CENTRO_array_error);
            }
        }

        // Formato codigo incorrecto

        $CENTRO_array_error["error"] = "Formato codigo incorrecto";
        $CENTRO_array_error["error_esperado"] = "Solo están permitidas alfabéticos, números y el “-”";

        foreach($CENTRO->erroresdatos as $error)
        {
            if($error['codigo'] === "00040")
            {
                $CENTRO_array_error['metodo'] = $error['atributo'];
                $CENTRO_array_error["error_obtenido"] = $error['incidencia'];
                $CENTRO_array_error['resultado'] = ($CENTRO_array_error["error_esperado"] === $CENTRO_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $CENTRO_array_error);
            }
        }

        // Solo se permiten alfabéticos

        $CENTRO_array_error["error"] = "Solo alfabéticos";
        $CENTRO_array_error["error_esperado"] = "Solo están permitidas alfabéticos";

        foreach($CENTRO->erroresdatos as $error)
        {
            if($error['codigo'] === "00030")
            {
                $CENTRO_array_error['metodo'] = $error['atributo'];
                $CENTRO_array_error["error_obtenido"] = $error['incidencia'];
                $CENTRO_array_error['resultado'] = ($CENTRO_array_error["error_esperado"] === $CENTRO_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $CENTRO_array_error);
            }
        }

        // Dirección no válida

        $CENTRO_array_error["error"] = "Dirección no válida";
        $CENTRO_array_error["error_esperado"] = "Solo están permitidas alfabéticos y espacios, números y los símbolos  “- / º ª”";

        foreach($CENTRO->erroresdatos as $error)
        {
            if($error['codigo'] === "00050")
            {
                $CENTRO_array_error['metodo'] = $error['atributo'];
                $CENTRO_array_error["error_obtenido"] = $error['incidencia'];
                $CENTRO_array_error['resultado'] = ($CENTRO_array_error["error_esperado"] === $CENTRO_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $CENTRO_array_error);
            }
        }

        // -----------------------------------------------------------

        // Datos usados
        
        $datos = array(
            "COD"           => "22",
            "EDIFICIO"      => "22",
            "NOMBRE"        => "NOMBRE",
            "DIRECCION"     => "DIRECCION",
            "RESPONSABLE"   => "RESPONSABLE"
        );

        // Comprobaciones

        $CENTRO = new CENTRO_Model($datos["COD"],$datos["EDIFICIO"],$datos["NOMBRE"],$datos["DIRECCION"],$datos["RESPONSABLE"]);
        $resultado = $CENTRO->comprobar_atributos();

        // -----------------------------------------------------------

        // Todo OK

        $atributos = array("codigo centro","codigo edificio","nombre","direccion","responsable");
        $CENTRO_array_error["error"] = "Valor correcto";
        $CENTRO_array_error["error_esperado"] = "true";
        foreach($atributos as $attr)
        {
            $CENTRO_array_error['metodo'] = $attr;
            $CENTRO_array_error["error_obtenido"] = empty($CENTRO->erroresdatos) ? "true" : "false";
            $CENTRO_array_error['resultado'] = ($CENTRO_array_error["error_esperado"] === $CENTRO_array_error["error_obtenido"]) ? "OK" : "FALSE";
            array_push($ERRORS_array_test, $CENTRO_array_error);
        }
    }

    CENTRO_Validar();
?>