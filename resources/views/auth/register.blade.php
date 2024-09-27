@extends('layouts.general')
@section('content')			  
<div class="bg-white mt-4 p-md-3 rounded shadow-sm" style="margin-left:20px !important;margin-right:20px !important;">
	<style>
      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        display: none;
      }
	  *::-webkit-scrollbar {
			width: 5px;
		}
    </style>
	  <div style="padding-left:20px;padding-right:20px;">
	  <div class="row">
		<div class="col-12">
		  <div class="text-center mb-5">
		 <h4> REGISTER</h4>
			<!-- <a href="#!">
			  <img src="{{asset('build/assets/images/logo.jpg')}}" alt="BootstrapBrain Logo" width="175" height="57">
			</a> -->
		  </div>
		</div>
	  </div>
	  <form method="POST" action="{{ route('register') }}">
		@csrf
		<div class="row gy-1 gy-md-3 overflow-hidden">
		  <div class="col-6">
			<label for="name" class="form-label">Name <span class="text-danger">*</span></label>
			<div class="input-group">
			  <span class="input-group-text">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
				  <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
				</svg>
			  </span>
			  <input type="text" class="form-control" name="name" id="name" required>
			</div>
		  </div>
		  
		   <div class="col-6">
			<label for="name" class="form-label">Mobile <span class="text-danger">*</span></label>
			<div class="input-group">
			  <span class="input-group-text">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
				  <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
				  <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
				</svg>
			  </span>
			  <input type="number" class="form-control" min="10" max="10" name="mobile" id="mobile" required>
			</div>
		  </div>
		  
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
			<div class="d-grid">
			  <button class="btn btn-primary btn-lg" type="submit">Register</button>
			</div>
		  </div>
		</div>
	  </form>
	  <div class="row">
		<div class="col-12">
		  <hr class="mt-1 mb-0 border-secondary-subtle">
		  <div class="d-flex gap-2 gap-md-1 flex-column flex-md-row justify-content-md-end">
				@if (Route::has('login'))
					<a class="link-secondary text-warning text-decoration-none" href="{{ route('login') }}">
						{{ __('Login >>') }}
					</a>
				@endif
		  </div>
		</div>
	  </div>
	  </div>
</div>
						
@endsection			