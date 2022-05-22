<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?= config('app.description'); ?>">

  <!-- Title -->
  <title><?= $title . ' - ' . config('app.name'); ?></title>

  <!-- Bootstrap & app CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= url('/assets/css/app.css'); ?>">
</head>

<body>
  <?php \Src\Views\Header::render() ?>

  <!-- Content -->
  <div class="container py-4">
    <?php require __DIR__ . "/../../views/{$content}.php"; ?>
  </div>

  <!-- Bootstrap Bundle with Popper & App JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="<?= url('/assets/js/app.js') ?>"></script>
</body>

</html>