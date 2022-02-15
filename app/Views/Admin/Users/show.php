<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>User details</h1>
    <h3><?= $user->name ?></h3>
    <?= anchor(site_url('/admin/users/edit/'.$user->id),'edit')?>
    <br>
    <?= anchor('/admin/users','go back') ?>
</body>

</html>