<?php
$auth = new \Authentication\Authentication();
?>
<div class= "register text-center">
    <form class="form-signin" action="" method="post">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputLogin" class="sr-only">Login</label>
        <input type="text" id="inputLogin" name="login" class="form-control" placeholder="Login" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="pass" class="form-control" required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" name="signin-btn" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2020 </p>
    </form>
    <?php if(isset($_POST["signin-btn"])): ?>
        <?php if($auth->auth($_POST['login'], $_POST['pass'])):?>
            <?php header("Location: member"); ?>
        <?php else: ?>
            <p>Неверный логин или пароль!</p>
        <?php endif; ?>
    <?php endif; ?>
</div>

