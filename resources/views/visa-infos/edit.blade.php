@extends('layouts.app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('visa-infos.index',['id'=>$dump_file->visa_type_id])}}" class="no-decoration">Visa Infos</a>
	</li>
		
	<li class="breadcrumb-item active" aria-current="page">
	Edit Visa Infos
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
		@include('common.flash')
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">{{ __('Edit Visa Infos') }}
				<a class="btn btn-primary pull-right" href="{{route('visa-infos.index',['id'=>$dump_file->visa_type_id])}}"><i class="fa fa-arrow-left"></i></a>			
				</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('visa-infos.update',$dump_file->id) }}" file="true" enctype="multipart/form-data">
                        @csrf

                        <input id="visa_type_id" type="hidden" class="form-control @error('visa_type') is-invalid @enderror" name="visa_type_id" value="{{ old('visa_type_id',$dump_file->visa_type_id) }}"  autocomplete="visa_type_id" autofocus>
                         
                        <div class="row mb-3">
                            <label for="title1" class="col-md-4 col-form-label text-md-end">{{ __('Visa Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title',$dump_file->title) }}"  autocomplete="title">

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						<div class="row mb-3">
                            <label for="file1" class="col-md-4 col-form-label text-md-end">{{ __('File') }}</label>
                            <div class="col-md-6">
                                <input id="vfile" type="file" class="form-control @error('vfile') is-invalid @enderror" name="vfile" value="{{ old('vfile') }}" autocomplete="vfile" autofocus>
                                @error('vfile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

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
@endsection
