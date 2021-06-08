<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>
    <?php if (! $ionAuth->loggedIn()): ?>
        
        <div class="container">
            <div class="row">
                <?php if (!empty($tools) && is_array($tools)) : ?>
                    <?php foreach ($tools as $item): ?>
                        <div class="col-lg-4 col-12 d-flex justify-content-center">
                            <div class="card d-flex m-3" style="width: 18rem; height: 36rem;">
                                <img src="<?= esc($item['pictureUrl']); ?>" class="card-img-top" alt="BookImage">
                                <div class="card-body">
                                    <h5 class="card-title"><?= esc($item['Name']); ?></h5>
                                    <p class="card-text"><?= esc($item['Description']); ?></p>
                                    <p class="card-text"><?= esc($item['Price']); ?></p>
                                    <?php if ($ionAuth->loggedIn()): ?>
                                        <?php if (!$ionAuth->isAdmin()): ?>
                                            <a class="btn btn-primary">Купить</a>
                                        <?php endif ?>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif ?>
            </div>
        </div>



        <div class="container">
            <div class="columns text-center">
                <div style="margin-bottom:15px;" class="column col-12">
                    <?= $pager->links('group1') ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="columns">
                <div style="margin-bottom:15px;" class="column col-12 center">
                <?= form_open('Pages/view', ['class' => 'text-center']); ?>
                    <label class="input-group-text" for="inputGroupSelect01">Колличество на странице</label>
                    <div class="form-group">
                    <select class="form-select" name="per_page">
                    <option value="2" <?php if($per_page == '2') echo("selected"); ?>>2</option>
                        <option value="5"  <?php if($per_page == '5') echo("selected"); ?>>5</option>
                        <option value="10" <?php if($per_page == '10') echo("selected"); ?>>10</option>
                        <option value="20" <?php if($per_page == '20') echo("selected"); ?>>20</option>
                    </select>
                    </div>
                    <button style="margin-bottom: 15px;" type="submit" class="btn btn-primary text-center">Применить</button>      
                </form>
                </div>
            </div>
        </div>
        
        
    <?php else: ?>
                <?php if (!$ionAuth->isAdmin()): ?>
        <div style="margin-bottom: 15px;" class="hero bg-gray">
            <div class="hero-body">
                <h1>Лучший инструмент, лучшим строителям!</h1>
                <p>Войдите в личный кабинет, чтобы оформит заказ</p>
            </div>
        </div>
                <?php endif ?>
        <div class="container grid-lg">
            <div class="columns">
        
                    <div class="container">
                    <div class="columns">
                    <?php if (!empty($tools) && is_array($tools)) : ?>
                    <?php foreach ($tools as $item): ?>
                    <div style="margin-bottom:15px;" class="column col-4">
                        <div class="card">
                        <div class="card-image">
                            <img class="img-responsive" src="<?= esc($item['pictureUrl']); ?>">
                        </div>
                        <div class="card-header">
                            <h2 class="card-title"><?= esc($item['Name']); ?></h2>
                            <p class="card-meta"><?= esc($item['Price']); ?> ₽</p>
                        </div>
                        <div class="card-body text-center">
                            <p><?= esc($item['Description']); ?></p>
                            <?php if (!$ionAuth->isAdmin()): ?>
                            <button style="margin-bottom: 15px;" type="submit" class="btn btn-primary" onclick="addItem(this, '<?= esc($item['Name']); ?>');">
                                Добавить в корзину
                            </button>
                            <?php endif ?>

                            <?php if ($ionAuth->isAdmin()): ?>
                                <a style="margin-bottom: 15px;" class="btn btn-primary" href="<?= base_url()?>/Pages/delete/<?= esc($item['id']); ?>">
                                    Удалить
                                </a>

                            <?php endif ?>
                
                        </div>
                        
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p style="margin-top:15px;">В данный момент нет доступного инструмента</p>
                <?php endif ?>
            </div>
        </div> 
        <div class="container">
            <div class="columns text-center">
                <div style="margin-bottom:15px;" class="column col-12">
                    <?= $pager->links('group1') ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="columns">
                <div style="margin-bottom:15px;" class="column col-12 center">
                <?= form_open('Pages/view', ['class' => 'text-center']); ?>
                    <label class="input-group-text" for="inputGroupSelect01">Колличество на странице</label>
                    <div class="form-group">
                    <select class="form-select" name="per_page">
                    <option value="2" <?php if($per_page == '2') echo("selected"); ?>>2</option>
                        <option value="5"  <?php if($per_page == '5') echo("selected"); ?>>5</option>
                        <option value="10" <?php if($per_page == '10') echo("selected"); ?>>10</option>
                        <option value="20" <?php if($per_page == '20') echo("selected"); ?>>20</option>
                    </select>
                    </div>
                    <button style="margin-bottom: 15px;" type="submit" class="btn btn-primary text-center">
                        Применить
                    </button>      
                </form>
                </div>
            </div>
        </div>
    <?php endif ?>     
              
    
<?= $this->endSection() ?>
