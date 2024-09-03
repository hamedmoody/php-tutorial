<?php
mysqli_report(MYSQLI_REPORT_ERROR);

$db = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$db) {

    $db_error = mysqli_connect_error();

    file_put_contents(
        'db-error.txt',
        date('Y-m-d H:i:s ') . ' => ' . $db_error . PHP_EOL,
        FILE_APPEND
    );

    include( 'partial/db-error.php' );
    exit;

}

function db(){
    global $db;
    return $db;
}