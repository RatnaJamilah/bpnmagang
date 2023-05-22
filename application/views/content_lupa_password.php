<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6 col-md-offset-3">
      <div class="template-example">
        <h3 class="template-title-example text-center">Reset Password</h3>
          <form method="POST" action="<?= site_url('login')?>">
            <?php echo validation_errors('<script>swal({title: "Warning", text: "', '", timer: 10000, icon: "warning", button: false});</script>'); ?>
            <div class="form-group">
              <label>Email</label>
              <input class="form-control" placeholder="Email" type="text" name="email_user" value="<?= set_value('email_user'); ?>">
            </div>

            <button type="submit" style="margin-top: 1rem; margin-bottom: 1rem;" class="btn btn-primary btn-block"><i class="fa fa-send"></i> Reset Password</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>