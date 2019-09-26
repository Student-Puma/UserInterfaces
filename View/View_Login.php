<?php
    class Login
    {
        function __construct()
        {
            $this->render();
        }

        function render()
        {
            include_once '../View/_Header.php';
?>
            <div>
                <h1>Login</h1>
                <form action="../Controller/Controller_Login.php" method="post">
                    <label for="name"><?php echo $_LOCALE['ID']; ?>:</label>
                    <input type="text" id="name" name="login" size="9">
                    
                    <label for="password"><?php echo $_LOCALE['Password']; ?>:</label>
                    <input type="password" id="password" name="password" size="15">
                    
                    <input type='submit' name='action' value='Login'>
                </form>

                <a href="../Controller/Controller_Register.php"><?php echo $_LOCALE['SingUp']; ?></a>
            </div>
<?php
        }
    }
?>