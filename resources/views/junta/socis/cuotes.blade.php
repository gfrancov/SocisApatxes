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
                  <p class="card-title"><h1>Pagament de cuotes</h1></p>
                  <div>
                    <button type="button" class="btn btn-success btn-lg btn-block" id="pagades">
                        <i class="ti-check"></i>                      
                        Cuotes pagades
                    </button>
                    <button type="button" class="btn btn-danger btn-lg btn-block" id="nopagades">
                        <i class="ti-close"></i>                      
                        Cuotes pendents
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row" id="pagades-taula">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title"><h1>Cuotes pagades</h1></p>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                DNI
                                </th>
                                <th>
                                Nom i cognoms
                                </th>
                                <th>
                                Estatus
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $pagades as $usuariPagat )

                                <tr>
                                    <td>{{$usuariPagat->dni}}</td>
                                    <td>{{$usuariPagat->nom}} {{$usuariPagat->cognoms}}</td>
                                    <td>
                                        <label class="badge btn-success btn-md">PAGAT</label>
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
          <div class="row" id="nopagades-taula">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title"><h1>Cuotes no pagades</h1></p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>
                            DNI
                            </th>
                            <th>
                            Nom i cognoms
                            </th>
                            <th>
                            Estatus
                            </th>
                            <th>
                                Marcar
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $noPagades as $usuariNoPagat )

                            <tr>
                                <td>{{$usuariNoPagat->dni}}</td>
                                <td>{{$usuariNoPagat->nom}} {{$usuariNoPagat->cognoms}}</td>
                                <td>
                                    <label class="badge badge-danger">PENDENT</label>
                                </td>
                                <td>
                                    <a class='btn btn-success' href='cuotes/pagada/{{$usuariNoPagat->id}}'>EFECTUAT</a>
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
<script src="{{asset('assets/js/cuotes.js')}}"></script>
@include('includes.components.footer')
