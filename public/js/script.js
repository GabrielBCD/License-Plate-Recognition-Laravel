const plateInput = document.getElementById('search_plate');
const vehicleInput = document.getElementById('search_vehicle');

plateInput.addEventListener('input', function () {
    vehicleInput.disabled = !!this.value;
});
vehicleInput.addEventListener('input', function () {
    plateInput.disabled = !!this.value;
});


$(document).ready(function () {
    $(".edit-btn").click(function () {
        const row = $(this).closest("tr");
        row.find(".editable").each(function () {
            const input = $(this).next();
            $(this).toggle();
            input.toggle();
            if (input.is(":visible")) {
                input.focus();
            }
        });
        $(this).text(function (i, text) {
            return text === "Editar" ? "Salvar" : "Editar";
        });
        row.find(".edit-btn").toggle();
        row.find(".save-btn").toggle();
    });
});

$(".clear-btn").click(function () {
    var input = $(this).prev("input[type='text']");
    input.val(''); // Limpa o input associado ao botão
});
