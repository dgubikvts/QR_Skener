<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Pocetna</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/skener">Skener</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/orders">Porudzbine</a>
        </li>
      </ul>
      <a href="{{route('cart')}}" class="mx-3 korpa d-flex">
        <i class="fas fa-shopping-cart velicina mx-2"></i><p class="m-0 cartquantity">{{ App\Http\Controllers\ProizvodiController::cartQty() }}</p>
      </a>
      <a href="{{route('flush')}}">
        <p>Obrisi kes</p>
      </a>
      <form action="{{route('search')}}" method="GET" class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Pretrazi..." aria-label="Search" name="query" id="query">
        <button class="btn btn-outline-success" type="submit" id="pretraga"><i class="fal fa-search"></i></button>
      </form>

    </div>
  </div>
</nav>
