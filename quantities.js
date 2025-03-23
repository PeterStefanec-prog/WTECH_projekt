
    document.addEventListener('DOMContentLoaded', () => {
    const qtySpan = document.querySelector('.quantity');
    const decrement = document.querySelector('.quantity-button:first-of-type');
    const increment = document.querySelector('.quantity-button:last-of-type');

    decrement.addEventListener('click', () => {
    let value = parseInt(qtySpan.textContent, 10);
    if (value > 1) qtySpan.textContent = value - 1;
});

    increment.addEventListener('click', () => {
    let value = parseInt(qtySpan.textContent, 10);
    qtySpan.textContent = value + 1;
});
});

