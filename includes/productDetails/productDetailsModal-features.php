<div class="product-details-feature">

    <!-- <h3>Feature</h3> -->
    <ul>
        <?php


            if(isset($_GET['product_id'])){
                $product_id = $_GET['product_id'];
            }

            $query = "SELECT * FROM fdcproduct where fproduct_id = $product_id";

            $select_query = mysqli_query($connection,$query);

            $row = mysqli_fetch_assoc($select_query);

            $pdproduct_id = $row['fproduct_id'];
            $fdcproduct_features = $row['fdcproduct_features'];

            $fdcproduct_featuresArray = explode (",", $fdcproduct_features);


            for ($i=0; $i < sizeof($fdcproduct_featuresArray); $i++) {  ?>

                    <li><p><?php echo $fdcproduct_featuresArray[$i]; ?></p></li>

        <?php  }  ?>
         <!--
        <li><p>Wifi : Yes</p></li>
        <li><p>Webcam : Yes</p></li>
        <li><p>Height : 1.37kg</p></li>
        <li><p>Speaker : Yes</p></li>
        <li><p>Laptop Proccessor Code : 2</p></li>
        <li><p>Laptop Cache Size : 4M</p></li>
        <li><p>Laptop Proccessor : Intel Core i7</p></li>
        <li><p>Laptop OS : MacOS</p></li>
        <li><p>Laptop Series : MacBook Pro</p></li>
        <li><p>Laptop Keyboard Backlight : Yes</p></li>
        <li><p>Laptop Hard Drive Capacity : 128GB</p></li>
        <li><p>Laptop RAM : 8GB</p></li>
        <li><p>Laptop Hard Drive Type : 128GB</p></li>
        <li><p>Laptop Resolution : 2560x1600</p></li>
        <li><p>Laptop LED Backlight : Yes</p></li> -->
    </ul>

</div>
