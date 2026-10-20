<?php
declare(strict_types=1);

/**
 * @throws JsonException
 */
function renderViteAssets(string $publicDirectory): string
{
    $hotFile = $publicDirectory . '/assets/vite-hot';
    if (is_file($hotFile)) {
        $viteUrl = rtrim(trim(file_get_contents($hotFile)), '/');
        $escapedViteUrl = htmlspecialchars($viteUrl, ENT_QUOTES, 'UTF-8');

        return '<script type="module" src="' . $escapedViteUrl . '/@vite/client"></script>' . PHP_EOL
            . '<script type="module" src="' . $escapedViteUrl . '/frontend/js/main.js"></script>';
    }

    $manifestPath = $publicDirectory . '/assets/build/.vite/manifest.json';
    if (!is_file($manifestPath)) {
        http_response_code(503);
        exit('Frontend assets have not been built. Run docker compose up --build.');
    }

    $manifest = json_decode(
        file_get_contents($manifestPath),
        true,
        512,
        JSON_THROW_ON_ERROR
    );

    $entry = $manifest['frontend/js/main.js'];
    $tags = [];

    foreach ($entry['css'] ?? [] as $stylesheet) {
        $assetUrl = htmlspecialchars('/assets/build/' . $stylesheet, ENT_QUOTES, 'UTF-8');
        $tags[] = '<link rel="stylesheet" href="' . $assetUrl . '">';
    }

    $scriptUrl = htmlspecialchars('/assets/build/' . $entry['file'], ENT_QUOTES, 'UTF-8');
    $tags[] = '<script type="module" src="' . $scriptUrl . '"></script>';

    return implode(PHP_EOL, $tags);
}
