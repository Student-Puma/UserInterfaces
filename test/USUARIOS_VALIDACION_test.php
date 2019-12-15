<?php
    include_once '../Model/USUARIOS_Model.php';

    /**
     * Test validaciones USUARIOS
     */
    function USUARIOS_Validar()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // Plantilla

        $USUARIOS_array_error = array(
            "entidad"           => "USUARIOS",
            "metodo"            => "",
            "error"             => "",
            "error_esperado"    => "",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "LOGIN"     => "",
            "PASSWD"    => "",
            "DNI"       => "",
            "NOMBRE"    => "",
            "APELLIDOS" => "",
            "EMAIL"     => "",
            "TELEFONO"  => "",
            "FECHA"     => "",
            "FOTO"      => "",
            "SEXO"      => ""
        );

        // Comprobaciones

        $USUARIOS = new USUARIOS_Model($datos["LOGIN"],$datos["PASSWD"],$datos["DNI"],$datos["NOMBRE"],$datos["APELLIDOS"],$datos["EMAIL"],$datos["TELEFONO"],$datos["FECHA"],$datos["FOTO"],$datos["SEXO"]);
        $resultado = $USUARIOS->comprobar_atributos();
        
        // Validamos campos vacíos

        $USUARIOS_array_error["error"] = "Campos vacíos";
        $USUARIOS_array_error["error_esperado"] = "Atributo vacío";

        foreach($USUARIOS->erroresdatos as $error)
        {
            if($error['codigo'] === "00001")
            {
                $USUARIOS_array_error['metodo'] = $error['atributo'];
                $USUARIOS_array_error["error_obtenido"] = $error['incidencia'];
                $USUARIOS_array_error['resultado'] = ($USUARIOS_array_error["error_esperado"] === $USUARIOS_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $USUARIOS_array_error);
            }
        }

        // Validamos campos no numericos cortos

        $USUARIOS_array_error["error"] = "Campos no numéricos cortos";
        $USUARIOS_array_error["error_esperado"] = "Valor de atributo no numérico demasiado corto";

        foreach($USUARIOS->erroresdatos as $error)
        {
            if($error['codigo'] === "00003")
            {
                $USUARIOS_array_error['metodo'] = $error['atributo'];
                $USUARIOS_array_error["error_obtenido"] = $error['incidencia'];
                $USUARIOS_array_error['resultado'] = ($USUARIOS_array_error["error_esperado"] === $USUARIOS_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $USUARIOS_array_error);
            }
        }

        // Validamos campos numericos cortos

        $USUARIOS_array_error["error"] = "Campos numéricos cortos";
        $USUARIOS_array_error["error_esperado"] = "Valor de atributo numérico demasiado corto";

        foreach($USUARIOS->erroresdatos as $error)
        {
            if($error['codigo'] === "00004")
            {
                $USUARIOS_array_error['metodo'] = $error['atributo'];
                $USUARIOS_array_error["error_obtenido"] = $error['incidencia'];
                $USUARIOS_array_error['resultado'] = ($USUARIOS_array_error["error_esperado"] === $USUARIOS_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $USUARIOS_array_error);
            }
        }

        // Formato DNI incorrecto

        $USUARIOS_array_error["error"] = "Formato DNI incorrecto";
        $USUARIOS_array_error["error_esperado"] = "Formato dni erróneo";

        foreach($USUARIOS->erroresdatos as $error)
        {
            if($error['codigo'] === "00010")
            {
                $USUARIOS_array_error['metodo'] = $error['atributo'];
                $USUARIOS_array_error["error_obtenido"] = $error['incidencia'];
                $USUARIOS_array_error['resultado'] = ($USUARIOS_array_error["error_esperado"] === $USUARIOS_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $USUARIOS_array_error);
            }
        }

        // Dni no válido

        $USUARIOS_array_error["error"] = "DNI no válido";
        $USUARIOS_array_error["error_esperado"] = "Dni no válido";

        foreach($USUARIOS->erroresdatos as $error)
        {
            if($error['codigo'] === "00011")
            {
                $USUARIOS_array_error['metodo'] = $error['atributo'];
                $USUARIOS_array_error["error_obtenido"] = $error['incidencia'];
                $USUARIOS_array_error['resultado'] = ($USUARIOS_array_error["error_esperado"] === $USUARIOS_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $USUARIOS_array_error);
            }
        }

        // -----------------------------------------------------------

        // Datos usados

        $datos = array(
            "LOGIN"     => "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa++++++BBBBBBBBBBBBBBBBBBBBBBBBBBBBbbbbbbbbbbbbbaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa++++++BBBBBBBBBBBBBBBBBBBBBBBBBBBBbbbbbbbbbbbbb",
            "PASSWD"    => "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa++++++BBBBBBBBBBBBBBBBBBBBBBBBBBBBbbbbbbbbbbbbbaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa++++++BBBBBBBBBBBBBBBBBBBBBBBBBBBBbbbbbbbbbbbbb",
            "DNI"       => "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa++++++BBBBBBBBBBBBBBBBBBBBBBBBBBBBbbbbbbbbbbbbbaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa++++++BBBBBBBBBBBBBBBBBBBBBBBBBBBBbbbbbbbbbbbbb",
            "NOMBRE"    => "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa++++++BBBBBBBBBBBBBBBBBBBBBBBBBBBBbbbbbbbbbbbbbaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa++++++BBBBBBBBBBBBBBBBBBBBBBBBBBBBbbbbbbbbbbbbb",
            "APELLIDOS" => "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa++++++BBBBBBBBBBBBBBBBBBBBBBBBBBBBbbbbbbbbbbbbbaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa++++++BBBBBBBBBBBBBBBBBBBBBBBBBBBBbbbbbbbbbbbbb",
            "EMAIL"     => "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa++++++BBBBBBBBBBBBBBBBBBBBBBBBBBBBbbbbbbbbbbbbbaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa++++++BBBBBBBBBBBBBBBBBBBBBBBBBBBBbbbbbbbbbbbbb",
            "TELEFONO"  => "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa++++++BBBBBBBBBBBBBBBBBBBBBBBBBBBBbbbbbbbbbbbbbaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa++++++BBBBBBBBBBBBBBBBBBBBBBBBBBBBbbbbbbbbbbbbb",
            "FECHA"     => "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa++++++BBBBBBBBBBBBBBBBBBBBBBBBBBBBbbbbbbbbbbbbbaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa++++++BBBBBBBBBBBBBBBBBBBBBBBBBBBBbbbbbbbbbbbbb",
            "FOTO"      => "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa++++++BBBBBBBBBBBBBBBBBBBBBBBBBBBBbbbbbbbbbbbbbaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa++++++BBBBBBBBBBBBBBBBBBBBBBBBBBBBbbbbbbbbbbbbb",
            "SEXO"      => "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa++++++BBBBBBBBBBBBBBBBBBBBBBBBBBBBbbbbbbbbbbbbbaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa++++++BBBBBBBBBBBBBBBBBBBBBBBBBBBBbbbbbbbbbbbbb"
        );

        // Comprobaciones

        $USUARIOS = new USUARIOS_Model($datos["LOGIN"],$datos["PASSWD"],$datos["DNI"],$datos["NOMBRE"],$datos["APELLIDOS"],$datos["EMAIL"],$datos["TELEFONO"],$datos["FECHA"],$datos["FOTO"],$datos["SEXO"]);
        $resultado = $USUARIOS->comprobar_atributos();

        // -----------------------------------------------------------

        // Atributo demasiado largo

        $USUARIOS_array_error["error"] = "Atributo demasiado largo";
        $USUARIOS_array_error["error_esperado"] = "Valor de atributo demasiado largo";

        foreach($USUARIOS->erroresdatos as $error)
        {
            if($error['codigo'] === "00002")
            {
                $USUARIOS_array_error['metodo'] = $error['atributo'];
                $USUARIOS_array_error["error_obtenido"] = $error['incidencia'];
                $USUARIOS_array_error['resultado'] = ($USUARIOS_array_error["error_esperado"] === $USUARIOS_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $USUARIOS_array_error);
            }
        }

        // Solo se permiten alfabéticos

        $USUARIOS_array_error["error"] = "Solo alfabéticos";
        $USUARIOS_array_error["error_esperado"] = "Solo están permitidas alfabéticos";

        foreach($USUARIOS->erroresdatos as $error)
        {
            if($error['codigo'] === "00030")
            {
                $USUARIOS_array_error['metodo'] = $error['atributo'];
                $USUARIOS_array_error["error_obtenido"] = $error['incidencia'];
                $USUARIOS_array_error['resultado'] = ($USUARIOS_array_error["error_esperado"] === $USUARIOS_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $USUARIOS_array_error);
            }
        }

        // Teléfono no válido

        $USUARIOS_array_error["error"] = "Teléfono no válido";
        $USUARIOS_array_error["error_esperado"] = "Teléfono no válido";

        foreach($USUARIOS->erroresdatos as $error)
        {
            if($error['codigo'] === "00006")
            {
                $USUARIOS_array_error['metodo'] = $error['atributo'];
                $USUARIOS_array_error["error_obtenido"] = $error['incidencia'];
                $USUARIOS_array_error['resultado'] = ($USUARIOS_array_error["error_esperado"] === $USUARIOS_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $USUARIOS_array_error);
            }
        }

        // Solo se permiten números

        $USUARIOS_array_error["error"] = "Solo se permiten números";
        $USUARIOS_array_error["error_esperado"] = "Solo se permiten números";

        foreach($USUARIOS->erroresdatos as $error)
        {
            if($error['codigo'] === "00070")
            {
                $USUARIOS_array_error['metodo'] = $error['atributo'];
                $USUARIOS_array_error["error_obtenido"] = $error['incidencia'];
                $USUARIOS_array_error['resultado'] = ($USUARIOS_array_error["error_esperado"] === $USUARIOS_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $USUARIOS_array_error);
            }
        }

        // Fecha incorrecta

        $USUARIOS_array_error["error"] = "Fecha incorrecta";
        $USUARIOS_array_error["error_esperado"] = "Formato fecha erróneo";

        foreach($USUARIOS->erroresdatos as $error)
        {
            if($error['codigo'] === "00020")
            {
                $USUARIOS_array_error['metodo'] = $error['atributo'];
                $USUARIOS_array_error["error_obtenido"] = $error['incidencia'];
                $USUARIOS_array_error['resultado'] = ($USUARIOS_array_error["error_esperado"] === $USUARIOS_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $USUARIOS_array_error);
            }
        }

        // Solo alfabéticos

        $USUARIOS_array_error["error"] = "Solo alfabéticos";
        $USUARIOS_array_error["error_esperado"] = "Solo se permiten alfabéticos";

        foreach($USUARIOS->erroresdatos as $error)
        {
            if($error['codigo'] === "00090")
            {
                $USUARIOS_array_error['metodo'] = $error['atributo'];
                $USUARIOS_array_error["error_obtenido"] = $error['incidencia'];
                $USUARIOS_array_error['resultado'] = ($USUARIOS_array_error["error_esperado"] === $USUARIOS_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $USUARIOS_array_error);
            }
        }

        // Contraseña demasiado larga

        $USUARIOS_array_error["error"] = "Contraseña demasiado larga";
        $USUARIOS_array_error["error_esperado"] = "Password demasiado larga";

        foreach($USUARIOS->erroresdatos as $error)
        {
            if($error['codigo'] === "00005")
            {
                $USUARIOS_array_error['metodo'] = $error['atributo'];
                $USUARIOS_array_error["error_obtenido"] = $error['incidencia'];
                $USUARIOS_array_error['resultado'] = ($USUARIOS_array_error["error_esperado"] === $USUARIOS_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $USUARIOS_array_error);
            }
        }

        // Género incorrecto

        $USUARIOS_array_error["error"] = "Género incorrecto";
        $USUARIOS_array_error["error_esperado"] = "Solo se permiten los valores 'hombre','mujer'";

        foreach($USUARIOS->erroresdatos as $error)
        {
            if($error['codigo'] === "00100")
            {
                $USUARIOS_array_error['metodo'] = $error['atributo'];
                $USUARIOS_array_error["error_obtenido"] = $error['incidencia'];
                $USUARIOS_array_error['resultado'] = ($USUARIOS_array_error["error_esperado"] === $USUARIOS_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $USUARIOS_array_error);
            }
        }

        // Email erróneo

        $USUARIOS_array_error["error"] = "Email erróneo";
        $USUARIOS_array_error["error_esperado"] = "Formato email erroneo";

        foreach($USUARIOS->erroresdatos as $error)
        {
            if($error['codigo'] === "00120")
            {
                $USUARIOS_array_error['metodo'] = $error['atributo'];
                $USUARIOS_array_error["error_obtenido"] = $error['incidencia'];
                $USUARIOS_array_error['resultado'] = ($USUARIOS_array_error["error_esperado"] === $USUARIOS_array_error["error_obtenido"]) ? "OK" : "FALSE";
                array_push($ERRORS_array_test, $USUARIOS_array_error);
            }
        }

        // -----------------------------------------------------------

        // Datos usados
        
        $datos = array(
            "LOGIN"     => "LOGIN",
            "PASSWD"    => "PASSWD",
            "DNI"       => "22222222J",
            "NOMBRE"    => "NOMBRE",
            "APELLIDOS" => "APELLIDO",
            "EMAIL"     => "EMAIL@EMAIL.COM",
            "TELEFONO"  => "600000000",
            "FECHA"     => "2000-01-01",
            "FOTO"      => "FOTO",
            "SEXO"      => "HOMBRE"
        );

        // Comprobaciones

        $USUARIOS = new USUARIOS_Model($datos["LOGIN"],$datos["PASSWD"],$datos["DNI"],$datos["NOMBRE"],$datos["APELLIDOS"],$datos["EMAIL"],$datos["TELEFONO"],$datos["FECHA"],$datos["FOTO"],$datos["SEXO"]);
        $resultado = $USUARIOS->comprobar_atributos();

        // -----------------------------------------------------------

        // Todo OK

        $atributos = array("login","password","dni","nombre","apellido","email","telefono","fecha","sexo");
        $USUARIOS_array_error["error"] = "Valor correcto";
        $USUARIOS_array_error["error_esperado"] = "true";
        foreach($atributos as $attr)
        {
            $USUARIOS_array_error['metodo'] = $attr;
            $USUARIOS_array_error["error_obtenido"] = empty($USUARIOS->erroresdatos) ? "true" : "false";
            $USUARIOS_array_error['resultado'] = ($USUARIOS_array_error["error_esperado"] === $USUARIOS_array_error["error_obtenido"]) ? "OK" : "FALSE";
            array_push($ERRORS_array_test, $USUARIOS_array_error);
        }
    }

    USUARIOS_Validar();

?>