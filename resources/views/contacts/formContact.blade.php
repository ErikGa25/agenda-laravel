@extends('layouts.app')

@section('content')
<div class="container container-body">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Registrar Contacto</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ action('ContactController@store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label">Nombre:</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                            <label for="apellido" class="col-md-4 control-label">Apellido:</label>

                            <div class="col-md-6">
                                <input id="apellido" type="text" class="form-control" name="apellido" value="{{ old('apellido') }}" autofocus>

                                @if ($errors->has('apellido'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('correo') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo:</label>

                            <div class="col-md-6">
                                <input id="correo" type="text" class="form-control" name="correo" value="{{ old('correo') }}">

                                @if ($errors->has('correo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('correo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                            <label for="direccion" class="col-md-4 control-label">Dirección:</label>

                            <div class="col-md-6">
                                <textarea id="direccion" name="direccion" class="form-control">{{ old('direccion') }}</textarea>

                                @if ($errors->has('direccion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('movil') ? ' has-error' : '' }}">
                            <label for="movil" class="col-md-4 control-label">Teléfono Móvil:</label>

                            <div class="col-md-6">
                                <input id="movil" type="text" class="form-control" name="movil" value="{{ old('movil') }}">

                                @if ($errors->has('movil'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('movil') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('imagen') ? ' has-error' : '' }}">
                            <label for="imagen" class="col-md-4 control-label">Foto:</label>

                            <div class="col-md-6">
                                <input id="imagen" type="file" class="form-control" name="imagen" value="{{ old('imagen') }}" accept="image/*">

                                @if ($errors->has('imagen'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('imagen') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('puesto') ? ' has-error' : '' }}">
                            <label for="puesto" class="col-md-4 control-label">Puesto de Trabajo:</label>

                            <div class="col-md-6">
                                <input id="puesto" type="text" class="form-control" name="puesto" value="{{ old('puesto') }}">

                                @if ($errors->has('puesto'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('puesto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }}">
                            <label for="sex" class="col-md-4 control-label">Sexo:</label>

                            <div class="col-md-6">
                                <label>
                                    Hombre: 
                                    <input type="radio" name="sexo" id="optionsRadios1" value="M" checked>
                                </label>
                                <br/>
                                <label>
                                    Mujer: 
                                    <input type="radio" name="sexo" id="optionsRadios2" value="F">
                                </label>

                                @if ($errors->has('sexo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sexo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Crear
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection