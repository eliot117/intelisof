@extends('admin.layouts.app')

@section('title')
Lista de Roles disponibles
@endsection

@section('subtitle')
Roles para los usuarios
@endsection

@section('content')
<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>Id</th>
      <th>Role</th>
      <th>Editar</th>
      <th>Borrar</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($roles as $role)
        <tr>
            <td>{{ $role->id }}</td>
            <td>{{ $role->name }}</td>
            <td><a href="{{ route('roles.edit', $role->id) }}">
                <button class="btn btn-primary btn-sm">
                    <i class="fa fa-edit"></i>
                </button>
            </a></td>
            <td>
                <a href="#"  data-toggle="modal" data-target="#deleteModal" data-roleid="{{ $role->id }}">
                    <button class="btn btn-danger btn-sm">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
    <tr>
      <th>Id</th>
      <th>Rol</th>
      <th>Editar</th>
      <th>Borrar</th>
    </tr>
    </tfoot>
</table>
@endsection
