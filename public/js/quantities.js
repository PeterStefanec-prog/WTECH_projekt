console.log('quantities.js loaded');
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.quantity-selector').forEach(selector => {
        const qtySpan = selector.querySelector('.quantity');
        const decrement = selector.querySelector('button:first-of-type');
        const increment = selector.querySelector('button:last-of-type');

        const form = selector.parentElement.querySelector('form');
        const productId = form.querySelector('[name="product_id"]').value;
        const size = form.querySelector('[name="size"]').value;

        const updateQuantity = (change) => {
            const newQty = parseInt(qtySpan.textContent, 10) + change;
            if (newQty <= 0) return;

            // Zmeníme vizuálne
            qtySpan.textContent = newQty;

            // AJAX na server
            fetch('/cart/update-quantity', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    product_id: productId,
                    size: size,
                    change: change
                })
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        // Môžeš napr. zmeniť total bez reloadu alebo nechaj:
                        location.reload();
                    }
                });
        };

        decrement.addEventListener('click', () => updateQuantity(-1));
        increment.addEventListener('click', () => updateQuantity(1));
    });
});
