<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid d-flex justify-content-between">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/">Pocetna</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/scanner">Bar-kod skener</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/orders">Sve porudzbine</a>
        </li>
      </ul>
    </div>
    <div class="d-flex justify-content-end align-items-center col-10 col-md-8">
      <a href="{{route('cart')}}" class="mx-3 korpa d-flex">
        <i class="fas fa-shopping-cart velicina mx-2"></i><p class="m-0 cartquantity" data-qty="{{ App\Http\Controllers\CartController::cartQty() }}">{{ App\Http\Controllers\CartController::cartQty() }}</p>
      </a>
      
      <form action="{{route('search')}}" method="GET" class="d-flex col-6 col-lg-4 col-xl-3">
        <input class="form-control me-2" type="search" placeholder="Pretrazi..." aria-label="Search" name="query" id="query">
        <button class="btn btn-outline-success" type="submit" id="pretraga"><i class="fal fa-search"></i></button>
      </form>
      @guest
        @if (Route::has('login'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Prijavi se</a>
          </li>
        @endif

      @else
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }}
          </a>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('profile') }}">
              Moj profil
            </a>
            <a class="dropdown-item" href="{{ route('my.orders') }}">
              Moje porudzbine
            </a>
            <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
              Odjavi se
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </li>
      @endguest
    </div>
    
  </div>
</nav>
