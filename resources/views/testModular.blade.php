@include('includes.components.head')
@include('includes.components.navbar')
    <div class="container-fluid page-body-wrapper">
      @include('includes.components.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h1 class="font-weight-bold mb-0">Hola {{ auth()->user()->nom }}!</h1>
                </div>
                <div>
                    <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Les meves dades
                    </button>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
            @if($cuota)
              <div class="card pagat">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Cuota</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">PAGADA</h3>
                    <i class="ti-check icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  <p class="mb-0 mt-2">15€<span class="text-black ms-1"><small>rebuts correctament</small></span></p>
                </div>
              </div>
            @else
              <div class="card nopagat">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Cuota</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">PENDENT</h3>
                    <i class="ti-close icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  <p class="mb-0 mt-2 text-danger">15€ <span class="text-black ms-1"><small>encara no han sigut rebuts</small></span></p>
                </div>
              </div>
            @endif
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title"><h1>Benvingut a la Gestió d'Usuaris</h1></p>
                  <p>Benvingut {{ auth()->user()->nom }} al panell de gestió d'usuaris de l'Associació Sociocultural Districte Apatxe.</p>
                  <p>Des d'aquest panell pots gestionar tota la teva vinculació amb l'associació i estar al día sobre tot allò que fa cadascuna de les nostres seccions per a que no et perdis res.</p>
                  <p>Al menú trobaràs totes les opcions que pots realitzar al nostre web, com gestionar les teves dades personals, consultar projectes i estatuts o saber l'estada de la teva cuota o altres pagaments.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
<!-- content-wrapper ends -->
@include('includes.components.footer')
