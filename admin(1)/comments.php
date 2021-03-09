<?php include 'includes/admin_header.php'; ?>
    <div class="d-flex" id="wrapper">

    <?php include 'includes/admin_navigation.php'; ?>

    <div class="row">
        <div style="padding:25px;" class="col-lg-12 ">

            <h1 class="page-header">Welcome to admin <small>Author</small></h1>

            <?php


                if(isset($_GET['source'])){
                    $source = $_GET['source'];
                }
                else{
                    $source = '';
                }
                switch ($source) {
                    case 'add_post':
                        include 'includes/add_post.php';
                        break;
                    case 'edit_post':
                        include 'includes/edit_post.php';
                        break;
                    default :
                            include 'includes/view_all_comments.php';
                        break;
                }

             ?>
        </div>


    </div>



<?php include 'includes/admin_footer.php'; ?>
