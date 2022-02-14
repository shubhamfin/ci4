<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?> Signup <?= $this->endSection() ?>
<?= $this->section('content') ?>


<?php if (session()->has('errors')) : ?>
    <ul>
        <?php foreach (session('errors') as $error) :  ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
    </ul>
<?php endif ?>

<!-- SignUp form -->
<?= form_open('/signup/create') ?>
<div>
    <label for="username">User name</label>
    <input id="username" type="text" name="name" placeholder="Username" value="<?= old('name') ?>" />
</div>

<input type="text" name="email" placeholder="Email" value="<?= old('email') ?>" />
<input type="password" name="password" placeholder="Password" />
<input type="password" name="password_cnf" placeholder="Confirm Password " />
<button>Sign Up</button>
<?= anchor(site_url('./'),'Cancle')?>
<?= form_close() ?>
<?= $this->endSection() ?>