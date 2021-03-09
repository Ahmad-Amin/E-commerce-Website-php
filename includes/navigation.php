<div class="NavigationBarDiv">
    <nav id="navbar12" class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand" href="/mainPage">E-commerce</a>
        <button style="background-color:white; border-radius:14px;"class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            Menu
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <!-- <li class="nav-item">
                    <a style="font-size:20px;"  class="nav-link" href="admin(1)/indexadmin.php">ADMIN</a>
                </li> -->
                <li class="nav-item">
                    <a style="font-size:20px;" class="nav-link" href="mainPage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a style="font-size:20px;"  class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a style="font-size:20px;"  class="nav-link" href="AllProducts.php">Store</a>
                </li>
                <li class="nav-item" style=" position:relative;">
                    <a style="font-size:20px;"  class="nav-link" href="wishList.php">WishList <i class="fa fa-shopping-cart"></i></a>

                    <?php
                    if(isset($_SESSION['wishDetails'])){
                        $count2 = count($_SESSION['wishDetails']);
                        ?><div class="countNoCart"><?php echo $count2; ?></div><?php
                    }
                     ?>

                </li>
                <li class="nav-item" style=" position:relative;">
                    <a style="font-size:20px;"  class="nav-link" href="showCart.php">Cart <i class="fa fa-shopping-cart"></i></a>

                    <?php
                    if(isset($_SESSION['cartDetails'])){
                        $count1 = count($_SESSION['cartDetails']);
                        ?><div class="countNoCart"><?php echo $count1; ?></div><?php
                    }
                     ?>

                </li>

            </ul>
        </div>
    </nav>
</div>
