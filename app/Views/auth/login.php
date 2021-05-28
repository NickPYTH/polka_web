<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>
<div style="margin-top:50px;" class="container grid-lg text-center">
   <div class="docs-demo columns">
      <div class="column">
      <?php echo form_open('auth/login');?>
         <?php if (isset($message)): ?>
        <div class="alert alert-danger text-center">Ошибка авторизации</div>
        <?php endif ?>
            <div class="form-group">
               <label class="form-label" for="input-example-1">Email</label>
               <?php echo form_input($identity, '','class="form-input" placeholder="Email" required');?>
            </div>
            <div class="form-group">
               <label class="form-label" for="input-example-2">Пароль</label>
               <?php echo form_input($password, '','class="form-input" placeholder="Пароль" required');?>
            </div>
            <div class="form-group">
                <label>Запомнить меня</label>
                <?php echo form_checkbox('remember', '1', false, 'id="remember" ');?>
            </div>
            <div class="form-group">
               <?php echo form_submit('submit', lang('Войти'), 'class="btn btn-primary"');?>
               <a href="<?= base_url()?>/auth/forgot_password" class="btn btn-link">Забыли пароль</a>
            </div>
            <?php echo form_close();?>
      </div>
      <div class="divider-vert" data-content="Или"></div>

      <div class="column">
        <?php echo form_open_multipart('auth/register_user');?>
            <div class="form-group">
               <label class="form-label">Имя</label>
               <input class="form-input"type="text" placeholder="Имя" name="Имя">
            </div>
            <div class="form-group">
               <label class="form-label">Фамилия</label>
               <input class="form-input" type="text" placeholder="Фамилия" name="Фамилия">
            </div>
            <div class="form-group">
               <label class="form-label">Email</label>
               <input class="form-input" type="email" placeholder="email" name="email">
            </div>
            <div class="form-group">
               <label class="form-label">Компания</label>
               <input class="form-input" type="text" placeholder="Компания" name="Компания">
            </div>
            <div class="form-group">
               <label class="form-label">Телефон</label>
               <input class="form-input" type="text" placeholder="Телефон" name="Телефон">
            </div>
            <div class="form-group">
               <label class="form-label">Телефон</label>
               <input type="file" accept="image/*" class="form-input" id="inputGroupFile01" name="picture" aria-describedby="inputGroupFileAddon01">
            </div>
            <div class="form-group">
               <label class="form-label">Пароль</label>
               <input class="form-input" type="text" placeholder="Пароль" name="Пароль" id="pass">
            </div>
            <div class="form-group">
               <label class="form-label">Подтвердите пароль</label>
               <input class="form-input" type="text" placeholder="Повторите пароль" id="confirm_pass">
            </div>
            <div class="form-group">
               <?php echo form_submit('submit', lang('Зарегистрироваться'), 'class="btn btn-primary btn-block"');?>
               <a href="<?= base_url()?>/pages/agreement" class="btn btn-link">Пользовательское соглашение</a>
            </div>
            <?php echo form_close();?>
      </div>
   </div>
</div>

<?= $this->endSection() ?>