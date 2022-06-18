@include('includes.header')
@include('includes.cabecera')
<div class='main-content'>
    <h1 class='title'>Hola {{ auth()->user()->nom }}!</h1>
    <div class="info-usuari">
        @if($cuota) 
            <div class='info-card pagat' id='info-cuota'>
                <h1>✅</h1>
                <h2>Cuota Pagada!</h2>
                <p>S'ha rebut el pagament de la teva cuota de l'any {{ date('Y') }}.</p>
            </div>
        @else
            <div class='info-card no-pagat' id='info-cuota'>
                <h1>❌</h1>
                <h2>Cuota Sense Pagar!</h2>
                <p>Encara no s'ha rebut la teva cuota de l'any {{ date('Y') }}.</p>
            </div>
        @endif
        <div class='info-card no-pagat' id='info-colonies'>
            <h1>❌</h1>
            <h2>Sense Colònies!</h2>
            <p>Pel moment, no assistiràs a les colònies de l'any {{ date('Y') }}.</p>
        </div>
        <div class='info-card' id='info-esdeveniment'>
            <h1>🥶</h1>
            <h2>Vaja!</h2>
            <p>Encara no hi ha cap esdeveniment proper!</p>
        </div>
    </div>
    <a href="{{route('sortir')}}" class='logout info-card'>
        <h1>🚪</h1>
        <h3>Tancar sessió</h3>
    </a>
</div>
@include('includes.footer')