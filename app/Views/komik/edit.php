<?= $this->extend('layout/tamplate'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form ubah data komik</h2>
            <form action="/komik/update/<?= $komik['id'];?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $komik['slug'];?>">
                <input type="hidden" name="sampulLama" value="<?= $komik['sampul']; ?>">
                <div class="form-group row">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?=  (session('validation')) ? 'is-invalid' : '';  ?>" id="judul" name="judul" autofocus value="<?=(old('judul')) ? old('judul') : $komik['judul'] ?>">
    
                        <?php if (session('validation') && session('validation')->hasError('judul')) : ?>
                            <div class="invalid-feedback">
                                <?= session('validation')->getError('judul'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penulis" name="penulis" value="<?=(old('penulis')) ? old('penulis') : $komik['penulis'] ?>">
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penerbit" name="penerbit"value="<?=(old('penerbit')) ? old('penerbit') : $komik['penerbit'] ?>">
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-2">
                        <img src="/img/<?= $komik['sampul']; ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="mb-3">
                            <label for="sampul" class="form-label"><?= $komik['sampul']; ?></label>
                            <input class="form-control <?=  (session('validation')) ? 'is-invalid' : '';  ?>" type="file" id="sampul" name="sampul" onchange="previewImg()" value="<?= old('sampul'); ?>">
                            <?php if (session('validation') && session('validation')->hasError('sampul')) : ?>
                            <div class="invalid-feedback">
                                <?= session('validation')->getError('sampul'); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>