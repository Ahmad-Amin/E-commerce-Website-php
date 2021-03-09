<?php

if(isset($_GET['p_id'])){
    $edit_id = $_GET['p_id'];


    $query = "SELECT * FROM fdcproduct INNER JOIN featuredproducts ON fdcproduct.fproduct_id=featuredproducts.fproduct_id where fdcproduct.fproduct_id = $edit_id";
    $select_post_by_id = mysqli_query($connection,$query);
}
while ($row = mysqli_fetch_assoc($select_post_by_id)) {

    $fproduct_name = $row['fproduct_name'];
    $fproduct_newPrice = $row['fproduct_newPrice'];
    $fproduct_oldPrice = $row['fproduct_oldPrice'];
    $fproduct_code = $row['fproduct_code'];
    $fproduct_warranty = $row['fproduct_warranty'];
    $fproduct_available = $row['fproduct_available'];
    $fproduct_sold = $row['fproduct_sold'];
    $fproduct_brand = $row['fproduct_brand'];
    $fproduct_sale = $row['fproduct_sale'];
    $fproduct_cat_id = $row['fproduct_cat_id'];
    $fproduct_image = $row['fproduct_image'];

    $fproduct_imagesArray = explode (",", $fproduct_image);

    $fdcproduct_features = $row['fdcproduct_features'];
    $fdcproduct_description = $row['fdcproduct_description'];
    $fdcproduct_description_points = $row['fdcproduct_description_points'];

}

if(isset($_POST['update_product'])){


    $fproduct_name1 = $_POST['fproduct_name'];
    $fproduct_newPrice1 = $_POST['fproduct_newPrice'];
    $fproduct_oldPrice1 = $_POST['fproduct_oldPrice'];
    $fproduct_code1 = $_POST['fproduct_code'];
    $fproduct_warranty1 = $_POST['fproduct_warranty'];
    $fproduct_available1 = $_POST['fproduct_available'];
    $fproduct_sold1 = $_POST['fproduct_sold'];
    $fproduct_brand1 = $_POST['fproduct_brand'];
    $fproduct_sale1 = $_POST['fproduct_sale'];
    $fproduct_cat_id1 = $_POST['fproduct_cat_id'];

    $fdcproduct_features1 = $_POST['fdcproduct_features'];
    $fdcproduct_description1 = $_POST['fdcproduct_description'];
    $fdcproduct_description_points1 = $_POST['fdcproduct_description_points'];

    $fproduct_image1 = $_FILES['fproduct_image']['name'];
    $fproduct_image_temp1 = $_FILES['fproduct_image']['tmp_name'];

    // $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

    $target_dir1 = "../images/";
    move_uploaded_file($fproduct_image_temp1, $target_dir1 . $fproduct_image1);

    $query1 = "UPDATE featuredproducts SET ";
    $query1 .= "fproduct_name = '{$fproduct_name1}', ";
    $query1 .= "fproduct_newPrice = '{$fproduct_newPrice1}', ";
    $query1 .= "fproduct_oldPrice = '{$fproduct_oldPrice1}', ";
    $query1 .= "fproduct_image = '{$fproduct_image1}', ";
    $query1 .= "fproduct_code = '{$fproduct_code1}', ";
    $query1 .= "fproduct_warranty = '{$fproduct_warranty1}', ";
    $query1 .= "fproduct_available = '{$fproduct_available1}', ";
    $query1 .= "fproduct_sold = '{$fproduct_sold1}', ";
    $query1 .= "fproduct_brand = '{$fproduct_brand1}', ";
    $query1 .= "fproduct_cat_id = '{$fproduct_cat_id1}', ";
    $query1 .= "fproduct_sale = '{$fproduct_sale1}' ";
    $query1 .= "WHERE fproduct_id = {$edit_id} ";
    $update_post = mysqli_query($connection,$query1);
    confirmQuery($update_post);

    $queryu = "UPDATE fdcproduct SET ";
    $queryu .= "fdcproduct_features = '{$fdcproduct_features}', ";
    $queryu .= "fdcproduct_description = '{$fdcproduct_description}', ";
    $queryu .= "fdcproduct_description_points = '{$fdcproduct_description_points}' ";
    $queryu .= "WHERE fproduct_id = {$edit_id} ";

    $update_postu = mysqli_query($connection,$queryu);
    confirmQuery($update_postu);

    header("Location: products.php");
}
 ?>

 <form class="" method="post" enctype="multipart/form-data">
     <div class="form-group">
         <label style="font-weight:600;" for="title">Product Name</label>
         <input value="<?php echo $fproduct_name; ?>" class="form-control" type="text" name="fproduct_name">
     </div>

     <div class="form-group">
         <label style="font-weight:600;" for="title">Product New Price</label>
         <input value="<?php echo $fproduct_newPrice; ?>"  class="form-control" type="text" name="fproduct_newPrice">
     </div>

     <div class="form-group">
         <label style="font-weight:600;" for="title">Product old Price</label>
         <input value="<?php echo $fproduct_oldPrice; ?>"  class="form-control" type="text" name="fproduct_oldPrice">
     </div>

     <div class="form-group">
         <label style="font-weight:600;" for="title">Product Code</label>
         <input value="<?php echo $fproduct_code; ?>"  class="form-control" type="text" name="fproduct_code">
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
         <input value="<?php echo $fproduct_warranty; ?>"  class="form-control" type="text" name="fproduct_warranty">
     </div>

     <div class="form-group">
         <label style="font-weight:600;" for="title">Product Available (In Stock/Out Of Stock)</label>
         <input value="<?php echo $fproduct_available; ?>"  class="form-control" type="text" name="fproduct_available">
     </div>

     <div class="form-group">
         <label style="font-weight:600;" for="title">No. of Products Sold</label>
         <input value="<?php echo $fproduct_sold; ?>"  class="form-control" type="text" name="fproduct_sold">
     </div>

     <div class="form-group">
         <label style="font-weight:600;" for="title">Product brand</label>
         <input value="<?php echo $fproduct_brand; ?>"  class="form-control" type="text" name="fproduct_brand">
     </div>

     <div class="form-group">
         <label style="font-weight:600;" for="title">Product Sale (yes/no)</label>
         <input value="<?php echo $fproduct_sale; ?>"  class="form-control" type="text" name="fproduct_sale">
     </div>

     <div class="form-group">
         <!-- <img width="100" src="../images/<?php echo $fproduct_imagesArray[0]; ?>" alt="image"> -->
         <!-- <br><br><br> -->
         <label style="font-weight:600;" for="image">Product Image</label>
         <input id= "image" type="file" name="fproduct_image" required>
     </div>

     <div class="form-group">
         <label style="font-weight:600;" for="Product Features">Product features (like Name1: Value1, Name2: Value2,)</label>
         <textarea class="form-control" name="fdcproduct_features" rows="10" cols="30"> <?php echo $fdcproduct_features; ?></textarea>
     </div>

     <div class="form-group">
         <label style="font-weight:600;" for="Descrption details">Product description details</label>
         <textarea class="form-control" name="fdcproduct_description" rows="10" cols="30"><?php echo $fdcproduct_description; ?></textarea>
     </div>

     <div class="form-group">
         <label style="font-weight:600;" for="Description Points">Product description Points (like Name1: Value1, Name2: Value2,)</label>
         <textarea class="form-control" name="fdcproduct_description_points" rows="10" cols="30"><?php echo $fdcproduct_description_points; ?></textarea>
     </div>


     <div class="form-group">
         <input id="submit" class="btn btn-primary" type="submit" name="update_product" value="Update Data">
     </div>


 </form>
