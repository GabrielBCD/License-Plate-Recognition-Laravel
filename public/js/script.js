const plateInput = document.getElementById('search_plate');
const vehicleInput = document.getElementById('search_vehicle');

plateInput.addEventListener('input', function () {
    vehicleInput.disabled = !!this.value;
});
vehicleInput.addEventListener('input', function () {
    plateInput.disabled = !!this.value;
});

function validateForm() {
    var plateInput = document.getElementsByName('plate');
    if (plateInput.value.trim() === '') {
        console.log('Por favor, preencha o campo da placa.');
        return false;
    }
    return true;
}
