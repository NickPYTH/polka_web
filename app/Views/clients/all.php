<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>
<div class="container grid-lg">
    <div class="columns">
        <div class="container">
            <div class="columns">
                <?php if (!empty($rating) && is_array($rating)) : ?>
                    <?php foreach ($rating as $item): ?>
                        <div class="column col-4">
                            <div style="height: 500px; margin-bottom: 15px;" class="card">
                                <div class="card-image">
                                    <img class="img-responsive" src="<?= esc($item['pictureUrl']); ?>">
                                </div>
                                <div style="height: 150px; margin-bottom: 5px;" class="card-header">
                                    <h2 class="card-title"><?= esc($item['FIO']); ?></h2>
                                </div>
                                <div class="card-body">
                                    <a href="<?= base_url()?>/clients/edit/<?= esc($item['FIO']); ?>" class="btn">Редактировать</a>
                                    <a href="<?= base_url()?>/clients/delete/<?= esc($item['id']); ?>" class="btn">Удалить</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
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
