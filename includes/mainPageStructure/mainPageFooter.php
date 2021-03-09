<div class="footerBackground">
    <hr>

    <footer class="page-footer font-small blue pt-4 container">

      <div class="container-fluid text-center text-md-left">

        <div class="row">
          <div class="col-md-6 mt-md-0 mt-3">

            <!-- Content -->
            <h5 class="text-uppercase">E-Commerce.com</h5>
            <p>Buy the latest products and Games released on the Market <br> A wide range of electronic related stuffs to buy for the customer</p>

          </div>
          <!-- Grid column -->

          <hr class="clearfix w-100 d-md-none pb-3">

          <div class="col-md-3 mb-md-0 mb-3">

            <h5 class="text-uppercase">Categories</h5>

            <ul class="list-unstyled">

                <?php

                    $query = "SELECT * FROM categoryproducts";
                    $select_categories = mysqli_query($connection,$query);

                    while ($row = mysqli_fetch_assoc($select_categories)) {
                        $cat_id = $row['cproduct_id'];
                        $cat_name = $row['cproduct_name'];
                        echo "<li><a href='category.php?category=$cat_id'>{$cat_name}</a></li>";
                    }
                 ?>

            </ul>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 mb-md-0 mb-3">

            <!-- Links -->
            <h5 class="text-uppercase">Socail Links</h5>

            <ul class="list-unstyled">
              <li class="fb">
                <a href="https://www.facebook.com/">facebook.com</a>
              </li>
              <li>
                <a href="https://www.instagram.com/">instagram.com</a>
              </li>
              <li>
                <a href="https://www.twitter.com/">twitter.com</a>
              </li>
              <li>
                <a href="https://www.youtube.com/">youtube.com</a>
              </li>
            </ul>

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

      </div>
      <!-- Footer Links -->

      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="#">E-commerce.com</a>
      </div>
      <!-- Copyright -->

    </footer>
</div>

<!-- footer start -->



<!-- footer end -->

<script
  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"
></script>
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"
  integrity="sha256-fzFFyH01cBVPYzl16KT40wqjhgPtq6FFUB6ckN2+GGw="
  crossorigin="anonymous"
></script>
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"
  integrity="sha256-4sETKhh3aSyi6NRiA+qunPaTawqSMDQca/xLWu27Hg4="
  crossorigin="anonymous"
></script>

<script src="js/script.js"></script>
<script src="js/script1.js"></script>
<script src="js/script2.js"></script>
<script src="js/smoothproducts.min.js" charset="utf-8"></script>
<script type="text/javascript">

    $(".sp-wrap").smoothproducts();
    $('li a.links').click(function() {
        $('li a.links').removeClass("activeLinks");
        $(this).addClass("activeLinks");
    });

    // var prevScrollpos = window.pageYOffset;
    //   window.onscroll = function() {
    //   var currentScrollPos = window.pageYOffset;
    //   if (prevScrollpos > currentScrollPos) {
    //     document.getElementById("navbar12").style.top = "0";
    //   } else {
    //     document.getElementById("navbar12").style.top = "-100px";
    //   }
    //   prevScrollpos = currentScrollPos;
    // }

    var deadline = new Date ("21 May 2020, 09:00:00").getTime()
      var x = setInterval(function() {

      var now = new Date().getTime();
      var t = deadline - now;
      var days = Math.floor(t / (1000 * 60 * 60 * 24));
      var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60));
      var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((t % (1000 * 60)) / 1000);
      document.getElementById("saleBox-hours").innerHTML =hours;
      document.getElementById("saleBox-minutes").innerHTML = minutes;
      document.getElementById("saleBox-seconds").innerHTML =seconds;
  }, 1000);

</script>

</body>
</html>
