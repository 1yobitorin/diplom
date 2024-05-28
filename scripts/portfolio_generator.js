document.addEventListener('DOMContentLoaded', function () {
    // Получаем все элементы фильтра из списка с id "filter"
    const filterElements = document.querySelectorAll('#filter li');
    // Для каждого элемента фильтра добавляем обработчик события клика
    filterElements.forEach(element => {
        element.addEventListener('click', function () {
            // Получаем тип фильтра из атрибута 'data-type'
            const type = this.getAttribute('data-type');
            // Загружаем портфолио с указанным типом
            loadPortfolio(type);
        });
    });

    // При загрузке страницы загружаем портфолио без фильтрации
    loadPortfolio();

    // Функция для загрузки портфолио с указанным типом
    function loadPortfolio(type = '') {
        // Отправляем запрос на сервер, чтобы получить данные портфолио с указанным типом
        fetch(`configs/get_portfolio.php?type=${type}`)
            // Получаем ответ в формате JSON
            .then(response => response.json())
            // Обрабатываем полученные данные
            .then(data => {
                // Получаем контейнер для портфолио
                const portfolioContainer = document.getElementById('portfolio');
                // Очищаем контейнер перед добавлением новых элементов
                portfolioContainer.innerHTML = '';
                // Для каждого элемента портфолио создаем HTML-элемент и добавляем его в контейнер
                data.forEach(item => {
                    const portfolioElement = document.createElement('div');
                    portfolioElement.classList.add('element-portfolio');
                    portfolioElement.innerHTML = `
                        <img src="${item.image}" alt="${item.alt_text}">
                        <h3>${item.title}</h3>
                        <p>${item.description}</p>
                    `;
                    portfolioContainer.appendChild(portfolioElement);
                });
            })
            // Обрабатываем ошибку, если она произошла
            .catch(error => console.error('Error:', error));
    }
});
