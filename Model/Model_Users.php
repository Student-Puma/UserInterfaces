<?php
    class User_Model
    {
        var $mysqli;

        var $login;
        var $password;

        function __construct($_login, $_password)
        {
            include_once '../Model/Model_AccessDB.php';
            $this->mysqli = ConnectDB();

            $this->login = $_login;
            $this->password = $_password;
        }

        function login()
        {
            include_once '../Functions/Locale.php';
            
            $sql = "SELECT *
                    FROM USUARIOS
                    WHERE (
                        (login = '$this->login')
                    ) LIMIT 1";
            $res = $this->mysqli->query($sql);

            if(!$res || $res->num_rows == 0)
            {
                return $_LOCALE['NoLogin'];
            }
            else
            {
                $user = $res->fetch_array(MYSQLI_ASSOC);
                if ($user['password'] == $this->password)
                {
                    return true;
                }
                else
                {
                    return $_LOCALE['NoPasswd'];
                }
            }
        }

    }
?>