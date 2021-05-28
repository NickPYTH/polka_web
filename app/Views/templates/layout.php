<!DOCTYPE html>
<head>
    <title>WL</title>
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">

    <script src="https://kit.fontawesome.com/6e9b058a28.js"></script>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
</head>

<header class="navbar mt-2 mb-2">
  <section class="navbar-section">
    <a href="<?= base_url()?>" class="btn btn-link">WebLib</a>
  </section>
  <section class="navbar-center">
    <img src="/book.svg" width=64px height=64px> 
  </section>
  <section class="navbar-section">
    <?php if (! $ionAuth->loggedIn()): ?>
      <a href="<?= base_url()?>/auth/login" class="btn btn-link">Вход</a>
    <?php else: ?>
      <a href="<?= base_url()?>/auth/logout" class="btn btn-link">Выйти из профиля</a>
    <?php endif ?>
  </section>
</header>

    <main role="main">
        <?= $this->renderSection('content') ?>
    </main>
    <?= $this->renderSection('footer') ?>
</body>
</html>