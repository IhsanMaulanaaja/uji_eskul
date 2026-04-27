<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';

$db = new PDO('sqlite:database/database.sqlite');
$result = $db->query('SELECT id, nama_lomba, foto FROM dokumentasi LIMIT 5');
$rows = $result->fetchAll(PDO::FETCH_ASSOC);

echo "Database Records:\n";
echo str_repeat("-", 80) . "\n";
foreach ($rows as $row) {
    echo "ID: {$row['id']}\n";
    echo "Nama Lomba: {$row['nama_lomba']}\n";
    echo "Foto: {$row['foto']}\n";
    echo str_repeat("-", 80) . "\n";
}
?>
