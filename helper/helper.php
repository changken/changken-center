<?php
/**
 * 取得資源的路徑函數
 *
 * @param string $path
 * @return string
*/
function asset(string $path)
{
    return "/node_modules/$path";
}

/**
 * 網址函數
 *
 * @param string $url
 * @return string
*/
function url(string $url)
{
    return URL . "/$url";
}
