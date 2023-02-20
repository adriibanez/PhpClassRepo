window.addEventListener('DOMContentLoaded', (event) => {
    pintarAsientos();
});

function pintarAsientos() {
    const celdas = document.querySelectorAll('td');
    celdas.forEach(e => {
        if (e.textContent === 'libre') {
            e.style.backgroundColor = '#309B1F';
            e.style.color = 'white';
        } else if (e.textContent === 'ocupado') {
            e.style.backgroundColor = '#C42222';
            e.style.color = 'white';


        }
    });
}