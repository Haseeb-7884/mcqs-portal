<?php
header('Content-Type: application/json');
require_once 'db_config.php';

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['name']) || empty($data['name'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Category name is required']);
    exit;
}

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $pdo->prepare("INSERT INTO categories (category_name, description) VALUES (?, ?)");
    $stmt->execute([$data['name'], $data['description'] ?? '']);
    
    $categoryId = $pdo->lastInsertId();
    echo json_encode(['success' => true, 'id' => $categoryId]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>