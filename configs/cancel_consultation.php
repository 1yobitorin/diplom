<?php
include 'db_connect.php';

// Получение данных из POST запроса
$phone = $_POST['phone'];

// Проверка, что номер телефона присутствует
if ($phone) {
    try {
        // Проверка, существует ли номер телефона в базе данных
        $stmt_check = $pdo->prepare("SELECT * FROM consultation WHERE number = ?");
        $stmt_check->execute([$phone]);
        $existing_record = $stmt_check->fetch(PDO::FETCH_ASSOC);

        if ($existing_record) {
            // Установить NULL для name, number, email и 0 для is_busy
            $stmt_cancel = $pdo->prepare("UPDATE consultation SET name = NULL, number = NULL, email = NULL, is_busy = 0 WHERE number = ?");
            $stmt_cancel->execute([$phone]);

            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false, "error" => "Запись с таким номером телефона не найдена"));
        }
    } catch (PDOException $e) {
        // Ошибка при отмене записи
        echo json_encode(array("success" => false, "error" => "Ошибка при отмене записи в базе данных: " . $e->getMessage()));
    }
} else {
    // Если номер телефона отсутствует
    echo json_encode(array("success" => false, "error" => "Пожалуйста, введите номер телефона для отмены записи"));
}
?>
