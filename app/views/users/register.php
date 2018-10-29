<?php require APPROOT . '/views/inc/header.php' ?>
<main class="container">
  <div class="row">
    <div class="col-md-5 mx-auto">
      <div class="card card-body text-light bg-transparent">
        <h1 class="">Create An Account</h1>
        <p>Please fill out this form to register with us</p>
        <form action="<?php echo url_for('users/register'); ?>" method="post">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" value="<?php echo $data['username']; ?>" class="form-control<?php echo !empty($data['username_err']) ? ' is-invalid' : ''; ?>" id="username" placeholder="Enter username">
            <span class="invalid-feedback"><?php echo $data['username_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" value="<?php echo $data['email']; ?>" class="form-control<?php echo !empty($data['email_err']) ? ' is-invalid' : ''; ?>" id="email" placeholder="Enter Email">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control<?php echo !empty($data['password_err']) ? ' is-invalid' : ''; ?>" id="password" placeholder="Enter Password">
            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control<?php echo !empty($data['confirm_password_err']) ? ' is-invalid' : ''; ?>" id="confirmPassword" placeholder="Enter Confirm Password">
            <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
          </div>
          <div class="row mt-4">
            <div class="col">
              <input type="submit" class="btn btn-success btn-block" value="Register">
            </div>
            <div class="col">
              <a href="<?php echo url_for('users/login'); ?>" class="btn btn-link btn-block">Have an account? Login</a>
            </div>
        </form>
      </div>
    </div>
  </div>
</main>
<?php require APPROOT . '/views/inc/footer.php' ?>