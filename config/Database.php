<?php
define('DB_HOST', 'localhost');
define('DB_ROOT', 'root');
define('DB_PASS', '');
define('DB_NAME', '');

try {
    $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_ROOT, DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Kết nối thất bại: " . $e->getMessage();
}
?>
