<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <h1><?= $heading ?>, Hello <?= $this->session->userdata('NAME'); ?></h1>

    <a href="<?= site_url('login/logout') ?>">Logout</a>
</body>
</html>