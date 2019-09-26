<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    
    function IsAuthenticated()
    {
        if(!isset($_SESSION['login']))
        {
            return false;
        }
        else
        {
            return true;
        }
    }
?>