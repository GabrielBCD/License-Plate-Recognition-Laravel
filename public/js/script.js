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
