<?php
header('Content-Type: application/json');

include 'db_connect.php';

// Запрос на получение доступных дат
$sql = "SELECT DISTINCT date FROM consultation WHERE is_busy = 0";
$stmt = $pdo->query($sql);
$dates = $stmt->fetchAll(PDO::FETCH_COLUMN);

// Возвращаем результат в формате JSON
echo json_encode($dates);
?>
