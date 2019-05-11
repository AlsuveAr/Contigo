@extends('layouts.app')

@section('extra-css')
<style type="text/css">
	#clients #clientes img, #mensajes img, #pendiente img {
		opacity: 0.5;
		background: black;
		height: 200px;
		width: 345px;
	}
	#clients #clientes .bg-img, #mensajes .bg-img, #pendiente .bg-img {
		z-index: 100;
		background: black !important;
		height: 200px !important;
		width: 345px;
	}
	#clients #clientes p, #mensajes p, #pendiente p {
		padding-left: 1.8em;
		padding-right: 1.8em;
		text-align: center;
	}
	#clients .card-img-overlay i, .card-img-overlay span, .card-img-overlay p{
		padding-top: 10px;
	}
	#clients .bg-i {
		width: 90px; 
		height: 90px; 
		border-radius: 50%; 
		background: white; 
		opacity: 0.3; 
		position: relative; 
		left: 8.5em;
	}
	#clients a {
		text-decoration: none;
		color: white;
	}
	#clients a:hover {
		color: #ccc;
		position: relative;
		top: -5px;
	}
</style>
@endsection

@section('content')
<div class="d-flex">
	<div class="row" id="clients">
		<div class="col-4 " id="clientes">
			<div class="bg-img">
				<img src="{{ asset('img/img1.jpg')}}" class="card-img">
			</div>
			<div class="card-img-overlay text-center text-white">
				<br>					
				<a href="{{ route('counselor.clients') }}"><div class="bg-i">
					<i class="fas fa-users fa-3x"></i><br>
				</div></a>
				
				<br>
				<a href="{{ route('counselor.clients') }}">{{count($clients)}} clientes</a>
			</div>
		</div>
		<div class="col-4 " id="mensajes">
			<div class="bg-img">
				<img src="{{ asset('img/keyboard.jpg')}}" class="card-img">
			</div>
			
			<div class="card-img-overlay text-center text-white">
				<br>
				<div class="bg-i">
					<i class="fas fa-users fa-3x"></i><br>
				</div>
				<br>
				<span>19 clientes</span>
				
			</div>
		</div>
		<div class="col-4" id="pendiente">
			<div class="bg-img">
				<img src="{{ asset('img/plant.jpg')}}" class="card-img">
			</div>
			
			<div class="card-img-overlay text-center text-white">
				<br>
				<div class="bg-i">
					<i class="fas fa-users fa-3x" ></i><br>
				</div>
				<br>
				<span>19 clientes</span>
			</div>
		</div>
	</div>

</div>
<div class="container">
	<div class="row mt-3">
		<h2>Clientes</h2>
		<div class="col-12 card card-body">
			<table class="table table-borderless table-hover table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Nombre</th>
						<th>Test</th>
						<th>Resultado</th>
						<th>Asosiado</th>
						<th>Mensajes</th>
						
					</tr>
				</thead>
				<tbody>
					@foreach($clients as $client)
					<tr>
						<td>{{ $client->client->id }}</td>
						<td ><a href="{{ route('counselor.client', $client->client->id ) }}">{{ $client->client->name}}</a></td>
						<td>{{ $client->test }}</td>
						<td>{{ $client->result_test }}</td>
						<td>{{ $client->created_at }}</td>
						<td>0</td>
						
					</tr>
					@endforeach
					
				</tbody>
			</table>
			
		</div>
		
	</div>
</div>
@endsection