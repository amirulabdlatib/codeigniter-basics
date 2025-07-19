<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1 class="fs-4">Create comic page</h1>

    <?php if ($validation): ?>
        <?= $validation?->listErrors() ?>
    <?php endif; ?>

    <div class="col">
        <div class="row">
            <form action=<?= base_url('comic/save'); ?> method="POST">
                <?= csrf_field(); ?>
                <div class="form-group row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input
                            type="text"
                            class="form-control <?= $validation?->hasError('title') ? 'is-invalid' : '' ?>"
                            id="title"
                            placeholder="comic title"
                            name="title"
                            value="<?= old('title'); ?>"
                            autofocus>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="writer" class="col-sm-2 col-form-label">Writer</label>
                    <div class="col-sm-10">
                        <input
                            type="text"
                            class="form-control <?= $validation?->hasError('writer') ? 'is-invalid' : '' ?>"
                            id="writer"
                            placeholder="comic writer"
                            name="writer"
                            value="<?= old('writer'); ?>">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="editor" class="col-sm-2 col-form-label">Editor</label>
                    <div class="col-sm-10">
                        <input
                            type="text"
                            class="form-control <?= $validation?->hasError('editor') ? 'is-invalid' : '' ?>"
                            id="editor"
                            placeholder="comic editor"
                            name="editor"
                            value="<?= old('editor'); ?>">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="cover" class="col-sm-2 col-form-label">Image Cover</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control <?= $validation?->hasError('cover') ? 'is-invalid' : '' ?>"
                            id="cover"
                            placeholder="comic cover"
                            name="cover">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>