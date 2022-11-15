<?php
$page = basename($_SERVER['PHP_SELF']);
$php_page = 'php/php_' . $page;
if (file_exists($php_page)) {
    include($php_page);
}
