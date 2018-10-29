<nav class="navbar navbar-expand-md navbar-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="<?php echo url_for('/'); ?>">AppIdea</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo url_for('/'); ?>">Home</a>
        </li>
        <?php if(Auth::isLoggedIn()): ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo url_for('ideas/'); ?>">Ideas</a>
        </li>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo url_for('pages/about'); ?>">About</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <?php if(Auth::isLoggedIn()): ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo url_for('users/logout'); ?>">Logout</a>
        </li>
        <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo url_for('users/register'); ?>">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo url_for('users/login'); ?>">Login</a>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>