@extends('layouts.general')
@section('content')			  
<div class="bg-white mt-5 p-md-5 rounded shadow-sm">

	  <div class="row">
		<div class="col-12">
		  <div class="text-center mb-5">
			<h4> FORGOT PASSWORD</h4>
			<!-- <a href="#!">
			  <img src="{{asset('build/assets/images/logo.jpg')}}" alt="BootstrapBrain Logo" width="175" height="57">
			</a> -->
		  </div>
		</div>
	  </div>
		  <form method="POST" action="{{ route('password.email') }}">
			@csrf
			<div class="row gy-3 gy-md-4 overflow-hidden">
			  <div class="col-12">
				<label for="email" class="form-label">Email <span class="text-danger">*</span></label>
				<div class="input-group">
				  <span class="input-group-text">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
					  <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
					</svg>
				  </span>
				  <input type="email" class="form-control" name="email" id="email" required>
				</div>
			  </div>
			  
			  <div class="col-12">
				<div class="d-grid">
				  <button class="btn btn-primary btn-lg" type="submit">Send Password Reset Link</button>
				</div>
			  </div>
			</div>
		  </form>
	  <div class="row">
		<div class="col-12">
		  <hr class="mt-3 mb-0 border-secondary-subtle">
		  <div class="d-flex gap-2 gap-md-2 flex-column flex-md-row justify-content-md-between">
				@if (Route::has('register'))
					<a href="{{ route('register') }}" class="link-secondary text-success text-decoration-none">Create new account >></a>
				@endif
				@if (Route::has('login'))
					<a class="link-secondary text-warning text-decoration-none" href="{{ route('login') }}">
						{{ __('Login >>') }}
					</a>
				@endif
		  </div>
		</div>
	  </div>
	  
	  
</div>
						
@endsection			