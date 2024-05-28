document.addEventListener("DOMContentLoaded", function() {
    // Получаем ссылки на элементы модального окна
    var modal = document.getElementById("appointmentModal");
    var closeButton = document.querySelector(".close-appointment-modal");
    var confirmButton = document.getElementById("confirmButton");
  
    // При клике на кнопку открытия модального окна
    document.getElementById("openModalButton").addEventListener("click", function() {
      modal.style.display = "block";
    });
  
    // При клике на кнопку закрытия модального окна
    closeButton.addEventListener("click", function() {
      modal.style.display = "none";
    });
  
    // При клике на кнопку подтверждения записи
    confirmButton.addEventListener("click", function() {
      // Получаем данные из формы
      var name = document.getElementById("name").value;
      var email = document.getElementById("email").value;
      var phone = document.getElementById("phone").value;
      var date = document.getElementById("appointmentDate").value;
      var time = document.getElementById("appointmentTime").value;
      
  
      // Здесь можно выполнить дополнительную обработку данных, например, отправить на сервер
  
      // Закрываем модальное окно
      modal.style.display = "none";
    });
  
    // При клике вне модального окна закрываем его
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    };
  });
  