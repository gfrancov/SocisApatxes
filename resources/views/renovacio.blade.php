@include('includes.header')
@include('includes.cabecera')
<div class='main-content'>
    <h1 class='text-center title'>Digitalització de socis/sòcies</h1>
    <p class='text-center mt-3'>Benvingut al pla de digitalització de sòcies i socis de l'ASC Districte Apatxe.
    <br/>Si ja ets soci/sòcia de l'ASC Districte Apatxe, omple el següent formulari.</p>
    <p>&nbsp;</p>
    <p class="text-center">Ves amb compte amb les dades introduïdes, el DNI (o NIE) i el correu electrònic no es <br/>podran modificar posteriorment, comprova que els has escrit correctament.</p>
    <form class="renovacio-form" id="renovacio-form" method='post' action='{{route('renovacio')}}'>
        @csrf
        <div class='form-control'>
            <label class='text-bold' for='dni'>DNI:</label>
            <input type='text' name='dni' id='dni' />
            <p class='error-message'> {{ $errors->first('dni') }} </p>
        </div>
        <div class='form-control'>
            <label class='text-bold' for='nom'>Nom:</label>
            <input type='text' name='nom' id='nom' />
            <p class='error-message'></p>
        </div>
        <div class='form-control'>
            <label class='text-bold' for='cognoms'>Cognoms:</label>
            <input type='text' name='cognoms' id='cognoms' />
            <p class='error-message'></p>
        </div>
        <div class='form-control'>
            <label class='text-bold' for='email'>Correu electrònic:</label>
            <input type='email' name='email' id='email' />
            <p class='error-message'> {{ $errors->first('email') }} </p>
        </div>
        <div class='form-control'>
            <label class='text-bold' for='telefon'>Telèfon:</label>
            <input type='text' name='telefon' id='telefon' />
            <p class='error-message'></p>
        </div>
        <div class='form-control'>
            <label class='text-bold' for='naixement'>Data de naixement:</label>
            <input type='date' name='naixement' id='naixement'/>
            <p class='error-message'></p>
        </div>
        <div class='renovacio-menors' id="renovacio-menors">
            <h3>Tutor legal</h3>
            <p>Com ets menor d'edat, hauràs d'omplir les dades del teu tutor legal.</p>
            <div class='form-control'>
                <label class='text-bold' for='dniTutor'>DNI del Tutor:</label>
                <input type='text' name='dniTutor' id='dniTutor' />
                <p class='error-message'></p>
            </div>
            <div class='form-control'>
                <label class='text-bold' for='nomTutor'>Nom del Tutor:</label>
                <input type='text' name='nomTutor' id='nomTutor' />
                <p class='error-message'></p>
            </div>
            <div class='form-control'>
                <label class='text-bold' for='cognomsTutor'>Cognoms del Tutor:</label>
                <input type='text' name='cognomsTutor' id='cognomsTutor' />
                <p class='error-message'></p>
            </div>
        </div>
        <div class='form-control'>
            <label class='text-bold' for='municipi'>Municipi:</label>
            <input type='text' name='municipi' id='municipi' />
            <p class='error-message'></p>
        </div>
        <div class='form-control'>
            <label class='text-bold' for='adreca'>Adreça:</label>
            <textarea name='adreca' id='adreca'></textarea>
            <p class='error-message'></p>
        </div>
        <div class='form-control'>
            <label class='text-bold' for='contrasenya'>Nova contrasenya d'accés:</label>
            <input type='password' name='contrasenya' id='contrasenya' />
            <p class='error-message'></p>
        </div>
        <div class='form-control'>
            <p class='text-bold'>Membre de l'ASC:</p>
            <label class='text-normal' for='soci'><input type='radio' id='soci' name='membre' value='soci' checked> Soci</label>
            <label class='text-normal' for='colaborador'><input type='radio' id='colaborador' name='membre' value='colaborador'> Col·laborador/a</label>
            <label class='text-normal' for='usuari'><input type='radio' id='usuari' name='membre' value='usuari'> Usuari</label>
        </div>
        <div class='form-control'>
            <label class='text-normal' for='compromis'><input type='checkbox' id='compromis' name='compromis'> Em comprometo amb les finalitats de l'ASC, en participar per assolir-les i, si escau, en contribuir al sosteniment de les despeses de l'ASC amb el pagament de les quotes i/o aportacions econòmiques establertes, segons indiquen els estatuts.</label>
            <p class='error-message'></p>
        </div>
        <div class='form-control'>
            <input type='submit' class='submit' id="renovacio-button" value='Digitalitzar!' disabled/>
        </div>
    </form>
    <script src="{{asset('assets/js/renovacio.js')}}"></script>
</div>
@include('includes.footer')