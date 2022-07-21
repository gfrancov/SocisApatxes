@include('includes.components.head')
@include('includes.components.navbar')
    <div class="container-fluid page-body-wrapper">
      @include('includes.components.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1>El teu perfil</h1>
                            <a href="{{route('junta.socis')}}" type="button" class="btn btn-primary btn-icon-text btn-rounded">
                                <i class="ti-arrow-top-left btn-icon-prepend"></i>Tornar a l'inici
                            </a>
                        </div>
                    </div>
                  </div>
                </div>
            </div> 
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <form class="forms-sample" id="edit-form" method='post' action='{{route('modificacio')}}'>
                        @csrf
                        <div class='form-group'>
                            <label class='text-bold' for='dni'>DNI:</label>
                            <input class="form-control" type='text' name='dni' id='dni' value="{{ $soci->dni }}" readonly/>
                            <p class='error-message'></p>
                        </div>
                        <div class='form-group'>
                            <label class='text-bold' for='nom'>Nom:</label>
                            <input class="form-control" type='text' name='nom' id='nom' value="{{ $soci->nom }}" />
                            <p class='error-message'></p>
                        </div>
                        <div class='form-group'>
                            <label class='text-bold' for='cognoms'>Cognoms:</label>
                            <input class="form-control" type='text' name='cognoms' id='cognoms' value="{{ $soci->cognoms }}" />
                            <p class='error-message'></p>
                        </div>
                        <div class='form-group'>
                            <label class='text-bold' for='email'>Correu electrònic:</label>
                            <input class="form-control" type='email' name='email' id='email' value="{{ $soci->email }}" readonly/>
                            <p class='error-message'> {{ $errors->first('email') }} </p>
                        </div>
                        <div class='form-group'>
                            <label class='text-bold' for='telefon'>Telèfon:</label>
                            <input class="form-control" type='text' name='telefon' id='telefon' value="{{ $soci->telefon }}" />
                            <p class='error-message'></p>
                        </div>
                        <div class='form-group'>
                            <label class='text-bold' for='naixement'>Data de naixement:</label>
                            <input class="form-control" type='date' name='naixement' id='naixement' value="{{ $soci->naixement }}" />
                            <p class='error-message'></p>
                        </div>
                        <div class='form-group'>
                            <label class='text-bold' for='municipi'>Municipi:</label>
                            <input class="form-control" type='text' name='municipi' id='municipi' value="{{ $soci->municipi }}" />
                            <p class='error-message'></p>
                        </div>
                        <div class='form-group'>
                            <label class='text-bold' for='adreca'>Adreça:</label>
                            <textarea class='form-control' name='adreca' id='adreca'>{{ $soci->adreca }}</textarea>
                            <p class='error-message'></p>
                        </div>
                        <div class='form-group'>
                            <label class='text-bold' for='membre'>Membre de l'ASC:</label>
                            <input class="form-control" type='text' name='membre' id='contrasenya' value="{{ $soci->membre }}" readonly/>
                            <p class='error-message'></p>
                        </div>
                        <div class='form-group'>
                            <input class="form-control" type='submit' class='submit' id="renovacio-button" value='Modificar'/>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
<!-- content-wrapper ends -->
@include('includes.components.footer')
