@extends('layouts.app')

@section('extra-css')
<style type="text/css">
	.card-profile-image a img {
		position: relative;
		top: -40px;
	}
	.card-profile-image a:hover {
		position: relative;
		top: -5px;
		transition-porperty: fadeout;
		transition-duration: 1s;
	}
	.card-h {
		position: relative;
		top: -140px;

	}
	.card-h a {
		font-weight: bold;
		color: white;

	}
	.card-h a:hover{
		position: relative;
		top: -5px;
	}
	.card-profile-stats {
		position: relative;
		top: -30px;
		text-align: center;
		justify-content: space-around !important;
	}
	.card-profile-stats .heading {
		color: ##2c343c;
		font-size: 1.2em;
		font-weight: bold;

	}
	.description {
		color: #ccc;
		font-weight: bold;
	}

	#msg {
		height: 100px !important;
	}
</style>
@endsection

@section('content')
<div class="container">
	<div class="row mt-3">
		<h2>Información de Asesor</h2>
		<br>
		<div class="col-12">
			<div class="row">
				<div class="col-8 ">
					<div class="card card-body shadow">
						<h3 class="mb-3 description">Información de Asesor</h3>
						<form action="{{ route('counselor.profile') }}" method="POST" autocomplete="off">
							@csrf
							@method('PUT')

							@if (session('status'))
					            <div class="alert alert-success alert-dismissible fade show" role="alert">
					                {{ session('status') }}
					                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					                    <span aria-hidden="true">&times;</span>
					                </button>
					            </div>
					        @endif
							<div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
								<label class="form-control-label" for="input-name">Nombre</label>
								<input type="text" class="form-control shadow form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" value="{{ old('name', auth()->user()->counselor->name) }}" required>

								@if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="form-group {{ $errors->has('lst_name') ? ' has-danger' : '' }}">
								<label class="form-control-label" for="input-name">Apellido</label>
								<input type="text" class="form-control shadow form-control-alternative{{ $errors->has('lst_name') ? ' is-invalid' : '' }}" name="lst_name" id="lst_name" value="{{ old('lst_name', auth()->user()->counselor->lst_name) }}" required>

								@if ($errors->has('lst_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lst_name') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="form-group {{ $errors->has('bio') ? ' has-danger' : '' }}">
								<label class="form-control-label" for="input-name">Biografía</label>
								<textarea class="form-control shadow form-control-alternative{{ $errors->has('bio') ? ' is-invalid' : '' }}" name="bio" id="bio" rows="4" required>{{ old('bio', auth()->user()->counselor->bio) }}</textarea>

								@if ($errors->has('bio'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="form-group {{ $errors->has('msg') ? ' has-danger' : '' }}">
								<label class="form-control-label" for="input-name">Mensaje a mostrar</label>
								<textarea class="form-control shadow form-control-alternative{{ $errors->has('msg') ? ' is-invalid' : '' }}" name="msg" id="msg" required>{{ old('msg', auth()->user()->counselor->msg) }}</textarea>

								@if ($errors->has('msg'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('msg') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="text-center">
								<button type="submit" class="btn btn-primary mb-4">Actualizar</button>
							</div>
						</form>
					</div>
					
				</div>
				<div class="col-4 card shadow " id="card-profile">
					<div class="row justify-content-center">
						<div class="card-profile-image">
	                        <a href="#">
	                            <img src="{{ asset('img/profile/team-4-800x800.jpg') }}" class="rounded-circle" width="180px;" >
	                        </a>
	                    </div>
	                </div>
	                <div class="card-h text-center ">
                        <div class="d-flex justify-content-around">
                            <a href="#" class="btn btn-sm btn-info mr-4">{{ __('Connect') }}</a>
                            <a href="#" class="btn btn-sm btn-dark float-right">{{ __('Message') }}</a>
                        </div>
                    </div>
					<div class="card-body">
						<div class="row">
							<div class="col">
								<div class="card-profile-stats d-flex justify-content-center">
									<div>
                                        <span class="heading">22</span><br>
                                        <span class="description">{{ __('Friends') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">10</span><br>
                                        <span class="description">{{ __('Photos') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">89</span><br>
                                        <span class="description">{{ __('Comments') }}</span>
                                    </div>
								</div>
							</div>
						</div>
						<div class="text-center">
                            <h4>
                                {{ auth()->user()->name }}<span class="font-weight-light">, 27</span>
                            </h4>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>Caracas, Venezuela
                            </div>
                            <div class="mt-4">
                                <i class="ni education_hat mr-2"></i>{{ __('University of Computer Science') }}
                            </div>
                            <hr class="my-4" />
                            <p>{{ $counselor->bio }}</p>
                            <br>
                        	<a class="nav-link disabled" href="#">Mostar mas...</a>
                        </div>
                        
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-8 ">
					<div class="card card-body shadow">
						<h3 class="mb-3 ">Editar perfil</h3>
						<h5 class="description">Informacion de usuario</h5>
						<form action="{{ route('counselor.profileUpdate') }}" method="POST" autocomplete="off">
							@csrf
							@method('PUT')
							@if (session('status'))
					            <div class="alert alert-success alert-dismissible fade show" role="alert">
					                {{ session('status') }}
					                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					                    <span aria-hidden="true">&times;</span>
					                </button>
					            </div>
					        @endif
					        <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
								<label class="form-control-label" for="input-name">Nombre</label>
								<input type="text" class="form-control shadow form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" value="{{ old('name', auth()->user()->name) }}" required autofocus>

								@if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
								<label class="form-control-label " for="input-email">Email</label>
								<input type="email" class="form-control shadow form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>

								@if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-primary mb-4">Guardar</button>
							</div>
						</form>
						
						<hr class="my-5">
						<h5 class="description">Contraseña</h5>
						<form action="{{ route('counselor.profilePassword') }}" method="POST" autocomplete="off">
							@csrf
							@method('PUT')

							@if (session('password_status'))
			                    <div class="alert alert-success alert-dismissible fade show" role="alert">
			                        {{ session('password_status') }}
			                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                            <span aria-hidden="true">&times;</span>
			                        </button>
			                    </div>
			                @endif

			                <div class="form-group {{ $errors->has('old_password') ? ' has-danger' : '' }}">
			                	<label class="form-control-label" for="input-current-password">{{ __('Contraseña actual') }}</label>
			            		<input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Contraseña actual') }}" value="" required>
			                </div>
			                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
			                    <label class="form-control-label" for="input-password">{{ __('Nueva Contraseña') }}</label>
			                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Nueva Contraseña') }}" value="" required>
			                    
			                    @if ($errors->has('password'))
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $errors->first('password') }}</strong>
			                        </span>
			                    @endif
			                </div>
			                <div class="form-group">
			                    <label class="form-control-label" for="input-password-confirmation">{{ __('Confirmar Contraseña') }}</label>
			                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirmar Contraseña') }}" value="" required>
			                </div>
			                <div class="text-center">
								<button type="submit" class="btn btn-primary mb-4">Guardar</button>
							</div>
						</form>
						{{--{{ Form::open(['route'=> 'counselor.info', 'method'=> 'POST'] ) }}
							{{ Form::label('password', 'Contaseña') }}
							{{ Form::input('password', '', '',['class' => 'form-control shadow' ]) }}<br>
							{{ Form::label('new_password', 'Nueva Contaseña') }}
							{{ Form::input('new_password', '', '',['class' => 'form-control shadow' ]) }}<br>
							{{ Form::label('rpt_password', 'Repita Contaseña') }}
							{{ Form::input('rpt_password', '', '',['class' => 'form-control shadow' ]) }}<br>
							<div class="form-group text-center">
								
							{{ Form::button('Actualizar', ['class'=> 'btn btn-primary']) }}
							</div>

						{{ Form::close()}}--}}
					</div>

				</div>
			</div>

		</div>
		
	</div>
	<br>
	<br>
</div>
@endsection