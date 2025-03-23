//
//     document.addEventListener('DOMContentLoaded', () => {
//     const qtySpan = document.querySelector('.quantity');
//     const decrement = document.querySelector('.quantity-selector button:first-of-type');
//     const increment = document.querySelector('.quantity-selector button:last-of-type');
//
//     decrement.addEventListener('click', () => {
//     let value = parseInt(qtySpan.textContent, 10);
//     if (value > 1) qtySpan.textContent = value - 1;
// });
//
//     increment.addEventListener('click', () => {
//     let value = parseInt(qtySpan.textContent, 10);
//     qtySpan.textContent = value + 1;
// });
// });


// fixed
document.addEventListener('DOMContentLoaded', () => {
    // Select all quantity selectors on the page
    document.querySelectorAll('.quantity-selector').forEach(selector => {
        const qtySpan = selector.querySelector('.quantity');
        const decrement = selector.querySelector('button:first-of-type');
        const increment = selector.querySelector('button:last-of-type');

        decrement.addEventListener('click', () => {
            let value = parseInt(qtySpan.textContent, 10);
            if (value > 1) qtySpan.textContent = value - 1;
        });

        increment.addEventListener('click', () => {
            let value = parseInt(qtySpan.textContent, 10);
            qtySpan.textContent = value + 1;
        });
    });
});
