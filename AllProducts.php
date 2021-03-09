
<!-- header of the page start-->
<?php include 'includes/header.php'; ?>
<?php include 'includes/databaseEssentials.php'; ?>
<?php include 'includes/modal.php'; ?>
<!-- header of the page start-->

<!-- Navigation Panel Start -->
<?php include 'includes/navigation.php'; ?>
<!-- Navigation panel end -->


<!-- Loader of the page Start-->
<?php include 'includes/page-loader.php'; ?>
<!-- Loader of the page end-->

        <section id="allProducts-productdetail">
            <div class="container">
                <h2 class="allp-product-heading">Shop</h2>
                <div class="row">
                    <div class="col-lg-9">


                        <?php

                            if(isset($_POST['addCart1'])){
                                if(isset($_SESSION['cartDetails'])){


                                    $_SESSION['cartDetails'] = array_map("unserialize",array_unique(array_map("serialize", $_SESSION['cartDetails'])));

                                    ?>
                                        <hr>
                                    <?php
                                    $outputValues = array_column($_SESSION['cartDetails'], 'product_id');

                                    echo "<script>console.log('{$_GET['product_id']}')</script>";
                                    $id = $_GET['product_id'];

                                    if(!in_array($_GET['product_id'],$outputValues)){


                                        echo "<script>alert('{$id2}')</script>";

                                        $query3 = "SELECT * FROM featuredproducts where fproduct_id = $id";
                                        $select_query3 = mysqli_query($connection,$query3);
                                        $row3 = mysqli_fetch_assoc($select_query3);

                                        $count = count($_SESSION['cartDetails']);

                                        $item_array["product_id"] = $_GET['product_id'];

                                        $product_image1 = $row3['fproduct_image'];
                                        $product_imagesArray1 = explode (",", $product_image1);

                                        $item_array["cartDetails_image"] = $product_imagesArray1[0];
                                        $item_array["cartDetails_name"] = $row3['fproduct_name'];
                                        $item_array["cartDetails_price"] = $row3['fproduct_newPrice'];
                                        $item_array["cartDetails_quantity"] = 1;
                                        $item_array["cartDetails_category"] = $row3['fproduct_cat_id'];

                                        $_SESSION['cartDetails'][$count] = $item_array;
                                        echo "<script>window.location='Allproducts.php'</script>";
                                    }
                                    else{
                                   //      echo "<script>alert('{$product_id}.{$product_name}')</script>";
                                        echo "<script>$('#myModal').modal('show');</script>";

                                        echo '<script>alert("Product is already added to cart")</script>';
                                        echo "<script>window.location='Allproducts.php'</script>";
                                    }
                                }
                                else{
                                    $id2 = $_GET['product_id'];
                                    $query4 = "SELECT * FROM featuredproducts where fproduct_id = $id2";
                                    $select_query4 = mysqli_query($connection,$query4);
                                    $row4 = mysqli_fetch_assoc($select_query4);

                                    $item_array["product_id"] = $_GET['product_id'];
                                    $product_image4 = $row4['fproduct_image'];
                                    $product_imagesArray4 = explode (",", $product_image4);
                                    $item_array["cartDetails_image"] = $product_imagesArray4[0];
                                    $item_array["cartDetails_name"] = $row4['fproduct_name'];
                                    $item_array["cartDetails_price"] = $row4['fproduct_newPrice'];
                                    $item_array["cartDetails_quantity"] = 1;
                                    $item_array["cartDetails_category"] = $row4['fproduct_cat_id'];

                                    $_SESSION['cartDetails'][0] = $item_array;
                                }
                            }
                         ?>

                        <?php

                        if(isset($_GET['page'])){
                            $page = $_GET['page'];
                        }
                        else{ $page="";}

                        if($page == "" || $page == 1){
                            $page_1 = 0;
                        }
                        else{ $page_1 = ($page*5)-5; }

                            $query = "SELECT * FROM featuredproducts ORDER BY fproduct_id LIMIT $page_1,5";
                            $select_query = mysqli_query($connection,$query);

                            while($row = mysqli_fetch_assoc($select_query)){

                            $product_id = $row['fproduct_id'];
                            $product_name = $row['fproduct_name'];
                            $product_newPrice = $row['fproduct_newPrice'];
                            $product_image = $row['fproduct_image'];
                            $product_category = $row['fproduct_cat_id'];
                            $product_imagesArray = explode (",", $product_image);


                         ?>



                         <div class="allp-HorizontalCard">
                             <div class="row">
                                 <div class="col-md-4">
                                     <!-- <div class="saleWalaBox">Sale</div> -->
                                     <div class="allp-HorizontalCard-picture">
                                         <img src="images/<?php echo $product_imagesArray[0]; ?>" alt="" class="img-fluid" width="100%" height="100%">
                                     </div>
                                 </div>
                                 <div class="col-md-8">
                                     <div class="allp-HorizontalCard-heading">
                                         <?php

                                            $query5 = "SELECT * FROM categoryproducts WHERE cproduct_id = $product_category";
                                            $select_query5 = mysqli_query($connection,$query5);
                                            $row5 = mysqli_fetch_assoc($select_query5);
                                            $catename = $row5['cproduct_name'];

                                          ?>
                                         <h3 class="categroy_heading"><?php echo $product_name; ?><span class="categroy_span">(<?php echo $catename ?>)</span></h3>
                                         <hr>
                                     </div>
                                     <div class="allp-HorizontalCard-details">
                                         <ul>
                                             <li>Top Notch Quality</li>
                                             <li>100% Original</li>
                                             <li>Free Home Delivery</li>
                                             <li>Optimum Sound As per you Choice</li>
                                         </ul>
                                     </div>
                                     <div class="allp-HorizontalCard-ratBuy">
                                         <div class="allp-HorizontalCard-Rating float-left">
                                             <h5>Ratings</h5>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star-half-o"></i>
                                         </div>
                                         <form class="" action="AllProducts.php?action=add&product_id=<?php echo $product_id; ?>" method="post">

                                             <div class="allp-HorizontalCard-button float-right">
                                                 <input type="submit" name="addCart1" class="btn btn-success" value="Add to Cart">
                                                 <!-- <input type="submit" class="btn btn-success" name="addCart" placeholder="Add to Cart"/> -->
                                                 <a class="btn btn-warning" href="productDetailsModal.php?product_id=<?php echo $product_id ?>">More Details</a>
                                                 <!-- <button type="button" class="btn btn-warning" name="button">Buy Now</button> -->
                                             </div>

                                         </form>

                                         <div class="clearFloat"></div>
                                     </div>
                                 </div>

                             </div>
                         </div>

                     <?php } ?>



                    </div>
                    <div class="col-lg-3">

                        <!-- Sidebar of this page start -->
                            <?php include 'includes/allProducts-sidebar.php'; ?>
                        <!-- Sidebar of this page end -->
                    </div>
                </div>
            </div>

            <div class="d-flex" style="margin-top:15px">
            <ul class="list-inline mx-auto justify-content-center">

                <?php
                $post_query_count = "SELECT * FROM featuredproducts";
                $findCount = mysqli_query($connection,$post_query_count);
                $count = mysqli_num_rows($findCount);

                $count = ceil($count/5);
                  for ($i=1; $i <= $count; $i++) {

                      if($i == $page){
                        echo "<li class='list-inline-item page-item'><a class='page-link active_link ' href='Allproducts.php?page={$i}'>{$i}</a></li>";
                      }
                      else {
                          echo "<li class='list-inline-item page-item pageitem '><a class='page-link' href='Allproducts.php?page={$i}'>{$i}</a></li>";
                      }

                  }

                 ?>
            </ul>
        </div>

        </section>



<!-- footer of the page start -->
<?php include 'includes/footer.php'; ?>
<!-- footer of the page end -->
