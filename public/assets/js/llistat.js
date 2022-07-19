function mostrarPagades() {

    const taulaNoPagades = document.getElementById('nopagades-taula');
    taulaNoPagades.style.display='none';

    const taulaPagades = document.getElementById('pagades-taula');
    taulaPagades.style.display='block';

}

function aplicarFiltre() {

    const filtreSeleccionat = document.getElementById('filtratge').value;

    const allRows = document.querySelectorAll('tbody tr');
    
    if(filtreSeleccionat == 'tots') {

        allRows.forEach(function (element) {
            element.style.display  = 'revert';
        });

    } else {

        allRows.forEach(function (element) {
            element.style.display = 'none';
        });

        const rowsSelec = document.querySelectorAll("." + filtreSeleccionat);
        rowsSelec.forEach(function (element) {
            element.style.display = 'revert';
        });

    }

}

window.onload = function() {

    // Chuck image listener
    const botoFiltratge = document.getElementById('botoFiltratge');
    botoFiltratge.addEventListener("click", aplicarFiltre);

}