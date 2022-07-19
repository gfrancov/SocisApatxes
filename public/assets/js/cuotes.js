function mostrarPagades() {

    const taulaNoPagades = document.getElementById('nopagades-taula');
    taulaNoPagades.style.display='none';

    const taulaPagades = document.getElementById('pagades-taula');
    taulaPagades.style.display='block';

}

function mostrarNoPagades() {

    const taulaPagades = document.getElementById('pagades-taula');
    taulaPagades.style.display='none';

    const taulaNoPagades = document.getElementById('nopagades-taula');
    taulaNoPagades.style.display='block';

}

window.onload = function() {

    // Chuck image listener
    const pagades = document.getElementById('pagades');
    pagades.addEventListener("click", mostrarPagades);

    // Chuck image listener
    const noPagades = document.getElementById('nopagades');
    noPagades.addEventListener("click", mostrarNoPagades);

}