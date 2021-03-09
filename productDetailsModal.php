
<!-- header of the page start-->
<?php include 'includes/header.php'; ?>
<!-- header of the page start-->
<?php include 'includes/databaseEssentials.php'; ?>

<!-- Navigation Panel Start -->
<?php include 'includes/navigation.php'; ?>
<!-- Navigation panel end -->


<!-- Loader of the page Start-->
<?php include 'includes/page-loader.php'; ?>
<!-- Loader of the page end-->
        <section class="productDetailSection">
            <div class="container-fluid">
                <h2 class="allp-product-heading">Shop</h2>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="product-detail-mainBox">
                            <h3>Product Details</h3>
                            <hr>
                            <div class="row">

                                <?php

                                    if(isset($_GET['product_id'])){
                                        $product_id = $_GET['product_id'];
                                    }

                                    $query = "SELECT * FROM featuredproducts where fproduct_id = $product_id";

                                    $select_query = mysqli_query($connection,$query);

                                    while($row = mysqli_fetch_assoc($select_query)){

                                    $pdproduct_id = $row['fproduct_id'];
                                    $pdproduct_name = $row['fproduct_name'];
                                    $pdproduct_brand = $row['fproduct_brand'];
                                    $pdproduct_warranty = $row['fproduct_warranty'];
                                    $pdproduct_available = $row['fproduct_available'];
                                    $pdproduct_code = $row['fproduct_code'];
                                    // $pdproduct_code = $row['fproduct_sold'];
                                    $pdproduct_images = $row['fproduct_image'];
                                    $pdproduct_newPrice = $row['fproduct_newPrice'];
                                    $pdproduct_oldPrice = $row['fproduct_oldPrice'];

                                    $pdproduct_imagesArray = explode (",", $pdproduct_images);

                                    ?>

                                    <div class="product-detail-left col-lg-6">
                                        <div class="sp-wrap">

                                            <?php for ($i=0; $i < sizeof($pdproduct_imagesArray); $i++) { ?>

                                                    <a href="images/<?php echo $pdproduct_imagesArray[$i]; ?>"><img src="images/<?php echo $pdproduct_imagesArray[$i]; ?>" width="100%" class="img-fluid"/></a>

                                            <?php } ?>

                                        </div>
                                    </div>


                            <?php  }  ?>


                            <!-- <form class="" action="productDetailsModal.php?action=add&id=<?php echo $pdproduct_id; ?>" method="post"> -->

                                <div class="product-detail-right col-lg-6">

                                    <h3><?php echo $pdproduct_name; ?> <br> <small>Code: <?php echo $pdproduct_code; ?></small></h3>
                                    <h5> <b>Price : </b> <i class="fa fa-dollar-sign"></i> <?php echo $pdproduct_newPrice; ?></h5>
                                    <h5> <b>Brand : </b> <?php echo $pdproduct_brand; ?></h5>
                                    <h5> <b>Waranty : </b> <?php echo $pdproduct_warranty; ?></h5>
                                    <h5> <b>Delivery to the City : </b> Free</h5>
                                    <h5> <b>Payment : </b> COD, Visa, MasterCard, Details</h5>

                                    <?php
                                        if(strcmp($pdproduct_available, "In Stock")){
                                            $colorStyle = "color:red";
                                        }else{
                                            $colorStyle = "color:green";
                                        }
                                     ?>

                                     <?php
                                        if(isset($_POST['addCart'])){
                                            if(isset($_SESSION['cartDetails'])){

                                                $_SESSION['cartDetails'] = array_map("unserialize",array_unique(array_map("serialize", $_SESSION['cartDetails'])));

                                                ?>
                                                    <hr>
                                                <?php
                                                $outputValues = array_column($_SESSION['cartDetails'], 'product_id');

                                                $id = $_GET['product_id'];

                                                if(!in_array($_GET['product_id'],$outputValues)){
                                                    $count = count($_SESSION['cartDetails']);

                                                    $item_id['product_id'] = $_GET['product_id'];
                                                    $item_array["product_id"] = $_GET['product_id'];
                                                    $item_array["cartDetails_image"] = $pdproduct_imagesArray[0];
                                                    $item_array["cartDetails_name"] = $pdproduct_name;
                                                    $item_array["cartDetails_price"] = $pdproduct_newPrice;
                                                    $item_array["cartDetails_quantity"] = 1;

                                                    $_SESSION['cartDetails'][$count] = $item_array;
                                                    echo "<script>window.location='productDetailsModal.php?product_id={$id}'</script>";
                                                }
                                                else{
                                                    echo '<script>alert("Product is already added to cart")</script>';
                                                    echo "<script>window.location='productDetailsModal.php?product_id={$id}'</script>";
                                                }
                                            }
                                            else{
                                                $item_array["product_id"] = $_GET['product_id'];
                                                $item_array["cartDetails_image"] = $pdproduct_imagesArray[0];
                                                $item_array["cartDetails_name"] = $pdproduct_name;
                                                $item_array["cartDetails_price"] = $pdproduct_newPrice;
                                                $item_array["cartDetails_quantity"] = 1;

                                                $_SESSION['cartDetails'][0] = $item_array;
                                            }
                                        }

                                        // Add Products to the WishList

                                        if(isset($_POST['addWishLIst'])){
                                            if(isset($_SESSION['wishDetails'])){

                                                $_SESSION['wishDetails'] = array_map("unserialize",array_unique(array_map("serialize", $_SESSION['wishDetails'])));

                                                ?>
                                                    <hr>
                                                <?php
                                                $outputValues = array_column($_SESSION['wishDetails'], 'product_id');

                                                $id = $_GET['product_id'];

                                                if(!in_array($_GET['product_id'],$outputValues)){
                                                    $count = count($_SESSION['wishDetails']);

                                                    $item_id['product_id'] = $_GET['product_id'];
                                                    $item_array["product_id"] = $_GET['product_id'];
                                                    $item_array["wishDetails_image"] = $pdproduct_imagesArray[0];
                                                    $item_array["wishDetails_name"] = $pdproduct_name;
                                                    $item_array["wishDetails_price"] = $pdproduct_newPrice;
                                                    $item_array["wishDetails_quantity"] = 1;

                                                    $_SESSION['wishDetails'][$count] = $item_array;
                                                    echo "<script>window.location='productDetailsModal.php?product_id={$id}'</script>";
                                                }
                                                else{
                                                    echo '<script>alert("Product is already added to the WishList")</script>';
                                                    echo "<script>window.location='productDetailsModal.php?product_id={$id}'</script>";
                                                }
                                            }
                                            else{
                                                $item_array["product_id"] = $_GET['product_id'];
                                                $item_array["wishDetails_image"] = $pdproduct_imagesArray[0];
                                                $item_array["wishDetails_name"] = $pdproduct_name;
                                                $item_array["wishDetails_price"] = $pdproduct_newPrice;
                                                $item_array["wishDetails_quantity"] = 1;

                                                $_SESSION['wishDetails'][0] = $item_array;
                                            }
                                        }
                                    //    print_r($_SESSION['wishDetails']);
                                      ?>
                                    <h5 style="<?php echo $colorStyle; ?>"> <b>Avaliability : </b> <?php echo $pdproduct_available; ?></h5>
                                    <h5> <b>Product Code : </b><?php echo $pdproduct_code; ?></h5>
                                    <div class="product-cwb-button">

                                        <form class="" action="productDetailsModal.php?action=add&product_id=<?php echo $pdproduct_id; ?>" method="post">
                                            <!-- <a href="#" class="addtocart"> <i class="fa fa-heart"></i>Add to Cart</a> -->
                                            <input type="submit" name="addCart" class="addtocart" value="Add to Cart">
                                            <!-- <a href="#" class="writereview"> <i class="fa fa-pen"></i>Add to WishList</a> -->
                                            <input type="submit" name="addWishLIst" class="writereview" value="Add to WishList">
                                            <!-- <a href="#" class="buynow"> <i class="fa fa-shopping-cart"></i>Buy Now</a> -->
                                            <input type="submit" name="BuyNow" class="buynow" value="Buy Now">
                                        </form>



                                    </div>

                                </div>

                            <!-- </form> -->

                            </div>
                            <section class="illustration-features-tab">
                                <div class="container">
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
                                        <ul class="headings nav nav-pills nav-justified">
                                            <li class="linksList" data-target="#myCarousel" data-slide-to="0"><a class="links" href="#">Features</a></li>
                                            <li class="linksList" data-target="#myCarousel" data-slide-to="1"><a class="links" href="#">Descrition</a></li>
                                            <li class="linksList" data-target="#myCarousel" data-slide-to="2"><a class="links" href="">Comments</a></li>
                                        </ul>
                                        <hr>

                                        <!-- Wrapper for Slides--->
                                        <div class="carousel-inner">

                                            <div class="carousel-item active">

                                                <!-- description of the product modal start -->
                                                    <?php include 'includes/productDetails/productDetailsModal-features.php'; ?>
                                                <!-- description of the product modal end -->

                                            </div>

                                            <div class="carousel-item">

                                                <!-- description of the product modal start -->
                                                    <?php include 'includes/productDetails/productDetailsModal-description.php'; ?>
                                                <!-- description of the product modal end -->

                                            </div>

                                            <div class="carousel-item">

                                                <!-- description of the product modal start -->
                                                    <?php include 'includes/productDetails/productDetailsModal-comments.php'; ?>
                                                <!-- description of the product modal end -->

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </section>

                        </div>
                    </div>

                    <div class="col-lg-4">

                            <!-- Sidebar of the Product details Model page start -->
                            <?php include 'includes/productDetails/productDetailsModal-sidebar.php'; ?>
                            <!-- Sidebar of the Product details Model page end -->
                    </div>
                </div>
            </div>
        </section>


        <!-- footer of the page start -->
        <?php include 'includes/footer.php'; ?>
        <!-- footer of the page end -->
