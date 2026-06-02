<?php
$host = 'db.hqzwusqtynqraknsowgv.supabase.co';
$db   = 'postgres';
$user = 'postgres';
$pass = 'WgG1PXEEhJqqXe12';
$port = 6543; // Supabase використовує 6543 для прямого підключення

try {
    // Важливо: використовуємо 'pgsql' замість 'mysql'
    $dsn = "pgsql:host=$host;port=$port;dbname=$db;sslmode=require";
    $conn = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Помилка підключення: " . $e->getMessage());
}
?>
