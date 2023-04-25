<?php 

/* 

    SUPERGLOBALS
        $GLOBALS
        $_SERVER
        $_GET
        $_POST
        $_FILES
        $_COOKIE
        $_SESSION
        $_REQUEST
        $_ENV

*/


$server = [
    'name' => $_SERVER['SERVER_NAME'],
    'hostHeader' => $_SERVER['HTTP_HOST'],
    'software' => $_SERVER['SERVER_SOFTWARE'],
    'documentRoot' => $_SERVER['DOCUMENT_ROOT'],
    'currentPage' => $_SERVER['PHP_SELF'],
    'scriptName' => $_SERVER['SCRIPT_NAME'],
    'absolutePath' => $_SERVER['SCRIPT_FILENAME'],
];

$client = [
    'systemInfo' => $_SERVER['HTTP_USER_AGENT'],
    'ip' => $_SERVER['REMOTE_ADDR'],
    'remotePort' => $_SERVER['REMOTE_PORT'],
]
?>

