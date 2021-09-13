<?php

use steroids\core\base\WebApplication;
use steroids\core\boot\Boot;
use yii\helpers\ArrayHelper;

define('YII_DEBUG', true);
define('YII_ENV', 'test');
define('STEROIDS_ROOT_DIR', dirname(__DIR__));

$config = require(STEROIDS_ROOT_DIR . '/vendor/steroids/core/boot/preload.php');
$config = Boot::resolveConfig(ArrayHelper::merge($config, getTestsConfig()));

if (isset($config['components']['dbTest'])) {
    $config['components']['db'] = $config['components']['dbTest'];
}

Yii::setAlias('@tests', __DIR__);
$testsApplication = new WebApplication($config);

if (getenv('DO_DATABASE_RESET')) {
    resetTestsDatabase($testsApplication);
}


function getTestsConfig(): array
{
    $testsConfigFilePath = STEROIDS_ROOT_DIR . DIRECTORY_SEPARATOR . 'config-tests.php';

    if (!file_exists($testsConfigFilePath)) {
        exit("Please create $testsConfigFilePath config file and set up tests database");
    }

    return Boot::safeLoadConfig($testsConfigFilePath);
}

function resetTestsDatabase(WebApplication $application)
{
    $application->db->createCommand('DROP SCHEMA public CASCADE')->execute();
    $application->db->createCommand('CREATE SCHEMA public')->execute();

    $command = new \steroids\core\commands\MigrateCommand('migrate', $application);
    $command->interactive = false;
    $command->compact = true;
    $command->runAction('up');
}
