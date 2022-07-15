@include('includes.header')
@include('includes.cabecera')
<div class='main-content'>
    <div id='alertes'>
       {{--  <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> You should check in on some of those fields below.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>     --}}      
    </div>
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
        @if($colonies == 'denegat')
        <div class='info-card no-pagat' id='info-colonies'>
            <h1>❌</h1>
            <h2>Sense Colònies!</h2>
            <p>Pel moment, no assistiràs a les Colònies 2022.</p>
        </div>
        @elseif($colonies == 'confirmat')
        <div class='info-card pagat' id='info-colonies'>
            <h1>✅</h1>
            <h2>Colònies pagades!</h2>
            <p>Ja s'ha rebut el teu pagament per les Colònies 2022.</p>
        </div>
        @else 
        <div class='info-card pendent' id='info-colonies'>
            <h1>⚠️</h1>
            <h2>Pendent!</h2>
            <p>T'has inscrit però falta el pagament de les Colònies 2022.</p>
        </div>
        @endif
    </div>
    @if( auth()->user()->membre == 'junta')
    <div class='panel-junta'>
        <h1 class='title'>Junta directiva</h1>
        <div class="grid-junta">
            <a href='{{route('junta.cuotes')}}' class='tasca-junta' id='pagaments-cuotes'>
                <div class='tasca-junta'>
                    <h1>💵</h1>
                    <h2>Pagaments de cuotes</h2>
                    <p>Gestiona els pagaments de cuotes.</p>
                </div>
            </a>
            <a href='{{route('junta.colonies')}}' class='tasca-junta' id='pagaments-colonies'>
                <div class='tasca-junta'>
                    <h1>🏡</h1>
                    <h2>Colònies</h2>
                    <p>Gestiona de socis/es a les colònies.</p>
                </div>
            </a>
        </div>
    </div>
    @endif
    <a href="{{route('sortir')}}" class='logout info-card'>
        <h1>🚪</h1>
        <h3>Tancar sessió</h3>
    </a>
</div>
@include('includes.footer')