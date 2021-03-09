<?php include 'includes/admin_header.php'; ?>

    <div class="d-flex" id="wrapper">

    <?php include 'includes/admin_navigation.php'; ?>

    <?php

    // session_start();
    // if(!isset($_SESSION['user'])){
    //     header('location: ../adminLogin.php');
    // }
    ?>

            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fas fa-file-alt fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                            $query = "SELECT * FROM featuredproducts";
                                            $select = mysqli_query($connection,$query);
                                            $productCounts = mysqli_num_rows($select);

                                         ?>
                                  <div class='h1' style="margin:0;"><?php echo $productCounts; ?></div>
                                        <div>Products</div>
                                    </div>
                                </div>
                            </div>
                            <a href="products.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                            $query = "SELECT * FROM categoryproducts";
                                            $select = mysqli_query($connection,$query);
                                            $categoryCounts = mysqli_num_rows($select);
                                         ?>
                                        <div class='h1' style="margin:0;"><?php echo $categoryCounts; ?></div>
                                         <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="adminCategories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <script type="text/javascript">
                      google.charts.load('current', {'packages':['bar']});
                      google.charts.setOnLoadCallback(drawChart);

                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ['Data', 'Max. Sold Products'],

                          <?php
                          $query = "SELECT * FROM featuredproducts ORDER BY fproduct_sold DESC";
                          $selectq = mysqli_query($connection,$query);
                          $c = 0;
                          while ($row = mysqli_fetch_assoc($selectq)) {
                              $fproduct_name = substr($row['fproduct_name'],0,9);
                              $fproduct_sold = $row['fproduct_sold'];
                              $c = $c + 1;
                              if($c == 6){break;}
                              echo "['{$fproduct_name}',{$fproduct_sold} ],";
                          }
                          ?>
                        ]);

                        var options = {
                          chart: {
                            title: 'Company Performance',
                            subtitle: 'Product Sold ',
                          }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                      }
                    </script>

                    <div id="columnchart_material" class="col-lg-6" style=" height: 500px;"></div>
                </div>

            </div>

<?php include 'includes/admin_footer.php'; ?>
