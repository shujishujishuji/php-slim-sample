<?php
use Slim\Factory\AppFactory;
require_once($_SERVER["DOCUMENT_ROOT"]."/slimcontainer/vendor/autoload.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/slimcontainer/containerSetups.php");
$app = AppFactory::create();
require_once($_SERVER["DOCUMENT_ROOT"]."/slimcontainer/routes.php");
$app->run();
