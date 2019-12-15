<?php
    include_once '../Model/PROFESOR_Model.php';

    /**
     * Test validaciones PROFESOR
     */
    function PROFESOR_Validar()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // Plantilla

        $PROFESOR_array_error = array(
            "entidad"           => "PROFESOR",
            "metodo"            => "",
            "error"             => "",
            "error_esperado"    => "",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "DNI"           => "",
            "NOMBRE"        => "",
            "APELLIDOS"     => "",
            "DEPARTAMENTO"  => "",
            "AREA"          => "",
            "CAMPUS"        => ""
        );

        // Comprobaciones

        $PROFESOR = new PROFESOR_Model($datos["DNI"],$datos["NOMBRE"],$datos["APELLIDOS"],$datos["DEPARTAMENTO"],$datos["CAMPUS"]);
        $resultado = $PROFESOR->comprobar_atributos();
        
        // Validamos campos vacíos

        $PROFESOR_array_error["error"] = "Campos vacíos";
        $PROFESOR_array_error["error_esperado"] = "Atributo vacío";

        foreach($PROFESOR->erroresdatos as $error)
        {
            if($error['codigo'] === "00001")
            {
                $PROFESOR_array_error['metodo'] = $error['atributo'];
                $PROFESOR_array_error["error_obtenido"] = $error['incidencia'];
                $PROFESOR_array_error['resultado'] = ($PROFESOR_array_error["error_esperado"] === $PROFESOR_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $PROFESOR_array_error);
            }
        }

        // Validamos campos no numericos cortos

        $PROFESOR_array_error["error"] = "Campos no numéricos cortos";
        $PROFESOR_array_error["error_esperado"] = "Valor de atributo no numérico demasiado corto";

        foreach($PROFESOR->erroresdatos as $error)
        {
            if($error['codigo'] === "00003")
            {
                $PROFESOR_array_error['metodo'] = $error['atributo'];
                $PROFESOR_array_error["error_obtenido"] = $error['incidencia'];
                $PROFESOR_array_error['resultado'] = ($PROFESOR_array_error["error_esperado"] === $PROFESOR_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $PROFESOR_array_error);
            }
        }

        // Validamos campos numericos cortos

        $PROFESOR_array_error["error"] = "Campos numéricos cortos";
        $PROFESOR_array_error["error_esperado"] = "Valor de atributo numérico demasiado corto";

        foreach($PROFESOR->erroresdatos as $error)
        {
            if($error['codigo'] === "00004")
            {
                $PROFESOR_array_error['metodo'] = $error['atributo'];
                $PROFESOR_array_error["error_obtenido"] = $error['incidencia'];
                $PROFESOR_array_error['resultado'] = ($PROFESOR_array_error["error_esperado"] === $PROFESOR_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $PROFESOR_array_error);
            }
        }

        // Formato DNI incorrecto

        $PROFESOR_array_error["error"] = "Formato DNI incorrecto";
        $PROFESOR_array_error["error_esperado"] = "Formato dni erróneo";

        foreach($PROFESOR->erroresdatos as $error)
        {
            if($error['codigo'] === "00010")
            {
                $PROFESOR_array_error['metodo'] = $error['atributo'];
                $PROFESOR_array_error["error_obtenido"] = $error['incidencia'];
                $PROFESOR_array_error['resultado'] = ($PROFESOR_array_error["error_esperado"] === $PROFESOR_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $PROFESOR_array_error);
            }
        }

        // Dni no válido

        $PROFESOR_array_error["error"] = "DNI no válido";
        $PROFESOR_array_error["error_esperado"] = "Dni no válido";

        foreach($PROFESOR->erroresdatos as $error)
        {
            if($error['codigo'] === "00011")
            {
                $PROFESOR_array_error['metodo'] = $error['atributo'];
                $PROFESOR_array_error["error_obtenido"] = $error['incidencia'];
                $PROFESOR_array_error['resultado'] = ($PROFESOR_array_error["error_esperado"] === $PROFESOR_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $PROFESOR_array_error);
            }
        }

        // -----------------------------------------------------------

        // Datos usados

        $datos = array(
            "DNI"           => "asdasdasdasdasdasd..asdasdasdasdasdasdasdasdasdas..asdasdasdasdasdasdasdasdasdas",
            "NOMBRE"        => "asdasdasdasdasdasd..asdasdasdasdasdasdasdasdasdas..asdasdasdasdasdasdasdasdasdas",
            "APELLIDOS"     => "asdasdasdasdasdasd..asdasdasdasdasdasdasdasdasdas..asdasdasdasdasdasdasdasdasdas",
            "DEPARTAMENTO"  => "asdasdasdasdasdasd..asdasdasdasdasdasdasdasdasdas..asdasdasdasdasdasdasdasdasdas",
            "AREA"          => "asdasdasdasdasdasd..asdasdasdasdasdasdasdasdasdas..asdasdasdasdasdasdasdasdasdas",
            "CAMPUS"        => "asdasdasdasdasdasd..asdasdasdasdasdasdasdasdasdas..asdasdasdasdasdasdasdasdasdas"
        );

        // Comprobaciones

        $PROFESOR = new PROFESOR_Model($datos["DNI"],$datos["NOMBRE"],$datos["APELLIDOS"],$datos["DEPARTAMENTO"],$datos["CAMPUS"]);
        $resultado = $PROFESOR->comprobar_atributos();

        // -----------------------------------------------------------

        // Atributo demasiado largo

        $PROFESOR_array_error["error"] = "Atributo demasiado largo";
        $PROFESOR_array_error["error_esperado"] = "Valor de atributo demasiado largo";

        foreach($PROFESOR->erroresdatos as $error)
        {
            if($error['codigo'] === "00002")
            {
                $PROFESOR_array_error['metodo'] = $error['atributo'];
                $PROFESOR_array_error["error_obtenido"] = $error['incidencia'];
                $PROFESOR_array_error['resultado'] = ($PROFESOR_array_error["error_esperado"] === $PROFESOR_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $PROFESOR_array_error);
            }
        }

        // Solo se permiten alfabéticos

        $PROFESOR_array_error["error"] = "Solo alfabéticos";
        $PROFESOR_array_error["error_esperado"] = "Solo están permitidas alfabéticos";

        foreach($PROFESOR->erroresdatos as $error)
        {
            if($error['codigo'] === "00030")
            {
                $PROFESOR_array_error['metodo'] = $error['atributo'];
                $PROFESOR_array_error["error_obtenido"] = $error['incidencia'];
                $PROFESOR_array_error['resultado'] = ($PROFESOR_array_error["error_esperado"] === $PROFESOR_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $PROFESOR_array_error);
            }
        }
        
        // Atributos incorrectos (todos en uno)

        $PROFESOR_array_error['metodo'] = "comprobar_atributos";
        $PROFESOR_array_error["error"] = "Dos o más valores incorrectos";
        $PROFESOR_array_error["error_esperado"] = "false";
        $PROFESOR_array_error["error_obtenido"] = empty($PROFESOR->erroresdatos) ? "true" : "false";
        $PROFESOR_array_error['resultado'] = ($PROFESOR_array_error["error_esperado"] === $PROFESOR_array_error["error_obtenido"]) ? "OK" : "FALSE";
        array_push($ERRORS_array_test, $PROFESOR_array_error);

        // -----------------------------------------------------------

        // Datos usados
        
        $datos = array(
            "DNI"           => "22222222J",
            "NOMBRE"        => "NOMBRE",
            "APELLIDOS"     => "APELLIDO",
            "DEPARTAMENTO"  => "DEPARTAMENTO",
            "AREA"          => "AREA",
            "CAMPUS"        => "CAMPUS"
        );

        // Comprobaciones

        $PROFESOR = new PROFESOR_Model($datos["DNI"],$datos["NOMBRE"],$datos["APELLIDOS"],$datos["DEPARTAMENTO"],$datos["CAMPUS"]);
        $resultado = $PROFESOR->comprobar_atributos();

        // -----------------------------------------------------------

        // Todo OK

        $atributos = array("dni","nombre","apellido","área","departamento");
        $PROFESOR_array_error["error"] = "Valor correcto";
        $PROFESOR_array_error["error_esperado"] = "true";
        foreach($atributos as $attr)
        {
            $PROFESOR_array_error['metodo'] = $attr;
            $PROFESOR_array_error["error_obtenido"] = empty($PROFESOR->erroresdatos) ? "true" : "false";
            $PROFESOR_array_error['resultado'] = ($PROFESOR_array_error["error_esperado"] === $PROFESOR_array_error["error_obtenido"]) ? "OK" : "FALSE";
            array_push($ERRORS_array_test, $PROFESOR_array_error);
        }

        // Atributos correctos (todos en uno)

        $PROFESOR_array_error['metodo'] = "comprobar_atributos";
        $PROFESOR_array_error["error"] = "Valor correcto";
        $PROFESOR_array_error["error_esperado"] = "true";
        $PROFESOR_array_error["error_obtenido"] = empty($PROFESOR->erroresdatos) ? "true" : "false";
        $PROFESOR_array_error['resultado'] = ($PROFESOR_array_error["error_esperado"] === $PROFESOR_array_error["error_obtenido"]) ? "OK" : "FALSE";
        array_push($ERRORS_array_test, $PROFESOR_array_error);
    }

    PROFESOR_Validar();

?>