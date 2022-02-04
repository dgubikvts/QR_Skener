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
      </ul>
      <form action="{{route('search')}}" method="GET" class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Pretrazi..." aria-label="Search" name="query" id="query">
        <button class="btn btn-outline-success" type="submit" id="pretraga">Search</button>
      </form>
      <form action="{{route('searchbarcode')}}" method="GET" class="d-none">
        <input class="form-control me-2" type="search" placeholder="Pretrazi..." aria-label="Search" name="query" id="barcode">
        <button class="btn btn-outline-success" type="submit" id="barcodesearch">Search</button>
      </form>
    </div>
  </div>
</nav>