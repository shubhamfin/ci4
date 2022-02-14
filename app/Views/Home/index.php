<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Home<?= $this->endSection() ?>

<?= $this->section("content") ?>

<h1>Welcome
    <?php if (current_user() !== null) : ?>
        <?= esc(current_user()->name) ?>
    <?php endif ?>
</h1>

<?php if (current_user()) : ?>
    <?= anchor(site_url('logout'), 'Logout') ?>
<?php endif ?>
<?= anchor(site_url('login'), 'Login') ?>
<?= anchor(site_url('signup'), 'Sign Up') ?>

<?= $this->endSection() ?>