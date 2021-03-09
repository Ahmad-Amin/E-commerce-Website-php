
<!-- header of the page start-->
<?php include 'includes/header.php'; ?>
<?php include 'includes/databaseEssentials.php'; ?>
<!-- header of the page start-->

<!-- Navigation Panel Start -->
<?php include 'includes/navigation.php'; ?>
<!-- Navigation panel end -->


<!-- Loader of the page Start-->
<?php include 'includes/page-loader.php'; ?>
<!-- Loader of the page end-->

        <?php
            $count2 = 0;
            if(isset($_SESSION['cartDetails'])){

                $count2 = count($_SESSION['cartDetails']);
                if($count2 == 0){
                    echo "<h1 style='margin:20px;'>There is no item in the cart</h1>";
                }
                else{?>

                    <section id="cartPage">
                        <div class="container">
                            <h2 class="allp-showCartProduct-heading">Shopping Cart</h2>

                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="container-fluid">
                                       <div class="card shopping-cart">
                                           <div class="allp-intheCard">

                                               <?php
                                               // print_r($_SESSION['cartDetails']);

                                                    if(!empty($_SESSION['cartDetails'])){

                                                        $total = 0;
                                                        foreach ($_SESSION['cartDetails'] as $key => $value) { ?>

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="allp-HorizontalCard-picture">
                                                                        <img src="images/<?php echo $value['cartDetails_image']; ?>" alt="" class="img-fluid" width="100%" height="100%">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">

                                                                    <?php

                                                                        if(isset($_POST['addQuantity'])){
                                                                            $id = $_POST['productId'];
                                                                            foreach($_SESSION['cartDetails'] as &$value2){
                                                                                if($value2['product_id'] === $id){
                                                                                    $value2['cartDetails_quantity'] = $_POST['qty'];
                                                                                }
                                                                            }
                                                                        }

                                                                        if(isset($_GET["action"])){
                                                                            if($_GET["action"] == "delete"){
                                                                                foreach ($_SESSION['cartDetails'] as $key => $value) {
                                                                                    if($value['product_id'] == $_GET['id']){
                                                                                        unset($_SESSION['cartDetails'][$key]);
                                                                                        echo "<script>alert('Product is removed successfully')</script>";
                                                                                        echo "<script>window.location='showCart.php'</script>";
                                                                                    }
                                                                                }
                                                                            }
                                                                        }

                                                                     ?>

                                                                    <form class="" action="showCart.php" method="post">
                                                                        <input style="display:none" type="text" name="productId" value="<?php echo $value['product_id']; ?>">
                                                                        <div class="productsInCart">
                                                                            <div class="allp-HorizontalCard-heading">
                                                                                <h3><?php echo $value['cartDetails_name']; ?></h3>
                                                                            </div>
                                                                            <div class="allp-HorizontalCard-details">
                                                                                <div class="allp-inthecart-priceDetails float-left">
                                                                                    <h5>Price</h5>
                                                                                    <p><?php echo $value['cartDetails_price']; ?></p>
                                                                                </div>

                                                                                <div class="allp-inthecart-quantityDetails float-right">
                                                                                    <h5>Quantity</h5>

                                                                                    <input type="text"  placeholder="1" class="qty" name="qty" title="Qty" size="5">
                                                                                </div>
                                                                                <div class="clearFloat"></div>

                                                                            </div>
                                                                            <div class="allp-HorizontalCard-ratBuy">
                                                                                <!-- <div class="allp-HorizontalCard-Rating float-left">
                                                                                    <h5>Ratings</h5>
                                                                                    <i class="fa fa-star x"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star-half-o"></i>
                                                                                </div> -->
                                                                                <div class="allp-HorizontalCard-button">
                                                                                    <a href="showCart.php?action=delete&id=<?php echo $value['product_id']; ?>" class="btn btn-outline-danger" name="button"><i class="fa fa-trash" style="margin-right:10px"></i>Remove</a>
                                                                                    <input type="submit" name="addQuantity" class="btn btn-outline-info" value="Add">

                                                                                </div>
                                                                                <div class="clearFloat"></div>
                                                                            </div>
                                                                        </div>
                                                                    </form>

                                                                </div>

                                                            </div>
                                                            <hr>

                                                <?php    }
                                                    }
                                                ?>






                                           </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">

                                    <!-- Total of all the Products prices start-->
                                        <?php include 'includes/showCart-totalSidebar.php'; ?>
                                    <!-- Total of all the Products prices end-->

                                </div>
                            </div>
                        </div>
                    </section>

            <?php } ?>

        <?php }
            else {

                echo "<h1 style='margin:20px;'>There is no item in the cart</h1>";
            }?>


<!-- footer of the page start -->
<?php include 'includes/footer.php'; ?>
<!-- footer of the page end -->
