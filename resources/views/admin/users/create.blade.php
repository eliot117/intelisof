@extends('admin.layouts.app')

@section('title')
Crear un Usuario
@endsection

@section('subtitle')
Añadir nuevo usuario
@endsection

@section('validation')
<div class="col-md-12">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li> <p>{{ $error }}</p> </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@endsection

@section('content')
<form class="form-horizontal" method="POST" action="{{ route('users.store')}}">
    @csrf
      <div class="card-body">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Nombres:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control " name="name" placeholder="Ingrese sus nombres" value="{{ old('name') }}">
            </div>

        </div>
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">Apellidos:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="lastname" placeholder="Ingrese sus apellidos" value="{{ old('lastname') }}">
          </div>

      </div>
        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">Correo Electronico:</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" name="email" placeholder="Ingrese un correo electronico" value="{{ old('email') }}">
          </div>

        </div>
        <div class="form-group row">
            <div class="col-sm-2 col-form-label">
              <span><b>Asignar un Rol</b></span>
            </div>
            <div class="col-sm-10">
            @foreach ($roles as $role)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->id }}">
                    <label class="form-check-label">{{ $role->name, ucfirst($role->name) }}</label>
                </div>
            @endforeach
            </div>
        </div>
        <div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">Contraseña:</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="password" placeholder="Ingrese una contraseña" value="{{ old('password') }}">
          </div>

        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Repite Contraseña</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirme contraseña">
            </div>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a class="btn btn-warning" href="{{ route('users.index') }}">Cancelar</a>
      </div>
      <!-- /.card-footer -->
</form>
@endsection
