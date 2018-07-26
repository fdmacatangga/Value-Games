@extends('layouts.app')

@section('content')
@include('layouts.header')
<div class="nk-main">
    <div class="nk-gap-2"></div>
	<div class="container">
		<div id="app">
		@include('layouts.banner')
		<div class="nk-gap-2"></div>
    	 <div class="row vertical-gap">
			<div class="col-lg-8">
				
				<matches></matches>
				<ud></ud>
			</div><!-- col-8 -->
			<div class="col-lg-4">
				@include('layouts.sidebar')
			</div>
    	 </div>
		
		 <div class="nk-gap-4"></div>
		 
		</div>
	</div>
	@include('layouts.footer')	
	@include('layouts.login-modal')
</div>

@include('layouts.scripts')
<script src="{{asset('js/app.js')}}"></script>
<script type="text/javascript">
	var app = new Vue({
		el:"#app"
	});
</script>
@endsection 