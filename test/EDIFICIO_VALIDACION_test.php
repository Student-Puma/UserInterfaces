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
    include_once '../Model/EDIFICIO_Model.php';

    /**
     * Test validaciones EDIFICIO
     */
    function EDIFICIO_Validar()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // Plantilla

        $EDIFICIO_array_error = array(
            "entidad"           => "EDIFICIO",
            "metodo"            => "",
            "error"             => "",
            "error_esperado"    => "",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "COD"           => "",
            "NOMBRE"        => "",
            "DIRECCION"     => "",
            "CAMPUS"        => ""
        );

        // Comprobaciones

        $EDIFICIO = new EDIFICIO_Model($datos["COD"],$datos["NOMBRE"],$datos["DIRECCION"],$datos["CAMPUS"]);
        $resultado = $EDIFICIO->comprobar_atributos();
        
        // Validamos campos vacíos

        $EDIFICIO_array_error["error"] = "Campos vacíos";
        $EDIFICIO_array_error["error_esperado"] = "Atributo vacío";

        foreach($EDIFICIO->erroresdatos as $error)
        {
            if($error['codigo'] === "00001")
            {
                $EDIFICIO_array_error['metodo'] = $error['atributo'];
                $EDIFICIO_array_error["error_obtenido"] = $error['incidencia'];
                $EDIFICIO_array_error['resultado'] = ($EDIFICIO_array_error["error_esperado"] === $EDIFICIO_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $EDIFICIO_array_error);
            }
        }

        // Validamos campos no numericos cortos

        $EDIFICIO_array_error["error"] = "Campos no numéricos cortos";
        $EDIFICIO_array_error["error_esperado"] = "Valor de atributo no numérico demasiado corto";

        foreach($EDIFICIO->erroresdatos as $error)
        {
            if($error['codigo'] === "00003")
            {
                $EDIFICIO_array_error['metodo'] = $error['atributo'];
                $EDIFICIO_array_error["error_obtenido"] = $error['incidencia'];
                $EDIFICIO_array_error['resultado'] = ($EDIFICIO_array_error["error_esperado"] === $EDIFICIO_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $EDIFICIO_array_error);
            }
        }

        // Validamos campos numericos cortos

        $EDIFICIO_array_error["error"] = "Campos numéricos cortos";
        $EDIFICIO_array_error["error_esperado"] = "Valor de atributo numérico demasiado corto";

        foreach($EDIFICIO->erroresdatos as $error)
        {
            if($error['codigo'] === "00004")
            {
                $EDIFICIO_array_error['metodo'] = $error['atributo'];
                $EDIFICIO_array_error["error_obtenido"] = $error['incidencia'];
                $EDIFICIO_array_error['resultado'] = ($EDIFICIO_array_error["error_esperado"] === $EDIFICIO_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $EDIFICIO_array_error);
            }
        }

        // -----------------------------------------------------------

        // Datos usados

        $datos = array(
            "COD"           => "asdasdasdasdasdasd..asdasdasdasdasdasdasdasdasdas..asdasdasdasdasdasdasdasdasdas",
            "NOMBRE"        => "asdasdasdasdasdasd..asdasdasdasdasdasdasdasdasdas..asdasdasdasdasdasdasdasdasdas",
            "DIRECCION"     => "asdasdasdasdasdasd**..asdasdasdasdasdasdasdasdasdas..asdasdasdasdasdasdasdasdasdasasdasdasdasdasdasd..asdasdasdasdasdasdasdasdasdas..asdasdasdasdasdasdasdasdasdasasdasdasdasdasdasd..asdasdasdasdasdasdasdasdasdas..asdasdasdasdasdasdasdasdasdas",
            "CAMPUS"   => "asdasdasdasdasdasd..asdasdasdasdasdasdasdasdasdas..asdasdasdasdasdasdasdasdasdas",
        );

        // Comprobaciones

        $EDIFICIO = new EDIFICIO_Model($datos["COD"],$datos["NOMBRE"],$datos["DIRECCION"],$datos["CAMPUS"]);
        $resultado = $EDIFICIO->comprobar_atributos();

        // -----------------------------------------------------------

        // Atributo demasiado largo

        $EDIFICIO_array_error["error"] = "Atributo demasiado largo";
        $EDIFICIO_array_error["error_esperado"] = "Valor de atributo demasiado largo";

        foreach($EDIFICIO->erroresdatos as $error)
        {
            if($error['codigo'] === "00002")
            {
                $EDIFICIO_array_error['metodo'] = $error['atributo'];
                $EDIFICIO_array_error["error_obtenido"] = $error['incidencia'];
                $EDIFICIO_array_error['resultado'] = ($EDIFICIO_array_error["error_esperado"] === $EDIFICIO_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $EDIFICIO_array_error);
            }
        }

        // Formato codigo incorrecto

        $EDIFICIO_array_error["error"] = "Formato codigo incorrecto";
        $EDIFICIO_array_error["error_esperado"] = "Solo están permitidas alfabéticos, números y el “-”";

        foreach($EDIFICIO->erroresdatos as $error)
        {
            if($error['codigo'] === "00040")
            {
                $EDIFICIO_array_error['metodo'] = $error['atributo'];
                $EDIFICIO_array_error["error_obtenido"] = $error['incidencia'];
                $EDIFICIO_array_error['resultado'] = ($EDIFICIO_array_error["error_esperado"] === $EDIFICIO_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $EDIFICIO_array_error);
            }
        }

        // Solo se permiten alfabéticos

        $EDIFICIO_array_error["error"] = "Solo alfabéticos";
        $EDIFICIO_array_error["error_esperado"] = "Solo están permitidas alfabéticos";

        foreach($EDIFICIO->erroresdatos as $error)
        {
            if($error['codigo'] === "00030")
            {
                $EDIFICIO_array_error['metodo'] = $error['atributo'];
                $EDIFICIO_array_error["error_obtenido"] = $error['incidencia'];
                $EDIFICIO_array_error['resultado'] = ($EDIFICIO_array_error["error_esperado"] === $EDIFICIO_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $EDIFICIO_array_error);
            }
        }

        // Dirección no válida

        $EDIFICIO_array_error["error"] = "Dirección no válida";
        $EDIFICIO_array_error["error_esperado"] = "Solo están permitidas alfabéticos y espacios, números y los símbolos  “- / º ª”";

        foreach($EDIFICIO->erroresdatos as $error)
        {
            if($error['codigo'] === "00050")
            {
                $EDIFICIO_array_error['metodo'] = $error['atributo'];
                $EDIFICIO_array_error["error_obtenido"] = $error['incidencia'];
                $EDIFICIO_array_error['resultado'] = ($EDIFICIO_array_error["error_esperado"] === $EDIFICIO_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $EDIFICIO_array_error);
            }
        }

        // Atributos incorrectos (todos en uno)

        $EDIFICIO_array_error['metodo'] = "comprobar_atributos";
        $EDIFICIO_array_error["error"] = "Dos o más valores incorrectos";
        $EDIFICIO_array_error["error_esperado"] = "false";
        $EDIFICIO_array_error["error_obtenido"] = empty($EDIFICIO->erroresdatos) ? "true" : "false";
        $EDIFICIO_array_error['resultado'] = ($EDIFICIO_array_error["error_esperado"] === $EDIFICIO_array_error["error_obtenido"]) ? "OK" : "FALSE";
        array_push($ERRORS_array_test, $EDIFICIO_array_error);

        // -----------------------------------------------------------

        // Datos usados
        
        $datos = array(
            "COD"           => "22",
            "NOMBRE"        => "NOMBRE",
            "DIRECCION"     => "DIRECCION",
            "CAMPUS"        => "CAMPUS"
        );

        // Comprobaciones

        $EDIFICIO = new EDIFICIO_Model($datos["COD"],$datos["NOMBRE"],$datos["DIRECCION"],$datos["CAMPUS"]);
        $resultado = $EDIFICIO->comprobar_atributos();

        // -----------------------------------------------------------

        // Todo OK

        $atributos = array("codigo","nombre","direccion","campus");
        $EDIFICIO_array_error["error"] = "Valor correcto";
        $EDIFICIO_array_error["error_esperado"] = "true";
        foreach($atributos as $attr)
        {
            $EDIFICIO_array_error['metodo'] = $attr;
            $EDIFICIO_array_error["error_obtenido"] = empty($EDIFICIO->erroresdatos) ? "true" : "false";
            $EDIFICIO_array_error['resultado'] = ($EDIFICIO_array_error["error_esperado"] === $EDIFICIO_array_error["error_obtenido"]) ? "OK" : "FALSE";
            array_push($ERRORS_array_test, $EDIFICIO_array_error);
        }

        // Atributos correctos (todos en uno)

        $EDIFICIO_array_error['metodo'] = "comprobar_atributos";
        $EDIFICIO_array_error["error"] = "Valor correcto";
        $EDIFICIO_array_error["error_esperado"] = "true";
        $EDIFICIO_array_error["error_obtenido"] = empty($EDIFICIO->erroresdatos) ? "true" : "false";
        $EDIFICIO_array_error['resultado'] = ($EDIFICIO_array_error["error_esperado"] === $EDIFICIO_array_error["error_obtenido"]) ? "OK" : "FALSE";
        array_push($ERRORS_array_test, $EDIFICIO_array_error);
    }

    EDIFICIO_Validar();
?>