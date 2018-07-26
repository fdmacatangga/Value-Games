@extends('layouts.app')

@section('content')
@include('layouts.header')
<div class="nk-main">
    <div class="nk-gap-2"></div>
	<div class="container">
		@include('layouts.banner')
		<div class="nk-gap-2"></div>
    	 <div class="row vertical-gap">
			<div class="col-lg-8">
				
			</div><!-- col-8 -->
			<div class="col-lg-4">
				@include('layouts.sidebar')
			</div>
    	 </div>
		
		 <div class="nk-gap-4"></div>
		 

	</div>
	@include('layouts.footer')	
	@include('layouts.login-modal')
</div>

@include('layouts.scripts')
@endsection