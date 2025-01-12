<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О себе</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/adaptive.css">
</head>
<body>
<div class="navbar">
        <img loading="lazy" src="https://xn--j1ap9ae.xn--p1ai/images/logo2y.png" alt="UYTK LOGO">
        <a href="index.php" class="nav-button">ГЛАВНАЯ</a>
        <a href="" class="nav-button">О СЕБЕ</a>
        <a href="portfolio.php" class="nav-button">ПОРТФОЛИО</a>
        <a href="https://c1682.c.3072.ru/" class="nav-button">УЧЕБНЫЕ МАТЕРИАЛЫ</a>
        <a class="consultation" id="openModalButton">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#475073" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
        </a>
    </div>


    <div id="appointmentModal" class="appointment-modal">
  <div class="appointment-modal-content">
    <div class="appointment-modal-header">
      <h2>Запись на консультацию</h2>
      <span class="close-appointment-modal">&times;</span>
    </div>
    <div class="appointment-modal-body">
    <div class="form-group">
            <label for="name">ФИО:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Телефон:</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Формат: +7-123-456-7890" required>
        </div>
      <div class="form-group">
        <label for="appointmentDate">Выберите дату:</label>
        <select id="appointmentDate" class="form-control"></select>
      </div>
      <div class="form-group">
        <label for="appointmentTime">Выберите время:</label>
        <select id="appointmentTime" class="form-control"></select>
      </div>
    </div>
    <div class="appointment-modal-footer">
      <button id="confirmButton" class="btn btn-primary">Подтвердить</button>
    </div>
  </div>
</div>

<!-- Модальное окно для существующей записи -->
<div id="existingRecordModal">
  <div id="modalContent">
    <h2>Существующая запись</h2>
    <p id="existingRecordInfo"></p>
    <button id="cancelButton">Отменить запись</button>
  </div>
</div>

<!-- Модальное окно для успешной записи -->
<div id="successModal">
  <div id="modalContent">
    <h2>Запись успешна</h2>
    <p>Запись на консультацию успешно добавлена! <br>
    Если вам потребуется отменить запись, то это можно сделать повторно заполнив форму</p>
  </div>
</div>

    <div class="content-about">
        <div class="left-content">
            <h2>О СЕБЕ</h2>
            <h1>БРАЖНИК ИРИНА ЮРЬЕВНА</h1>
            <p>Заведующий отделением Информационных технологий и социально-экономических специальностей.</p>
            <div class="box">
                <h3>ОБРАЗОВАНИЕ</h3>
                <p>Высшее, 03.07.1999г., Якутский государственный университет им.М.К.Аммосова, по специальности "Математика"</p>
            </div>
            <div class="box">
                <h3>МЕСТО РАБОТЫ (ДОЛЖНОСТЬ)</h3>
                <p>ГАПОУ РС(Я) "Южно-Якутский технологический колледж"</p>
                <p>С 2016 года являлась руководителем отдела инклюзивного профессионального образования. С 05.02.2021 года - заведующий отделением "Информационные технологии и социально-экономические специальности". Награждена знаком.</p>
            </div>
        </div>
        <div class="right-content">
            <img src="styles/Brazhnik.jpg" alt="Ирина Юрьевна">
        </div>
    </div>

    <div class="content-about right-about">
    <div class="right-content">
            <img src="styles/Brazhnik2.jpg" alt="Ирина Юрьевна">
        </div>
        <div class="left-content right-about-content">
            <h2>ПЕДАГОГИЧЕСКАЯ ДЕЯТЕЛЬНОСТЬ</h2>
            <h1>Педагогический стаж 27 года</h1>
            <p>Дисциплины</p>
            <div class="box">
                <h3>ДИСЦИПЛИНЫ</h3>
                <p> Дисциплина: УПВ. Информатика, ОДП. Информатика, ЕН. Информатика, 
                ОП. Информационные технологии, <br> ОП. Информационно-коммуникационные 
                    технологии в профессиональной деятельности, <br> ОЦ. Стандартизация, 
                    сертификация и техническое документоведение, ОП. 
                    Компьютерное моделирование, <br> ОП. Информационные системы в 
                    профессиональной деятельности, ОП. Технические средства информатизации
                </p>
            </div>
            <div class="box">
                <h3>Группы (за весь межаттестационный период):</h3>
                <p>ИС-14(9)к, КСК-15(9), ИС-16(9), СНТ-16(9), ИСП-17(9), ИСП-19(11), ОБС-20(11), ПОД-20(9)к, ОДС-2, ЭСЛ-26, МТН-1, МОГР-2, ЭСН-1.</p>
            </div>
        </div>
        </div>
    
    <div class="footer">
        <h2>КОНТАКТЫ</h2>
        <div class="footer-content">
            <div class="contact-info">
                <i class="fas fa-envelope"></i>
                <p>ПОЧТА</p>
                <p>flow-7@yandex.ru</p>
            </div>
            <div class="divider"></div>
            <div class="contact-info">
                <i class="fas fa-phone-alt"></i>
                <p>ЗВОНИТЬ</p>
                <p>+7 (924) 161-53-67</p>
            </div>
        </div>
        <div class="social-icons">
            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-telegram"></i></a>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/5c0a5ae0d8.js" crossorigin="anonymous"></script>
    <script src="scripts/consultant_modal.js"></script>
    <script src="scripts/consultant_funtions.js"></script>
</body>
</html>
