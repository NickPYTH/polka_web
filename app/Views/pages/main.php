<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>
    <?php if (! $ionAuth->loggedIn()): ?>
        <div class="hero bg-gray">
            <div class="hero-body">
                <h1>Привет, книжный червь!</h1>
                <p>Пройди регистрацию чтобы получить доступ к самой большой коллекции книг!</p>
            </div>
        </div>
        <div class="container grid-lg">
            <div class="columns">
                
            <div class="parallax">
                <div class="parallax-top-left" tabindex="1"></div>
                <div class="parallax-top-right" tabindex="2"></div>
                <div class="parallax-bottom-left" tabindex="3"></div>
                <div class="parallax-bottom-right" tabindex="4"></div>
                <div class="parallax-content">
                    <div class="parallax-front">
                    <a href='#'><h3 style="color:white;">Зарегистрироваться</h3></a>
                    </div>
                    <div class="parallax-back">
                    <img src="/women.jpg" class="img-responsive rounded">
                    </div>
                </div>
            </div>

            </div>
        </div>
        
    <?php else: ?>
        Logined
    <?php endif ?>     
              

<?= $this->endSection() ?>
