document.addEventListener('DOMContentLoaded', () => {
    const vid = document.querySelector('video');
    if (!vid) return;
    document.addEventListener('keydown', e => {
        if (e.code === 'Space') {
            if (vid.paused) vid.play(); else vid.pause();
        }
    });
});
