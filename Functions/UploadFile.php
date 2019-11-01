<?php
    /**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
	 */

	/**
	 * Permite subir archivos de imagen al añadir usuarios
	 */

    // --- Variables importantes:
    // Directorio de subida
    $files_dir = '../Files/';
    // Nombre final del archivo
    $file = $files_dir . basename($_FILES['fotopersonal']['name']);
    // Nombre del archivo como parámetro POST
    $_POST['fotopersonal'] = $_FILES['fotopersonal']['name'];
    
    // Movemos el archivo a su destino
    if(@move_uploaded_file($_FILES['fotopersonal']['tmp_name'], $file))
    {
        // Según donde estuviéramos, realizamos una acción u otra
        switch ($_POST['action'])
        {
            // Añadiendo usuarios
            case 'ADD':
                echo "add";
                // Incluimos el controller
                include '../Controller/USUARIOS_Controller.php';
                // Añadimos la vista de mensajes    
                include '../View/MESSAGE_View.php';
                // Recogemos los datos del formulario y los añadimos a la BD
                $USUARIOS = get_data_form();
                $respuesta = $USUARIOS->ADD();
                // Mostramos un mensaje con la respuesta
                new MESSAGE($respuesta, '../Controller/USUARIOS_Controller.php');
                break;
            // Registrando usuarios
            case 'REGISTER':
                // Incluimos el model
                include '../Model/USUARIOS_Model.php';
                // Añadimos la vista de mensajes    
                include '../View/MESSAGE_View.php';
                // Creamos una nueva instancia de la entidad
                $usuario = new USUARIOS_Model($_REQUEST['login'],$_REQUEST['password'],$_REQUEST['nombre'],
                $_REQUEST['apellidos'],$_REQUEST['email'],$_REQUEST['dni'],$_REQUEST['telefono'],
                $_REQUEST['fechanac'],$_FILES['fotopersonal']['name'],$_REQUEST['sexo']);
                // Intentamos registrar dicha entidad en la BD
                $respuesta = $usuario->Register();

                // Comprobamos el resultado de la operación
                if ($respuesta == 'true')
                {
                    // Registramos la entidad
                    $respuesta = $usuario->registrar();
                    // Mostramos el mensaje correspondiente
                    new MESSAGE($respuesta, '../Controller/Login_Controller.php');
                }
                else
                {
                    // Mostramos el mensaje correspondiente
                    new MESSAGE($respuesta, '../Controller/Login_Controller.php');
                }
                break;
            // Caso indefinido
            default:
            echo "def";
                break;
        }
    }
    // Si no hemos sido capaces, mostramos un error
    else
    {
        // Añadimos la vista de mensajes    
        include '../View/MESSAGE_View.php';
        new MESSAGE("Upload-Error", '../Controller/USUARIOS_Controller.php');
    }
?>