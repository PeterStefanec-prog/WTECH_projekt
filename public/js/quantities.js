console.log('quantities.js loaded');

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.quantity-selector').forEach(selector => {
        const qtySpan = selector.querySelector('.quantity');
        const btnDec  = selector.querySelector('button:first-of-type');
        const btnInc  = selector.querySelector('button:last-of-type');

        // Detekcia produktovej stránky
        const productForm = document.querySelector('#add-to-cart-form');

        if (productForm) {
            // STRANKA PRODUKTU
            const quantityInput = document.getElementById('quantity');
            let currentQty      = parseInt(qtySpan.textContent, 10);

            // STOCK PRE Vsetky velkosti
            const stockMap = {};
            document.querySelectorAll('.size-selector label').forEach(label => {
                const sizeVal  = label.querySelector('input[name="size"]').value;
                const stockTxt = label.querySelector('.availability')?.textContent || '';
                const stock    = parseInt(stockTxt.replace(/\D/g, ''), 10) || 0;
                stockMap[sizeVal] = stock;
            });

            const getMaxForCurrentSize = () => {
                const checked = productForm.querySelector('input[name="size"]:checked');
                return checked ? stockMap[checked.value] : 1;
            };

            // Pri zmene veľkosti
            document.querySelectorAll('input[name="size"]').forEach(radio => {
                radio.addEventListener('change', () => {
                    const maxStock = getMaxForCurrentSize();
                    if (currentQty > maxStock) {
                        currentQty = maxStock;
                        qtySpan.textContent = currentQty;
                        quantityInput.value = currentQty;
                    }
                });
            });

            const updateDisplay = (newQty) => {
                qtySpan.textContent = newQty;
                quantityInput.value = newQty;
            };

            btnDec.addEventListener('click', () => {
                if (currentQty > 1) {
                    currentQty--;
                    updateDisplay(currentQty);
                }
            });

            btnInc.addEventListener('click', () => {
                const maxStock = getMaxForCurrentSize();
                if (currentQty < maxStock) {
                    currentQty++;
                    updateDisplay(currentQty);
                }
            });

        } else {
            //  STRANKA KOSIKA
            const wrapper   = selector.closest('.product-quantity');
            const form      = wrapper.querySelector('form');
            const productId = form.querySelector('[name="product_id"]').value;
            const size      = form.querySelector('[name="size"]')?.value || null;
            let currentQty  = parseInt(qtySpan.textContent, 10);
            // max z data-max
            const maxStock  = parseInt(selector.dataset.max, 10) || Infinity;

            const updateQuantity = (change) => {
                const newQty = currentQty + change;
                if (newQty <= 0 || newQty > maxStock) return;

                currentQty = newQty;
                qtySpan.textContent = newQty;

                fetch('/cart/update-quantity', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ product_id: productId, size, change })
                })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            location.reload(); // alebo DOM-update sumára/navbaru
                        }
                    });
            };

            btnDec.addEventListener('click', () => updateQuantity(-1));
            btnInc.addEventListener('click', () => updateQuantity(1));
        }
    });
});
