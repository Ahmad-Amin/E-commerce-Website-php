<div class="modal fade" id="exampleModalCenter<?php echo $fproduct_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter<?php echo $fproduct_id; ?>Title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenter<?php echo $fproduct_id; ?>Title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h3><?php echo $fproduct_name; ?></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
        <a href="productDetailsModal.php?product_id=<?php echo $fproduct_id; ?>" class="btn btn-outline-primary">More Details</a>
      </div>
    </div>
  </div>
</div>
