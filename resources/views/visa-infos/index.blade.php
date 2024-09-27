@extends('layouts.app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('visa-infos.index',['id'=>$visa_type->id])}}" class="no-decoration">Visa Infos</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
		Visa Info
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
		@include('common.flash')
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center"><span>Visa Infos</span>
					<a class="btn btn-primary pull-right" href="{{route('visa-infos.create',['id'=>$visa_type->id])}}"><i class="fa fa-plus"></i></a>
				</div>
					
                <div class="card-body">
                    <div class="table-responsive">
						<table class="table table-striped">
						            <input type="text" id="myInput" style="width:25%" class="form-control pull-right mr-3" placeholder="Search">
      
							<thead>
								<tr>
									<th class="text-center">S.No</th>
									<th>Country</th>
									<th>Visa Type</th>
									<th>Title</th>
									<th class="text-center">File</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php $sno=1;?>
							<tbody id="myTable">
							@forelse($dump_files as $dump_file)
								<tr>
									<td class="text-center">{{$sno++}}</td>
									<td>{{$dump_file->country->country}}</td>
									<td>{{$dump_file->visa_type->visa_type}}</td>
									<td>{{$dump_file->title}}</td>
									<td class="text-center">
									<div class="row justify-content-center"><a download="MyPdf" href="{{ asset('storage/'.$dump_file->vfile) }}" title="Download">
										<img src="{{ asset('build/assets/images/pdf-icon.png') }}" width="50px" height="40px">
												</a>
										
									</div>
									
									</td>
									
									<td>
										<a class="" href="{{route('visa-infos.show',$dump_file->id)}}"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
										<a class="" href="{{route('visa-infos.edit',$dump_file->id)}}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
										
										<a class="" href="{{route('visa-infos.delete',$dump_file->id)}}" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')"><i class="fa fa-trash text-danger"></i></a>
								
									</td>
								</tr>
							@empty
								<tr><td colspan="6">No data found!</td></tr>
							@endforelse	
							</tbody>
						</table>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
	$(document).ready(function(){
	  $("#myInput").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#myTable tr").filter(function() { 
		  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	  });
	});
</script>
@endsection
