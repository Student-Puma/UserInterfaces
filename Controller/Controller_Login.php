<?php
    if(!isset($_SESSION))
    {
        session_start();
    }

    if(isset($_POST['login']) && isset($_POST['password']))
    {
        include_once '../Model/Model_Users.php';
        $usuario = new User_Model($_POST['login'], $_POST['password']);
        $res = $usuario->login();

        if($res === true)
        {
            if(!isset($_SESSION))
            {
                session_start();
            }
            
            $_SESSION['login'] = $_POST['login'];
            header('Location: ../index.php');
        }
        else
        {
            include_once '../Functions/Alert.php';
            ShowAlert($res, "../index.php");
        }
    }
?>