<?php
header('Content-Type: application/json');

include 'db_connect.php';

// Получение выбранной даты из GET параметра
$date = $_GET['date'];

// Запрос на получение доступного времени для выбранной даты
$sql = "SELECT time FROM consultation WHERE date = ? AND is_busy = 0";
$stmt = $pdo->prepare($sql);
$stmt->execute([$date]);
$times = $stmt->fetchAll(PDO::FETCH_COLUMN);

// Возвращаем результат в формате JSON
echo json_encode($times);
?>
