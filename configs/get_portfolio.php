<?php
// Устанавливаем заголовок ответа как JSON, чтобы клиент мог понять тип данных
header('Content-Type: application/json');

// Подключаем файл с настройками базы данных
include 'db_connect.php';

// Получаем тип портфолио из GET запроса, если он был предоставлен
$type = isset($_GET['type']) ? $_GET['type'] : '';

// Формируем SQL запрос для выборки данных из таблицы портфолио
$sql = "SELECT * FROM portfolio";

// Если указан тип портфолио, добавляем условие WHERE для фильтрации по типу
if ($type) {
    $sql .= " WHERE type = ?";
}

// Подготавливаем SQL запрос для выполнения
$stmt = $pdo->prepare($sql);

// Если указан тип портфолио, передаем его как параметр для выполнения запроса
if ($type) {
    $stmt->execute([$type]);
} else {
    // Иначе, просто выполняем запрос без параметров
    $stmt->execute();
}

// Получаем все строки результата запроса в виде ассоциативного массива
$portfolio = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Выводим данные портфолио в формате JSON
echo json_encode($portfolio);
?>
