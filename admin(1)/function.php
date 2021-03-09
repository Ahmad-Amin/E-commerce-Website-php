<?php

function confirmQuery($result){
    global $connection;
    if(!$connection){
        die("QUERY FAILED. " . mysqli_error($connection));
    }
}

function insert_categories(){
    global $connection;

    if(isset($_POST['submit'])){
        $categoryName = $_POST['cat_title'];


        if($categoryName == "" || empty($categoryName)){
            echo "This field should not be empty";
        }
        else {

            $query = "INSERT INTO categoryproducts(cproduct_name)";
            $query .= " VALUES('{$categoryName}') ";

            $create_category_query = mysqli_query($connection,$query);

            if(!$create_category_query){
                die('QUERY FAILED' . mysqli_error($connection));
            }
        }
    }
}

function findAllCategories(){
    global $connection;

    $query = "SELECT * FROM categoryproducts";
    $select_cat = mysqli_query($connection,$query);

    while ($row = mysqli_fetch_assoc($select_cat)) {
        $cat_id = $row['cproduct_id'];
        $cat_title = $row['cproduct_name'];

        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='adminCategories.php?edit={$cat_id}'>edit</a></td>";
        echo "<td><a href='adminCategories.php?del={$cat_id}'>Delete</a></td>";
        echo "</tr>";
    }
}

function deleteCategories(){
    global $connection;

    if(isset($_GET['del'])){

        $del_cat_id = $_GET['del'];

        $query = "DELETE FROM categoryproducts WHERE cproduct_id = {$del_cat_id} ";
        $del_query = mysqli_query($connection,$query);
        header("Location: adminCategories.php");
    }
}


 ?>
