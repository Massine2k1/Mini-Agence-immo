@extends('admin.admin')

@section('title','Toute les options')
@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>Les options</h1>     
        <a href="{{ route('admin.option.create') }}" class="btn btn-primary">Ajouter une option</a>
    </div>

    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">Nom</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($options as $o)
            <tr>
                <td>{{ $o->name }}</td>
                <td>
                    <div class="d-flex gap-2 w-100 justify-content-end align-items-center">
                        <a href="{{ route('admin.option.edit', $o) }}" class="btn btn-primary">Editer</a>
                        <form action="{{ route('admin.option.destroy', $o) }}" method="post" class="d-flex align-items-center m-0 p-0">
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

    {{ $options->links() }}
@endsection