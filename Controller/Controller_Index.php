<?php
    include_once '../Functions/Authentication.php';

    if (!IsAuthenticated())
    {
        include_once '../View/View_Login.php';
        new Login();
    }
    else
    {
        include_once '../View/View_Index.php';
        new Index();
    }
?>