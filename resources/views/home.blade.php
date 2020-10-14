@extends('layout.header1')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{Auth::user()->email }} </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Bienvenid@!') }}<br>
                    {{Auth::user()->empleado->nombre.' '.Auth::user()->empleado->apellido_paterno.' '.Auth::user()->empleado->apellido_materno }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
