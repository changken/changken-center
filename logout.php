<?php
require_once("load.php");

$session->logout();//使用登出函數

//blade
echo $view->view()->make('tpl.msg', [
    'title' => '登出中...',
    'status' => '1',
    'msg' => '登出中...',
    'redirectTo' => 'login.php'
])->render();