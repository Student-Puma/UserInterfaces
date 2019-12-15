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
    include '../Model/USUARIOS_Model.php';

    /**
     * Test unitario para la función de registrar USUARIOS
     * 
     * Valida:
     *  Inserción realizada con éxito
     *  Error en la inserción
     */
    function USUARIOS_registrar_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Inserción realizada con éxito

        // Plantilla

        $USUARIOS_array_error = array(
            "entidad"           => "USUARIOS",
            "metodo"            => "registrar",
            "error"             => "Registro correcto",
            "error_esperado"    => "Inserción realizada con éxito",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "LOGIN"         => "REGISTRO",
            "PASS"          => "PASSWORD",
            "DNI"           => "22222222J",
            "NOMBRE"        => "Nombre",
            "APELLIDOS"     => "Apellido",
            "EMAIL"         => "email@email.com",
            "TELEFONO"      => "666666666",
            "FECHA"         => "1997-10-10",
            "FOTO"          => "FOTO",
            "SEXO"          => "MUJER"
        );

        // Lógica del test

        $USUARIOS = new USUARIOS_Model($datos["LOGIN"],$datos["PASS"],$datos["DNI"],$datos["NOMBRE"],$datos["APELLIDOS"],$datos["EMAIL"],$datos["TELEFONO"],$datos["FECHA"],$datos["FOTO"],$datos["SEXO"]);
        $USUARIOS_array_error['error_obtenido'] = $USUARIOS->registrar();
        $USUARIOS_array_error['resultado'] = ($USUARIOS_array_error["error_esperado"] === $USUARIOS_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $USUARIOS_array_error);

        // -------- Registro incorrecto

        // Plantilla

        $USUARIOS_array_error = array(
            "entidad"           => "USUARIOS",
            "metodo"            => "registrar",
            "error"             => "Registro incorrecto",
            "error_esperado"    => "Error en la inserción",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos["LOGIN"] = "OTHER";

        // Lógica del test

        $USUARIOS = new USUARIOS_Model($datos["LOGIN"],$datos["PASS"],$datos["DNI"],$datos["NOMBRE"],$datos["APELLIDOS"],$datos["EMAIL"],$datos["TELEFONO"],$datos["FECHA"],$datos["FOTO"],$datos["SEXO"]);
        $USUARIOS_array_error['error_obtenido'] = $USUARIOS->registrar();
        $USUARIOS_array_error['resultado'] = ($USUARIOS_array_error["error_esperado"] === $USUARIOS_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $USUARIOS_array_error);
    }

    /**
     * Test unitario para la función de Register USUARIOS
     * 
     * Valida:
     *  Inserción realizada con éxito
     *  Error en la inserción
     */
    function USUARIOS_Register_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Comprobación incorrecta

        // Plantilla

        $USUARIOS_array_error = array(
            "entidad"           => "USUARIOS",
            "metodo"            => "Register",
            "error"             => "Comprobación incorrecta",
            "error_esperado"    => "El usuario ya existe",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "LOGIN"         => "REGISTRO"
        );

        // Lógica del test

        $USUARIOS = new USUARIOS_Model($datos["LOGIN"],"","","","","","","","","");
        $resultado = $USUARIOS->Register();
        $USUARIOS_array_error['error_obtenido'] = is_string($resultado) ? $resultado : "true";        $USUARIOS_array_error['resultado'] = ($USUARIOS_array_error["error_esperado"] === $USUARIOS_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $USUARIOS_array_error);

        // -------- Comprobación correcta

        // Plantilla

        $USUARIOS_array_error = array(
            "entidad"           => "USUARIOS",
            "metodo"            => "Register",
            "error"             => "Comprobación correcta",
            "error_esperado"    => "true",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos["LOGIN"] = "OTHER";

        // Lógica del test

        $USUARIOS = new USUARIOS_Model($datos["LOGIN"],"","","","","","","","","");
        $resultado = $USUARIOS->Register();
        $USUARIOS_array_error['error_obtenido'] = is_string($resultado) ? $resultado : "true";        $USUARIOS_array_error['resultado'] = ($USUARIOS_array_error["error_esperado"] === $USUARIOS_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $USUARIOS_array_error);
    }

    /**
     * Test unitario para la función de loguear USUARIOS
     * 
     * Valida:
     *  Login incorrecto
     *  Password incorrecta
     *  true
     */
    function USUARIOS_login_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Login incorrecto

        // Plantilla

        $USUARIOS_array_error = array(
            "entidad"           => "USUARIOS",
            "metodo"            => "login",
            "error"             => "Login incorrecto",
            "error_esperado"    => "El login no existe",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "LOGIN"         => "INEXISTENTE",
            "PASS"          => "INEXISTENTE"
        );

        // Lógica del test

        $USUARIOS = new USUARIOS_Model($datos["LOGIN"],$datos["PASS"],"","","","","","","","");
        $resultado = $USUARIOS->login();
        $USUARIOS_array_error['error_obtenido'] = is_string($resultado) ? $resultado : "true";
        $USUARIOS_array_error['resultado'] = ($USUARIOS_array_error["error_esperado"] === $USUARIOS_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $USUARIOS_array_error);

        // -------- Contraseña incorrecta

        // Plantilla

        $USUARIOS_array_error = array(
            "entidad"           => "USUARIOS",
            "metodo"            => "login",
            "error"             => "Contraseña incorrecta",
            "error_esperado"    => "La password para este usuario no es correcta",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos["LOGIN"] = "REGISTRO";

        // Lógica del test

        $USUARIOS = new USUARIOS_Model($datos["LOGIN"],$datos["PASS"],"","","","","","","","");
        $resultado = $USUARIOS->login();
        $USUARIOS_array_error['error_obtenido'] = is_string($resultado) ? $resultado : "true";
        $USUARIOS_array_error['resultado'] = ($USUARIOS_array_error["error_esperado"] === $USUARIOS_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $USUARIOS_array_error);

        // -------- Login correcto

        // Plantilla

        $USUARIOS_array_error = array(
            "entidad"           => "USUARIOS",
            "metodo"            => "login",
            "error"             => "Login correcto",
            "error_esperado"    => "true",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos["PASS"] = "PASSWORD";

        // Lógica del test

        $USUARIOS = new USUARIOS_Model($datos["LOGIN"],$datos["PASS"],"","","","","","","","");
        $resultado = $USUARIOS->login();
        $USUARIOS_array_error['error_obtenido'] = is_string($resultado) ? $resultado : "true";
        $USUARIOS_array_error['resultado'] = ($USUARIOS_array_error["error_esperado"] === $USUARIOS_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $USUARIOS_array_error);

        // Borramos el login

        $datos["LOGIN"] = "REGISTRO";

        // Lógica del test

        $USUARIOS = new USUARIOS_Model($datos["LOGIN"],"","","","","","","","","");
        $USUARIOS->DELETE();
    }

    /**
     * Test unitario para la función de añadir USUARIOS
     * 
     * Valida:
     *  Inserción realizada con éxito
     *  Error en la inserción
     */
    function USUARIOS_ADD_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Inserción realizada con éxito

        // Plantilla

        $USUARIOS_array_error = array(
            "entidad"           => "USUARIOS",
            "metodo"            => "ADD",
            "error"             => "Inserción correcta",
            "error_esperado"    => "Inserción realizada con éxito",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "LOGIN"         => "LOGIN",
            "PASS"          => "PASSWORD",
            "DNI"           => "22222222J",
            "NOMBRE"        => "Nombre",
            "APELLIDOS"     => "Apellido",
            "EMAIL"         => "email@email.com",
            "TELEFONO"      => "666666666",
            "FECHA"         => "1997-10-10",
            "FOTO"          => "FOTO",
            "SEXO"          => "MUJER"
        );

        // Lógica del test

        $USUARIOS = new USUARIOS_Model($datos["LOGIN"],$datos["PASS"],$datos["DNI"],$datos["NOMBRE"],$datos["APELLIDOS"],$datos["EMAIL"],$datos["TELEFONO"],$datos["FECHA"],$datos["FOTO"],$datos["SEXO"]);
        $USUARIOS_array_error['error_obtenido'] = $USUARIOS->ADD();
        $USUARIOS_array_error['resultado'] = ($USUARIOS_array_error["error_esperado"] === $USUARIOS_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $USUARIOS_array_error);

        // -------- Error en la inserción

        // Plantilla

        $USUARIOS_array_error = array(
            "entidad"           => "USUARIOS",
            "metodo"            => "ADD",
            "error"             => "Elemento ya existente",
            "error_esperado"    => "Inserción fallida: el elemento ya existe",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Lógica del test

        $USUARIOS = new USUARIOS_Model($datos["LOGIN"],$datos["PASS"],$datos["DNI"],$datos["NOMBRE"],$datos["APELLIDOS"],$datos["EMAIL"],$datos["TELEFONO"],$datos["FECHA"],$datos["FOTO"],$datos["SEXO"]);
        $USUARIOS_array_error['error_obtenido'] = $USUARIOS->ADD();
        $USUARIOS_array_error['resultado'] = ($USUARIOS_array_error["error_esperado"] === $USUARIOS_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $USUARIOS_array_error);
    }

    /**
     * Test unitario para la función de editar USUARIOS
     * 
     * Valida:
     *  Actualización realizada con éxito
     */
    function USUARIOS_EDIT_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Actualización realizada con éxito

        // Plantilla

        $USUARIOS_array_error = array(
            "entidad"           => "USUARIOS",
            "metodo"            => "EDIT",
            "error"             => "Actualización correcta",
            "error_esperado"    => "Actualización realizada con éxito",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "LOGIN"         => "LOGIN",
            "PASS"          => "PASSWORDS",
            "DNI"           => "22222222J",
            "NOMBRE"        => "Nombre",
            "APELLIDOS"     => "Apellido",
            "EMAIL"         => "email@email.com",
            "TELEFONO"      => "666666666",
            "FECHA"         => "1997-10-10",
            "FOTO"          => "FOTO",
            "SEXO"          => "MUJER"
        );

        // Lógica del test

        $USUARIOS = new USUARIOS_Model($datos["LOGIN"],$datos["PASS"],$datos["DNI"],$datos["NOMBRE"],$datos["APELLIDOS"],$datos["EMAIL"],$datos["TELEFONO"],$datos["FECHA"],$datos["FOTO"],$datos["SEXO"]);
        $USUARIOS_array_error['error_obtenido'] = $USUARIOS->EDIT();
        $USUARIOS_array_error['resultado'] = ($USUARIOS_array_error["error_esperado"] === $USUARIOS_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $USUARIOS_array_error);
    }

    /**
     * Test unitario para la función de borrar USUARIOS
     * 
     * Valida:
     *  Borrado realizado con éxito
     */
    function USUARIOS_DELETE_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Borrado realizado con éxito

        // Plantilla

        $USUARIOS_array_error = array(
            "entidad"           => "USUARIOS",
            "metodo"            => "DELETE",
            "error"             => "Borrado correcto",
            "error_esperado"    => "Borrado realizado con éxito",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "LOGIN" => "LOGIN"
        );

        // Lógica del test

        $USUARIOS = new USUARIOS_Model($datos["LOGIN"],"","","","","","","","","");
        $USUARIOS_array_error['error_obtenido'] = $USUARIOS->DELETE();
        $USUARIOS_array_error['resultado'] = ($USUARIOS_array_error["error_esperado"] === $USUARIOS_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $USUARIOS_array_error);
    }

    /**
     * Test unitario para la función de buscar USUARIOS
     * 
     * Valida:
     *  recordset
     *  Error de gestor de base de datos
     */
    function USUARIOS_SEARCH_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Búsqueda correcta

        // Plantilla

        $USUARIOS_array_error = array(
            "entidad"           => "USUARIOS",
            "metodo"            => "SEARCH",
            "error"             => "Búsqueda correcta",
            "error_esperado"    => "recordset",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "DNI"           => "22J"
        );

        // Lógica del test

        $USUARIOS = new USUARIOS_Model("","",$datos["DNI"],"","","","","","","");
        $resultado = $USUARIOS->SEARCH();
        $USUARIOS_array_error['error_obtenido'] = !is_string($resultado) ? "recordset" : $resultado;
        $USUARIOS_array_error['resultado'] = ($USUARIOS_array_error["error_esperado"] === $USUARIOS_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $USUARIOS_array_error);

        // -------- Búsqueda fallida

        // Plantilla

        $USUARIOS_array_error = array(
            "entidad"           => "USUARIOS",
            "metodo"            => "SEARCH",
            "error"             => "Búsqueda incorrecta",
            "error_esperado"    => "Error de gestor de base de datos",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "DNI"           => "22222222J'#"
        );

        // Lógica del test

        $USUARIOS = new USUARIOS_Model("","",$datos["DNI"],"","","","","","","");
        $resultado = $USUARIOS->SEARCH();
        $USUARIOS_array_error['error_obtenido'] = !is_string($resultado) ? "recordset" : $resultado;
        $USUARIOS_array_error['resultado'] = ($USUARIOS_array_error["error_esperado"] === $USUARIOS_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $USUARIOS_array_error);
    }

    /**
     * Test unitario para la función de rellenar datos de USUARIOS
     * 
     * Valida:
     *  Tupla
     */
    function USUARIOS_RellenaDatos_test()
    {
        // Array para almacenar los errores
        global $ERRORS_array_test;

        // -------- Rellenar datos realizado con éxito

        // Plantilla

        $USUARIOS_array_error = array(
            "entidad"           => "USUARIOS",
            "metodo"            => "RellenaDatos",
            "error"             => "Relleno de datos correcto",
            "error_esperado"    => "Tupla",
            "error_obtenido"    => "",
            "resultado"         => "",
        );

        // Datos usados

        $datos = array(
            "LOGIN" => "LOGIN"
        );

        // Lógica del test

        $USUARIOS = new USUARIOS_Model($datos["LOGIN"],"","","","","","","","","");
        $resultado = $USUARIOS->RellenaDatos();
        $USUARIOS_array_error['error_obtenido'] = is_array($resultado) ? "Tupla" : $resultado;
        $USUARIOS_array_error['resultado'] = ($USUARIOS_array_error["error_esperado"] === $USUARIOS_array_error["error_obtenido"]) ? "OK" : "FALSE";

        array_push($ERRORS_array_test, $USUARIOS_array_error);
    }

    // REALIZAMOS LAS PRUEBAS

    USUARIOS_registrar_test();
    USUARIOS_Register_test();
    USUARIOS_login_test();
    USUARIOS_ADD_test();
    USUARIOS_EDIT_test();
    USUARIOS_RellenaDatos_test();
    USUARIOS_SEARCH_test();
    USUARIOS_DELETE_test();
?>