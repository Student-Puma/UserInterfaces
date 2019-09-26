<?php
    include_once '../Functions/Locale.php';
    include_once '../Functions/Authentication.php';
?>

<html>
<head>
    <title><?php echo $_LOCALE['Title']; ?></title>
    <meta charset="UTF-8">
</head>
<body>
    <h1><?php echo $_LOCALE['Portal']; ?></h1>
<?php
    if(IsAuthenticated())
    {
?>
        <span><?php echo $_SESSION['login']; ?></span>
        <a href="../Functions/Disconnect.php"><?php echo $_LOCALE['Exit']; ?></a>
<?php
    }
?>
</body>
</html>