document.addEventListener('DOMContentLoaded', () => {
    const imgs = document.querySelectorAll('.gallery img');
    imgs.forEach(img => {
        img.style.transition = 'transform 0.3s ease';
        img.addEventListener('click', () => {
            if (img.classList.contains('zoom')) {
                img.classList.remove('zoom');
            } else {
                imgs.forEach(i => i.classList.remove('zoom'));
                img.classList.add('zoom');
            }
        });
    });
});
