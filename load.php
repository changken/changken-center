<?php
require_once("vendor/autoload.php");

use Changken\Core\Container;
use Changken\Providers\CoreProvider;

$container = new Container();

$coreProvider = new CoreProvider($container);

$member = $container->get('member');
$session = $container->get('session');
$view = $container->get('blade');

//為了適應blade
Auth::$session = $session;

$session->start();
