@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">{{ __('Details') }}
					<a class="btn btn-primary pull-right" href="{{route('visa-types.index')}}"><i class="fa fa-arrow-left"></i></a>
				</div>

                <div class="card-body">
					
					<div>
					   <label>Country:</label>
					   <p>{{$visa_type->country->country}}</p>
					</div>	
					<div>
					   <label>Visa Type:</label>
					   <p>{{$visa_type->visa_type}}</p>
					</div>
					<div>
					   <label>Code:</label>
					   <p>{{$visa_type->code}}</p>
					</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
