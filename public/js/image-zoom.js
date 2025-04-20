
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = lightbox.querySelector('.lightbox-img');

    document.querySelectorAll('.product-image').forEach(img => {
    img.addEventListener('click', () => {
        lightboxImg.src = img.src;
        lightbox.style.display = 'flex';
    });
});

    lightbox.addEventListener('click', () => lightbox.style.display = 'none');
