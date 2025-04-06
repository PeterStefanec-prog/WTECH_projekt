document.addEventListener("DOMContentLoaded", function () {
    // sprava pohlavia
    const genderItems = document.querySelectorAll('.gender-item');
    const hasGenderActive = Array.from(genderItems).some(item => item.classList.contains('strong-active'));

    if (!hasGenderActive) {
        const defaultGender = Array.from(genderItems).find(item => item.textContent.trim() === "Muži");
        if (defaultGender) {
            defaultGender.classList.add('strong-active');       // teda ked nic nie je aktivne tak da muzov ako aktivnych
        }
    }

    genderItems.forEach(item => { // vsetkemu sa zrusi active
        item.addEventListener('click', function () {
            genderItems.forEach(el => el.classList.remove('strong-active'));
            this.classList.add('strong-active');
        });
    });

    // sprava kategorie
    const categoryItems = document.querySelectorAll('.category-item');

    categoryItems.forEach(item => {
        item.addEventListener('click', function () {
            categoryItems.forEach(el => el.classList.remove('active'));
            this.classList.add('active');
        });
    });
});
