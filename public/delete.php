<?php
require_once __DIR__ . '/../config/connection.php';
$id = $_GET['id'] ?? null;
if ($id) {
    $stmt = $pdo->prepare("DELETE FROM cloud_engineers WHERE id = :id");
    $stmt->execute([':id' => $id]);
}
header('Location: index.php');
exit;
