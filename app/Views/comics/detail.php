<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= $comic['cover']; ?>" class="img-fluid rounded-start" alt="<?= $comic['title']; ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $comic['title']; ?></h5>
                            <p class="card-text">Writer: <?= $comic['writer']; ?></p>
                            <p class="card-text"><small class="text-muted">Editor <?= $comic['editor']; ?></small></p>

                            <a href="<?= base_url('/comic/edit/' . $comic['id']); ?>" class="btn btn-warning">Edit</a>

                            <form action="<?= base_url('/comic/delete/' . $comic['id']); ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">

                                <button
                                    type="submit"
                                    class="btn btn-danger"
                                    onclick="return confirm('Are you sure to delete?')">
                                    Delete
                                </button>
                            </form>

                            <br>

                            <a href="<?= base_url('/comic'); ?>">Back to comic list page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>