<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-12 text-center">
            <h3>Вход</h3>
        </div>
        <div class="col-12">
            <?php echo form_open('auth/login', 'class="form-group"');?>
            <div class="form-group">
                <?php if (isset($message)): ?>
                    <div class="alert alert-danger text-center">Ошибка авторизации</div>
                <?php endif ?>
                <label for="exampleInputEmail1">Почта</label>
                <?php echo form_input($identity, '','type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required');?>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Пароль</label>
                <?php echo form_input($password, '','type="password" class="form-control" id="exampleInputPassword1" required');?>
            </div>
            <div class="form-group form-check">
                <label class="form-check-label mr-4"  for="exampleCheck1">Запомнить меня</label>
                <?php echo form_checkbox('remember', '1', false, 'class="form-check-input" id="remember" ');?>
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
            <a href="<?= base_url()?>/auth/forgot_password" class="btn btn-link">Забыли пароль</a>

            <?php echo form_close();?>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <h3>Регситрация</h3>
        </div>
        <div class="col-12">
            <?php echo form_open_multipart('auth/register_user', 'class="form-group"');?>

            <div class="form-group">
                <label >Имя</label>
                <input type="text" class="form-control" required name="Имя">
            </div>
            <div class="form-group">
                <label >Фамилия</label>
                <input type="text" class="form-control" required name="Фамилия">
            </div>
            <div class="form-group">
                <label >Email</label>
                <input type="email" class="form-control" required name="Email">
            </div>
            <div class="form-group">
                <label >Компания</label>
                <input type="text" class="form-control" required name="Компания">
            </div>
            <div class="form-group">
                <label >Телефон</label>
                <input type="text" class="form-control" required name="Телефон">
            </div>
            <div class="form-group">
                <label >Изображение</label>
                <input type="file" accept="image/*" class="form-control" id="inputGroupFile01" name="picture" aria-describedby="inputGroupFileAddon01">
            </div>
            <div class="form-group">
                <label >Пароль</label>
                <input type="password" class="form-control" required name="Пароль">
            </div>
            <div class="form-group">
                <label >Повторите пароль</label>
                <input type="password" class="form-control" required>
            </div>


            <?php echo form_submit('submit', lang('Зарегистрироваться'), 'class="btn btn-primary"');?>
            <a href="<?= base_url()?>/pages/agreement" class="btn btn-link">Пользовательское соглашение</a>

            <?php echo form_close();?>
        </div>
    </div>

<?= $this->endSection() ?>