<?php
require_once("vendor/autoload.php");

$container = new Container();

$coreProvider = new CoreProvider($container);

$member = $container->get('member');
$session = $container->get('session');

$session->start();