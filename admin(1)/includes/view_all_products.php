<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Code</th>
            <th>Category</th>
            <th>Image</th>
            <th>Warranty</th>
            <th>brand</th>
            <th>Avalibility</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>

        <?php

            $query = "SELECT * FROM featuredproducts";
            $select_post = mysqli_query($connection,$query);

            while ($row = mysqli_fetch_assoc($select_post)) {

                $fproduct_id = $row['fproduct_id'];
                $fproduct_name = $row['fproduct_name'];
                $fproduct_Price = $row['fproduct_newPrice'];
                $fproduct_code = $row['fproduct_code'];
                $fproduct_warranty = $row['fproduct_warranty'];
                $fproduct_brand = $row['fproduct_brand'];
                $fproduct_available = $row['fproduct_available'];
                $fproduct_cat_id = $row['fproduct_cat_id'];

                $fproduct_image = $row['fproduct_image'];

                $fproduct_imagesArray = explode (",", $fproduct_image);

                echo "<tr>";
                echo "<td>{$fproduct_id}</td>";
                echo "<td>{$fproduct_name}</td>";
                echo "<td>{$fproduct_Price}</td>";
                echo "<td>{$fproduct_code}</td>";

                $query = "SELECT * FROM categoryproducts WHERE cproduct_id =$fproduct_cat_id";
                $select_cat_title = mysqli_query($connection,$query);

                while ($row = mysqli_fetch_assoc($select_cat_title)) {
                    $cat_title = $row['cproduct_name'];
                    echo "<td>{$cat_title}</td>";
                }
                echo "<td><img width = '100' src = '../images/$fproduct_imagesArray[0]' alt='images'></td>";
                echo "<td>{$fproduct_warranty}</td>";
                echo "<td>{$fproduct_brand}</td>";
                echo "<td>{$fproduct_available}</td>";
                echo "<td><a href='products.php?source=edit_post&p_id={$fproduct_id}'>Edit</a></td>";
                echo "<td><a href= 'products.php?delete={$fproduct_id}'>Delete</a></td>";
                echo "</tr>";
            }
         ?>

    </tbody>
    <?php
        if(isset($_GET['delete'])){
            $del_id = $_GET['delete'];

            $query = "DELETE FROM featuredproducts WHERE fproduct_id = {$del_id}";
            $del_query = mysqli_query($connection,$query);

            header('Location: products.php');
        }
     ?>


</table>
