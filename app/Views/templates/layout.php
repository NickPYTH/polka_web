<!DOCTYPE html>
<head>
    <title>Libra</title>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?= base_url()?>">Libra</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">

                    <?php if (! $ionAuth->loggedIn()): ?>
                        <a class="nav-link" href="<?= base_url()?>/auth/login">Войти <span class="sr-only"></span></a>
                    <?php endif ?>
                    <?php if ( $ionAuth->loggedIn()): ?>
                        <a class="nav-link" href="<?= base_url()?>/auth/logout">Выйти <span class="sr-only"></span></a>
                    <?php endif ?>

                    <?php if ($ionAuth->loggedIn()): ?>
                    <?php if ($ionAuth->isAdmin()): ?>
                        <a class="nav-link" href="<?= base_url()?>/Clients/all">Клиенты <span class="sr-only"></span></a>
                        <a class="nav-link" href="<?= base_url()?>/Pages/add">Добавить товар <span class="sr-only"></span></a>
                    <?php endif ?>
                    <?php endif ?>
                </li>
            </ul>
            <?php if (! $ionAuth->loggedIn()): ?>
                <?= form_open('Pages/view',['style' => 'display: flex']); ?>
                <input class="form-control mr-sm-2" type="search" placeholder="Что ищем?" name="search" value="<?= $search; ?>" aria-label="Поиск">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
                </form>
            <?php endif ?>
            <form class="form-inline my-2 my-lg-0">

            </form>
        </div>
    </nav>
    

    <main role="main">
        <?= $this->renderSection('content') ?>
    </main>
    <?= $this->renderSection('footer') ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>