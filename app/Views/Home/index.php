<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Home<?= $this->endSection() ?>

<?= $this->section("content") ?>

<h1>Welcome
    <?php if (current_user() !== null) : ?>
        <?= esc(current_user()->name) ?>
    <?php endif ?>
</h1>





<?= $this->endSection() ?>