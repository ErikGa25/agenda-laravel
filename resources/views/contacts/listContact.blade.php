@extends('layouts.app')

@section('content')
<div class="container container-body">
    @if($contactos->isEmpty())
        <h1>Tu lista de contactos esta vacía.</h1>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <tr class="head-table">
                    <th>Nombre completo</th>
                    <th>Correo</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Puesto</th>
                    <th>Sexo</th>
                    <th>Foto</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach ($contactos as $contacto)
                    <tr class="datos">
                        <td>{{ $contacto->name.' '.$contacto->username }}</td>
                        <td>{{ $contacto->email }}</td>
                        <td>{{ $contacto->address }}</td>
                        <td>{{ $contacto->cellphone }}</td>
                        <td>{{ $contacto->job_title }}</td>
                        <td>{{ $contacto->sex }}</td>
                        <td><img src="{{ asset('/foto/'.$contacto->image) }}" class="img-responsive img-circle foto" alt="Foto"></td>
                        <td><a href="{{ url('actualizar-contacto/'.$contacto->id) }}" class="btn btn-warning">Editar</a></td>
                        <td><a href="{{ url('eliminar-contacto/'.$contacto->id) }}" class="btn btn-danger">Eliminar</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endif
    
    <div class="pull-right">
        {{ $contactos->links() }}
    </div>
    <div class="clearfix"></div>
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
</div>
@endsection