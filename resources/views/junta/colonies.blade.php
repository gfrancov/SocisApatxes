@include('includes.header')
@include('includes.cabecera')
<div class='main-content'>
    <h1 class='titol'>Colònies confirmades</h1>
    <table class='table'>
        <tr>
            <th class='dni'>DNI</th>
            <th>Nom</th>
            <th>Cognoms</th>
            <th>Estatus</th>
        </tr>
        @foreach ($pagades as $usuariPagat)

        <tr>
            <td class='dni'>{{$usuariPagat->dni}}</td>
            <td>{{$usuariPagat->nom}}</td>
            <td>{{$usuariPagat->cognoms}}</td>
            <td style='background-color: #b4ffbe'>PAGADA</td>
        </tr>  

        @endforeach
    </table>
    <h1 class='mt-4 titol'>Sense Pagar</h1>
    <table class='table table-hover'>
        <tr>
            <th class='dni'>DNI</th>
            <th>Nom</th>
            <th>Cognoms</th>
            <th>Confirmat</th>
            <th>Pagat</th>
        </tr>
        @foreach ($noPagades as $usuariNoPagat)

            <tr>
                <td class='dni'>{{$usuariNoPagat->dni}}</td>
                <td class='nom'>{{$usuariNoPagat->nom}}</td>
                <td class='cognoms'>{{$usuariNoPagat->cognoms}}</td>
                <td class='confirmat'><a class='btn btn-danger' href='cuotes/pagada/{{$usuariNoPagat->id}}'>CONFIRMAT</a></td>
                <td class='confirmat'><a class='btn btn-success' href='cuotes/pagada/{{$usuariNoPagat->id}}'>PAGAT</a></td>
            </tr>
            
        @endforeach
    </table>
    <a href="{{route('inici')}}" class='inici info-card mb-1'>
        <h1>🏠</h1>
        <h3>Inici</h3>
    </a>
    <a href="{{route('sortir')}}" class='logout info-card'>
        <h1>🚪</h1>
        <h3>Tancar sessió</h3>
    </a>
</div>
@include('includes.footer')