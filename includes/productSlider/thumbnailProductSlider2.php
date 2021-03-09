<section id="thumb2">
    <div class="container">
        <h4 class="salesHeading">Best Seller</h4>
        <hr>
        <div class="thumbnail-slider2">
            <div class="thumbnail-container2">

                <?php

                $query = "SELECT * FROM featuredproducts ORDER BY fproduct_sold DESC LIMIT 8";
                $select_query = mysqli_query($connection,$query);

                while($row = mysqli_fetch_assoc($select_query)){
                $fproduct_id = $row['fproduct_id'];
                $fproduct_name = $row['fproduct_name'];
                $fproduct_newPrice = $row['fproduct_newPrice'];
                $fproduct_image = $row['fproduct_image'];
                $fproduct_oldPrice = $row['fproduct_oldPrice'];

                $fproduct_imagesArray = explode (",", $fproduct_image);

                 ?>

                <div class="item2" onclick="location.href='productDetailsModal.php?product_id=<?php echo $fproduct_id ?>'" style="cursor:pointer">
                    <div class="saleProduct1" style="height:auto">
                        <div class="saleWalaBox">Sale</div>
                        <div class="saleProduct-image">
                            <img src="images/<?php echo $fproduct_imagesArray[0]; ?>" alt="" class="img-fluid" width="90%" height="60%">
                        </div>
                        <div class="saleProduct1-details">
                            <div class="saleProduct1-details">
                                <div class="product-bottom saleProducts2Div">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <a href="productDetailsModal.php?product_id=<?php echo $fproduct_id; ?>"><h3><?php echo $fproduct_name; ?></h3></a>
                                    <h5><span>$<?php echo $fproduct_oldPrice; ?></span>$<?php echo $fproduct_newPrice; ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>

            </div>

          <!-- controls slides -->
          <div class="controls2">
          </div>

        </div>
    </div>
</section>
