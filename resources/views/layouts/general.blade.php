<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    </head>
    <body class="antialiased bg-light1" style="background-color:#0dcaf0">
        <!-- Login 1 - Bootstrap Brain Component -->
			<div class=" py-3 py-md-4">
			  <div class="container ">
				<div class="row justify-content-md-center">
				  
				  <div class="col-sm-6">
				  
						@yield('content')
						
						
				  </div>
				  
				  
				</div>
			  </div>
			</div>
    </body>
</html>
