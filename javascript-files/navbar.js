document.addEventListener("DOMContentLoaded", function () {
    // Správa pohlavia
    const genderItems = document.querySelectorAll('.gender-item');
    const hasGenderActive = Array.from(genderItems).some(item => item.classList.contains('strong-active'));

    if (!hasGenderActive) {
        const defaultGender = Array.from(genderItems).find(item => item.textContent.trim() === "Muži");
        if (defaultGender) {
            defaultGender.classList.add('strong-active');
        }
    }

    genderItems.forEach(item => {
        item.addEventListener('click', function () {
            genderItems.forEach(el => el.classList.remove('strong-active'));
            this.classList.add('strong-active');
        });
    });

    // Správa kategórie
    const categoryItems = document.querySelectorAll('.category-item');

    categoryItems.forEach(item => {
        item.addEventListener('click', function () {
            categoryItems.forEach(el => el.classList.remove('active'));
            this.classList.add('active');
        });
    });
});
