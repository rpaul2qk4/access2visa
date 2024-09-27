@extends('layouts.app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		@can('isAdmin')
			<a href="{{route('home')}}" class="no-decoration">Home</a>
		@endcan
		@can('isUser')
			<a href="{{route('user-home')}}" class="no-decoration">Home</a>
		@endcan
		@can('isAgent')
			<a href="{{route('agent-home')}}" class="no-decoration">Home</a>
		@endcan
	</li>

	<li class="breadcrumb-item active" aria-current="page">
		Change Password
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
				<div class="card-header d-flex justify-content-between align-items-center ">
					<div>{{ __('Change Password') }}</div>
					<div>
						<a class="pull-right btn btn-primary" style="margin-right:6px;" href="{{route('users.index')}}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Back"><i class="fa fa-arrow-left"></i></a>
					</div>
				</div>				
                <div class="card-body">
                    <form method="POST" action="{{ route('users.update-password',$user->id) }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="old_password" class="col-md-4 col-form-label text-md-end">{{ __('Old Password') }}</label>

                            <div class="col-md-6">
                                <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required autocomplete="old-password">

                                @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Change Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
