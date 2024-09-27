@extends('layouts.app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('users.index')}}" class="no-decoration">Users</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
		Edit user details
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center ">
					<div>{{ __('Edit') }}</div>
					<div>
						<a class="pull-right btn btn-primary" style="margin-right:6px;" href="{{route('users.index')}}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Back"><i class="fa fa-arrow-left"></i></a>
					</div>
				</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update',$user->id) }}" file="true" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$user->name) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$user->email) }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
                        <div class="row mb-3">
                            <label for="mobile" class="col-md-4 col-form-label text-md-end">{{ __('Mobile Number') }}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="number" maxlength="10" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile',$user->mobile) }}" required autocomplete="mobile">

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="row mb-3">
                            <label for="photo" class="col-md-4 col-form-label text-md-end">{{ __('Photo') }}</label>

                            <div class="col-md-6">
                                <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}" autocomplete="photo">

                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 
						
						@if($user->role_id!=1)
						<div class="row mb-3">
                            <label for="role_id" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>

                            <div class="col-md-6">
                                <select class="form-select" name="role_id" required>
								@foreach(DataHelper::getRoles() as $key=>$value)
									@if($user->role_id==$key)
										<option value="{{$key}}" selected>{{$value}}</option>
									@else
										<option value="{{$key}}">{{$value}}</option>
									@endif
								@endforeach	
								</select>
								@error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						@endif
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
    jQuery(document).ready(function ()
    {
            jQuery('select[name="country_id"]').on('change',function(){
               var countryID = jQuery(this).val();
			  //alert(countryID);
               if(countryID)
               {
                  jQuery.ajax({
					 url : "{{ url('get-states') }}" + "/" +countryID,									 
					 type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
					    jQuery('select[name="state_id"]').empty();
						       $('select[name="state_id"]').append('<option value="">Select</option>');
                        jQuery.each(data, function(key,value){
                           $('select[name="state_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     },
					 error:function(data)
                     {
						alert("err");
                     }
                  });
               }
               else
               {
				   //alert('fail');
                  $('select[name="state"]').empty();
               }
            });
    });
</script>
@endsection
