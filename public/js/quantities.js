document.addEventListener('DOMContentLoaded', () => {
    // Select all quantity selectors on the page
    document.querySelectorAll('.quantity-selector').forEach(selector => {
        const qtySpan = selector.querySelector('.quantity');
        const qtyInput = document.getElementById('quantity'); // dôležité
        const decrement = selector.querySelector('button:first-of-type');
        const increment = selector.querySelector('button:last-of-type');

        decrement.addEventListener('click', () => {
            let value = parseInt(qtySpan.textContent, 10);
            if (value > 1) {
                value--;
                qtySpan.textContent = value;
                if (qtyInput) qtyInput.value = value;
            }
        });

        increment.addEventListener('click', () => {
            let value = parseInt(qtySpan.textContent, 10);
            value++;
            qtySpan.textContent = value;
            if (qtyInput) qtyInput.value = value;
        });
    });
});
