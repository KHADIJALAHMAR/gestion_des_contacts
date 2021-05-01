<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
      <h2>Create An Account</h2>
      <p>Please fill out this form to register with us</p>
      <form action="<?php echo URLROOT; ?>/users/signup" method="POST">
        <div class="form-group">
          <label for="username">username: <sup>* Usernames must be lowercase and 4-10 characters in length</sup></label>
          <input pattern="[a-z]{4,10}" type="text" name="username"
            class="form-control form-control-lg <?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $data['username']; ?>">
          <span class="invalid-feedback"><?php echo $data['username_err']; ?></span>
        </div>
        <div class="form-group">
          <label for="password">Password: <sup>* password must have one capital one lowercase and more than 8
              characters</sup></label>
          <input pattern="(?=.\d)(?=.[a-z])(?=.*[A-Z]).{8,}" type="password" name="password"
            class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $data['password']; ?>">
          <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
        </div>
        <div class="form-group">
          <label for="confirm_password">Confirm Password: <sup>*</sup></label>
          <input type="password" name="confirm_password"
            class="form-control form-control-lg <?php echo (!empty($data['confirm_pass_err'])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $data['confirm_pass']; ?>">
          <span class="invalid-feedback"><?php echo $data['confirm_pass_err']; ?></span>
        </div>

        <div class="row">
          <div class="col">
            <input type="submit" value="signup" class="btn btn-success btn-block">
          </div>
          <div class="col">
            <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Have an account? Login</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>