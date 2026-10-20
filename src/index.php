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
    <style>
        :root {
            color-scheme: light;
            font-family: system-ui, sans-serif;
            background: #f4f6f8;
            color: #17212b;
        }
        body {
            box-sizing: border-box;
            display: grid;
            min-height: 100vh;
            margin: 0;
            padding: 2rem;
            place-items: center;
        }
        main {
            width: min(100%, 38rem);
            padding: 2.5rem;
            border: 1px solid #dce3e9;
            border-radius: 1rem;
            background: white;
            box-shadow: 0 1rem 3rem #17212b12;
        }
        h1 { margin-top: 0; }
        code {
            padding: .2rem .45rem;
            border-radius: .3rem;
            background: #eef2f5;
        }
    </style>
</head>
<body>
    <main>
        <h1>Nginx + PHP is running</h1>
        <p>Nginx is serving this page and PHP-FPM is executing it.</p>
        <p>PHP version: <code><?= htmlspecialchars($phpVersion, ENT_QUOTES, 'UTF-8') ?></code></p>
    </main>
</body>
</html>
