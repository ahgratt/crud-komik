<?= $this->extend('layout/tamplate'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <table class="table">
                <h1 class='mt-2'>Daftar Komik</h1>
                <a href="/komik/create" class="btn btn-primary">Tamabah Data Komik</a>
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($komik as $k):
                        ?>
                        <tr>
                            <th scope="row">
                                <?= $k['id'] ?>
                            </th>
                            <td><img src="img/<?= $k['sampul'] ?>" class="sampul"></td>
                            <td>
                                <?= $k['judul'] ?>
                            </td>
                            <td>
                                <a href="/komik/<?= $k['slug'] ?>" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>