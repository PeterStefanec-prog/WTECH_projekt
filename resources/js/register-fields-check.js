document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("registration-form");

    form.addEventListener("submit", function (event) {
        const inputs = form.querySelectorAll("input[required]");
        let allFilled = true;

        inputs.forEach(input => {
            if (!input.value.trim()) {
                allFilled = false;
                input.style.borderColor = "red";
            } else {
                input.style.borderColor = "#888";
            }
        });

        if (!allFilled) {
            event.preventDefault();
            alert("Prosím, vyplňte všetky polia.");
        }
    });
});
