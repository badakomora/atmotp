<!-- deposit Modal -->
<div class="modal fade" id="deposit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Make Deposit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
          <div class="form-group">
            <label for="" class="">Amount</label>
            <input type="text" placeholder="Enter amount of Money to deposit" name="amount" class="form-control" maxlength="100" required/>
          </div>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="submit" name="deposit">Deposit</button>
        </div>
      </form>
    </div>
  </div>
</div>



<!-- withdraw Modal -->
<div class="modal fade" id="withdraw" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Post Photo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../home/index.php" method="post">
      <div class="modal-body">
        <div class="form-group">
            <label>Phone No.</label>
            <input type="text" disabled class="form-control" value="<?php echo $_SESSION['phone']; ?>" maxlength="20" required>
        </div>
        <input type="hidden" class="form-control" name="phone" value="<?php echo $_SESSION['phone']; ?>" maxlength="20" >
        <input type="hidden" class="form-control"  name="accno" value="<?php echo $_SESSION['accountno']; ?>" >
        <div class="form-group">
            <label >Account No.</label>
            <input type="text" disabled class="form-control"  name="accno" value="<?php echo $_SESSION['accountno']; ?>" required>
        </div>
        <div class="form-group">
            <label>Amount to Withdraw</label>
            <input type="text" class="form-control"  placeholder="Enter amount to withdraw" name="amount" required>
        </div>
        </div>
        <hr>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="withdraw" class="btn btn-primary">Withdraw</button>
        </div>
      </form>
    </div>
  </div>
</div>






<!-- account Modal -->
<div class="modal fade" id="account" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Make Deposit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
          <div class="form-group">
            <label for="" class="">Email</label>
            <input type="text" disabled value="<?php echo $_SESSION['email']; ?>" class="form-control" maxlength="100"/>
          </div>
          <div class="form-group">
            <label for="" class="">Account No.</label>
            <input type="text" disabled value="<?php echo $_SESSION['accountno']; ?>" class="form-control" maxlength="100"/>
          </div>
          <div class="form-group">
            <label for="" class="">Card No.</label>
            <input type="text" disabled value="<?php echo $_SESSION['cardno']; ?>" class="form-control" maxlength="100"/>
          </div>
          <div class="form-group">
            <label for="" class="">Update Password</label>
            <input type="text" name="password" class="form-control" maxlength="100"/ required>
          </div>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="submit" name="updatepass">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>