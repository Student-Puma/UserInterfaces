<?php
    $GLOBALS['INCIDENCIAS'] = array(
        '00001' => 'Atributo vacío',
        '00002' => 'Valor de atributo demasiado largo',
        '00003' => 'Valor de atributo no numérico demasiado corto',
        '00004' => 'Valor de atributo numérico demasiado corto',
        '00005' => 'Password demasiado larga',
        '00006' => 'Teléfono no válido',
        '00010' => 'Formato dni erróneo',
        '00011' => 'Dni no válido',
        '00020' => 'Formato fecha erróneo',
        '00030' => 'Solo están permitidas alfabéticos',
        '00040' => 'Solo están permitidas alfabéticos, números y el “-”',
        '00050' => 'Solo están permitidas alfabéticos y espacios, números y los símbolos  “- / º ª”',
        '00060' => 'Solo se permiten alfabéticos y números',
        '00070' => 'Solo se permiten números',
        '00080' => 'Solo se permiten los valores \'DESPACHO\',\'LABORATORIO\',\'PAS\'',
        '00090' => 'Solo se permiten alfabéticos',
        '00100' => 'Solo se permiten los valores \'hombre\',\'mujer\'',
        '00110' => 'Solo se permiten dddd-dddd donde d es un dígito',
        '00120' => 'Formato email erroneo'
    );

    function validarLetraDNI($dni)
    {
        $letra = strtoupper(substr($dni, -1));
        $numeros = intval(substr($dni, 0, -1));
        return substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros % 23, 1) === $letra;
    }

    function comprobar_login($value, $atributo="login")
    {
        $errores = array();

        if(empty($value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00001', 'incidencia' => $GLOBALS['INCIDENCIAS']['00001'])); }
        if(strlen($value) > 15)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00002', 'incidencia' => $GLOBALS['INCIDENCIAS']['00002'])); }
        if(strlen($value) < 3)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00003', 'incidencia' => $GLOBALS['INCIDENCIAS']['00003'])); }
        if(!preg_match('/^[A-Za-z]*$/',$value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00090', 'incidencia' => $GLOBALS['INCIDENCIAS']['00090'])); }

        return empty($errores) ? true : $errores;
    }

    function comprobar_password($value, $atributo="password")
    {
        $errores = array();

        if(empty($value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00001', 'incidencia' => $GLOBALS['INCIDENCIAS']['00001'])); }
        if(strlen($value) > 128)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00002', 'incidencia' => $GLOBALS['INCIDENCIAS']['00002'])); }
        if(strlen($value) > 15)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00005', 'incidencia' => $GLOBALS['INCIDENCIAS']['00005'])); }
        if(strlen($value) < 3)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00003', 'incidencia' => $GLOBALS['INCIDENCIAS']['00003'])); }
        if(!preg_match('/^[A-Za-z]*$/',$value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00090', 'incidencia' => $GLOBALS['INCIDENCIAS']['00090'])); }

        return empty($errores) ? true : $errores;
    }

    function comprobar_nombre($value, $atributo="nombre")
    {
        $errores = array();

        if(empty($value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00001', 'incidencia' => $GLOBALS['INCIDENCIAS']['00001'])); }
        if(strlen($value) > 15)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00002', 'incidencia' => $GLOBALS['INCIDENCIAS']['00002'])); }
        if(strlen($value) < 3)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00003', 'incidencia' => $GLOBALS['INCIDENCIAS']['00003'])); }
        if(!preg_match('/^[A-Za-zÁÉÍÓÚÏÜáéíóúïü][A-Za-z ÁÉÍÓÚÏÜáéíóúïü]*$/',$value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00030', 'incidencia' => $GLOBALS['INCIDENCIAS']['00030'])); }

        return empty($errores) ? true : $errores;
    }

    function comprobar_apellido($value, $atributo="apellido")
    {
        $errores = array();

        if(empty($value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00001', 'incidencia' => $GLOBALS['INCIDENCIAS']['00001'])); }
        if(strlen($value) > 50)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00002', 'incidencia' => $GLOBALS['INCIDENCIAS']['00002'])); }
        if(strlen($value) < 3)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00003', 'incidencia' => $GLOBALS['INCIDENCIAS']['00003'])); }
        if(!preg_match('/^[A-Za-zÁÉÍÓÚÏÜáéíóúïü][A-Za-z ÁÉÍÓÚÏÜáéíóúïü]*$/',$value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00030', 'incidencia' => $GLOBALS['INCIDENCIAS']['00030'])); }

        return empty($errores) ? true : $errores;
    }

    function comprobar_apellidoprofesor($value, $atributo="apellido")
    {
        $errores = array();

        if(empty($value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00001', 'incidencia' => $GLOBALS['INCIDENCIAS']['00001'])); }
        if(strlen($value) > 30)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00002', 'incidencia' => $GLOBALS['INCIDENCIAS']['00002'])); }
        if(strlen($value) < 3)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00003', 'incidencia' => $GLOBALS['INCIDENCIAS']['00003'])); }
        if(!preg_match('/^[A-Za-zÁÉÍÓÚÏÜáéíóúïü][A-Za-z ÁÉÍÓÚÏÜáéíóúïü]*$/',$value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00030', 'incidencia' => $GLOBALS['INCIDENCIAS']['00030'])); }

        return empty($errores) ? true : $errores;
    }

    function comprobar_DNI($value, $atributo="dni")
    {
        $errores = array();

        if(empty($value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00001', 'incidencia' => $GLOBALS['INCIDENCIAS']['00001'])); }
        if(strlen($value) > 9)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00002', 'incidencia' => $GLOBALS['INCIDENCIAS']['00002'])); }
        if(strlen($value) < 9)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00003', 'incidencia' => $GLOBALS['INCIDENCIAS']['00003'])); }
        if(!preg_match('/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/',$value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00010', 'incidencia' => $GLOBALS['INCIDENCIAS']['00010'])); }
        if(!validarLetraDNI($value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00011', 'incidencia' => $GLOBALS['INCIDENCIAS']['00011'])); }

        return empty($errores) ? true : $errores;
    }

    function comprobar_codigo($value, $atributo="codigo")
    {
        $errores = array();

        if(empty($value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00001', 'incidencia' => $GLOBALS['INCIDENCIAS']['00001'])); }
        if(strlen($value) > 10)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00002', 'incidencia' => $GLOBALS['INCIDENCIAS']['00002'])); }
        if(strlen($value) < 3)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00003', 'incidencia' => $GLOBALS['INCIDENCIAS']['00003'])); }
        if(!preg_match('/^[0-9A-Za-z-]*$/',$value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00040', 'incidencia' => $GLOBALS['INCIDENCIAS']['00040'])); }

        return empty($errores) ? true : $errores;
    }

    function comprobar_codigo_titulacion($value, $atributo="codigo titulación")
    {
        $errores = array();

        if(empty($value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00001', 'incidencia' => $GLOBALS['INCIDENCIAS']['00001'])); }
        if(strlen($value) > 10)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00002', 'incidencia' => $GLOBALS['INCIDENCIAS']['00002'])); }
        if(strlen($value) < 3)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00003', 'incidencia' => $GLOBALS['INCIDENCIAS']['00003'])); }
        if(!preg_match('/^[0-9A-Za-z]*$/',$value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00060', 'incidencia' => $GLOBALS['INCIDENCIAS']['00060'])); }

        return empty($errores) ? true : $errores;
    }

    function comprobar_fecha($value, $atributo="fecha")
    {
        $errores = array();

        if(empty($value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00001', 'incidencia' => $GLOBALS['INCIDENCIAS']['00001'])); }
        if(strlen($value) > 10)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00002', 'incidencia' => $GLOBALS['INCIDENCIAS']['00002'])); }
        if(strlen($value) < 8)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00004', 'incidencia' => $GLOBALS['INCIDENCIAS']['00004'])); }
        if(!preg_match('/^[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}$/',$value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00020', 'incidencia' => $GLOBALS['INCIDENCIAS']['00020'])); }

        return empty($errores) ? true : $errores;
    }

    function comprobar_telefono($value, $atributo="telefono")
    {
        $errores = array();

        if(empty($value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00001', 'incidencia' => $GLOBALS['INCIDENCIAS']['00001'])); }
        if(strlen($value) > 12)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00002', 'incidencia' => $GLOBALS['INCIDENCIAS']['00002'])); }
        if(strlen($value) < 9)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00004', 'incidencia' => $GLOBALS['INCIDENCIAS']['00004'])); }
        if(!preg_match('/^[0-9\+]*$/',$value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00070', 'incidencia' => $GLOBALS['INCIDENCIAS']['00070'])); }
        if(!preg_match('/^\+?(34)?[976][0-9]{8}$/',$value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00006', 'incidencia' => $GLOBALS['INCIDENCIAS']['00006'])); }

        return empty($errores) ? true : $errores;
    }

    function comprobar_espacio($value, $atributo="espacio")
    {
        $errores = array();

        if(empty($value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00001', 'incidencia' => $GLOBALS['INCIDENCIAS']['00001'])); }
        if(strlen($value) > 4)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00002', 'incidencia' => $GLOBALS['INCIDENCIAS']['00002'])); }
        if(strlen($value) < 1)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00004', 'incidencia' => $GLOBALS['INCIDENCIAS']['00004'])); }
        if(!preg_match('/^[0-9]*$/',$value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00070', 'incidencia' => $GLOBALS['INCIDENCIAS']['00070'])); }

        return empty($errores) ? true : $errores;
    }

    function comprobar_numinventario($value, $atributo="numinventario")
    {
        $errores = array();

        if(empty($value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00001', 'incidencia' => $GLOBALS['INCIDENCIAS']['00001'])); }
        if(strlen($value) > 8)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00002', 'incidencia' => $GLOBALS['INCIDENCIAS']['00002'])); }
        if(strlen($value) < 1)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00004', 'incidencia' => $GLOBALS['INCIDENCIAS']['00004'])); }
        if(!preg_match('/^[0-9]*$/',$value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00070', 'incidencia' => $GLOBALS['INCIDENCIAS']['00070'])); }

        return empty($errores) ? true : $errores;
    }

    function comprobar_tipo($value, $atributo="tipo")
    {
        $upper = strtoupper($value);
        $errores = array();

        if(empty($value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00001', 'incidencia' => $GLOBALS['INCIDENCIAS']['00001'])); }
        if($upper !== "DESPACHO" && $upper !== "LABORATORIO" && $upper !== "PAS")
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00080', 'incidencia' => $GLOBALS['INCIDENCIAS']['00080'])); }

        return empty($errores) ? true : $errores;
    }

    function comprobar_sexo($value, $atributo="sexo")
    {
        $upper = strtoupper($value);
        $errores = array();

        if(empty($value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00001', 'incidencia' => $GLOBALS['INCIDENCIAS']['00001'])); }
        if($upper !== "HOMBRE" && $upper !== "MUJER")
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00100', 'incidencia' => $GLOBALS['INCIDENCIAS']['00100'])); }

        return empty($errores) ? true : $errores;
    }

    function comprobar_anhoacademico($value, $atributo="año académico")
    {
        $errores = array();

        if(empty($value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00001', 'incidencia' => $GLOBALS['INCIDENCIAS']['00001'])); }
        if(strlen($value) > 9)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00002', 'incidencia' => $GLOBALS['INCIDENCIAS']['00002'])); }
        if(strlen($value) < 9)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00004', 'incidencia' => $GLOBALS['INCIDENCIAS']['00004'])); }
        if(!preg_match('/^[0-9]{4}-[0-9]{4}$/',$value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00110', 'incidencia' => $GLOBALS['INCIDENCIAS']['00110'])); }

        return empty($errores) ? true : $errores;
    }

    function comprobar_email($value, $atributo="email")
    {
        $errores = array();

        if(empty($value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00001', 'incidencia' => $GLOBALS['INCIDENCIAS']['00001'])); }
        if(strlen($value) > 60)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00002', 'incidencia' => $GLOBALS['INCIDENCIAS']['00002'])); }
        if(strlen($value) < 5)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00003', 'incidencia' => $GLOBALS['INCIDENCIAS']['00003'])); }
        if(!preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/',$value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00120', 'incidencia' => $GLOBALS['INCIDENCIAS']['00120'])); }

        return empty($errores) ? true : $errores;
    }

    function comprobar_titulacion($value, $atributo="titulacion")
    {
        $errores = array();

        if(empty($value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00001', 'incidencia' => $GLOBALS['INCIDENCIAS']['00001'])); }
        if(strlen($value) > 50)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00002', 'incidencia' => $GLOBALS['INCIDENCIAS']['00002'])); }
        if(strlen($value) < 3)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00003', 'incidencia' => $GLOBALS['INCIDENCIAS']['00003'])); }
        if(!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúïüÏÜ ]*$/',$value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00030', 'incidencia' => $GLOBALS['INCIDENCIAS']['00030'])); }

        return empty($errores) ? true : $errores;
    }

    function comprobar_responsable($value, $atributo="responsable")
    {
        $errores = array();

        if(empty($value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00001', 'incidencia' => $GLOBALS['INCIDENCIAS']['00001'])); }
        if(strlen($value) > 60)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00002', 'incidencia' => $GLOBALS['INCIDENCIAS']['00002'])); }
        if(strlen($value) < 3)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00003', 'incidencia' => $GLOBALS['INCIDENCIAS']['00003'])); }
        if(!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúïüÏÜ ]*$/',$value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00030', 'incidencia' => $GLOBALS['INCIDENCIAS']['00030'])); }

        return empty($errores) ? true : $errores;
    }

    function comprobar_campus($value, $atributo="campus")
    {
        $errores = array();

        if(empty($value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00001', 'incidencia' => $GLOBALS['INCIDENCIAS']['00001'])); }
        if(strlen($value) > 10)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00002', 'incidencia' => $GLOBALS['INCIDENCIAS']['00002'])); }
        if(strlen($value) < 3)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00003', 'incidencia' => $GLOBALS['INCIDENCIAS']['00003'])); }
        if(!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúïüÏÜ ]*$/',$value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00030', 'incidencia' => $GLOBALS['INCIDENCIAS']['00030'])); }

        return empty($errores) ? true : $errores;
    }

    function comprobar_area($value, $atributo="área")
    {
        $errores = array();

        if(empty($value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00001', 'incidencia' => $GLOBALS['INCIDENCIAS']['00001'])); }
        if(strlen($value) > 60)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00002', 'incidencia' => $GLOBALS['INCIDENCIAS']['00002'])); }
        if(strlen($value) < 3)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00003', 'incidencia' => $GLOBALS['INCIDENCIAS']['00003'])); }
        if(!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúïüÏÜ ]*$/',$value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00030', 'incidencia' => $GLOBALS['INCIDENCIAS']['00030'])); }

        return empty($errores) ? true : $errores;
    }

    function comprobar_departamento($value, $atributo="departamento")
    {
        $errores = array();

        if(empty($value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00001', 'incidencia' => $GLOBALS['INCIDENCIAS']['00001'])); }
        if(strlen($value) > 60)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00002', 'incidencia' => $GLOBALS['INCIDENCIAS']['00002'])); }
        if(strlen($value) < 3)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00003', 'incidencia' => $GLOBALS['INCIDENCIAS']['00003'])); }
        if(!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúïüÏÜ ]*$/',$value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00030', 'incidencia' => $GLOBALS['INCIDENCIAS']['00030'])); }

        return empty($errores) ? true : $errores;
    }

    function comprobar_nombreedificio($value, $atributo="nombre edificio")
    {
        $errores = array();

        if(empty($value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00001', 'incidencia' => $GLOBALS['INCIDENCIAS']['00001'])); }
        if(strlen($value) > 50)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00002', 'incidencia' => $GLOBALS['INCIDENCIAS']['00002'])); }
        if(strlen($value) < 3)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00003', 'incidencia' => $GLOBALS['INCIDENCIAS']['00003'])); }
        if(!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúïüÏÜ ]*$/',$value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00030', 'incidencia' => $GLOBALS['INCIDENCIAS']['00030'])); }

        return empty($errores) ? true : $errores;
    }

    function comprobar_direccion($value, $atributo="dirección")
    {
        $errores = array();

        if(empty($value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00001', 'incidencia' => $GLOBALS['INCIDENCIAS']['00001'])); }
        if(strlen($value) > 150)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00002', 'incidencia' => $GLOBALS['INCIDENCIAS']['00002'])); }
        if(strlen($value) < 3)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00003', 'incidencia' => $GLOBALS['INCIDENCIAS']['00003'])); }
        if(!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúïüÏÜ 0-9\-\/ºª]$/',$value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00050', 'incidencia' => $GLOBALS['INCIDENCIAS']['00050'])); }

        return empty($errores) ? true : $errores;
    }
?>