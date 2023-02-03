<?php
function getNavBarFromIndex() {
    echo '

    <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">

                <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="index.php">MANDATECH</a>
                <!-- Navbar Items-->
                <ul class="navbar-nav align-items-center ms-auto">
                <li class="nav-item no-caret d-none d-md-block me-3">
                <a class="nav-link active" href="index.php">
                            <div class="fw-500">Home</div>
                </a>
                </li>
    ';
    if(!isset($_SESSION['userID']) || $_SESSION['userRole'] == '2') {

        echo '

                <li class="nav-item dropdown ">
            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Products
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="views/productsmonitor.php">Monitors</a>
            <a class="dropdown-item" href="views/productsmkb.php">Mice & Keyboards</a>
            <a class="dropdown-item" href="views/productshm.php">Headsets & Microphones</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="views/products.php">All Products</a>
            </div>
        </li>
                <li class="nav-item no-caret d-none d-md-block me-3">
                <a class="nav-link" href="views/about.php">
                            <div class="fw-500">About</div>
                </a>
                </li>
                <li class="nav-item no-caret d-none d-md-block me-3">
                <a class="nav-link" href="views/contact.php">
                            <div class="fw-500">Contact Us</div>
                </a>
                </li> 
        ';
    } elseif(isset($_SESSION['userRole']) && $_SESSION['userRole'] == '1') {
        echo '

        <li class="nav-item no-caret d-none d-md-block me-3">
            <a class="nav-link" href="views/admin.php">
                <div class="fw-500">Products</div>
            </a>
        </li>
        <li class="nav-item no-caret d-none d-md-block me-3">
            <a class="nav-link" href="views/orders.php">
                <div class="fw-500">Orders</div>
            </a>
        </li>

        ';
    }



    if(isset($_SESSION['userID'])) {

        echo '

                <li class="nav-item no-caret d-none d-md-block me-3">
                <a class="btn btn-dark btn-sm" type="button" href="views/logout.php">Logout</a>
                </li>

        ';
    } else {
        echo '
                <li class="nav-item no-caret d-none d-md-block me-3">
                <a class="btn btn-dark btn-sm" type="button" href="views/login.php">Login</a>
                </li>
        ';
    }

    if(isset($_SESSION['userRole']) && $_SESSION['userRole'] == '2') {
        echo '
                <li>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="mr-auto"></div>
                <div class="navbar-nav">
                    <a href="../mandatech/views/cart.php" class="nav-item nav-link active">
                        <h5 class="px-5 cart">
                            <i class="fas fa-shopping-cart"></i> Cart
                            
        ';

                            if (isset($_SESSION['shoppingCart'])){
                                $count = count($_SESSION['shoppingCart']);
                                echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                            }else{
                                echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                            }
        echo '                            
                        </h5>
                    </a>
                </div>
            </div>
                </li>
        ';

    }

    echo '

                        
                    

                </ul>
            </nav>

    ';
}






function getNavBar() {
    echo '

    <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">

                <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="../index.php">MANDATECH</a>
                <!-- Navbar Items-->
                <ul class="navbar-nav align-items-center ms-auto">
                <li class="nav-item no-caret d-none d-md-block me-3">
                <a class="nav-link active" href="../index.php">
                            <div class="fw-500">Home</div>
                </a>
                </li>
    ';
    if(!isset($_SESSION['userID']) || $_SESSION['userRole'] == '2') {

        echo '

                <li class="nav-item dropdown ">
            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Products
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="productsmonitor.php">Monitors</a>
            <a class="dropdown-item" href="productsmkb.php">Mice & Keyboards</a>
            <a class="dropdown-item" href="productshm.php">Headsets & Microphones</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="products.php">All Products</a>
            </div>
        </li>
                <li class="nav-item no-caret d-none d-md-block me-3">
                <a class="nav-link" href="about.php">
                            <div class="fw-500">About</div>
                </a>
                </li>
                <li class="nav-item no-caret d-none d-md-block me-3">
                <a class="nav-link" href="contact.php">
                            <div class="fw-500">Contact Us</div>
                </a>
                </li> 
        ';
    } elseif(isset($_SESSION['userRole']) && $_SESSION['userRole'] == '1') {
        echo '

        <li class="nav-item no-caret d-none d-md-block me-3">
            <a class="nav-link" href="admin.php">
                <div class="fw-500">Products</div>
            </a>
        </li>
        <li class="nav-item no-caret d-none d-md-block me-3">
            <a class="nav-link" href="orders.php">
                <div class="fw-500">Orders</div>
            </a>
        </li>

        ';
    }



    if(isset($_SESSION['userID'])) {

        echo '

                <li class="nav-item no-caret d-none d-md-block me-3">
                <a class="btn btn-dark btn-sm" type="button" href="logout.php">Logout</a>
                </li>

        ';
    } else {
        echo '
                <li class="nav-item no-caret d-none d-md-block me-3">
                <a class="btn btn-dark btn-sm" type="button" href="login.php">Login</a>
                </li>
        ';
    }

    if(isset($_SESSION['userRole']) && $_SESSION['userRole'] == '2') {
        echo '
                <li>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="mr-auto"></div>
                <div class="navbar-nav">
                    <a href="../mandatech/views/cart.php" class="nav-item nav-link active">
                        <h5 class="px-5 cart">
                            <i class="fas fa-shopping-cart"></i> Cart
                            
        ';

                            if (isset($_SESSION['shoppingCart'])){
                                $count = count($_SESSION['shoppingCart']);
                                echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                            }else{
                                echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                            }
        echo '                            
                        </h5>
                    </a>
                </div>
            </div>
                </li>
        ';

    }

    echo '

                        
                    

                </ul>
            </nav>

    ';
}
?>