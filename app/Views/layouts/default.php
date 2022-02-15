<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?= $this->renderSection("title") ?></title>
</head>

<body>
    <span>
        <?= anchor(site_url('/'), 'Home') ?>
    </span>
    <span>
        <?= anchor(site_url('/tasks'), 'Tasks') ?>
    </span>
    <?php if (current_user()) : ?>

        <span>
            <?= anchor(site_url('logout'), 'Logout') ?>
        </span>
    <?php else : ?>
        <span>
            <?= anchor(site_url('login'), 'Login') ?>
        </span>

        <span>
            <?= anchor(site_url('signup'), 'Sign Up') ?>
        </span>

    <?php endif ?>
    <?php if (session()->has('warning')) : ?>
        <div class="warning">
            <?= session('warning') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->has('info')) : ?>
        <div class="info">
            <?= session('info') ?>
        </div>
    <?php endif; ?>

    <?= $this->renderSection("content") ?>

</body>

</html>