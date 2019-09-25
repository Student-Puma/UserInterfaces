
<?php

//Clase : USUARIOS_Modelo
//Creado el : 22-09-2017
//Creado por: jrodeiro
//-------------------------------------------------------

class USUARIOS_Model {

	var $login;
	var $password;
	var $nombre;
	var $apellidos;
	var $email;
	var $mysqli;

//Constructor de la clase
//

function __construct($login,$password,$nombre,$apellidos,$email){
	$this->login = $login;
	$this->password = $password;
	$this->nombre = $nombre;
	$this->apellidos = $apellidos;
	$this->email = $email;

	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();
}



//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si 
//existe ya en la tabla
function ADD($_login, $password, $_nombre, $apellidos, $email)
{
	$duplicated = SEARCH($_login)->num_rows == 0;
	if($duplicated)
	{
		return "Ya existe un usuario con esos datos";
	}
	else
	{
		$sql = "INSERT INTO USUARIOS (
			login,
			password,
			nombre,
			apellidos,
			email
		) VALUES (
			'" . $_login . "',
			'" . $_password . "',
			'" . $_nombre . "',
			'" . $_apellidos . "',
			'" . $_email . "'
		)";
		$resultado = $this->mysqli->query($sql);
		return ($resultado ? "Datos añadidos correctamente" : "No se ha podido añadir");
	}
}

//funcion de destrucción del objeto: se ejecuta automaticamente
//al finalizar el script
function __destruct()
{

}


//funcion SEARCH: hace una búsqueda en la tabla con
//los datos proporcionados. Si van vacios devuelve todos
function SEARCH($query)
{
	$sql = "SELECT * FROM  USUARIOS WHERE (
		(login LIKE \"%$query%\") OR
		(nombre LIKE \"%$query%\") OR 
		(apellidos LIKE \"%$query%\") OR 
		(email LIKE \"%$query%\")
	)";
	$resultado = $this->mysqli->query($sql);
	return $resultado;
}

//funcion DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra
function DELETE($_login)
{
	if(strcmp($_login,$_SESSION['login']) == 0)
	{
		return "Esta cuenta está en uso.";
	}
	else
	{
		$sql = "DELETE FROM USUARIOS WHERE (
			(login = \"$_login\")
		)";
		$response = $this->mysqli->query($sql);

		return ($response ? "Datos eliminados correctamente" : "No se ha podido eliminar");
	}
}

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{
    $sql = "SELECT * FROM  USUARIOS WHERE (
		(login = $this->login)
	)";
	$resultado = $this->mysqli->query($sql);
	if($resultado->num_rows==0)
	{
		return "El login no existe";
	}
}

// funcion Edit: realizar el update de una tupla despues de comprobar que existe
function EDIT($_login, $_field, $_value)
{
	if(strcmp($_login,$_SESSION['login']) == 0)
	{
		return "Esta cuenta está en uso.";
	}
	else
	{
		$sql = "UPDATE USUARIOS
		SET (
			$_field = \"$_value\"
		) WHERE (
			(login = \"$_login\")
		)";
		$response = $this->mysqli->query($sql);

		return ($response ? "Datos actualizados correctamente" : "No se ha podido actualizar");
	}
}

// funcion login: realiza la comprobación de si existe el usuario en la bd y despues si la pass
// es correcta para ese usuario. Si es asi devuelve true, en cualquier otro caso devuelve el 
// error correspondiente
function login(){

	$sql = "SELECT *
			FROM USUARIOS
			WHERE (
				(login = '$this->login') 
			)";

	$resultado = $this->mysqli->query($sql);
	if ($resultado->num_rows == 0){
		return 'El login no existe';
	}
	else{
		$tupla = $resultado->fetch_array();
		if ($tupla['password'] == $this->password){
			return true;
		}
		else{
			return 'La password para este usuario no es correcta';
		}
	}
}//fin metodo login

//
function Register(){

		$sql = "select * from USUARIOS where login = '".$this->login."'";

		$result = $this->mysqli->query($sql);
		if ($result->num_rows == 1){  // existe el usuario
				return 'El usuario ya existe';
			}
		else{
	    		return true; //no existe el usuario
		}

	}

function registrar(){

			
		$sql = "INSERT INTO USUARIOS (
			login,
			password,
			nombre,
			apellidos,
			email) 
				VALUES (
					'".$this->login."',
					'".$this->password."',
					'".$this->nombre."',
					'".$this->apellidos."',
					'".$this->email."'
					)";
			
		if (!$this->mysqli->query($sql)) {
			return 'Error en la inserción';
		}
		else{
			return 'Inserción realizada con éxito'; //operacion de insertado correcta
		}		
	}

}//fin de clase

?> 