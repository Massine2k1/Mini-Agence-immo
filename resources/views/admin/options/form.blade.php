@extends('admin.admin')

@section('title',$option->exists ? 'Editer une option' : 'Ajouter une option')

@section('content')

    <h1>@yield('title')</h1>
    <form action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store', $option) }}" method="post">
        @csrf
        @method($option->exists ? 'PUT' : 'POST')

        @include('shared.input',['label'=> 'Nom', 'name'=> 'name', 'value'=>$option->name])  

        <button class="btn btn-primary" type="submit">
            @if ($option->exists)
              Modifier
            @else
              Créer
            @endif
        </button>
    </form>

@endsection