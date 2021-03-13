@extends('admin.layouts.app')

@section('title')
Editar Usuario
@endsection

@section('subtitle')
Edición del usuario {{ $users->name }} {{ $users->lastname }}
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
<form class="form-horizontal" method="POST" action="{{ route('users.update',$users->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card-body">
      <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">Nombres:</label>
          <div class="col-sm-10">
            <input type="name" class="form-control" name="name" placeholder="Ingrese sus nombres" value="{{ $users->name }}">
          </div>
          @error('name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
      <div class="form-group row">
        <label for="lastname" class="col-sm-2 col-form-label">Apellidos:</label>
        <div class="col-sm-10">
          <input type="name" class="form-control" name="lastname" placeholder="Ingrese sus apellidos" value="{{ $users->lastname }}">
        </div>
        @error('lastname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
      <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Correo Electronico:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" name="email" placeholder="Ingres un correo electronico" value="{{ $users->email }}">
        </div>
        @error('email')
          <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group row">
          <div class="col-sm-2">
            <span><b>Asignar un Rol</b></span>
          </div>
         <div class="col-sm-10">
            @foreach ($roles as $role)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="roles[]"
                @foreach($users->roles as $ur )
                @if($role->id == $ur->id)
                    checked
                @endif
                @endforeach value="{{ $role->id.$users->roles }}">
                <label class="form-check-label">{{ $role->name, ucfirst($role->name) }}</label>
            </div>
            @endforeach
         </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Imagen Perfil</label>
        <div class="col-sm-10">
          <input type="file" class="form-control" name="profile">
        </div>
        @error('profile')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
     </div>
     <div class="form-group row">
         <label class="col-sm-3 col-form-label">Contraseña: <span class="small">(Opcional)</span> </label>
         <div class="col-sm-9">
             <input type="password" class="form-control" name="password" placeholder="Escriba nueva contraseña">
         </div>
     </div>
     <div class="form-group row">
      <label class="col-sm-3 col-form-label">Confirme Contraseña: <span class="small">(Opcional)</span> </label>
      <div class="col-sm-9">
          <input type="password" class="form-control" name="password_confirmation" placeholder="Confirme nueva contraseña">
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
