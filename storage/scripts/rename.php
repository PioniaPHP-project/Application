<?php

/**
 * Get the .env file
 * And the folder name as the APP_NAME
 */
$appDir = dirname(__DIR__, 2);

$file = $appDir . DIRECTORY_SEPARATOR . 'environment' . DIRECTORY_SEPARATOR . '.env';


if (file_exists($file)) {
    $env = file_get_contents($file);

    $env = explode("\n", $env);

    $env = array_filter($env, function ($line) {
        return !empty($line);
    });

    $env = array_map(function ($line) {
        return explode('=', $line);
    }, (array)$env);

    $env = array_reduce($env, function ($carry, $line) {
        $carry[$line[0]] = $line[1];
        return $carry;
    }, []);

    $env['APP_NAME'] = basename(rtrim($appDir, '/'));

    // Save the new .env file
    $env = array_map(function ($key, $value) {
        $res = $key . '=' . $value;
        return str_starts_with($res, '#') ? $res : $res . PHP_EOL;
    }, array_keys($env), $env);

    $env = implode("\n", $env);

    file_put_contents($file, $env);

}
