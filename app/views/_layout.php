<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?? 'PHP MVC App' ?></title>
    <meta name="description" content="<?= $description ?? 'A simple PHP MVC application' ?>">

    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link href="/css/globals.css" rel="stylesheet">
  </head>

  <body>
    <?php require_once '_components/header.php'; ?>
    <?= $content ?>
  </body>
</html>
