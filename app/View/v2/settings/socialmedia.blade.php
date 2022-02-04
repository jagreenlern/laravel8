{{-- zona admin--}}
{{-- extiende layout.blade.php--}}
@extends('layout')
{{-- seccion content--}}
@section('content')
<div class='container main-container'>

<h2 class="mb-5">Social media</h2>

<form action='' role='form' method='POST'>
{{csrf_field()}}

<table class='table-bordered' id='settings' style='width:100%;text-align:center;'>

<tbody style='text-align:center;font-weight:bolder;'>

<?php 
	
	foreach($all_socialmedia as $each){

		echo "<tr><td>
				<i class='fa fa-".$each->getName()."' aria-hidden='true' style='font-size:26px;'></i> ".ucfirst($each->getName())."</td><td>
				<input type='text' class='form-control' name='".$each->getName()."' value='".htmlspecialchars($each->value)."'>
			</td></tr>";


	}



?>


<tr><td></td>
<td><button type='submit' class='btn btn-primary'>
		<span class='fa fa-floppy-o' aria-hidden='true'></span> Save settings</button> </td></tr>



</tbody></table>
</form>

</div>
@endsection