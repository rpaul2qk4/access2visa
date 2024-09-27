@extends('layouts.app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>

	<li class="breadcrumb-item active" aria-current="page">
		Visa Types List
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
		@include('common.flash')
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center"><span>Visa Types<span class="badge bg-danger justify-content-start ml-2">{{$visa_types->count()}}</span></span>
					<a class="btn btn-primary pull-right" href="{{route('visa-types.create')}}"><i class="fa fa-plus"></i></a>
				</div>

                <div class="card-body">
                    <div class="table-responsive">
						<table class="table table-striped">
						            <input type="text" id="myInput" style="width:25%" class="form-control pull-right mr-3" placeholder="Search">
      
							<thead>
								<tr>
									<th class="text-center">S.No</th>
									<th class="text-center">Country</th>
									<th>Visa Type</th>
									<th>Code</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php $sno=1;?>
							<tbody id="myTable">
							@forelse($visa_types as $visa_type)
								<tr>
									<td class="text-center">{{$sno++}}</td>
									<td class="text-center">{{$visa_type->country->country}}</td>
									<td><a class="" href="{{route('visa-infos.index',['id'=>$visa_type->id])}}" style="text-decoration:none">{{$visa_type->visa_type}}</a></td>
									<td>{{$visa_type->code}}</td>
									
									</td>
									<td>
										<a class="" href="{{route('visa-types.show',$visa_type->id)}}"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
										<a class="" href="{{route('visa-types.edit',$visa_type->id)}}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
									
										<a class="" href="{{route('visa-types.delete',$visa_type->id)}}" ><i class="fa fa-trash  text-danger"></i></a>
									
									</td>
								</tr>
							@empty
								<tr><td colspan="7">No data found!</td></tr>
							@endforelse	
							</tbody>
						</table>
					</div>
                </div>
            </div>
        </div>
    </div>
	{{$visa_types->links()}}
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
