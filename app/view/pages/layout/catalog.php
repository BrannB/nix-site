
<body class="bg-dark" style="
    background: url(https://witcher-tv.ru/wp-content/uploads/2020/02/2nd-geralt-poster-4k.jpg) no-repeat center center fixed;
    -moz-background-size: 100%; /* Firefox 3.6+ */
    -webkit-background-size: 100%; /* Safari 3.1+ и Chrome 4.0+ */
    -o-background-size: 100%; /* Opera 9.6+ */
    background-size: cover;
">
<br>
<h1 class="text-center">
    <mark style="background-color: snow; color: #0c5460">
        <b>Games catalog</b>
    </mark>
</h1>
<br>
    <div class="container">
        <h1 class="text-center" style="color: snow; background-color: #0c5460; color: orange">
            Welcome to our store!
        </h1>
        <form action="catalog" method="post">
            <div class="form-group text-center" style="background-color: #0f6674; font-size: 22px; color: orange">
                <b>Search by name</b>
                <input type="text" class="form-control bg-white" name="searchByName" placeholder="Search...">
                <br>
            </div>
        </form>
        <div class="container" style="color: snow;">
            <div class="nav-scroller">
                <nav class="nav justify-content-center">
                    <form action="catalog" method="post" class="p-2">
                        <button class="btn btn-secondary" name="sortAsc" value="1">
                            SORT BY PRICE ASC
                        </button>
                    </form>
                    <form action="catalog" method="post" class="p-2">
                        <button class="btn btn-secondary" name="sortDesc" type="submit" value="1">
                            SORT BY PRICE DESC
                        </button>
                    </form>
                    <form action="catalog" method="post" class="p-2">
                        <button class="btn btn-secondary" name="Action" type="submit" value="Action">
                            ACTION
                        </button>
                    </form>
                    <form action="catalog" method="post" class="p-2">
                        <button class="btn btn-secondary" name="RPG" type="submit" value="RPG">
                            RPG
                        </button>
                    </form>
                    <form action="catalog" method="post" class="p-2 nav-item">
                        <button class="btn btn-secondary" name="Quest" type="submit" value="1">
                            QUEST
                        </button>
                    </form>
                    <form action="catalog" method="post" class="p-2">
                        <button class="btn btn-secondary" name="Sport" type="submit" value="1">
                            SPORT
                        </button>
                    </form>
                </nav>
            </div>
        </div>
        <ui>
            <?php echo $template ?>
        </ui>
    </div>
</main>

</body>


