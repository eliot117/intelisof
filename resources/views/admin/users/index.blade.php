@extends('admin.layouts.app')

@section('title')
Lista de Usuarios
@endsection

@section('subtitle')
Usuarios registrados
@endsection

@section('content')
<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>Id</th>
      <th>Nombres</th>
      <th>Apellidos</th>
      <th>Correo</th>
      <th>Rol</th>
      <th>Editar</th>
      <th>Borrar</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->lastname }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @foreach($user->roles as $role)
                    {{ $role->name }}
                @endforeach
            </td>
            <td><a href="{{ route('users.edit', $user->id) }}">
                <button class="btn btn-primary btn-sm">
                    <i class="fa fa-edit"></i>
                </button>
            </a></td>
            <td>
                <a href="#"  data-toggle="modal" data-target="#deleteModal" data-userid="{{ $user->id }}">
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
      <th>Nombres</th>
      <th>Apellidos</th>
      <th>Correo</th>
      <th>Rol</th>
      <th>Editar</th>
      <th>Borrar</th>
    </tr>
    </tfoot>
  </table>
@endsection

@section('js')

@endsection
