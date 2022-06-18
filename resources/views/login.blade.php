@include('includes.header')
@include('includes.cabecera')
<div class='main-content content-center'>
    <h1 class='text-center title'>Accés</h1>
    <form class="acces-form" id="acces-form" method='post' action='{{route('acces')}}'>
        @csrf
        <div class='form-control'>
            <label class='text-bold' for='dni'>DNI:</label>
            <input type='text' name='dni' id='dni' />
        </div>
        <div class='form-control'>
            <label class='text-bold' for='contrasenya'>Contrasenya:</label>
            <input type='password' name='contrasenya' id='contrasenya' />
            @error('message')
            <p class='error-message'> {{ $message }} </p>
            @enderror
        </div>
        <div class='form-control'>
            <input type='submit' class='submit' id="renovacio-button" value='Entrar'/>
        </div>
    </form>
</div>
@include('includes.footer')