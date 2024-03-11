const plateInput = document.getElementById('search_plate');
const vehicleInput = document.getElementById('search_vehicle');

plateInput.addEventListener('input', function () {
    vehicleInput.disabled = !!this.value;
});
vehicleInput.addEventListener('input', function () {
    plateInput.disabled = !!this.value;
});

document.addEventListener('DOMContentLoaded', function () {
    const inputPlate = document.querySelector('input[name="plate"]');
    const btnSave = document.querySelector('button[name="button-salvar"]');

    inputPlate.addEventListener('input', function () {
        if (inputPlate.value.trim() === '') {
            btnSave.disabled = true;
        } else {
            btnSave.disabled = false;
        }
    });
});
