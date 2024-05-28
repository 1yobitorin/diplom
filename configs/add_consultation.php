<?php
include 'db_connect.php';

// Получение данных из POST запроса
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];

// Проверка, все ли данные присутствуют
if ($name && $email && $phone && $date && $time) {
    try {
        // Проверка, существует ли номер телефона в базе данных
        $stmt_check = $pdo->prepare("SELECT * FROM consultation WHERE number = ?");
        $stmt_check->execute([$phone]);
        $existing_record = $stmt_check->fetch(PDO::FETCH_ASSOC);

        if ($existing_record) {
            // Если номер телефона уже существует, вернуть существующую запись
            echo json_encode(array("success" => true, "existing_record" => $existing_record));
        } else {
            // Подготовка запроса на добавление записи в базу данных
            $stmt = $pdo->prepare("UPDATE consultation SET name = ?, email = ?, number = ? WHERE date = ? AND time = ?");
            $stmt->execute([$name, $email, $phone, $date, $time]);

            // Установка is_busy = 1 для выбранного времени
            $stmt_update = $pdo->prepare("UPDATE consultation SET is_busy = 1 WHERE date = ? AND time = ?");
            $stmt_update->execute([$date, $time]);

            // Успешное добавление записи
            echo json_encode(array("success" => true));
        }
    } catch (PDOException $e) {
        // Ошибка при добавлении записи
        echo json_encode(array("success" => false, "error" => "Ошибка при добавлении записи в базу данных: " . $e->getMessage()));
    }
} else {
    // Если не все данные присутствуют
    echo json_encode(array("success" => false, "error" => "Пожалуйста, заполните все поля формы"));
}
?>
