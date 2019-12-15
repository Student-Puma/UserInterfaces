<?php
    include_once '../Model/TITULACION_Model.php';

    /**
     * Test validaciones TITULACION
     */
    function TITULACION_Validar()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // Plantilla

        $TITULACION_array_error = array(
            "entidad"           => "TITULACION",
            "metodo"            => "",
            "error"             => "",
            "error_esperado"    => "",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "COD"           => "",
            "CENTRO"        => "",
            "NOMBRE"        => "",
            "RESPONSABLE"   => ""
        );

        // Comprobaciones

        $TITULACION = new TITULACION_Model($datos["COD"],$datos["CENTRO"],$datos["NOMBRE"],$datos["RESPONSABLE"]);
        $resultado = $TITULACION->comprobar_atributos();
        
        // Validamos campos vacíos

        $TITULACION_array_error["error"] = "Campos vacíos";
        $TITULACION_array_error["error_esperado"] = "Atributo vacío";

        foreach($TITULACION->erroresdatos as $error)
        {
            if($error['codigo'] === "00001")
            {
                $TITULACION_array_error['metodo'] = $error['atributo'];
                $TITULACION_array_error["error_obtenido"] = $error['incidencia'];
                $TITULACION_array_error['resultado'] = ($TITULACION_array_error["error_esperado"] === $TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $TITULACION_array_error);
            }
        }

        // Validamos campos no numericos cortos

        $TITULACION_array_error["error"] = "Campos no numéricos cortos";
        $TITULACION_array_error["error_esperado"] = "Valor de atributo no numérico demasiado corto";

        foreach($TITULACION->erroresdatos as $error)
        {
            if($error['codigo'] === "00003")
            {
                $TITULACION_array_error['metodo'] = $error['atributo'];
                $TITULACION_array_error["error_obtenido"] = $error['incidencia'];
                $TITULACION_array_error['resultado'] = ($TITULACION_array_error["error_esperado"] === $TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $TITULACION_array_error);
            }
        }

        // Validamos campos numericos cortos

        $TITULACION_array_error["error"] = "Campos numéricos cortos";
        $TITULACION_array_error["error_esperado"] = "Valor de atributo numérico demasiado corto";

        foreach($TITULACION->erroresdatos as $error)
        {
            if($error['codigo'] === "00004")
            {
                $TITULACION_array_error['metodo'] = $error['atributo'];
                $TITULACION_array_error["error_obtenido"] = $error['incidencia'];
                $TITULACION_array_error['resultado'] = ($TITULACION_array_error["error_esperado"] === $TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $TITULACION_array_error);
            }
        }

        // -----------------------------------------------------------

        // Datos usados

        $datos = array(
            "COD"           => "asdasdafas+++dasdasfsafas097saddasdasdafasfas+++dsadsafasasdasfsafasfasfa",
            "CENTRO"        => "asdasdafas+++dasdasfsafas097saddasdasdafasfas+++dsadsafasasdasfsafasfasfa",
            "NOMBRE"        => "asdasdafas+++dasdasfsafas097saddasdasdafasfas+++dsadsafasasdasfsafasfasfa",
            "RESPONSABLE"   => "asdasdafas+++dasdasfsafas097saddasdasdafasfas+++dsadsafasasdasfsafasfasfa"
        );

        // Comprobaciones

        $TITULACION = new TITULACION_Model($datos["COD"],$datos["CENTRO"],$datos["NOMBRE"],$datos["RESPONSABLE"]);
        $resultado = $TITULACION->comprobar_atributos();

        // -----------------------------------------------------------

        // Atributo demasiado largo

        $TITULACION_array_error["error"] = "Atributo demasiado largo";
        $TITULACION_array_error["error_esperado"] = "Valor de atributo demasiado largo";

        foreach($TITULACION->erroresdatos as $error)
        {
            if($error['codigo'] === "00002")
            {
                $TITULACION_array_error['metodo'] = $error['atributo'];
                $TITULACION_array_error["error_obtenido"] = $error['incidencia'];
                $TITULACION_array_error['resultado'] = ($TITULACION_array_error["error_esperado"] === $TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $TITULACION_array_error);
            }
        }

        // Solo se permiten alfabéticos

        $TITULACION_array_error["error"] = "Solo alfabéticos";
        $TITULACION_array_error["error_esperado"] = "Solo están permitidas alfabéticos";

        foreach($TITULACION->erroresdatos as $error)
        {
            if($error['codigo'] === "00030")
            {
                $TITULACION_array_error['metodo'] = $error['atributo'];
                $TITULACION_array_error["error_obtenido"] = $error['incidencia'];
                $TITULACION_array_error['resultado'] = ($TITULACION_array_error["error_esperado"] === $TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $TITULACION_array_error);
            }
        }

        // Código centro incorrecto

        $TITULACION_array_error["error"] = "Código centro incorrecto";
        $TITULACION_array_error["error_esperado"] = "Solo están permitidas alfabéticos, números y el “-”";

        foreach($TITULACION->erroresdatos as $error)
        {
            if($error['codigo'] === "00040")
            {
                $TITULACION_array_error['metodo'] = $error['atributo'];
                $TITULACION_array_error["error_obtenido"] = $error['incidencia'];
                $TITULACION_array_error['resultado'] = ($TITULACION_array_error["error_esperado"] === $TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $TITULACION_array_error);
            }
        }

        // Código titulacion incorrecto

        $TITULACION_array_error["error"] = "Código titulacion incorrecto";
        $TITULACION_array_error["error_esperado"] = "Solo se permiten alfabéticos y números";

        foreach($TITULACION->erroresdatos as $error)
        {
            if($error['codigo'] === "00060")
            {
                $TITULACION_array_error['metodo'] = $error['atributo'];
                $TITULACION_array_error["error_obtenido"] = $error['incidencia'];
                $TITULACION_array_error['resultado'] = ($TITULACION_array_error["error_esperado"] === $TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $TITULACION_array_error);
            }
        }

        // -----------------------------------------------------------

        // Datos usados
        
        $datos = array(
            "COD"           => "22",
            "CENTRO"        => "22",
            "NOMBRE"        => "NOMBRE",
            "RESPONSABLE"   => "RESPONSABLE"
        );

        // Comprobaciones

        $TITULACION = new TITULACION_Model($datos["COD"],$datos["CENTRO"],$datos["NOMBRE"],$datos["RESPONSABLE"]);
        $resultado = $TITULACION->comprobar_atributos();

        // -----------------------------------------------------------

        // Todo OK

        $atributos = array("codigo titulacion","codigo centro","nombre","responsable");
        $TITULACION_array_error["error"] = "Valor correcto";
        $TITULACION_array_error["error_esperado"] = "true";
        foreach($atributos as $attr)
        {
            $TITULACION_array_error['metodo'] = $attr;
            $TITULACION_array_error["error_obtenido"] = empty($TITULACION->erroresdatos) ? "true" : "false";
            $TITULACION_array_error['resultado'] = ($TITULACION_array_error["error_esperado"] === $TITULACION_array_error["error_obtenido"]) ? "OK" : "FALSE";
            array_push($ERRORS_array_test, $TITULACION_array_error);
        }
    }

    TITULACION_Validar();

?>