@extends('layouts.app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('roles.index')}}" class="no-decoration">Roles</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
		Create Role 
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">                
				 <div class="card-header d-flex justify-content-between align-items-center ">
					<div>{{ __('Create') }}</div>
					<div>
						<a class="pull-right btn btn-primary" style="margin-right:6px;" href="{{route('roles.index')}}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Back"><i class="fa fa-arrow-left"></i></a>
					</div>
				</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('roles.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>

                            <div class="col-md-6">
                                <input id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" required autocomplete="role" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
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
