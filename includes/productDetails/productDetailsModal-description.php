<div class="discriptionDiv">
    <h3>Descrition</h3>

    <?php

        if(isset($_GET['product_id'])){
            $product_id = $_GET['product_id'];
        }

        $query = "SELECT * FROM fdcproduct where fproduct_id = $product_id";

        $select_query = mysqli_query($connection,$query);

        $row = mysqli_fetch_assoc($select_query);

        $pdproduct_id = $row['fproduct_id'];
        $fdcproduct_descriptoin  = $row['fdcproduct_description'];
        $fdcproduct_descriptoin_points  = $row['fdcproduct_description_points'];

        $fdcproduct_despArray = explode (",", $fdcproduct_descriptoin_points);

     ?>
    <p><?php echo $fdcproduct_descriptoin; ?></p>
    <ul>
        <?php for ($i=0; $i < sizeof($fdcproduct_despArray); $i++) { ?>

            <li> <span><?php echo $fdcproduct_despArray[$i]; ?></span></li>

        <?php } ?>

    </ul>
</div>
