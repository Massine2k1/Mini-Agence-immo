@extends('admin.admin')

@section('title','Tous les biens')
@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>Les Biens</h1>     
        <a href="{{ route('admin.property.create') }}" class="btn btn-primary">Ajouter un bien</a>
    </div>

    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">Titre</th>
        <th scope="col">Surface</th>
        <th scope="col">Prix</th>
        <th scope="col">Ville</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($properties as $p)
            <tr>
                <td>{{ $p->title }}</td>
                <td>{{ $p->surface }}m2</td>
                <td>{{ number_format($p->price, thousands_separator: ' ')}}</td>
                <td>{{ $p->city }}</td>
                <td>
                    <div class="d-flex gap-2 w-100 justify-content-end align-items-center">
                        <a href="{{ route('admin.property.edit', $p) }}" class="btn btn-primary">Editer</a>
                        <form action="{{ route('admin.property.destroy', $p) }}" method="post" class="d-flex align-items-center m-0 p-0">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>

    {{ $properties->links() }}
@endsection