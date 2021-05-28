<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>
      <div class="container mt-5">
            <div class="row justify-content-center">
                  <div class="col-12 text-center">
                        <p class="h3">Напишите свой  e-mail, для отправки письма восстановления пароля</p>

                        <div id="infoMessage"><?php echo $message;?></div>

                        <?php echo form_open('auth/forgot_password');?>

                              <p>
                                    <?php echo form_input($identity, );?>
                              </p>

                              <p><?php echo form_submit('submit', lang('Отправить'),'class="btn btn-primary"' );?></p>

                        <?php echo form_close();?>
                  </div>
            </div>
      </div>

<?= $this->endSection() ?>