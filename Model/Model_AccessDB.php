<?php
    function ConnectDB()
    {
        $mysqli = new mysqli('localhost', 'iu2018', 'pass2018', 'IU2018');

        if($mysqli->connect_errno)
        {
            // TODO
            echo "ERROR AL CONECTAR LA BASE DE DATOS";
            return false;
        }
        else
        {
            return $mysqli;
        }
    }
?>