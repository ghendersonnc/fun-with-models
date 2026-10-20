<?php
declare(strict_types=1);

$phpVersion = PHP_VERSION;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nginx + PHP</title>
</head>
<body>
    <main>
        <h1>Nginx + PHP is running</h1>
        <p>Nginx is serving this page and PHP-FPM is executing it.</p>
        <p>PHP version: <code><?= htmlspecialchars($phpVersion, ENT_QUOTES, 'UTF-8') ?></code></p>
    </main>
</body>
</html>
