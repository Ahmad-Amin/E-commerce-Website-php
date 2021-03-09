<?php
    if(isset($_POST['create_product'])){

        $q = "SELECT fproduct_id FROM featuredproducts ORDER BY fproduct_id DESC";
        $sq = mysqli_query($connection,$q);
        $row = mysqli_fetch_assoc($sq);
        $id = $row['fproduct_id'];

        echo "<script>console.log('{$id}')</script>";
        $fproduct_name = $_POST['fproduct_name'];
        $fproduct_newPrice = $_POST['fproduct_newPrice'];
        $fproduct_oldPrice = $_POST['fproduct_oldPrice'];
        $fproduct_code = $_POST['fproduct_code'];
        $fproduct_warranty = $_POST['fproduct_warranty'];
        $fproduct_available = $_POST['fproduct_available'];
        $fproduct_sold = $_POST['fproduct_sold'];
        $fproduct_brand = $_POST['fproduct_brand'];
        $fproduct_sale = $_POST['fproduct_sale'];
        $fproduct_cat_id = $_POST['fproduct_cat_id'];

        $fdcproduct_features = $_POST['fdcproduct_features'];
        $fdcproduct_description = $_POST['fdcproduct_description'];
        $fdcproduct_description_points = $_POST['fdcproduct_description_points'];

        $fproduct_image = $_FILES['fproduct_image']['name'];
        $fproduct_image_temp = $_FILES['fproduct_image']['tmp_name'];

        // $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

        $target_dir = "../images/";
        move_uploaded_file($fproduct_image_temp, $target_dir . $fproduct_image);

        $query = "INSERT INTO featuredproducts(fproduct_name, fproduct_newPrice, fproduct_oldPrice, fproduct_image, fproduct_code, fproduct_warranty, fproduct_available, fproduct_sold, fproduct_brand, fproduct_cat_id, fproduct_sale)";
        $query .= "VALUES('{$fproduct_name}', '{$fproduct_newPrice}', '{$fproduct_oldPrice}', '{$fproduct_image}', '{$fproduct_code}', '{$fproduct_warranty}', '{$fproduct_available}', '{$fproduct_sold}', '{$fproduct_brand}', '{$fproduct_cat_id}', '{$fproduct_sale}' )";
        $create_post_query = mysqli_query($connection,$query);
        confirmQuery($create_post_query);

        $query2 = "INSERT INTO fdcproduct(fproduct_id, fdcproduct_features, fdcproduct_description, fdcproduct_description_points)";
        $query2 .= "VALUES('{$id}', '{$fdcproduct_features}', '{$fdcproduct_description}', '{$fdcproduct_description_points}' )";
        $create_post_query2 = mysqli_query($connection,$query2);
        confirmQuery($create_post_query2);
    }

 ?>

<form class="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label style="font-weight:600;" for="title">Product Name</label>
        <input class="form-control" type="text" name="fproduct_name" required>
    </div>

    <div class="form-group">
        <label style="font-weight:600;" for="title">Product New Price</label>
        <input class="form-control" type="text" name="fproduct_newPrice" required>
    </div>

    <div class="form-group">
        <label style="font-weight:600;" for="title">Product old Price</label>
        <input class="form-control" type="text" name="fproduct_oldPrice" required>
    </div>

    <div class="form-group">
        <label style="font-weight:600;" for="title">Product Code</label>
        <input class="form-control" type="text" name="fproduct_code" required>
    </div>

    <div class="form-group">
        <label style="font-weight:600;"  for="post_category_id">Category</label>
        <select class="" name="fproduct_cat_id">

            <?php

            $query = "SELECT * FROM categoryproducts";
            $select_categories = mysqli_query($connection,$query);

            confirmQuery($select_categories);

            while ($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row['cproduct_id'];
                $cat_title = $row['cproduct_name'];

                echo "<option value='{$cat_id}'>$cat_title</option>";
            }
             ?>
        </select>
    </div>

    <div class="form-group">
        <label style="font-weight:600;" for="title">Product warranty</label>
        <input class="form-control" type="text" name="fproduct_warranty" required>
    </div>

    <div class="form-group">
        <label style="font-weight:600;" for="title">Product Available (In Stock/Out Of Stock)</label>
        <input class="form-control" type="text" name="fproduct_available" required>
    </div>

    <div class="form-group">
        <label style="font-weight:600;" for="title">No. of Products Sold</label>
        <input class="form-control" type="text" name="fproduct_sold" required>
    </div>

    <div class="form-group">
        <label style="font-weight:600;" for="title">Product brand</label>
        <input class="form-control" type="text" name="fproduct_brand" required>
    </div>

    <div class="form-group">
        <label style="font-weight:600;" for="title">Product Sale (yes/no)</label>
        <input class="form-control" type="text" name="fproduct_sale" required>
    </div>

    <div class="form-group">
        <label style="font-weight:600;" for="image">Product Image</label>
        <input id= "image" type="file" name="fproduct_image" required>
    </div>

    <div class="form-group">
        <label style="font-weight:600;" for="Product Features">Product features (like Name1: Value1, Name2: Value2,)</label>
        <textarea class="form-control" name="fdcproduct_features" rows="10" cols="30"></textarea>
    </div>

    <div class="form-group">
        <label style="font-weight:600;" for="Descrption details">Product description details</label>
        <textarea class="form-control" name="fdcproduct_description" rows="10" cols="30"></textarea>
    </div>

    <div class="form-group">
        <label style="font-weight:600;" for="Description Points">Product description Points (like Name1: Value1, Name2: Value2,)</label>
        <textarea class="form-control" name="fdcproduct_description_points" rows="10" cols="30"></textarea>
    </div>


    <div class="form-group">
        <input id="submit" class="btn btn-primary"type="submit" name="create_product" value="Publish Post">
    </div>


</form>
