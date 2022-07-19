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
                  <p class="card-title"><h1>Llistat de socis/es</h1></p>
                  <p>Pots filtrar els usuaris segons si estan actius o formen part de la junta.</p>
                  <div class='input-group'>
                    <select class='form-control' name='filtratge' id='filtratge' style='padding: 0; padding-left: 10px; height: 42px; margin-top: 1px;'>
                      <option value='tots'>Tots</option>
                      <option value='activat'>Activat</option>
                      <option value='desactivat'>Desactivat</option>
                      <option value='junta'>Junta</option>
                    </select>
                    <p>
                      <button type="button" class="file-upload-browse btn btn-primary" id='botoFiltratge'>Filtrar</button>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class='table-responsive'>
                    <table class='table table-striped'>
                      <thead>
                        <tr>
                          <th>DNI</th>
                          <th>Nom i cognoms</th>
                          <th>Estatus</th>
                          <th>Membre</th>
                          <th>Gestionar </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach( $socis as $soci )

                          @if($soci->inhabilitat == 1)

                            <tr class="desactivat {{$soci->membre}}">

                          @else

                            <tr class="activat {{$soci->membre}}">

                          @endif
                            <td>{{$soci->dni}}</td>
                            <td>{{$soci->nom}} {{$soci->cognoms}}</td>
                            <td>
                              @if($soci->inhabilitat == 1)
                              <label class="badge btn-danger btn-md soci-deshabilitat">desactivat</label>
                              @else
                                <label class="badge btn-success btn-md soci-habilitat">activat</label>
                              @endif
                            </td>
                            <td class='soci-membre'>
                              {{$soci->membre}}
                            </td>
                            <td>
                              <a type="button" href='soci/{{$soci->id}}' class="btn btn-primary btn-rounded">
                                <i class="ti-write"></i>
                              </a>
                            </td>
                          </tr>

                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<!-- content-wrapper ends -->
<script src="{{asset('assets/js/llistat.js')}}"></script>
@include('includes.components.footer')
