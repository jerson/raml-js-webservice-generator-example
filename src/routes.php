<?php

$app->mount('/', new Controller\MovieController());
$app->mount('/', new Controller\NewsController());
$app->mount('/', new Controller\AutorController());
$app->mount('/', new Controller\ActorController());
$app->mount('/', new Controller\GenreController());
$app->mount('/', new Controller\LinkWatchController());
$app->mount('/', new Controller\LinkDownloadController());


