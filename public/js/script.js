const plateInput = document.getElementById('search_plate');
const vehicleInput = document.getElementById('search_vehicle');

plateInput.addEventListener('input', function () {
    vehicleInput.disabled = !!this.value;
});
vehicleInput.addEventListener('input', function () {
    plateInput.disabled = !!this.value;
});

document.addEventListener('DOMContentLoaded', function () {
    const modals = document.querySelectorAll('.modal');

    modals.forEach(function (modal) {
        const inputPlate = modal.querySelector('input[name="plate"]');
        const btnSave = modal.querySelector('button[name="button-salvar"]');

        inputPlate.addEventListener('input', function () {
            btnSave.disabled = inputPlate.value.trim() === '';
        });
    });
});


document.addEventListener('DOMContentLoaded', function () {
    const startDateInput = document.getElementById('search_start_date');
    const endDateInput = document.getElementById('search_end_date');

    startDateInput.addEventListener('input', function() {
        endDateInput.value = startDateInput.value;
    });

    endDateInput.addEventListener('input', function() {
    });
});
