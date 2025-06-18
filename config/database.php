<?php
// config/database.php
$dsn = 'mysql:host=localhost;dbname=site_gamer;charset=utf8';
$user = 'root';
$pass = '';
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die('Erro no BD: ' . $e->getMessage());
}
