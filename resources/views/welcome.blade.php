@extends('layouts.app')
@section('title', __('Empleados APP'))
@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h5><span class="text-center fa fa-home"></span> @yield('title')</h5></div>
            <div class="card-body">
              <h5>  
            @guest
				
				{{ __('Bienvenido ') }}  </br>
				Comuníquese con el administrador para obtener sus Credenciales de inicio de sesión o haga clic en "Iniciar sesión" para ir a la pagina principal. 
                
			@else
					Hola {{ Auth::user()->name }}, Bienvenido a Empleados APP.
            @endif	
				</h5>
            </div>
        </div>
    </div>
</div>
</div>
@endsection