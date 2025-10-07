<?php
header('Content-Type: application/json');
require_once 'db_config.php';

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Get all categories
    $stmt = $pdo->query("SELECT * FROM categories ORDER BY category_name");
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Get subcategories for each category
    foreach ($categories as &$category) {
        $stmt = $pdo->prepare("SELECT * FROM sub_categories WHERE category_id = ? ORDER BY sub_category_name");
        $stmt->execute([$category['id']]);
        $category['subcategories'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Calculate total MCQs
        $totalMCQs = 0;
        foreach ($category['subcategories'] as $sub) {
            $totalMCQs += $sub['MCQs'];
        }
        $category['totalMCQs'] = $totalMCQs;
    }
    
    echo json_encode($categories);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>