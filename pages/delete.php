<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: /index.php');
    exit();
}

$stmt = $db->prepare("DELETE FROM hiking WHERE id = :id");
$id = (int) $_GET['id'];
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    header('Location: ' . __DIR__ . '/../pages/read.php');
}