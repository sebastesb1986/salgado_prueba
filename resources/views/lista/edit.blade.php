@extends('layout.app')

@section('title', 'Modificar empleado')



@section('content')

<div class="py-3 text-left">
    <h1>Modificar empleado</h1>
</div>

<div class="alert alert-primary" role="alert">
  Los campos con asteriscos(*) son obligatorios.
</div>

<form class="needs-validation" method="POST" action="{{ route('actualizar', $employee->id) }}">
    @csrf @method('PUT')
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Nombre completo(*)</label>
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="firstName" placeholder="Nombre completo" name="nombre" value="{{ old('nombre', $employee->nombre) }}">
            @error('nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Correo electrónico(*)</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="lastName" placeholder="Correo electrónico" name="email" value="{{ old('email', $employee->email) }}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>

        <div class="mb-3">
          <label for="username">Sexo(*)</label>@error('customRadio') <label class="font-weight-bold text-danger">{{ $message }}</label>@enderror
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input @error('customRadio') is-invalid @enderror" value="{{ old('customRadio','M') }}" {{ ($employee->sexo == 'M' ? 'checked' : '') }}>
                <label class="custom-control-label" for="customRadio1">Masculino</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input @error('customRadio') is-invalid @enderror" value="{{ old('customRadio', 'F') }}" {{ ($employee->sexo == 'F' ? 'checked' : '') }}>
                <label class="custom-control-label" for="customRadio2">Femenino</label>
            </div>
            
        </div>

        <div class="mb-3">
          <label for="email">Area(*)</label>
            <select class="custom-select @error('area') is-invalid @enderror" name="area">
                @foreach($areas as $area)
                    <option {{ old('area', $employee->area_id) == $area->id ? 'selected' : ''}} value="{{ $area->id }}">{{ $area->nombre }}</option>
                @endforeach
            </select>
            @error('area')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
          <label for="address">Descripción(*)</label>
          <textarea class="form-control @error('description') is-invalid @enderror" id="validationTextarea" placeholder="" name="descripcion"> {{ old('nombre', $employee->descripcion) }}</textarea>
          @error('descripcion')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <div class="mb-3">
            <div class="custom-control custom-checkbox">
                
                <input type="checkbox" class="custom-control-input" id="same-addressi" name="boletin" value="{{ old('boletin', $employee->boletin) }}" {{ ($employee->boletin == 1 ? 'checked' : '') }} >
                <label class="custom-control-label" for="same-addressi">Deseo recibir boletin informativo</label>
            </div>
        </div>

        <label for="">Roles(*)</label>@error('roles') <label class="font-weight-bold text-danger">{{ $message }}</label>@enderror
    
        @foreach($roles as $rol)

            <div class="custom-control custom-checkbox">

                <input type="checkbox" class="custom-control-input @error('roles') is-invalid @enderror" name="roles[]" id="same-address{{ $rol->id }}" value="{{ $rol->id }}" {{ collect( old('roles', (count($employee->roles) != 0) ? $employee->roles->pluck('id') : '' ) )->contains($rol->id) ? 'checked' : '' }}  >
                <label class="custom-control-label" for="same-address{{ $rol->id }}">{{ $rol->nombre }}</label>
            </div>

        @endforeach
       

       
        <hr class="mb-4">
        <button class="btn btn-warning" type="submit">Modificar</button>
      </form>

@stop
