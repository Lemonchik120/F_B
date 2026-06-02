<?php
echo "test";
$host = 'db.hqzwusqtynqraknsowgv.supabase.co';
$user = 'postgres';
$pass = 'WgG1PXEEhJqqXe12';
$db   = 'postgres';
$port = 5432; // Порт для Supabase

// Встановлюємо з'єднання: хост, юзер, пароль, база, порт
$conn = mysqli_connect($host, $user, $pass, $db, $port);

// Перевірка з'єднання
if (!$conn) {
    die("Помилка підключення: " . mysqli_connect_error());
}

// Встановлюємо кодування UTF-8
mysqli_set_charset($conn, "utf8");
?>
