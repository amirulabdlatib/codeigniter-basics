<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="mb-4">Register Comic</h1>
                <a href="<?= base_url('comic/create'); ?>" class="btn btn-primary mb-3">Add Comic</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($comics as $comic): ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><img src="/img/<?= $comic['cover']; ?>" alt="" class="cover"></td>
                            <td><?= $comic['title']; ?></td>
                            <td>
                                <a href="<?= base_url('comic/detail/' . $comic['slug']); ?>" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>