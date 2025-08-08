


document.addEventListener('DOMContentLoaded', () => {
    const items = document.querySelectorAll('ul li');
    items.forEach(li => {
        li.addEventListener('mouseenter', () => li.style.transform = 'scale(1.1)');
        li.addEventListener('mouseleave', () => li.style.transform = 'scale(1)');
    });
});
﻿


document.addEventListener('DOMContentLoaded', () => {
    const items = document.querySelectorAll('ul li');
    items.forEach(li => {
        li.addEventListener('mouseenter', () => li.style.transform = 'scale(1.1)');
        li.addEventListener('mouseleave', () => li.style.transform = 'scale(1)');
    });
});


document.addEventListener('DOMContentLoaded', () => {
    const target = document.getElementById('greet');
    if (!target) return;

    const name = (window.prompt('What is your name?', '') || '').trim(); // interaction + string
    const goals = ['Strength', 'Cardio', 'Flexibility', 'Endurance'];    // array

    if (name) { // conditional
        const first = name.split(' ')[0];
        const pretty = first.charAt(0).toUpperCase() + first.slice(1);     // string ops
        const plan = goals[Math.floor(Math.random() * goals.length)];
        target.innerHTML = `Hi <strong>${pretty}</strong>! Great to see you. How about focusing on <em>${plan}</em> this week?`; // innerHTML
    } else {
        target.innerHTML = 'Welcome! Pick a goal for this week 💪';
    }
});
