<?php
    /**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 15/12/2019
	 */

    /**
	 * Validaciones de atributos
	 */

    // Array con las incidencias según su código

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
        '00080' => 'Solo se permiten los valores \'DESPACHO\', \'LABORATORIO\', \'PAS\'',
        '00090' => 'Solo se permiten alfabéticos',
        '00100' => 'Solo se permiten los valores \'hombre\',\'mujer\'',
        '00110' => 'Solo se permiten dddd-dddd donde d es un dígito',
        '00120' => 'Formato email erroneo'
    );

    /**
     * Validación de la letra del DNI
     * 
     * @param dni String con el DNI
     * 
     * @return true || false
     */
    function validarLetraDNI($dni)
    {
        $letra = strtoupper(substr($dni, -1));
        $numeros = intval(substr($dni, 0, -1));
        return substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros % 23, 1) === $letra;
    }

    /**
     * Validación del login
     * 
     * @param value Valor de la variable a comprobar
     * @param atributo Nombre del atributo
     * 
     * @return true || errores
     */
    function comprobar_login($value, $atributo="login")
    {
        $errores = array();

        // Comprobaciones
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

    /**
     * Validación de la contraseña
     * 
     * @param value Valor de la variable a comprobar
     * @param atributo Nombre del atributo
     * 
     * @return true || errores
     */
    function comprobar_password($value, $atributo="password")
    {
        $errores = array();

        // Comprobaciones
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

    /**
     * Validación del nombre
     * 
     * @param value Valor de la variable a comprobar
     * @param atributo Nombre del atributo
     * 
     * @return true || errores
     */
    function comprobar_nombre($value, $atributo="nombre")
    {
        $errores = array();

        // Comprobaciones
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

    /**
     * Validación del apellido
     * 
     * @param value Valor de la variable a comprobar
     * @param atributo Nombre del atributo
     * 
     * @return true || errores
     */
    function comprobar_apellido($value, $atributo="apellido")
    {
        $errores = array();

        // Comprobaciones
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

    /**
     * Validación del apellido del profesor
     * 
     * @param value Valor de la variable a comprobar
     * @param atributo Nombre del atributo
     * 
     * @return true || errores
     */
    function comprobar_apellidoprofesor($value, $atributo="apellido")
    {
        $errores = array();

        // Comprobaciones
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

    /**
     * Validación del DNI
     * 
     * @param value Valor de la variable a comprobar
     * @param atributo Nombre del atributo
     * 
     * @return true || errores
     */
    function comprobar_DNI($value, $atributo="dni")
    {
        $errores = array();

        // Comprobaciones
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

    /**
     * Validación del código
     * 
     * @param value Valor de la variable a comprobar
     * @param atributo Nombre del atributo
     * 
     * @return true || errores
     */
    function comprobar_codigo($value, $atributo="codigo")
    {
        $errores = array();

        // Comprobaciones
        if(empty($value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00001', 'incidencia' => $GLOBALS['INCIDENCIAS']['00001'])); }
        if(strlen($value) > 10)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00002', 'incidencia' => $GLOBALS['INCIDENCIAS']['00002'])); }
        if(strlen($value) < 1)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00003', 'incidencia' => $GLOBALS['INCIDENCIAS']['00003'])); }
        if(!preg_match('/^[0-9A-Za-z-]*$/',$value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00040', 'incidencia' => $GLOBALS['INCIDENCIAS']['00040'])); }

        return empty($errores) ? true : $errores;
    }

    /**
     * Validación del código de la titulación
     * 
     * @param value Valor de la variable a comprobar
     * @param atributo Nombre del atributo
     * 
     * @return true || errores
     */
    function comprobar_codigo_titulacion($value, $atributo="codigo titulación")
    {
        $errores = array();

        // Comprobaciones
        if(empty($value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00001', 'incidencia' => $GLOBALS['INCIDENCIAS']['00001'])); }
        if(strlen($value) > 10)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00002', 'incidencia' => $GLOBALS['INCIDENCIAS']['00002'])); }
        if(strlen($value) < 1)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00003', 'incidencia' => $GLOBALS['INCIDENCIAS']['00003'])); }
        if(!preg_match('/^[0-9A-Za-z]*$/',$value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00060', 'incidencia' => $GLOBALS['INCIDENCIAS']['00060'])); }

        return empty($errores) ? true : $errores;
    }

    /**
     * Validación de la fecha
     * 
     * @param value Valor de la variable a comprobar
     * @param atributo Nombre del atributo
     * 
     * @return true || errores
     */
    function comprobar_fecha($value, $atributo="fecha")
    {
        $errores = array();

        // Comprobaciones
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

    /**
     * Validación del numero de telefono
     * 
     * @param value Valor de la variable a comprobar
     * @param atributo Nombre del atributo
     * 
     * @return true || errores
     */
    function comprobar_telefono($value, $atributo="telefono")
    {
        $errores = array();

        // Comprobaciones
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

    /**
     * Validación de la superficie
     * 
     * @param value Valor de la variable a comprobar
     * @param atributo Nombre del atributo
     * 
     * @return true || errores
     */
    function comprobar_superficie($value, $atributo="superficie")
    {
        $errores = array();

        // Comprobaciones
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

    /**
     * Validación del inventario
     * 
     * @param value Valor de la variable a comprobar
     * @param atributo Nombre del atributo
     * 
     * @return true || errores
     */
    function comprobar_numinventario($value, $atributo="numinventario")
    {
        $errores = array();

        // Comprobaciones
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

    /**
     * Validación del tipo
     * 
     * @param value Valor de la variable a comprobar
     * @param atributo Nombre del atributo
     * 
     * @return true || errores
     */
    function comprobar_tipo($value, $atributo="tipo")
    {
        $upper = strtoupper($value);
        $errores = array();

        // Comprobaciones
        if(empty($value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00001', 'incidencia' => $GLOBALS['INCIDENCIAS']['00001'])); }
        if($upper !== "DESPACHO" && $upper !== "LABORATORIO" && $upper !== "PAS")
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00080', 'incidencia' => $GLOBALS['INCIDENCIAS']['00080'])); }

        return empty($errores) ? true : $errores;
    }

    /**
     * Validación del sexo
     * 
     * @param value Valor de la variable a comprobar
     * @param atributo Nombre del atributo
     * 
     * @return true || errores
     */
    function comprobar_sexo($value, $atributo="sexo")
    {
        $upper = strtoupper($value);
        $errores = array();

        // Comprobaciones
        if(empty($value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00001', 'incidencia' => $GLOBALS['INCIDENCIAS']['00001'])); }
        if($upper !== "HOMBRE" && $upper !== "MUJER")
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00100', 'incidencia' => $GLOBALS['INCIDENCIAS']['00100'])); }

        return empty($errores) ? true : $errores;
    }

    /**
     * Validación del año
     * 
     * @param value Valor de la variable a comprobar
     * @param atributo Nombre del atributo
     * 
     * @return true || errores
     */
    function comprobar_anhoacademico($value, $atributo="año académico")
    {
        $errores = array();

        // Comporbaciones
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

    /**
     * Validación del email
     * 
     * @param value Valor de la variable a comprobar
     * @param atributo Nombre del atributo
     * 
     * @return true || errores
     */
    function comprobar_email($value, $atributo="email")
    {
        $errores = array();

        // Comprobaciones
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

    /**
     * Validación del nombre de la titulacion
     * 
     * @param value Valor de la variable a comprobar
     * @param atributo Nombre del atributo
     * 
     * @return true || errores
     */
    function comprobar_titulacion($value, $atributo="titulacion")
    {
        $errores = array();

        // Comprobaciones
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

    /**
     * Validación del responsable
     * 
     * @param value Valor de la variable a comprobar
     * @param atributo Nombre del atributo
     * 
     * @return true || errores
     */
    function comprobar_responsable($value, $atributo="responsable")
    {
        $errores = array();

        // Comprobaciones
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

    /**
     * Validación del campus
     * 
     * @param value Valor de la variable a comprobar
     * @param atributo Nombre del atributo
     * 
     * @return true || errores
     */
    function comprobar_campus($value, $atributo="campus")
    {
        $errores = array();

        // Comprobaciones
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

    /**
     * Validación del area
     * 
     * @param value Valor de la variable a comprobar
     * @param atributo Nombre del atributo
     * 
     * @return true || errores
     */
    function comprobar_area($value, $atributo="área")
    {
        $errores = array();

        // Comprobaciones
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

    /**
     * Validación del login
     * 
     * @param value Valor de la variable a departamento
     * @param atributo Nombre del atributo
     * 
     * @return true || errores
     */
    function comprobar_departamento($value, $atributo="departamento")
    {
        $errores = array();

        // Comprobaciones
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

    /**
     * Validación del nombre del edificio
     * 
     * @param value Valor de la variable a comprobar
     * @param atributo Nombre del atributo
     * 
     * @return true || errores
     */
    function comprobar_nombreedificio($value, $atributo="nombre edificio")
    {
        $errores = array();

        // Comprobaciones
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

    /**
     * Validación de la direccion
     * 
     * @param value Valor de la variable a comprobar
     * @param atributo Nombre del atributo
     * 
     * @return true || errores
     */
    function comprobar_direccion($value, $atributo="dirección")
    {
        $errores = array();

        // Comprobaciones
        if(empty($value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00001', 'incidencia' => $GLOBALS['INCIDENCIAS']['00001'])); }
        if(strlen($value) > 150)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00002', 'incidencia' => $GLOBALS['INCIDENCIAS']['00002'])); }
        if(strlen($value) < 3)
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00003', 'incidencia' => $GLOBALS['INCIDENCIAS']['00003'])); }
        if(!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúïüÏÜ 0-9\-\/ºª]*$/',$value))
            { array_push($errores,array('atributo' => $atributo, 'codigo' => '00050', 'incidencia' => $GLOBALS['INCIDENCIAS']['00050'])); }

        return empty($errores) ? true : $errores;
    }
?>