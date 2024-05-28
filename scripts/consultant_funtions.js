document.addEventListener("DOMContentLoaded", function() {
    // Получаем ссылку на выпадающий список для дат
    var appointmentDateDropdown = document.getElementById("appointmentDate");

    // Получаем доступные даты при загрузке страницы
    getAvailableDates();

    // Обработчик события фокуса на окне
    window.addEventListener("focus", function() {
        getAvailableDates();
    });

    // Функция для получения доступных дат
    function getAvailableDates() {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var dates = JSON.parse(xhr.responseText);
                    populateDatesDropdown(dates);
                } else {
                    console.error("Ошибка при получении доступных дат");
                }
            }
        };
        xhr.open("GET", "configs/get_dates.php", true);
        xhr.send();
    }

    // Функция для заполнения выпадающего списка дат
    function populateDatesDropdown(dates) {
        appointmentDateDropdown.innerHTML = ""; // Очистить список перед обновлением
        dates.forEach(function(date) {
            var option = document.createElement("option");
            option.text = date;
            appointmentDateDropdown.add(option);
        });

        // После заполнения списка дат, получаем доступное время для выбранной даты
        getAvailableTimes(appointmentDateDropdown.value);
    }

    // Обработчик изменения выбранной даты
    appointmentDateDropdown.addEventListener("change", function() {
        getAvailableTimes(this.value);
    });

    // Функция для получения доступного времени для выбранной даты
    function getAvailableTimes(date) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var times = JSON.parse(xhr.responseText);
                    populateTimesDropdown(times);
                } else {
                    console.error("Ошибка при получении доступного времени");
                }
            }
        };
        xhr.open("GET", "configs/get_times.php?date=" + date, true);
        xhr.send();
    }

    // Функция для заполнения выпадающего списка времени
    function populateTimesDropdown(times) {
        var appointmentTimeDropdown = document.getElementById("appointmentTime");
        appointmentTimeDropdown.innerHTML = ""; // Очистить список перед обновлением

        times.forEach(function(time) {
            var option = document.createElement("option");
            option.text = time;
            appointmentTimeDropdown.add(option);
        });
    }

    // Получаем ссылку на кнопку "Подтвердить"
    var confirmButton = document.getElementById("confirmButton");

    // Получаем ссылки на модальные окна и элементы для их закрытия
    var existingRecordModal = document.getElementById("existingRecordModal");
    var successModal = document.getElementById("successModal");
    var closeButtons = document.getElementsByClassName("close");

    // Закрываем модальные окна при нажатии на крестик
    Array.from(closeButtons).forEach(function(button) {
        button.addEventListener("click", function() {
            existingRecordModal.style.display = "none";
            successModal.style.display = "none";
            location.reload(); // Обновление страницы после закрытия модальных окон
        });
    });

    // Закрываем модальные окна при клике вне модального окна
    window.onclick = function(event) {
        if (event.target == existingRecordModal) {
            existingRecordModal.style.display = "none";
            location.reload(); // Обновление страницы после закрытия модальных окон
        }
        if (event.target == successModal) {
            successModal.style.display = "none";
            location.reload(); // Обновление страницы после закрытия модальных окон
        }
    };

    // Обработчик нажатия на кнопку "Подтвердить"
    confirmButton.addEventListener("click", function() {
        // Получаем данные из формы
        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var phone = document.getElementById("phone").value;
        var date = document.getElementById("appointmentDate").value;
        var time = document.getElementById("appointmentTime").value;

        // Проверяем, что все данные заполнены
        if (name && email && phone && date && time) {
            // Отправляем данные на серверный скрипт
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            if (response.existing_record) {
                                // Существующая запись найдена, выводим модальное окно
                                document.getElementById("existingRecordInfo").innerText =
                                    "Номер телефона уже зарегистрирован. Запись на: " +
                                    response.existing_record.date + " " + response.existing_record.time;
                                existingRecordModal.style.display = "block";
                            } else {
                                successModal.style.display = "block";
                            }
                        } else {
                            console.error("Ошибка: " + response.error);
                        }
                    } else {
                        console.error("Ошибка при отправке данных на сервер");
                    }
                }
            };
            xhr.open("POST", "configs/add_consultation.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            var data = "name=" + encodeURIComponent(name) + "&email=" + encodeURIComponent(email) + "&phone=" + encodeURIComponent(phone) + "&date=" + encodeURIComponent(date) + "&time=" + encodeURIComponent(time);
            xhr.send(data);
        } else {
            alert("Пожалуйста, заполните все поля формы!");
        }
    });

    // Обработчик нажатия на кнопку "Отменить запись"
    var cancelButton = document.getElementById("cancelButton");
    cancelButton.addEventListener("click", function() {
        var phone = document.getElementById("phone").value;

        if (phone) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            alert("Запись успешно отменена");
                            existingRecordModal.style.display = "none";
                            location.reload();
                        } else {
                            console.error("Ошибка: " + response.error);
                        }
                    } else {
                        console.error("Ошибка при отправке данных на сервер");
                    }
                }
            };
            xhr.open("POST", "configs/cancel_consultation.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            var data = "phone=" + encodeURIComponent(phone);
            xhr.send(data);
        } else {
            alert("Пожалуйста, введите номер телефона для отмены записи!");
        }
    });
});
