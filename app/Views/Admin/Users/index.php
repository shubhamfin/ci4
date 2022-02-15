<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Admin Panel</h1>
    <h3>user list</h3>
    <?php if ($users) : ?>
        <ul>
            <?php foreach ($users as $user) : ?>
                <li>

                    <?= $user->name ?>,<?= $user->email ?>
                    <?= anchor(site_url('/admin/users/show/') . $user->id, 'View Detail') ?>
                </li>
            <?php endforeach ?>
        </ul>
        <?= $pager->links() ?>
    <?php else : ?>
        <p>No user record found</p>
    <?php endif ?>
    <p><?= anchor(site_url('/admin/users/new'),'Add new User') ?></p>
</body>

</html>