<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Administration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.6.1/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.6.1/dist/js/tom-select.complete.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
        <a class="navbar-brand" href="#">Agence</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            @php
                $route = request()->route()->getName();
            @endphp
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a @class(['nav-link','active'=> str_contains($route,'property.')]) href="{{route('admin.property.index')}}">Gérer les biens</a>
                </li>
                <li class="nav-item">
                    <a @class(['nav-link','active'=> str_contains($route,'option.')]) href="{{route('admin.option.index')}}">Gérer les options</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- @if ($errors->any())
          <div class="alert alert-danger">
              <ul class="m-0">
                  @foreach ($errors->all() as $error)
                      <li>$error</li>
                  @endforeach
              </ul>
          </div>
        @endif --}}
        @yield('content')
    </div>

    <script>
        new TomSelect('select[multiple]', {plugins: {remove_button: {title: 'Supprimer'}}})
    </script>
</body>
</html>