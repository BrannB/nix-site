<body class="bg-dark" style="
    background: url(https://witcher-tv.ru/wp-content/uploads/2020/02/2nd-geralt-poster-4k.jpg) no-repeat center center fixed;
    -moz-background-size: 100%; /* Firefox 3.6+ */
    -webkit-background-size: 100%; /* Safari 3.1+ и Chrome 4.0+ */
    -o-background-size: 100%; /* Opera 9.6+ */
    background-size: cover;
">
<div class= "register text-center">
        <?php
            use framework\Authentication\Authentication;
            $auth = new Authentication();
            if($auth->isAuth())
            {
            ?>
                <br>
                <h1>
                <mark>
                    Вы авторизовались, <?php echo $auth->session->get('name'); ?>
                </mark>
                </h1>
                <br>
                <form method="post" action="">
                    <button class="btn btn-danger" name="signout-btn" type="submit">Sign out</button>
                </form>
                <br>
                <form method="post" action="viewMyOrders">
                    <button class="btn btn-outline-warning" name="signout-btn" type="submit">View my orders</button>
                </form>
            <?php
                if (isset($_POST['signout-btn']))
                {
                    $auth->logOut();
                    header("location: signin");
                }
            } else {
                    header("location: signin");
            }
            ?>

</div>

