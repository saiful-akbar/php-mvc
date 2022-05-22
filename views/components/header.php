<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-danger text-light bg-gradient border-bottom shadow-sm py-3">
  <div class="container">
    <a class="navbar-brand" href="<?= route('home/index') ?>">
      <?= config('app.name'); ?>
    </a>

    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarHeader">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarHeader">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link" href="<?= route('home/about') ?>">
            About
          </a>
        </li>
      </ul>

      <div class="d-flex">
        <span>v<?= config('app.version'); ?></span>
      </div>
    </div>
  </div>
</nav>