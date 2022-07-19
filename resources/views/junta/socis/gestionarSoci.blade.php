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
                        <div class="mb-5 d-flex justify-content-between align-items-center">
                            <h1>Estatus de l'usuari</h1>
                            <a href="{{route('junta.socis')}}" type="button" class="btn btn-primary btn-icon-text btn-rounded">
                                <i class="ti-arrow-top-left btn-icon-prepend"></i>Tornar al llistat
                            </a>
                        </div>
                        <div class='row'>
                            <div class='table-responsive col-md-8'>
                                <table class='table table-striped'>
                                    <tr>
                                        <th>DNI</th>
                                        <td>{{$soci->dni}}</td>
                                    </tr>
                                    <tr>
                                        <th>Nom</th>
                                        <td>{{$soci->nom}}</td>
                                    </tr>
                                    <tr>
                                        <th>Cognoms</th>
                                        <td>{{$soci->cognoms}}</td>
                                    </tr>
                                </table>
                            </div>
                            @if($soci->inhabilitat == 1)
                                <div class='mt-3 col-md-4'>
                                    <p>L'usuari està actualment deshabilitat, per activar-lo pots donar clic al botó que et permetrà habilitar-lo i donar-li accés a l'usuari a la Gestió d'Usuaris.</p>
                                    <p class='align-items-center'><a type="button" href='activar/{{$soci->id}}' class="btn btn-success btn-lg">Activar</a></p>
                                </div>
                            @else
                                <div class='mt-3 col-md-4'>
                                    <p>L'usuari ja està habilitat, pots inhabilitar-lo des del botó. Aquest treura l'accés al soci al panell de Gestió d'Usuaris de l'associació.</p>
                                    <p class='center'><a type="button" href='inhabilitar/{{$soci->id}}' class="btn btn-danger btn-lg"> Inhabilitar</a></p>
                                </div>
                            @endif
                        </div>
                    </div>
                  </div>
                </div>
              </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <h1 class='mb-4'>Gestionar dades del soci 00{{$soci->id}}</h1>
                    <form class="forms-sample" id="edit-form" method='post' action='{{route('renovacio')}}'>
                        @csrf
                        <div class='form-group'>
                            <label class='text-bold' for='dni'>DNI:</label>
                            <input class="form-control" type='text' name='dni' id='dni' value="{{$soci->dni}}" readonly/>
                            <p class='error-message'></p>
                        </div>
                        <div class='form-group'>
                            <label class='text-bold' for='nom'>Nom:</label>
                            <input class="form-control" type='text' name='nom' id='nom' value="{{$soci->nom}}" />
                            <p class='error-message'></p>
                        </div>
                        <div class='form-group'>
                            <label class='text-bold' for='cognoms'>Cognoms:</label>
                            <input class="form-control" type='text' name='cognoms' id='cognoms' value="{{$soci->cognoms}}" />
                            <p class='error-message'></p>
                        </div>
                        <div class='form-group'>
                            <label class='text-bold' for='email'>Correu electrònic:</label>
                            <input class="form-control" type='email' name='email' id='email' value="{{$soci->email}}" readonly/>
                            <p class='error-message'> {{ $errors->first('email') }} </p>
                        </div>
                        <div class='form-group'>
                            <label class='text-bold' for='telefon'>Telèfon:</label>
                            <input class="form-control" type='text' name='telefon' id='telefon' value="{{$soci->telefon}}" />
                            <p class='error-message'></p>
                        </div>
                        <div class='form-group'>
                            <label class='text-bold' for='naixement'>Data de naixement:</label>
                            <input class="form-control" type='date' name='naixement' id='naixement' value="{{$soci->naixement}}" />
                            <p class='error-message'></p>
                        </div>
                        <div class='form-group'>
                            <label class='text-bold' for='municipi'>Municipi:</label>
                            <input class="form-control" type='text' name='municipi' id='municipi' value="{{$soci->municipi}}" />
                            <p class='error-message'></p>
                        </div>
                        <div class='form-group'>
                            <label class='text-bold' for='adreca'>Adreça:</label>
                            <textarea class='form-control' name='adreca' id='adreca'> {{$soci->adreca}}</textarea>
                            <p class='error-message'></p>
                        </div>
                        <div class='form-group'>
                            <label class='text-bold' for='membre'>Membre de l'ASC:</label>
                            <input class="form-control" type='text' name='membre' id='contrasenya' value="{{$soci->membre}}" />
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
