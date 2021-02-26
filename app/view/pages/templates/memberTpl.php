
<div class= "register text-center">
        <?php
            use framework\Authentication\Authentication;
            $auth = new Authentication();
            if($auth->isAuth())
            {
            ?>
                <h1>Вы авторизовались, <?php echo $auth->session->get('name'); ?> </h1>
                <form method="post" action="">
                    <button class="btn btn-danger" name="signout-btn" type="submit">Sign out</button>
                </form>
            <?php
                if (isset($_POST['signout-btn']))
                {
                    $auth->logOut();
                    header("location: signin");
                }
            } else
                {
                    header("location: signin");
                }
            ?>
</div>

