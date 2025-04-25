<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5">
    <h2><?= $blog['judul']; ?></h2>

    <img src="/assets/gambar/<?= $blog['sampul']; ?>" width="300" class="my-3">

    <p><?= nl2br($blog['isi']); ?></p>

    <a href="/admin" class="btn btn-secondary mt-3">Kembali ke Dashboard</a>
</div>

<?= $this->endSection(); ?>
