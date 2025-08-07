<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

require_once dirname(__DIR__) . '/core/app.php';
require_once dirname(__DIR__) . '/core/controller.php';
require_once dirname(__DIR__) . '/app/configs/database.php';

new App();
