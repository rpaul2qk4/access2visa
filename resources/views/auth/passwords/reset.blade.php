@extends('layouts.general')
@section('content')			  
<div class="bg-white p-md-5 rounded shadow-sm" style="margin-left:20px !important;margin-right:20px !important;">

	  <div class="row">
		<div class="col-12">
		  <div class="text-center mb-5">
			<a href="#!">
			  <img src="{{asset('build/assets/images/logo.jpg')}}" alt="BootstrapBrain Logo" width="175" height="57">
			</a>
		  </div>
		</div>
	  </div>
		  <form method="POST" action="{{ route('password.update')  }}">
			@csrf
			<div class="row gy-3 gy-md-4 overflow-hidden">
			 
			  <div class="col-12">
				<label for="password" class="form-label">Password <span class="text-danger">*</span></label>
				<div class="input-group">
				  <span class="input-group-text">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
					  <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
					  <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
					</svg>
				  </span>
				  <input type="password" class="form-control" name="password" id="password" value="" required>
				</div>
			  </div> 
			  <div class="col-12">
				<label for="password" class="form-label">Confirm Password <span class="text-danger">*</span></label>
				<div class="input-group">
				  <span class="input-group-text">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
					  <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
					  <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
					</svg>
				  </span>
				  <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="" required>
				</div>
			  </div>
			  <div class="col-12">
				<div class="d-grid">
				  <button class="btn btn-primary btn-lg" type="submit">Reset Password</button>
				</div>
			  </div>
			</div>
		  </form>
	  <div class="row">
		<div class="col-12">
		  <hr class="mt-3 mb-0 border-secondary-subtle">
		  <div class="d-flex gap-2 gap-md-2 flex-column flex-md-row justify-content-md-center">
				@if (Route::has('register'))
					<a href="{{ route('register') }}" class="link-secondary text-success text-decoration-none">Create new account</a>
				@endif
				@if (Route::has('login'))
					<a class="link-secondary text-warning text-decoration-none" href="{{ url('/') }}">
						{{ __('<< Login') }}
					</a>
				@endif
		  </div>
		</div>
	  </div>
	  
	  
</div>
						
@endsection			