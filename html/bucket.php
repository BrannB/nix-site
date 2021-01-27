<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Bucket </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>

        .product-item{
            margin-top: 20px;

        }
        .mt-4{

            background-color: azure;
            border: black solid 2px;
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
            </ul>
            <span class="navbar-text">
                    <button onclick="" class="btn btn-info">Join Us</button>
                     <button onclick="" class="btn btn-info">Sign in</button>
                </span>
        </div>
    </nav>
</div>

<div class="container mt-4">
    <ol>
        <li>
            <div class="product-item">
                <div class="row align-items-center">
                    <div class="product-img col-lg-3 col-md-3">Img1</div>
                    <div class="product-name col-lg-9 col-md-9">Name1</div>
                    <div class="price col-lg-12 col-md-12">Price1</div>
                </div>
            </div>
        </li>
        <hr class="between-items">
        <li>
            <div class="product-item">
                <div class="row align-items-center">
                    <div class="product-img col-lg-3 col-md-3">Img2</div>
                    <div class="product-name col-lg-9 col-md-9">Name2</div>
                    <div class="price col-lg-12 col-md-12">Price2</div>
                </div>
            </div>
        </li>
        <hr class="between-items">
        <li>
            <div class="product-item">
                <div class="row align-items-center">
                    <div class="product-img col-lg-3 col-md-3">Img3</div>
                    <div class="product-name col-lg-9 col-md-9">Name3</div>
                    <div class="price col-lg-12 col-md-12">Price3</div>
                </div>
            </div>
        </li>
    </ol>
</div>
<div class="container mt-4">
    <H2>Total: $totalPrice</H2>
    <div class="text-right">
        <button type="button" class="btn btn-success">Buy</button>
    </div>
</div>
</body>
</html>