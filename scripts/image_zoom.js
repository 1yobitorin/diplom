document.addEventListener('DOMContentLoaded', function () {
    const portfolioContainer = document.getElementById('portfolio');
    const lightbox = document.getElementById('lightbox');

    // Добавляем обработчик событий для каждого изображения
    portfolioContainer.addEventListener('click', function (event) {
        if (event.target.tagName === 'IMG') {
            const imageUrl = event.target.src;
            showImageInLightbox(imageUrl);
        }
    });

    // Функция для отображения изображения в легком слое
    function showImageInLightbox(imageUrl) {
        const lightboxImage = lightbox.querySelector('img');
        lightboxImage.src = imageUrl;
        lightbox.style.display = 'block';
    }

    // Закрываем легкий слой при клике вне изображения
    lightbox.addEventListener('click', function (event) {
        if (event.target === lightbox) {
            lightbox.style.display = 'none';
        }
    });
});