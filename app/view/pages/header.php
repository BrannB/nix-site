<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Title </title>
    <link rel = "stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="catalog">GameShop</a>

    <div class="collapse navbar-collapse" id="navbarToggler">
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
            <?php if (!isset($_SESSION['name'])): ?>
            <a class="nav-link" href="signin">
                <button rel="signin" class="btn btn-success">
                    Sign In
                </button>
            </a>
           <a class="nav-link" href="register">
                <button rel="register" class="btn btn-success">
                    Create Account
                </button>
            </a>

            <?php else: ?>
                <ul class="nav-item" >
                    <a class="nav-item" href="member"> Hi, <?php echo $_SESSION['name']?> </a>
                </ul>
            <?php endif; ?>
    </div>
</nav>
