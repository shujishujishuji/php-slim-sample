<?php
use htdocs\SlimMiddle\controllers\SlimMiddleController;
use htdocs\SlimMiddle\middlewares\RecordIPAddress;
use htdocs\SlimMiddle\middlewares\RecordIPAddressBefore;
use htdocs\SlimMiddle\middlewares\BeforeAndAfter;
use htdocs\SlimMiddle\middlewares\Outer;
use htdocs\SlimMiddle\middlewares\RecordIPAddressToLog;


$app->setBasePath("/slimmiddle/public");
$app->any("/doRecordIPAddress", SlimMiddleController::class.":middlewareTest")->add(new RecordIPAddress());
$app->any("/doRecordIPAddressBefore", SlimMiddleController::class.":middlewareTest")->add(new RecordIPAddressBefore());
$app->any("/beforeAndAfter", SlimMiddleController::class.":middlewareTest")->add(new BeforeAndAfter());
$app->any("/nested", SlimMiddleController::class.":middlewareTest")->add(new BeforeAndAfter())->add(new Outer());
$app->any("/doRecordIPAddressToLog", SlimMiddleController::class.":middlewareTest")->add(new RecordIPAddressToLog($container));
