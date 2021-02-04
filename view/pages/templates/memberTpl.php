
<div class= "register text-center">
        <?php
            use Authentication\Authentication;
            $auth = new Authentication();
        ?>
        <h1>Вы авторизовались, <?php echo $_SESSION['name']; ?>
        </h1>
        <form method="post" action="">
            <button class="btn btn-danger" name="signout-btn" name="signout-btn" type="submit">Sign out</button>
        </form>
        <?php
        if (isset($_POST['signout-btn']))
        {
            $auth->logOut();
            header("location: signin");
        }
        ?>
</div>
