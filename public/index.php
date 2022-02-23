<?php

$page = $_GET['p'] ?? 'login';
$page = strip_tags($page);

/**
 * @param string $page
 * @param string $title
 */
function getPage(string $page, string $title): void
{
    require __DIR__ . '/../parts/header.php';
    require __DIR__ . '/../parts/pdo.php';
    // if the directory is utils
    if (isset($_GET['d']) && $_GET['d'] === 'u') {
        $page = sprintf(__DIR__ . "/../utils/%s.php", strtolower($title));
    }
    require file_exists($page) ? $page : __DIR__ . '/../pages/404.php';
    require __DIR__ . '/../parts/footer.php';
}

getPage(sprintf(__DIR__ . "/../pages/%s.php", strtolower($page)), ucfirst($page));