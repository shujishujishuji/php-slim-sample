<?php
use htdocs\SlimController\controllers\SeveralHelloController;
use htdocs\SlimController\controllers\ConstructorController;

$app->setBasePath("/slimcontroller/public");

$app->any("/several/showFirst", SeveralHelloController::class.":showFirst");
$app->any("/several/showSecond", SeveralHelloController::class.":showSecond");
$app->any("/constructor/helloWithContainer", ConstructorController::class.":helloWithContainer");