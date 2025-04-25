<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <h2 class="mb-4">Dashboard Admin</h2>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <a href="/admin/create" class="btn btn-primary mb-3">Tambah Blog</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Gambar</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($porto as $b) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= esc($b['judul']); ?></td>
                    <td>
                        <img src="/img/gambar/<?= esc($b['gambar']); ?>" width="100">
                    </td>
                    <td><?= esc($b['deskripsi']); ?></td>
                    <td>
                        <a href="/admin/detail/<?= esc($b['slug']); ?>" class="btn btn-info btn-sm">Detail</a>
                        <a href="/admin/edit/<?= esc($b['slug']); ?>" class="btn btn-warning btn-sm">Edit</a>
                        <form action="/admin/delete/<?= esc($b['id']); ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin hapus?');">
                            <?= csrf_field(); ?>
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>
