<?= $this->extend('templates/layout'); echo strlen($message)?>
<?= $this->section('content') ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-12 text-center">
                <h1>Регистрация</h1>
                <?php if (isset($message)): ?>
                <?php endif ?>
                <?php echo form_open_multipart('auth/register_user');?>
                <div class="form-group">
                    <label>Имя</label>
                    <input type="text" class="form-control" name="Имя">
                </div>
                
                <div class="form-group">
                    <label>Фамилия</label>
                    <input type="text" class="form-control" name="Фамилия" required>
                </div>

                <div class="form-group">
                    <label>email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                
                <div class="form-group">
                    <label>Компания</label>
                    <input type="text" class="form-control" name="Компания" required>
                </div>

                <div class="form-group">
                    <label>Телефон</label>
                    <input type="text" class="form-control" name="Телефон" required>
                </div>
                
                <div class="form-group">
                    <label>Пароль</label>
                    <input type="password" class="form-control" name="Пароль" required>
                </div>

                <div class="form-group">
                    <label>Подтвердите пароль</label>
                    <input type="password" class="form-control" name="Подтвердите пароль" required>
                </div>

                <div class="form-group">
                    <label for="birthday">Изображение</label>
                    <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" accept="image/*" class="custom-file-input" id="inputGroupFile01" name="picture" aria-describedby="inputGroupFileAddon01" required>
                        <label class="custom-file-label" for="inputGroupFile01">Выберите файл</label>
                        <div class="invalid-feedback">
                    </div>
                    </div>
                </div>
                <div class="mb-3">
                    <?php echo form_submit('submit', lang('Зарегистрироваться'), 'class="btn btn-primary"');?>
                </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>