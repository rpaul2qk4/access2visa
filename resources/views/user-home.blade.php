@extends('layouts.emp-app')

@section('content')
<div class="container" style="height:455px;overflow-y:scroll">
    <main class="main users chart-page" id="skip-target">
      <div class="container">
        
        <div class="row">
		
		<div class="col-sm-3">
           
            <article class="white-block">
              <div class="top-cat-title">
                <h3>Type : {{!empty($visa_type)?$visa_type->visa_type:'No Data'}}</h3>
                <p>Country: {{!empty($visa_type)?$visa_type->country->country:'No Data'}}</p>
               
              </div>
              <ul class="top-cat-list">
				@if(!empty($visa_type))
					@foreach($visa_type->dump_files as $dump_file)
						<li>
						  <a href="##">
							<div class="top-cat-list__title" onclick="getVisaFun({{$dump_file->id}})">
							{{$dump_file->title}} <span></span>
							</div>							
						  </a>
						</li> 
					@endforeach
				@endif
              </ul>
            </article>
          </div>
		
          <div class="col-sm-9">          
             <article class="white-block">
			 <h5 id="fileTitle"></h5>
              <iframe id="iFrameName" src="" width="100%" height="500px"></iframe>
            </article>
          </div>		  
		  
		  
          
        </div>
      </div>
    </main>
</div>
<script type="text/javascript">
    function getVisaFun(em)
    {
	   if(em)
	   {
		  jQuery.ajax({
			 url : "{{ url('get-visa-info') }}" + "/" +em,									 
			 type : "GET",
			 dataType : "json",
			 success:function(data)
			 {					
				 let imgFile='storage/' + data['vfile'];
				 var pdfFile='<iframe src="{{ asset(' + imgFile + ') }}" width="100%" height="500px"></iframe>';
			
				document.getElementById('fileTitle').innerHTML=data['title'];			
				document.getElementById('iFrameName').src=imgFile;			
		 
			 },
			 error:function(data)
			 {
				alert("err");
			 }
		  });
	   }         
    }
</script>
@endsection
