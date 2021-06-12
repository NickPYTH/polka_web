<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>



<div class="container">
    <div class="row">
        <?php if (!empty($rating) && is_array($rating)) : ?>
            <?php foreach ($rating as $item): ?>
                <div class="col-lg-4 col-12 d-flex justify-content-center">
                    <div class="card d-flex m-3" style="width: 18rem; height: 26rem;">
                        <img src="<?= esc($item['pictureUrl']); ?>" height="250px" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($item['FIO']); ?></h5>
                            <?php if ($ionAuth->loggedIn()): ?>
                                <?php if ($ionAuth->isAdmin()): ?>
                                    <a href="<?= base_url()?>/clients/edit/<?= esc($item['FIO']); ?>" class="btn btn-primary">Редактировать</a>
                                <?php endif ?>
                                <?php if ($ionAuth->isAdmin()): ?>
                                    <a href="<?= base_url()?>/clients/delete/<?= esc($item['id']); ?>" class="btn btn-primary">Удалить</a>
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
            <?= form_open('Clients/all', ['class' => 'text-center']); ?>
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
<?= $this->endSection() ?>
