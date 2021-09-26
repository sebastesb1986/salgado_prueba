@extends('layout.app')

@section('title', 'Crear empleados')



@section('content')

<div class="py-3 text-left">
    <h1>Crear empleado</h1>
</div>

<div class="alert alert-primary" role="alert">
{{ $errors}}
</div>

<form class="needs-validation" method="POST" action="{{ route('empleado.store') }}">
    @csrf
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Nombre completo(*)</label>
            <input type="text" class="form-control" id="firstName" placeholder="Nombre completo" name="nombre" value="{{ old('nombre') }}">
            <div class="invalid-feedback">
              Valid first name is .
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Correo electrónico(*)</label>
            <input type="text" class="form-control" id="lastName" placeholder="Correo electrónico" name="email" value="{{ old('email') }}">
            <div class="invalid-feedback">
              Valid last name is .
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="username">Sexo(*)</label>
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" value="M" {{ old('customRadio') == 'M' ? 'checked' : '' }}>
                <label class="custom-control-label" for="customRadio1">Masculino</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" value="F" {{ old('customRadio') == 'F' ? 'checked' : '' }}>
                <label class="custom-control-label" for="customRadio2">Femenino</label>
            </div>
            
        </div>

        <div class="mb-3">
          <label for="email">Area(*)</label>
            <select class="custom-select" name="area">
                @foreach($areas as $area)
                    <option value="{{ $area->id }}" {{ old('area') == $area->id ? 'selected' : '' }}  >{{ $area->nombre }}</option>
                @endforeach
            </select>
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>

        <div class="mb-3">
          <label for="address">Descripción(*)</label>
          <textarea class="form-control" id="validationTextarea" placeholder="Descripción de la experiencia del empleado" name="descripcion">{{ old('descripcion') }}</textarea>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

        <div class="mb-3">
            <div class="custom-control custom-checkbox">
                
                <input type="checkbox" class="custom-control-input" id="same-addressi" name="boletin" {{ old('boletin') == true ? 'checked' : '' }}>
                <label class="custom-control-label" for="same-addressi">Deseo recibir boletin informativo</label>
            </div>
        </div>

        <label for="">Roles(*)</label>
      
        @foreach($roles as $rol)

            <div class="custom-control custom-checkbox">
                
                <input type="checkbox" class="custom-control-input" name="roles[]" id="same-address{{ $rol->id }}" value="{{ $rol->id }}" {{ (is_array(old('roles')) && in_array( $rol->id, old('roles'))) ? 'checked' : '' }}>
                <label class="custom-control-label" for="same-address{{ $rol->id }}">{{ $rol->nombre }}</label>
            </div>

        @endforeach
       

       
        <hr class="mb-4">
        <button class="btn btn-primary" type="submit">Guardar</button>
      </form>

@stop
