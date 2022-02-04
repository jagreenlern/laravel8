{{-- zona admin--}}
<div class='container my-3'>

{{--no encuentro modelo ni controlador--}}
	@if(\App\HorizontCMS::isInstalled() && \Auth::check() && \Settings::get('admin_broadcast') != '')
	<div class="alert alert-info alert-dismissible" role="alert">
		  <span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span>
		  <strong>Broadcast message: </strong> {{ \Settings::get('admin_broadcast') }}
	</div>
	@endif
	{{--clase session dentro del framework laravel funcion session()->has('message') --}}
	@if(session()->has('message'))
	{{--recorrer todos los elementos de la coleccion --}}
		@foreach(session()->get('message') as $key => $value)
		
		<div class="alert alert-{{ $key }} alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

		  @if($key == 'success')
		  <span class='glyphicon glyphicon-ok' aria-hidden='true'></span> 
		  @elseif($key == 'danger')
		  <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
		  @elseif($key == 'warning')
		  <span class='glyphicon glyphicon-warning-sign' aria-hidden='true'></span>
		  @elseif($key == 'info')
		  <span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span>
		  @endif
		  
		  {{--ucfirst — Convierte el primer caracter de una cadena a mayúsculas--}}
		  <strong>{{ ucfirst($key) }}!</strong> {{ $value }}
		</div>
		@endforeach
	@endif
</div>
