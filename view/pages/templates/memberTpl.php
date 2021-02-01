
<div class= "register text-center">
    <?php
        use Authentication\Authentication;

        $session = new Authentication();

            session_start();
            global $name, $password;

            $_SESSION['name'] = $_POST['login'];
            $_SESSION['password'] = $_POST['pass'];

        $session->auth($_SESSION['name'], $_SESSION['password']);
        ?>
        <?php if ($session->isAuth()): ?>
            <h1>Вы авторизовались, <?php echo $session->getLogin() ?></h1>
            <form method="post" action="signin">
            <button class="btn btn-danger" id="signout-btn" name="signout-btn" type="submit">Sign out</button>
            <?php
                if (isset($_POST['signout-btn']))
                {
                    $session->logOut();
                }
            ?>
            </form>
        <?php endif; ?>
</div>
