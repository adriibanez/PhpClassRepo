window.addEventListener('DOMContentLoaded', (event) => {

    const celdas = document.querySelectorAll('td');
    celdas.forEach(e => {
        if (e.textContent === 'L') {
            e.style.color = 'green';
        } else if (e.textContent === 'O') {
            e.style.color = 'red';
        }
    });
});