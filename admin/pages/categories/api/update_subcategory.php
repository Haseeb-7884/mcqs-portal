<?php
header('Content-Type: application/json');
require_once 'db_config.php';

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['id']) || empty($data['id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Subcategory ID is required']);
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
    
    $stmt = $pdo->prepare("UPDATE sub_categories SET sub_category_name = ?, MCQs = ? WHERE id = ?");
    $stmt->execute([$data['name'], $data['mcqs'] ?? 0, $data['id']]);
    
    if ($stmt->rowCount() > 0) {
        echo json_encode(['success' => true, 'message' => 'Subcategory updated successfully']);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Subcategory not found or no changes made']);
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>