<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>

<div class="container" style="max-width: 540px; margin-top:100px;">
    <div class="row">
        
        <div class="col-12 d-flex justify-content-center">

            <div class="card" style="width: 28rem;">
            <img src="/profile.svg"  class="mt-3 card-img-top" height="100px" width="100px" alt="...">
            <div class="card-body text-center">
            <div class="form-group">
                    <label for="name">Имя</label>
                    <div type="email" class="form-control">
                        <?php echo $ionAuth->user()->row()->first_name; ?>
                    </div>
                    <div class="invalid-feedback">
                        
                    </div>

                </div>
                <div class="form-group">
                    <label for="name">Фамилия</label>
                    <div type="email" class="form-control">
                        <?php echo $ionAuth->user()->row()->second_slave; ?>
                    </div>
                    <div class="invalid-feedback">
                        
                    </div>

                </div>
                <div class="form-group">
                    <label for="name">Компания</label>
                    <div type="email" class="form-control">
                        <?php echo $ionAuth->user()->row()->company; ?>
                    </div>
                    <div class="invalid-feedback">
                        
                    </div>

                </div>
                <div class="form-group">
                    <label>Email</label>
                    <div type="email" class="form-control">
                        <?php echo $ionAuth->user()->row()->email; ?>
                    </div>
                    <div class="invalid-feedback">
                    </div>
                </div>
                <div class="form-group">
                    <label>Телефон</label>
                    <div type="email" class="form-control">
                        <?php echo $ionAuth->user()->row()->phone; ?>
                    </div>
                    <div class="invalid-feedback">
                    </div>
                </div>
                
            </div>
            </div>
        
        

        </div>
<?= $this->endSection() ?>