<?php include 'includes/admin_header.php'; ?>
    <div class="d-flex" id="wrapper">

    <?php include 'includes/admin_navigation.php'; ?>

    <div class="row">
        <div style="padding:25px;" class="col-lg-6 ">

            <?php insert_categories(); ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="cat_title">Add Categories</label>
                    <input class="form-control" type="text" name="cat_title">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary btn-lg" type="submit" name="submit" value="Add Category">
                </div>
            </form>
        </div>

        <div style="padding:25px;" class="col-lg-6 ">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Title</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                </thead>

                <tbody>
                    <!-- FIND ALL CATEGORIES FROM DATABASE QUERY  -->
                    <?php  findAllCategories()?>

                    <!-- DELETE CATEGORIES FROM THE DATABASE -->
                    <?php deleteCategories() ?>
                </tbody>
            </table>
        </div>
    </div>



<?php include 'includes/admin_footer.php'; ?>
