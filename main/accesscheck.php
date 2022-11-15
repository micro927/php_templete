<?php
// mostly use for API

// $whitelist = ['172.18.0.8', '172.16.0.239', '172.16.0.242', '10.20.30.230', '10.20.30.229', '202.28.25.59', '0.0.0.0', '::1', '202.28.25.57', '10.151.0.80', '10.110.1.21', '10.151.6.80'];
$whitelist = ['0.0.0.0', '::1', 'localhost', '10.20.30.*', '202.28.25.57']; // DEV & REG STAFF

function isAllowed($ip)
{
    global $whitelist;
    $match = false;
    foreach ($whitelist as $list) {
        $list = rtrim($list, "*\r\n\t\0 ");
        if (substr($ip, 0, strlen($list)) == $list) {
            $match = true;
            break;
        }
    }
    return $match;
}


if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $client_ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $client_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $client_ip = $_SERVER['REMOTE_ADDR'];
}

if (!isAllowed($client_ip)) {
    exit('ERROR : access origin denied ' . $client_ip);
}
