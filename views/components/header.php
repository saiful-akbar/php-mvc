<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-danger shadow">
  <div class="container">
    <a class="navbar-brand" href="<?= url('/') ?>">
      <?= config('app.name'); ?>
    </a>

    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?= isRoute('home/index', '/') ? 'active' : '' ?>" href="<?= route('home/index') ?>">
            Home
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?= isRoute('user/index') ? 'active' : '' ?>" href="<?= route('user/index') ?>">
            User
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>