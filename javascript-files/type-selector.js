document.querySelectorAll('.type-list li').forEach(item => {
    item.addEventListener('click', () => {
        document.querySelectorAll('.type-list li').forEach(li => li.classList.remove('selected'));
        item.classList.add('selected');
        document.getElementById('typ-produktu').value = item.dataset.value;
    });
});
