      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('inici')}}">
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title">Inici</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#seccions" aria-expanded="false" aria-controls="seccions">
              <i class="ti-palette menu-icon"></i>
              <span class="menu-title">Seccions</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="seccions">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('seccio.katalakaska')}}">Katalakaska</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('seccio.projectecoco')}}">Projecte Coco</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('seccio.kapomba')}}">Kapomba</a></li>
              </ul>
            </div>
          </li>
          @if( auth()->user()->membre == 'junta' )
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#socis" aria-expanded="false" aria-controls="socis">
              <i class="ti-user menu-icon"></i>
              <span class="menu-title">Socis</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="socis">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('junta.socis')}}"> Llistat </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('junta.cuotes')}}"> Cuotes </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('construccio')}}"> Colònies </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('construccio')}}">
              <i class="ti-layout-list-post menu-icon"></i>
              <span class="menu-title">Facturació</span>
            </a>
          </li>
          @endif
        </ul>
      </nav>