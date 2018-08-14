<?php
require_once("load.php");

$row = $member->getUserinfoBn($session->getUsername());

//blade
echo $view->view()->make('update', [
    'row' => $row
])->render();
