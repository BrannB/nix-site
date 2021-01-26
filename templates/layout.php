<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Catalog </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .search{
            width: 600px;
            height: 35px;
        }
        .mt-4{
            background-color: azure;
            border: black 1px solid;
            margin-bottom: 50px;
        }
        .card{
            background-color: #e2edff;
            margin-top: 10px;
            margin-bottom: 10px;
            border: black 1px solid;
        }
    </style>
</head>
<body>
<div class="container text-right">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">MyStore</a>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Catalog</a>
                </li>
            </ul>
            <span class="navbar-text">
                <button onclick="" class="btn btn-info">Join Us</button>
                <button onclick="" class="btn btn-info">Sign in</button>
            </span>
        </div>
    </nav>
</div>

<div class="text-center">
    <H1>Search by name</H1><br>
</div>
<form class="text-center" action="" method="post">
    <label for="search"></label>
    <input class = "search"  type="text" name="searchResult" id="search"><br><br>
</form>
<div class="container mt-4">
    <div class="text-right">
        <ui>
        <?php echo $content ?>
        </ui>
    </div>
</div>
