@extends('layouts.app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('users.index')}}" class="no-decoration">Users</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
		User Details
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between align-items-center ">
					<div>{{ __('Details') }}</div>
					<div>
						<a class="pull-right btn btn-primary" style="margin-right:6px;" href="{{route('users.index')}}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Back"><i class="fa fa-arrow-left"></i></a>
					</div>
				</div>

                <div class="card-body">
					<div>
					   <label>Name:</label>
					   <p>{{$user->name}}</p>
					</div>
					<div>
					   <label>Email:</label>
					   <p>{{$user->email}}</p>
					</div>
					<div>
					   <label>Mobile Number :</label>
					   <p>{{$user->mobile}}</p>
					</div>
					
					<div>
					   <label>Photo:</label>
					   <p><img src="{{asset('storage/'.$user->photo)}}" style="width:250px;height:250px"></p>
					</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
