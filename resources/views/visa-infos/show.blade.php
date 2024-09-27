@extends('layouts.app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('visa-infos.index',['id'=>$dump_file->visa_type_id])}}" class="no-decoration">Countries</a>
	</li>
	
	<li class="breadcrumb-item active" aria-current="page">
	Details 
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
					<div>Details</div>
					<div>
						<a class="btn" href="{{route('visa-infos.edit',$dump_file->id)}}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
						<a class="btn" href="{{route('visa-infos.delete',$dump_file->id)}}" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')"><i class="fa fa-trash text-danger"></i></a>
						<a class="btn btn-primary pull-right" href="{{route('visa-infos.index',['id'=>$dump_file->visa_type_id])}}"><i class="fa fa-arrow-left"></i></a>			
					</div>
				</div>


                <div class="card-body">
					<div>
					   <label>TItle:</label>
					   <p>{{$dump_file->title}}</p>
					</div>
					<div>
					   <label>Visa Type:</label>
					   <p>{{$dump_file->visa_type->visa_type}}</p>
					</div>
					<div>
					   <label>Pdf File:</label>
					   <p>
					   
							<iframe src="{{ asset('storage/'.$dump_file->vfile) }}" width="100%" height="500px">
								
							</iframe>
					   
					   </p>
					</div>
					
					
					
					
					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
