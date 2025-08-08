document.addEventListener('DOMContentLoaded', () => {
    const lvl = document.getElementById('fitness');
    if (lvl) {
        const span = document.createElement('span');
        lvl.after(span);
        span.textContent = ` ${lvl.value}`;
        lvl.addEventListener('input', () => span.textContent = ` ${lvl.value}`);
    }

    const quotes = [
        'Push harder than yesterday.',
        'Sweat now, shine later.',
        'No pain, no gain.',
        'Stronger every day.',
        'Discipline equals freedom.'
    ];

    const btn = document.createElement('button');
    btn.textContent = 'Need Motivation?';
    Object.assign(btn.style, {
        position: 'fixed',
        right: '20px',
        bottom: '20px',
        padding: '12px 18px',
        background: '#444',
        color: 'white',
        border: 'none',
        borderRadius: '6px',
        cursor: 'pointer'
    });
    btn.onclick = () => {
        const quote = quotes[Math.floor(Math.random() * quotes.length)];
        alert(quote);
    };
    document.body.appendChild(btn);
});
