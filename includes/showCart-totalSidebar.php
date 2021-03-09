<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Personal Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?php

            if(isset($_POST['data_submit'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $cell = $_POST['cell'];
                $delivery = $_POST['delivery'];

                $query = "INSERT INTO userrecord(name, email, address, cell, delivery)";
                $query .= "VALUES('{$name}', '{$email}', '{$address}', '{$cell}', '{$delivery}' )";
                $Insert_query = mysqli_query($connection,$query);

                echo "<script>alert('You order has been placed')</script>";

            }

       ?>
      <div class="modal-body">
          <form class="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                  <label style="font-weight:600;" for="title">Name</label>
                  <input class="form-control" type="text" name="name" required>
              </div>

              <div class="form-group">
                  <label style="font-weight:600;" for="title">Email</label>
                  <input class="form-control" type="email" name="email" required>
              </div>

              <div class="form-group">
                  <label style="font-weight:600;" for="title">Address</label>
                  <input class="form-control" type="text" name="address" required>
              </div>

              <div class="form-group">
                  <label style="font-weight:600;" for="title">Phone No:</label>
                  <input class="form-control" type="text" name="cell" required>
              </div>

              <div class="form-group">
                  <label style="font-weight:600;" for="title">Delievery</label>
                  <input class="form-control" type="text" name="delivery" value="Cash On Delivery" readonly>
              </div>

              <button class="btn btn-primary" type="submit" name="data_submit">Checkout</button>

          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="card shopping-cart allproducts-card-total">
         <div class="card-body allproducts-card-totalDetails">
            <h3>Cart Total</h3>
            <h5 style="margin-bottom:10px">Total Products</h5>
            <ul>
                <?php

                if(!empty($_SESSION['cartDetails'])){
                    $total = 0;
                    $quantity = 0;
                    foreach ($_SESSION['cartDetails'] as $key => $value) {
                        $total = $total + ($value['cartDetails_quantity'] * $value['cartDetails_price']);
                        $quantity = $quantity + $value['cartDetails_quantity'];
                        ?>

                            <li style="position: relative;"> <span><?php echo $value['cartDetails_name']; ?></span><sapn style="position:absolute; top:0; right: 20px;">x <?php echo $value['cartDetails_quantity'];?> = <span><?php echo $value['cartDetails_quantity'] * $value['cartDetails_price'];?> </span></sapn></li>

                <?php

                    }
                }
                ?>
            </ul>
            <p>Total Products: <?php echo $quantity; ?></p>
            <p>Total Price: </p>

            <h1>$<?php echo $total; ?></h1>
            <a href="#" class="btn btn-success  allproducts-card-checkOutButton float-right" data-toggle="modal" data-target="#exampleModalCenter" > <i class="fa fa-check-circle"></i>Proceed To Checkout</a>

            <!-- <div class="row">
                <div class="col-lg-6 col-md-6">
                        <a href="includes/logout.php" class="btn btn-danger  allproducts-card-checkOutButton "> <i class="fa fa-exclamation-circle"style="margin-right:10px"></i>Clear Cart</a>
                </div>
                <div class="col-lg-6 col-md-6">
                        <a href="#" class="btn btn-success  allproducts-card-checkOutButton "> <i class="fa fa-check-circle" style="margin-right:10px"></i>Checkout</a>
                </div>
            </div> -->
         </div>
 </div>
