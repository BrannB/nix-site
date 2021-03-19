
<body>
<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <h3 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Tables</span>
                <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                    <span data-feather="plus-circle"></span>
                </a>
            </h3>
            <div class="sidebar-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="adminUsers">
                            <span data-feather="home"></span>
                            Users
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminOrders">
                            <span data-feather="file"></span>
                            Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminProducts">
                            <span data-feather="shopping-cart"></span>
                            Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminPurchases">
                            <span data-feather="users"></span>
                            Purchases
                        </a>
                    </li>
                </ul>
                <h3 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Tools</span>
                    <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                        <span data-feather="plus-circle"></span>
                    </a>
                </h3>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminCrudUser">
                            <span data-feather="file-text"></span>
                            CRUD User
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminCrudProduct">
                            <span data-feather="file-text"></span>
                            CRUD User
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 bg-light">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom text-center">
                <h2><b>Create product</b></h2>
            </div>

            <form action ="adminCreateProduct/create" method="post">
                <div class="col-md-4 mb-3">
                    Title Name:
                    <input type="text" style="width: 600px;" class="form-control" name="name" placeholder="Title" required>
                </div>
                <div class="col-md-4 mb-3">
                    Description:
                    <input type="text" style="width: 600px;" class="form-control" name="description" placeholder="Description" required>
                </div>
                <div class="col-md-4 mb-3">
                    Image link:
                    <input type="text" style="width: 600px;" class="form-control" name="image" placeholder="Image link" required>
                </div>
                <div class="col-md-4 mb-3">
                    Price:
                    <input type="text" style="width: 600px;" class="form-control" name="price" placeholder="Price" required>
                </div>
                <div class="col-md-4 mb-3">
                    Status:
                    <input type="text" style="width: 600px;" class="form-control" name="status" placeholder="O OR 1" required>
                </div>
                <div class="col-md-4 mb-3">
                    <button class="btn btn-success" style="width: 600px;"  type="submit" name="submit-btn" >CREATE</button>
                </div>
                <br><br>
            </form>
        </main>
    </div>
</div>


