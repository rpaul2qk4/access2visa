@extends('layouts.app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('visa-types.index')}}" class="no-decoration">Countries</a>
	</li>	
	<li class="breadcrumb-item active" aria-current="page">
	Create visa type
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Create') }}
					<a class="btn btn-primary pull-right" href="{{route('visa-types.index')}}"><i class="fa fa-arrow-left"></i></a>
				</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('visa-types.store') }}">
                        @csrf

                        <div class="row mb-3">
						
                            <label for="visa_type" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>

                            <div class="col-md-6">
                               <select class="form-select" name="country_id" aria-label="Default select example">
								  @foreach(DataHelper::getCountriesOptions() as $key=>$value)
								  <option value="{{$key}}">{{$value}}</option>
								  @endforeach
								</select>
                                @error('visa_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
							
                        </div>
                        <div class="row mb-3">
						
                            <label for="visa_type" class="col-md-4 col-form-label text-md-end">{{ __('Visa Type') }}</label>

                            <div class="col-md-6">
                                <input id="visa_type" type="text" class="form-control @error('visa_type') is-invalid @enderror" name="visa_type" value="{{ old('visa_type') }}" required autocomplete="visa_type" autofocus>

                                @error('visa_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
							
                        </div>
						
						<div class="row mb-3">
						
                            <label for="code1" class="col-md-4 col-form-label text-md-end">{{ __('Code') }}</label>
           
							 <div class="col-md-6">
								<input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>

								@error('code')
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>

	$(document).ready(function(){
	  
		$("select").change(function(){ 	
			var crncy=$('#currency').val();
			$("#curr_icon").html('<i style="font-size:24px" class="fa fa-'+crncy+'"></i><input type="hidden" value="'+crncy+'" name="currency_icon">');
		});
	 
	});
	
</script>

@endsection
