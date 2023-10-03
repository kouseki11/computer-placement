@extends('layouts.login')

@section('container')

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign Up
					</span>
				</div>

				

				@if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

				<form action="{{ route('registerAccount') }}" method="post" class="login100-form validate-form">
					@csrf
					<div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Name</span>
						<input class="input100" type="text" name="name" id="name" placeholder="Enter Name" autofocus required value="{{ old('name') }}">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" id="username" placeholder="Enter username"  required value="{{ old('username') }}">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" id="email" placeholder="Enter email" required value="{{ old('email') }}">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" id="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
						</div>

						<div>
							<a href="{{ route('login') }}" class="txt1">
								Sign In!
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Register
						</button>
					</div>
                    
				</form>
			</div>
		</div>
	</div>

@endsection