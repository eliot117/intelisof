@extends('admin.layouts.app')

@section('title')
Lista de Permisos
@endsection

@section('subtitle')
Permisos disponibles
@endsection

@section('content')
<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>Id</th>
      <th>Permiso</th>
      <th>Editar</th>
      <th>Borrar</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($permissions as $permiso)
        <tr>
            <td>{{ $permiso->id }}</td>
            <td>{{ $permiso->name }}</td>
            <td><a href="{{ route('permissions.edit', $permiso->id) }}">
                <button class="btn btn-primary btn-sm">
                    <i class="fa fa-edit"></i>
                </button>
            </a></td>
            <td>
                <form action="{{ route('permissions.destroy', $permiso->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                </form>
                {{--<a href="#"  data-toggle="modal" data-target="#deleteModal" data-permisoid="{{ $permiso->id }}">
                    <button class="btn btn-danger btn-sm">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </a>--}}
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
    <tr>
      <th>Id</th>
      <th>Permiso</th>
      <th>Editar</th>
      <th>Borrar</th>
    </tr>
    </tfoot>
</table>

@endsection
