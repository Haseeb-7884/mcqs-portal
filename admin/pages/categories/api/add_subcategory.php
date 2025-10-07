<?php
header('Content-Type: application/json');
require_once 'db_config.php';

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['category_id']) || empty($data['category_id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Category ID is required']);
    exit;
}

if (!isset($data['name']) || empty($data['name'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Subcategory name is required']);
    exit;
}

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Check if category exists
    $stmt = $pdo->prepare("SELECT id FROM categories WHERE id = ?");
    $stmt->execute([$data['category_id']]);
    
    if ($stmt->rowCount() === 0) {
        http_response_code(404);
        echo json_encode(['error' => 'Category not found']);
        exit;
    }
    
    // Insert the new subcategory
    $stmt = $pdo->prepare("INSERT INTO sub_categories (sub_category_name, MCQs, category_id) VALUES (?, ?, ?)");
    $stmt->execute([$data['name'], $data['mcqs'] ?? 0, $data['category_id']]);
    
    $subcategoryId = $pdo->lastInsertId();
    echo json_encode(['success' => true, 'id' => $subcategoryId]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>