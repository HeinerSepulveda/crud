@extends('layouts.app')
@section('title', __('Inicio'))
@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header"><h5><span class="text-center fa fa-home"></span> @yield('title')</h5></div>
			<div class="card-body">
				<h5>Hola <strong>{{ Auth::user()->name }},</strong> {{ __('Estás conectado. ') }}</h5>
				</br> 
				<hr>
								
				<div class="row w-100">
					<div class="col-md-3">
						<div class="card border-warning mx-sm-1 p-3">
							<div class="card border-warning text-warning p-3 my-card" ><span class="text-center fa fa-users" aria-hidden="true"></span></div>
							<div class="text-warning text-center mt-3"><h4>Usuarios</h4></div>
							<div class="text-warning text-center mt-2"><h1>{{ Auth::user()->count() }}</h1></div>
						</div>
					</div>

					<div class="col-md-3">
						<a href="{{ url('/empleados') }}" class="nav-link">
							<div class="card border-danger mx-sm-1 p-3">
								<div class="card border-danger text-danger p-3 my-card" ><span class="text-center fa fa-person-booth" aria-hidden="true"></span></div>
								<div class="text-danger text-center mt-3"><h4>Empleados</h4></div>
								<div class="text-danger text-center mt-2"><h1>{{ $cantidadEmpleados }}</h1></div>
							</div>
						</a> 
					</div>
				</div>				
			</div>
		</div>
	</div>
</div>
</div>
@endsection