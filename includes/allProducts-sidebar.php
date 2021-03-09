<div class="allp-category container">
    <h2>Product Categories</h2>
    <hr>
    <div class="allp-category-details">
        <ul>

            <?php

                $query = "SELECT * FROM categoryproducts";
                $select_categories = mysqli_query($connection,$query);

                while ($row = mysqli_fetch_assoc($select_categories)) {
                    $cat_id = $row['cproduct_id'];
                    $cat_name = $row['cproduct_name'];
                    echo "<li><a href='category.php?category=$cat_id'>{$cat_name}</a></li>";
                }
             ?>

        </ul>
    </div>
</div>




<?php
    $output='';
    if(isset($_POST['search'])){
        $searchquery = $_POST['search'];
        $searchquery  = preg_replace("#[^0-9a-z]#i","",$searchquery);

        $query = "SELECT * FROM featuredproducts where fproduct_name like '%$searchquery%'";
        $slect_query = mysqli_query($connection,$query);
        $count = mysqli_num_rows($query);

    }

 ?>
<!--
<div class="allp-searchBar container">
    <h2>Search Product</h2>
    <hr>
    <div class="allp-searchBar-formDiv">
        <form class="" action="Allproducts.php" method="post">
            <input class="allp-searchBar-input" type="text" name="search" value="" placeholder="Enter Keyword">
        </form>
    </div>
</div> -->

<div class="allp-category container ">
    <h2>Most Sold</h2>
    <hr>
    <div class="allp-category-details">
        <ul>
            <?php
            $query = "SELECT * FROM featuredproducts ORDER BY fproduct_sold DESC LIMIT 8";
            $select_query = mysqli_query($connection,$query);

            while($row = mysqli_fetch_assoc($select_query)){
                $name = $row['fproduct_name'];
                $fproduct_id = $row['fproduct_id'];
                echo "<li><a href='productDetailsModal.php?product_id={$fproduct_id}'>{$name}</a></li>";
            }
             ?>
        </ul>
    </div>
</div>
