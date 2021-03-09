<section id="thumb" style="height:500px">
    <div class="thumb-headingDiv">
        <h1 class="thumb-heading">Featured Products</h1>
        <hr>
    </div>

    <div class="thumbnail-slider">
        <div class="thumbnail-container">

            <?php
                if(isset($_GET['product_id'])){
                    if(isset($_SESSION['wishDetails'])){

                        $_SESSION['wishDetails'] = array_map("unserialize",array_unique(array_map("serialize", $_SESSION['wishDetails'])));

                        ?>
                            <hr>
                        <?php
                        $outputValues = array_column($_SESSION['wishDetails'], 'product_id');

                        $id = $_GET['product_id'];

                        if(!in_array($_GET['product_id'],$outputValues)){
                            $count = count($_SESSION['wishDetails']);

                            $query3 = "SELECT * FROM featuredproducts where fproduct_id = $id";
                            $select_query3 = mysqli_query($connection,$query3);
                            $row3 = mysqli_fetch_assoc($select_query3);

                            $item_id['product_id'] = $_GET['product_id'];
                            $item_array["product_id"] = $_GET['product_id'];

                            $fproduct_image = $row3['fproduct_image'];
                            $fproduct_imagesArray = explode (",", $fproduct_image);

                            $item_array["wishDetails_image"] = $fproduct_imagesArray[0];
                            $item_array["wishDetails_name"] = $row3['fproduct_name'];
                            $item_array["wishDetails_price"] = $row3['fproduct_newPrice'];
                            $item_array["wishDetails_quantity"] = 1;

                            $_SESSION['wishDetails'][$count] = $item_array;
                            echo "<script>location.href='mainPage.php?'</script>";
                        }
                        else{
                            echo '<script>alert("Product is already added to the WishList")</script>';
                            echo "<script>location.href='mainPage.php'</script>";
                        }
                    }
                    else{
                        $item_array["product_id"] = $_GET['product_id'];

                         $query4 = "SELECT * FROM featuredproducts where fproduct_id = $id";
                         $select_query4 = mysqli_query($connection,$query4);
                         $row4 = mysqli_fetch_assoc($select_query4);

                        $fproduct_image = $row4['fproduct_image'];
                        $fproduct_imagesArray = explode (",", $fproduct_image);

                        $item_array["wishDetails_image"] = $fproduct_imagesArray[0];
                        $item_array["wishDetails_name"] = $row4['fproduct_name'];
                        $item_array["wishDetails_price"] = $row4['fproduct_newPrice'];
                        $item_array["wishDetails_quantity"] = 1;

                        $_SESSION['wishDetails'][0] = $item_array;
                    }
                }


                $query = "SELECT * FROM featuredproducts ORDER BY fproduct_id LIMIT 10";
                $select_query = mysqli_query($connection,$query);

                while($row = mysqli_fetch_assoc($select_query)){
                $fproduct_id = $row['fproduct_id'];
                $fproduct_name = $row['fproduct_name'];
                $fproduct_newPrice = $row['fproduct_newPrice'];
                $fproduct_image = $row['fproduct_image'];

                $fproduct_imagesArray = explode (",", $fproduct_image);

              ?>
            <div class="item">
                <?php include 'includes/modal.php'; ?>
                <div class="product-top">

                    <img src="images/<?php echo $fproduct_imagesArray[0]; ?>" class="img-fluid" alt="" width="100%">
                    <div class="overlay2">
                        <form class="" action="mainPage.php" method="post">
                            <button type="button" class="btn btn-secondary"  data-toggle="modal" data-target="#exampleModalCenter<?php echo $fproduct_id; ?>" title="Quick Details"><i class="fa fa-eye"></i></button>
                            <a name="addWishLIst" href="mainPage.php?product_id=<?php echo $fproduct_id; ?>" class="btn btn-secondary" title="Add to Wishlist"><i class="fa fa-heart-o"></i></a>

                            <!-- <button type="button" class="btn btn-secondary" title="Add to Cart"><i class="fa fa-shopping-cart"></i></button> -->
                        </form>

                    </div>
                </div>

                <div class="product-bottom text-center" style="color:black; font-size:15px; cursor:pointer">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <i class="fa fa-star-o"></i>
                    <h3> <a href="productDetailsModal.php?product_id=<?php echo $fproduct_id ?>"><?php echo $fproduct_name; ?></a></h3>
                    <h5>$<?php echo $fproduct_newPrice; ?></h5>
                </div>

            </div>

        <?php } ?>

        </div>

      <!-- controls slides -->
      <div class="controls">
      </div>

    </div>
</section>
