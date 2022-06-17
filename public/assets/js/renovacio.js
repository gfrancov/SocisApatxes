function checkInputs() {

    var errors = false;
    var menor = false;

    // DNI
    if(document.getElementById('dni').value == '') {
        document.querySelectorAll('.error-message')[0].innerHTML = "El dni és obligatori.";
        errors = true;
    } else {
        document.querySelectorAll('.error-message')[0].innerHTML = "";
    }
    
    // Nom
    if(document.getElementById('nom').value == '') {
        document.querySelectorAll('.error-message')[1].innerHTML = "El nom és obligatori.";
        errors = true;
    } else {
        document.querySelectorAll('.error-message')[1].innerHTML = "";
    }

    // Cognoms
    if(document.getElementById('cognoms').value == '') {
        document.querySelectorAll('.error-message')[2].innerHTML = "Els cognoms son obligatoris.";
        errors = true;
    } else {
        document.querySelectorAll('.error-message')[2].innerHTML = "";
    }

    // Correu electrònic
    if(document.getElementById('email').value == '') {
        document.querySelectorAll('.error-message')[3].innerHTML = "El correu electrònic és obligatori.";
        errors = true;
    } else {
        if((document.getElementById('email').value).match(/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/)) {
            document.querySelectorAll('.error-message')[3].innerHTML = '';
        } else {
            document.querySelectorAll('.error-message')[3].innerHTML = "El correu electrònic no és correcte.";
            errors = true;
        }

    }

    // telèfon
    if(document.getElementById('telefon').value == '') {
        document.querySelectorAll('.error-message')[4].innerHTML = "El telèfon és obligatori.";
        errors = true;
    } else {
        document.querySelectorAll('.error-message')[4].innerHTML = '';
    };

    // data naixement
    if(document.getElementById('naixement').value == '') {
        document.querySelectorAll('.error-message')[5].innerHTML = "La data de naixement és obligatoria.";
        errors = true;
    } else {

        document.querySelectorAll('.error-message')[5].innerHTML = '';
        var today = new Date();
        var dataNaixement = new Date(document.getElementById('naixement').value);

        var edat = today.getFullYear() - dataNaixement.getFullYear();
        var mesos = today.getMonth() - dataNaixement.getMonth();

        if(mesos < 0 || (mesos === 0 && today.getDate() < dataNaixement.getDate()) ) {
            edat--;
        }

        if(edat < 18) {
            menor = true;
        }

    };

    // Tutor legal
    if(menor) {
        document.getElementById("renovacio-menors").style.display = 'block';

        // DNI Tutor
        if(document.getElementById('dniTutor').value == '') {
            document.querySelectorAll('.error-message')[6].innerHTML = "El dni del tutor és obligatori.";
            errors = true;
        } else {
            document.querySelectorAll('.error-message')[6].innerHTML = "";
        }
        
        // Nom Tutor
        if(document.getElementById('nomTutor').value == '') {
            document.querySelectorAll('.error-message')[7].innerHTML = "El nom del tutor és obligatori.";
            errors = true;
        } else {
            document.querySelectorAll('.error-message')[7].innerHTML = "";
        }

        // Cognoms Tutor
        if(document.getElementById('cognomsTutor').value == '') {
            document.querySelectorAll('.error-message')[8].innerHTML = "Els cognoms del tutor son obligatoris.";
            errors = true;
        } else {
            document.querySelectorAll('.error-message')[8].innerHTML = "";
        }


    } else {
        document.getElementById("renovacio-menors").style.display = 'none';
    }

    // Municipi
    if(document.getElementById('municipi').value == '') {
        document.querySelectorAll('.error-message')[9].innerHTML = "Introdueix el teu municipi.";
        errors = true;
    } else {
        document.querySelectorAll('.error-message')[9].innerHTML = "";
    }

    // Adreça
    if(document.getElementById('adreca').value == '') {
        document.querySelectorAll('.error-message')[10].innerHTML = "Insereix la teva adreça.";
        errors = true;
    } else {
        document.querySelectorAll('.error-message')[10].innerHTML = "";
    }

    // Adreça
    if(document.getElementById('contrasenya').value == '') {
        document.querySelectorAll('.error-message')[11].innerHTML = "Introdueix una contrasenya.";
        errors = true;
    } else {
        document.querySelectorAll('.error-message')[11].innerHTML = "";
    }
    

    // Compromís
    if(document.getElementById('compromis').checked != true) {
        document.querySelectorAll('.error-message')[12].innerHTML = "Has d'acceptar el compromís amb l'ASC.";
        errors = true;
    } else {
        document.querySelectorAll('.error-message')[12].innerHTML = "";
    }

    if(!errors) {
        document.getElementById('renovacio-button').removeAttribute('disabled');
    } else {
        document.getElementById('renovacio-button').setAttribute('disabled', '');
    }


}

window.onload = function() {

    // Chuck image listener
    const hoverForm = document.getElementById('renovacio-form');
    hoverForm.addEventListener("change", checkInputs);

}