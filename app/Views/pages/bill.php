<!DOCTYPE html>
<head>
    <title>Чек об оплате</title>
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
    <link rel="stylesheet" href="/styles.css">

    <script src="https://kit.fontawesome.com/6e9b058a28.js"></script>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
</head>
<body>

    <div class="toast toast-success" style="margin-bottom: 100px;">
        Вы успешно купили товары!
    </div>

    <div class="container grid-lg">
        <div class="columns">
            <div class="container">
                <div class="columns">
                            <div style="margin-bottom:15px;" class="column col-4">
                            </div>
                            <div style="margin-bottom:15px;" class="column col-4">
                                <div style="" class="card">
                                    <div class="card-image">
                                        <img class="img-responsive" src="/thx.png">
                                    </div>
                                    <div class="card-header">
                                        <h2 class="card-title">Номер заказа <?= esc($orderId); ?></h2>
                                        <p class="card-meta">Сумма заказа <?= esc($cost); ?> ₽</p>
                                    </div>
                                    <a href="<?= base_url()?>" class="btn btn-success">Продолжить покупки</a>
                                </div>

                            </div>
                </div>
            </div>

</body>
</html>