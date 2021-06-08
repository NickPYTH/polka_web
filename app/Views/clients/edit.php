<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>
<div class="container mt-5" style="max-width: 540px;">



    <div class="row">

        <div class="col-12 d-flex justify-content-center">

            <div class="card" style="width: 28rem;" >
                <img src="<?= $rating["pictureUrl"] ?>"  class="mt-3 card-img-top" height="100px" width="100px" alt="...">
                <div class="card-body text-center">
                    <?= form_open_multipart('Clients/update'); ?>
                    <input type="hidden" name="id" value="<?= $rating["id"] ?>">
                    <div class="form-group">
                        <label for="name">FIO</label>
                        <input type="text" class="form-control <?= ($validation->hasError('FIO')) ? 'is-invalid' : ''; ?>" name="FIO"
                               value="<?= $rating["FIO"]; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('FIO') ?>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="birthday">Изображение</label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" accept="image/*" class="custom-file-input" id="inputGroupFile01" name="picture" aria-describedby="inputGroupFileAddon01" value="<?= $rating["pictureUrl"]?>" required>
                                <label class="custom-file-label" for="inputGroupFile01">Выберите новый файл</label>
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-secondary" name="submit">Сохранить</button>
                        </div>
                        </form>
                    </div>
                </div>



            </div>
<?= $this->endSection() ?>
