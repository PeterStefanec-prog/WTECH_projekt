document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("form").forEach(form => {
        const requiredFields = form.querySelectorAll("input[required], select[required], textarea[required]");
        if (!requiredFields.length) return;

        form.addEventListener("submit", function (event) {
            let allFilled = true;
            requiredFields.forEach(f => {
                if (!f.value.trim()) {
                    allFilled = false;
                    f.style.borderColor = "red";
                } else {
                    f.style.borderColor = "";
                }
            });

            if (!allFilled) {
                event.preventDefault();
                alert("Prosím, vyplňte všetky povinné polia.");
            } else {
                // zruší default submit a presmeruje
                event.preventDefault();
                const url = form.dataset.redirect;
                if (url) window.location.href = url;
            }
        });
    });
});
