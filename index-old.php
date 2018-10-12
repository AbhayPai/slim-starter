<?php

require 'vendor/autoload.php';

$settings = require 'config/settings.php';

// New Slim app instance
$app = new Slim\App($settings);

require 'config/dependencies.php';

require 'config/routes.php';

// Run Slim
$app->run();
