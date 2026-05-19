<?php

function e($value)
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function format_price($value)
{
    return number_format((float)$value, 2, ',', '.');
}

function app_url($path = '')
{
    $scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
    $scriptDir = rtrim($scriptDir, '/');

    foreach (['/actions', '/ajax', '/pages'] as $folder) {
        if (substr($scriptDir, -strlen($folder)) === $folder) {
            $scriptDir = substr($scriptDir, 0, -strlen($folder));
            break;
        }
    }

    if ($scriptDir === '/' || $scriptDir === '.') {
        $scriptDir = '';
    }

    return $scriptDir . '/' . ltrim($path, '/');
}

function redirect_to($path)
{
    header('Location: ' . app_url($path));
    exit();
}

function set_flash($key, $message)
{
    $_SESSION['flash'][$key] = $message;
}

function get_flash($key)
{
    if (!isset($_SESSION['flash'][$key])) {
        return null;
    }

    $message = $_SESSION['flash'][$key];
    unset($_SESSION['flash'][$key]);

    return $message;
}
