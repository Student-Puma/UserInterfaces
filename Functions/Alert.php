<?php
    function ShowAlert($msg, $redirect='')
    {
        echo "<script>alert('" . $msg . "');document.location='" . $redirect . "'</script>";
    }
?>