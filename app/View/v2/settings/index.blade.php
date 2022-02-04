{{-- zona admin--}}
<div class="container main-container">

{{-- extiende layout.blade.php--}}
@extends('layout')
{{-- seccion content--}}
@section('content')
<div class="container main-container">

<h2>{{trans('settings.settings')}}</h2>
<br>
<br>

<div class="container col-md-12">

<div class="row">
@foreach($panels as $each)


	<div class='well col-md-3 text-center mb-5 bg-dark py-4'>
		<a href='<?= $each['link'] ?>'>
			<i class="{{ $each['icon'] }} text-white mb-2" style='font-size:60px;'></i>
			<h4 class="text-white">{{ $each['name'] }}</h4>
		</a>
	</div>	


@endforeach
</div>
</div>

</div>
<br><br>
@endsection