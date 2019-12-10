<?php
    $GLOBALS['INCIDENCIAS'] = array(
        '00001' => 'Atributo vacío',
        '00002' => 'Valor del atributo demasiado largo',
        '00003' => 'Valor de atributo no numérico demasiado corto',
        '00004' => 'Valor de atributo numérico demasiado corto',
        '00010' => 'Formato dni erróneo',
        '00011' => 'Dni no válido'
    );

    function validarLetraDNI($dni)
    {
        $letra = strtoupper(substr($dni, -1));
        $numeros = substr($dni, 0, -1);
        return substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros % 23, 1) === $letra;
    }

    function comprobar_DNI($dni)
    {

        $atributo = "dni";
        $errores = array();

        if(empty($dni))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00001', 'incidencia' => $GLOBALS['INCIDENCIAS']['00001'])); }
        if(strlen($dni) > 9)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00002', 'incidencia' => $GLOBALS['INCIDENCIAS']['00002'])); }
        if(strlen($dni) < 9)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00003', 'incidencia' => $GLOBALS['INCIDENCIAS']['00003'])); }
        if(!preg_match('/[0-9]{8}[A-NO-Za-no-z]/',$dni))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00010', 'incidencia' => $GLOBALS['INCIDENCIAS']['00010'])); }
        if(!validarLetraDNI($dni))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00011', 'incidencia' => $GLOBALS['INCIDENCIAS']['00011'])); }

        return empty($errores) ? true : $errores;
    }

?>