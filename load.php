<?php
require_once("vendor/autoload.php");

$container = new Container();

$member = $container->get('member');
$session = $container->get('session');

$session->start();