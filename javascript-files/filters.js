const range = document.getElementById('price-range');
const rangeValue = document.getElementById('range-value');

range.addEventListener('input', function() {
    rangeValue.textContent = `${this.value} $`;
});





// ****************************** Deleting filters

//  references to elements
const resetButton = document.getElementById('reset-filters');
const checkboxes = document.querySelectorAll('.filter-section input[type="checkbox"]');


// default range value (adjust as needed)
const defaultRangeValue = 500;

// listener for a click on the "Vymaž filtre" button
resetButton.addEventListener('click', () => {
    // ncheck all checkboxes
    checkboxes.forEach(checkbox => {
        checkbox.checked = false;
    });

    //reset the range slider to default value
    range.value = defaultRangeValue;

    // update the displayed range value text
    rangeValue.textContent = `${defaultRangeValue} $`;
});
