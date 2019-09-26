<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    
    if(!isset($_SESSION['lang']))
    {
        $_SESSION['lang'] = 'SPANISH';
    }
    include_once '../Locale/Strings_' . $_SESSION['lang'] . '.php';
?>