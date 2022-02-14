<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?> Login <?= $this->endSection() ?>
<?= $this->section('content') ?>


<?php if (session()->has('errors')) : ?>
    <ul>
        <?php foreach (session('errors') as $error) :  ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
    </ul>
<?php endif ?>

<!-- SignUp form -->
<?= form_open('/login/create') ?>

<div>
    <label for="email">Eamil</label>
    <input type="text" id="email" name="email" placeholder="Email" value="<?= old('email') ?>" />
</div>
<div>
    <label for="password">Password</label>
    <input id="password" type="password" name="password" placeholder="Password" />
</div>


<button>Log in</button>
<?= anchor(site_url('./signup'), 'Signup') ?>
<?= form_close() ?>
<?= $this->endSection() ?>