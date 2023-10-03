@extends('layouts.login')

@section('container')

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign In
					</span>
				</div>

				@if (session('notAllowed'))
				<script>
					Swal.fire(
					'Silahkan Login Terlebih Dahulu!',
					'',
					'warning'
					)
				</script>
				@endif

				@if (session('LoginError'))
                <script>
                    Swal.fire(
                    'Login Gagal!',
                    'Silahkan Login Kembali!',
                    'error'
                    )
                </script>
                @endif
  
				  @if (session('success'))
				  <script>
					  Swal.fire(
					  'Berhasil Register!',
					  'Silahkan Login!',
					  'success'
					  )
				  </script>
				  @endif

				  @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

				<form action="{{ route('login.auth') }}" method="post" class="login100-form validate-form">
					@csrf
					<div class="wrap-input100 validate-input m-b-26" data-validate="Please input valid Email">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" id="email" placeholder="Enter email" autofocus required value="{{ old('email') }}">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" id="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
						</div>

						<div>
							<a href="{{ route('register') }}" class="txt1">
								Register Here!
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection