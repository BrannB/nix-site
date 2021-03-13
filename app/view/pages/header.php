
    <meta content="charset=UTF-8">
    <title> Title </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel = "stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-md navbar-dark bg-dark" style="font-size: 25px;">
    <div class="container-fluid">
        <a class="navbar-brand" href="main" style="font-size: 25px;">AlexGameShop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="main"> Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="catalog"> Games Catalog </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> About us </a>
                </li>
            </ul>
            <?php if (!isset($_SESSION['uname'])): ?>
                <a class="nav-link" href="signin">
                    <button rel="signin" class="btn btn-lg btn-outline-success">
                        Sign In
                    </button>
                </a>
                <a class="nav-link" href="register">
                    <button rel="register" class="btn btn-lg btn-outline-info">
                        Create Account
                    </button>
                </a>
            <?php else: ?>
                <?php if($_SESSION['is_admin'] == 1): ?>
                    <a class="nav-link" href="adminUsers">
                        <button rel="adminUsers" class="btn btn-lg btn-outline-danger">
                            Admin page
                        </button>
                    </a>
                <?php endif; ?>
                <a class="nav-link" href="bucket">
                    <button rel="signin" class="btn btn-lg btn-outline-info">
                        Bucket
                    </button>
                </a>
                    <a class="nav-item" href="member">
                        <button rel="member" class="btn btn-lg btn-outline-warning">
                            Hi, <?php echo $_SESSION['uname']?>
                        </button>
                    </a>
            <?php endif; ?>
        </div>
    </div>
</nav>
</head>

