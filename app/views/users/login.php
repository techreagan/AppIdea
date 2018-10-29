<?php require APPROOT . '/views/inc/header.php' ?>
<main class="container">
  <div class="row">
    <div class="col-md-5 mx-auto">
      <div class="card card-body text-light bg-transparent">
        <h1 class="">Login</h1>
        <p>Please fill in your credentials to login</p>
        <?php flash('register_success'); ?>
        <form action="<?php echo url_for('users/login'); ?>" method="post">
          <div class="form-group">
            <label for="username">Username/Email</label>
            <input type="text" name="username" value="<?php echo $data['username']; ?>" class="form-control<?php echo !empty($data['username_err']) ? ' is-invalid' : ''; ?>" id="username" placeholder="Enter username">
            <span class="invalid-feedback"><?php echo $data['username_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control<?php echo !empty($data['password_err']) ? ' is-invalid' : ''; ?>" id="password" placeholder="Enter Password">
            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
          </div>
          <div class="row mt-4">
            <div class="col">
              <input type="submit" class="btn btn-success btn-block" value="submit">
            </div>
            <div class="col">
              <a href="<?php echo url_for('users/register'); ?>" class="btn btn-link btn-block">No account? Register</a>
            </div>
        </form>
      </div>
    </div>
  </div>
</main>
<?php require APPROOT . '/views/inc/footer.php' ?>