
<div class= "register text-center">
    <form class="form-signin" action="signin/auth" method="post">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="text" id="inputEogin" name="email" class="form-control" placeholder="Email" required autofocus>
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
</div>

