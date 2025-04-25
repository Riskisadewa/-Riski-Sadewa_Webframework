<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5">
    <h2>Edit Blog</h2>

    <form action="/admin/update/<?= $blog['id']; ?>" method="post">
        <?= csrf_field(); ?>

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control <?= isset($errors['judul']) ? 'is-invalid' : ''; ?>" value="<?= old('judul', $blog['judul']); ?>">
            <div class="invalid-feedback">
                <?= $errors['judul'] ?? ''; ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="6" class="form-control"><?= old('deskripsi', $blog['deskripsi']); ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar Saat Ini</label><br>
            <img src="/img/gambar/'<?= $blog['gambar']; ?>" width="150" class="mb-2">
        </div>

        <input type="hidden" name="sampul" value="<?= $blog['gambar']; ?>">

        <button type="submit" class="btn btn-warning">Update</button>
        <a href="/admin" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= $this->endSection(); ?>
