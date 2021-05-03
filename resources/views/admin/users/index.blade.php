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

<!-- delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Seguro que quieres eliminar este usuario?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <div class="modal-body">Seleccione "Eliminar".<br>
            Nota: Asegurese de verificar cual borrar.</div>
        <div class="modal-footer">
        <button class="btn btn-primary" type="button" data-dismiss="modal">Cancelar</button>
        @if(empty($user))
            unset($user);
        @else
        <form method="POST" action="{{ route('users.destroy', $user->id) }}">
            @method('DELETE')
            @csrf
            <input type="hidden" id="user_id" name="user_id" value="">
            <a style="color: white;" class="btn btn-danger" onclick="$(this).closest('form').submit();">Eliminar</a>
        </form>
        @endif
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
            var button     = $(event.relatedTarget)
            var user_id   = button.data('userid')

            var modal = $(this)
            modal.find('.modal-footer #user_id').val(user_id)
        })
</script>
@endsection
