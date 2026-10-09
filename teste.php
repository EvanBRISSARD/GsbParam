<?php

if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Zone protégée"');
    header('HTTP/1.0 401 Unauthorized');
    exit;
}

$login = $_SERVER['PHP_AUTH_USER'];
$password = $_SERVER['PHP_AUTH_PW'];

if ($login !== 'admin' || $password !== '1234') {
    header('WWW-Authenticate: Basic realm="Zone protégée"');
    header('HTTP/1.0 401 Unauthorized');
    exit;
}

echo "Bienvenue $login !";
?>