<section id="saleSection" class="colorSale">
    <div class="container">
        <!-- Sales section Start -->

        <h4 class="salesHeading float-left">Trending Sales</h4>
        <div class="float-right seeAllProductsDiv">
            <h5 class="seeAllProductsDetails"><a href="allproducts.php">see all products</a></h5>
        </div>

        <div class="clearFloat"></div>
        <hr>
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="saleBox">

                    <?php

                        $query = "SELECT * from featuredproducts where fproduct_sale like 'yes' and fproduct_brand like 'MSI' order by fproduct_id asc";
                        $select_query = mysqli_query($connection,$query);

                        $row = mysqli_fetch_assoc($select_query);
                        $tsproduct_id = $row['fproduct_id'];
                        $tsproduct_name = $row['fproduct_name'];
                        $tsproduct_prevPrice = $row['fproduct_oldPrice'];
                        $tsproduct_newPrice = $row['fproduct_newPrice'];
                        $tsproduct_image = $row['fproduct_image'];

                     ?>

                    <div class="salebox-Circle">-18%</div>
                    <div class="row">
                        <div class="saleBox-imageDiv">
                            <img src="images/<?php echo $tsproduct_image; ?>" class="img-fluid" alt="" width="100%" height="100%">
                        </div>
                        <div class="saleBox-detailDiv">
                            <div class="saleBox-details">
                                <h6>$<?php echo $tsproduct_prevPrice; ?></h6>
                                <h3>$<?php echo $tsproduct_newPrice; ?></h3>
                                <p><?php echo $tsproduct_name; ?></p>
                            </div>
                            <div class="saleBox-timer">
                                <div class="hoursDiv">
                                    <div id="saleBox-hours" class="stime"></div>
                                    <p>hours</p>
                                </div>
                                <div class="MinutesDiv">
                                    <div id="saleBox-minutes" class="stime"></div>
                                    <p>minutes</p>
                                </div>
                                <div class="SecondsDiv">
                                    <div id="saleBox-seconds" class="stime"></div>
                                    <p>Seconds</p>
                                </div>

                            </div>
                            <button onclick="location.href='productDetailsModal.php?product_id=<?php echo $tsproduct_id; ?>'" type="button" name="button" class="btn btn-outline-primary">Show Details</button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="row">

                    <?php

                        $query = "SELECT * FROM featuredproducts where fproduct_sale like 'yes' and fproduct_brand not like 'MSI' ORDER BY fproduct_id ASC";
                        $select_query = mysqli_query($connection,$query);

                        while($row = mysqli_fetch_assoc($select_query)){
                        $tsproduct_id = $row['fproduct_id'];
                        $tsproduct_name = $row['fproduct_name'];
                        $tsproduct_prevPrice = $row['fproduct_oldPrice'];
                        $tsproduct_newPrice = $row['fproduct_newPrice'];
                        $tsproduct_image = $row['fproduct_image'];


                        $tsproduct_imageA = explode (",", $tsproduct_image);

                     ?>

                    <div onclick="location.href='productDetailsModal.php?product_id=<?php echo $tsproduct_id; ?>'" style="cursor:pointer;" class="col-lg-6 col-md-6 col-sm-6 sp1">
                        <div class="saleProduct1" style="height:auto">
                            <div class="saleWalaBox">Sale</div>
                            <div class="saleProduct-image">
                                <img src="images/<?php echo $tsproduct_imageA[0]; ?>" alt="" class="img-fluid" width="90%" height="60%">
                            </div>
                            <div class="saleProduct1-details">
                                <div class="saleProduct1-details">
                                    <div class="product-bottom saleProducts2Div">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <h3><?php echo $tsproduct_name; ?></h3>
                                        <h5><span>$<?php echo $tsproduct_prevPrice; ?></span>$<?php echo $tsproduct_newPrice; ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>
                </div>
            </div>
        </div>

    </div>
</section>
