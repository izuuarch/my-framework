<?php

require_once '../../Classes/Connection.php';

use App\Classes\Connection;

$files = scandir('./');
$migrations;
$migration_files;
foreach ($files as $file) {
    if (mime_content_type($file) == 'text/plain') {
        $migration_files[] = $file;
        $migrations[] = substr($file, 0, strpos($file, '.'));
    }
}

foreach ($migration_files as $migration_file) {
    migrate($migration_file);
}

function migrate($file)
{
    global $env;
    $pdo_conn = Connection::get_connection();

    try {
        $sql = "DROP TABLE IF EXISTS `" . substr($file, 0, strpos($file, '.')) . "`;";
        $sql .= file_get_contents($file);
        $stmt = $pdo_conn->prepare($sql);
        $stmt->execute();
    } catch (\PDOException $e) {
        throw $e;
    }
}
