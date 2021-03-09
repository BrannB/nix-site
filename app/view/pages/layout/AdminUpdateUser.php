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
                            CRUD Product
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 bg-light">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom text-center">
                <h2><b>Create product</b></h2>
            </div>
            <form action ="adminUpdateUser/update" method="post">
                <div class="col-md-4 mb-3">
                    FistName:
                    <input type="text" style="width: 600px;" class="form-control" name="fname"
                           value="<?php echo $products['user'][0]->first_name ?>">
                </div>
                <div class="col-md-4 mb-3">
                    LastName:
                    <input type="text" style="width: 600px;" class="form-control" name="lname"
                           value="<?php echo $products['user'][0]->last_name ?>">
                </div>
                <div class="col-md-4 mb-3">
                    Email:
                    <input type="text" style="width: 600px;" class="form-control" name="email"
                           value="<?php echo $products['user'][0]->email ?>">
                </div>
                <div class="col-md-4 mb-3">
                    Username:
                    <input type="text" style="width: 600px;" class="form-control" name="uname"
                           value="<?php echo $products['user'][0]->uname ?>">
                </div>
                <div class="col-md-4 mb-3">
                    Country:
                        <?php
                            use app\models\DefaultModel;
                            $result = new DefaultModel();
                            $result = $result->get("country");
                        ?>
                        <select id="country" name="country">
                            <?php foreach ($result as $country): ?>
                                <option value="<?php echo $country->id?>"
                                    <?php if ($country->id == $products['user'][0]->country) echo " selected"?> >
                                    <?php echo $country->name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                </div>
                <div class="col-md-4 mb-3">
                    isAdmin(0 OR 1):
                    <input type="text" style="width: 600px;" class="form-control" name="isAdmin"
                           value="<?php echo $products['user'][0]->is_admin ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <button class="btn btn-info" style="width: 600px;" type="submit" name="id"
                            value="<?php echo $products['user'][0]->id ?>">UPDATE</button>
                </div>
                <br><br>
            </form>
        </main>
    </div>
</div>
