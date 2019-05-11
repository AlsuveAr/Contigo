@extends('layouts.couseling')

@section('extra-css')
<style type="text/css">
	
	#chat {
        display: grid;
        grid-template-columns: 1fr 3fr;
        grid-gap: none;
        height: 80vh;
    }

    #chat #msg {

    	height: 82vh;
    	width: 100%;
        /*padding-top: 10px;
        padding-left: 1rem;
        padding-right: 1rem;*/
        overflow: hidden;
        overflow-y: scroll;
    }
    #chat #msg .msg-autor, #chat #msg .msg-friend {
    	padding-top: 10px;
        padding-left: 1rem;
        padding-right: 1rem;
    }
    /*stilos internos de chat*/
    #msg #msg-info {
    	display: block;
    	text-align: center;
    	background-color:  #e2f8f9;
    }
    #msg #msg-info img {
    	text-align: center;
    	width: 150px;
    	padding-top: 15px;
    	padding-bottom: 15px;
    }

    #msg p {
        margin-bottom: 0;
        padding-bottom: 0;
    }

    /*Estilos de la parte informativa*/
    .chat-info .container {
    	/*background-color: #6AA371;*/
    	padding-top: 10px;
    	padding-bottom: 10px;
    }
    .chat-info .container input {
    	border-radius: 15px;
    }
    #clients .client {
    	display: flex;
        text-decoration: none;
        color: black;
    }
    .client .content {
    	margin-left: 1rem;
    	
    }

    #clients img {
    	width: 50px;
    	height: 50px;
    	border-radius: 50%;
    }
    
</style>
@endsection
@section('content')

<div class="chat" id="chat">
	<div class="chat-info">
		<div class="container">
			<input type="text" name="buscar" class="form-control" placeholder="buscar...">
		</div>
		<div class="container" id="clients">
			@foreach($histories as $history)
				<a href="{{ route('counselor.message', $history->id ) }}" class="client">
					<img src="{{ asset('img/profile/team-'.rand(1,4).'-800x800.jpg') }}">
					<div class="content">
						<div class="name">
							<strong>{{ $history->client->name }}</strong>
							
						</div>
						<p>Estracto ultimo mensaje</p>
					</div>
				</a>
			@endforeach
		</div>
	</div>
	<chat :room="{{ $room }}"></chat>
	
</div>

@endsection

@section('extra-js')
	<script>
		
	</script>
@endsection