@extends('layouts.app')

@section('content')
<div class="container container-body">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Actualizar Contacto</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ url('actualizar-contacto/'.$contacto->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @include('contacts.generalForm')
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-warning">
                                    Actualizar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection